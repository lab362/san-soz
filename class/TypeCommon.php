<?php 

class TypeCommon implements TypeNumberInterface{
    private $_number;
    private $_tenge;
    private $_tyin;

    public function __construct($number)
    {
        $this->_number = $number;
        $this->_tenge = intval($this->_number);
        $this->_tyin = floor(($this->_number - $this->_tenge) * 100);
    }

    
    public function getTenge(){
        return $this->_tenge;
    }

    public function getTyin(){
        return $this->_tyin;
    }
}