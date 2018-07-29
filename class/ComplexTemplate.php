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
                    Config::TYPE_COMMON => Render::TENGE_STR . ' ' . Render::TENGE_SYMBOL . ' тенге' . Render::COIN_START . ', және ' . Render::TYIN . ' ('.Render::TYIN_STR.') тыин' . Render::COIN_END,
                    // Config::TYPE_NDS => ' ндс қосқанда ' . Render::TENGE . ' (' . Render::TENGE_STR . ') тенге,' . Render::COIN_START . ' және ' . Render::TYIN . ' (' . Render::TYIN_STR . ') тиын' . Render::COIN_END,
                ],
            ]
        ];
    }

    public static function getTemplate2Content(){
        return [
            'template_2' => [
                'content' => [
                    Config::TYPE_COMMON => Render::TENGE . ' (' . Render::TENGE_STR . ') тенге' . Render::COIN_START . ', және ' . Render::TYIN . ' (' . Render::TYIN_STR . ') тыин' . Render::COIN_END,
                    // Config::TYPE_NDS => ' ндс қосқанда ' . Render::TENGE . ' (' . Render::TENGE_STR . ') тенге, және ' . Render::TYIN . ' (' . Render::TYIN_STR . ') ',
                ],
            ]
        ];

    }

}