<?php 

class TypeCommon implements TypeNumberInterface{
    private $_number;
    private $_tenge;
    private $_tyin;

    public function __construct($number)
    {
        $numbers = explode(".", $number);
        $this->_number = $number;
        $this->_tenge = $numbers[0];
        $this->_tyin = $numbers[1] ?? null;
    }

    
    public function getTenge(){
        return $this->_tenge;
    }

    public function getTyin(){
        return $this->_tyin;
    }
}