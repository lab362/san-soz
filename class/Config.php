<?php 
class Config {
    const TYPE_COMMON = 'common';
    const TYPE_NDS = 'nds';

    static $class_names = [
        self::TYPE_COMMON => 'TypeCommon',
        self::TYPE_NDS => 'TypeNds',
    ];

    public static function getInstanceOf($config, $number){
        $class_name = self::$class_names[$config];
        return new $class_name($number);
    } 
}