<?php 
class ComplexTemplate{
    
    public static function getTeplates(){
        return array_merge(
            self::getTemplate1Content(),
            self::getTemplate2Content()
        );
    }


    public static function getTemplate1Content(){
        $config = new Config;
        return [
            'template_1' => [
                'content' => [
                    Config::TYPE_COMMON => '{%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%}) тыин',
                    Config::TYPE_NDS => 'ндс қосқанда{%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%}) тиын',
                ],
            ]
        ];
    }

    public static function getTemplate2Content(){
        return [
            'template_2' => [
                'content' => [
                    Config::TYPE_COMMON => '{%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%}) тыин version 2',
                    Config::TYPE_NDS => 'ндс қосқанда{%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%}) тыин version 2',
                ],
            ]
        ];

    }

}