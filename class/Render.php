<?php 

class Render {
    const COIN_START    = "{%coin_start%}";
    const COIN_END      = "{%coin_end%}";
    const COIN_REGEXP   = '/\{%coin_start%\}.*\{%coin_end%\}/';

    const TENGE         = '{%tenge%}';
    const TENGE_STR     = '{%tenge_str%}';
    const TYIN          = '{%tyin%}';
    const TYIN_STR      = '{%tyin_str%}';

    const TENGE_SYMBOL      = '&#8376;'; // not template, it's value


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
        $value = str_replace(array_keys($this->values), $this->values, $this->_template);      
        return $this->rendered_value = (empty($this->values[self::TYIN])) ? preg_replace(self::COIN_REGEXP,'',$value) 
            : $value = str_replace([self::COIN_START, self::COIN_END], '', $value);
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
