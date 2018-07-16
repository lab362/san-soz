<?php 

class Speller{
    protected static $pattern = '/^\d+(\.\d{1,2}){0,1}$/';
    protected $configs = [Config::TYPE_COMMON, Config::TYPE_NDS];
    protected $number = null;
    protected $numbers = [];
    protected $complex_templates = [];
    protected $rendered_values = [];

    protected function __construct($number)
    {
        $this->number = self::isValid($number) ? $number : null;
        $this->complex_templates = ComplexTemplate::getTeplates();    
        foreach($this->configs as $config):
            $this->numbers[$config] = Config::getInstanceOf($config, $this->number);
        endforeach;
    }

    public function renderAll()
    {
        foreach($this->complex_templates as $template_name => $complex_template):
            $this->rendered_values[$template_name] = $this->_renderTemplate($complex_template);
        endforeach;
        return $this->rendered_values;
    }

    public function render($template_name)
    {
        return  (isset($this->complex_templates[$template_name])) ? $this->_renderTemplate($this->complex_templates[$template_name]) : '';
    }

    private function _renderTemplate($complex_template)
    {
        if (empty($this->number)): return ''; endif;
        $sentense = '';
        foreach($complex_template['content'] as $type => $template):
            if (!isset($this->numbers[$type])): continue; endif;
            $number_object = $this->numbers[$type];
            $sentense .= Render::getInstance($template)
            ->setTenge($number_object->getTenge(), NumberSpeller::spell($number_object->getTenge()))
            ->setTyin($number_object->getTyin(), NumberSpeller::spell($number_object->getTyin()))
            ->render();  
        endforeach;            
        return $sentense;
    }

    public static function getInstance($number)
    {
        return new self($number);
    }

    public static function isValid($number)
    {
        return preg_match(self::$pattern, $number);
    }
}