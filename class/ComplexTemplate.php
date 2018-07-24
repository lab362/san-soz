<?php 
class ComplexTemplate{

    public static function getTeplates(){
        return array_merge(
            self::getTemplate1Content(),
            self::getTemplate2Content()
        );
    }


    public static function getTemplate1Content(){
        // $config = new Config;
        return [
            'template_1' => [
                'content' => [
                    Config::TYPE_COMMON => Render::TENGE_STR . ' тенге' . Render::COIN_START . ', және ' . Render::TYIN . ' ('.Render::TYIN_STR.') тыин' . Render::COIN_END,
                    Config::TYPE_NDS => ' ндс қосқанда {%tenge%} ({%tenge_str%}) тенге,' . Render::COIN_START . ' және {%tyin%} ({%tyin_str%}) тиын' . Render::COIN_END,
                ],
            ]
        ];
    }

    public static function getTemplate2Content(){
        return [
            'template_2' => [
                'content' => [
                    Config::TYPE_COMMON => '{%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%}) тыин',
                    Config::TYPE_NDS => ' ндс қосқанда {%tenge%} ({%tenge_str%}) тенге, және {%tyin%} ({%tyin_str%})',
                ],
            ]
        ];

    }

}