<?php 

class Render {

    const TENGE = 'tenge';
    const TENGE_STR = 'tenge_str';
    const TYIN = 'tyin';
    const TYIN_STR = 'tyin_str';

    protected static $template_labels = [
        self::TENGE     => '{%tenge%}',
        self::TENGE_STR => '{%tenge_str%}',
        self::TYIN      => '{%tyin%}',
        self::TYIN_STR  => '{%tyin_str%}',
    ];

    protected $values = [
        self::TENGE     => 0,
        self::TENGE_STR => '',
        self::TYIN      => 0,
        self::TYIN_STR  => '',
    ]; 
    protected $rendered_value = ''; 

    private function __construct($template){
        $this->_template = $template;
    }

    public function render(){
        return $this->rendered_value = str_replace(self::$template_labels, $this->values, $this->_template);
    }

    public function getInstance($template)
    {
        return new self($template);
    }

    public function setTenge($number, $number_spelled)
    {
        $this->values[self::TENGE] = $number;
        $this->values[self::TENGE_STR] = $number_spelled;
        return $this;
    }

    public function setTyin($number, $number_spelled)
    {
        $this->values[self::TYIN] = $number;
        $this->values[self::TYIN_STR] = $number_spelled;
        return $this;
    }
}