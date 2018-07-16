<?php 

class TypeNds implements TypeNumberInterface{
    private $_number;
    private $_tenge;
    private $_tyin;
    private $_calculated_number;

    private $_nds = 12; // procent

    public function __construct($number){
        $this->_number = $number;
        $this->_calculated_number = round((($this->_number * $this->_nds ) / 100), 2 );
        $this->_tenge = intval($this->_calculated_number);
        $this->_tyin = floor(($this->_calculated_number - $this->_tenge) * 100);
    }

    public function getTenge(){
        return $this->_tenge;
    }

    public function getTyin(){
        return $this->_tyin;
    }
}