<?php 
class NumberSpeller
{
    protected static $pattern = '/^\d*$/';

    protected static $baseNumbers = [
        '1' => 'бір',
        '2' => 'екі',
        '3' => 'үш',
        '4' => 'төрт',
        '5' => 'бес',
        '6' => 'алты',
        '7' => 'жеті',
        '8' => 'сегіз',
        '9' => 'тоғыз',
    ];

    protected static $tens = [
        '1' => 'он',
        '2' => 'жиырма',
        '3' => 'отыз',
        '4' => 'қырық',
        '5' => 'елу',
        '6' => 'алпыс',
        '7' => 'жетпіс',
        '8' => 'сексен',
        '9' => 'тоқсан',
    ];
    
    protected static $dividers = [
         [ 'divider' => 100, 'spell' => 'жүз' ],
         [ 'divider' => 1000, 'spell' => 'мың' ],
         [ 'divider' => 1000000, 'spell' => 'миллион' ],
         [ 'divider' => 1000000000, 'spell' => 'миллиард' ],
         [ 'divider' => 1000000000000, 'spell' => 'триллион' ],
         [ 'divider' => 1000000000000000000, 'spell' => 'квинтилион' ],
    ];

    private static function _spellNumber (int $number)
    {
        if (empty($number)) return [];
        if ($number < 10): return [self::$baseNumbers[$number]]; endif;
	    if ($number < 100):	return array_merge([self::$tens[floor($number / 10)]] , self::_spellNumber($number % 10)); endif;
        foreach(self::$dividers as $key => $devItem):
            if ($key == 0): continue; endif;	
            if ($number == $devItem['divider']): return [$devItem['divider']]; endif;
            if ($number < $devItem['divider']):
                $prev_divider = self::$dividers[$key - 1]['divider'];
                $arr = array_merge(self::_spellNumber(floor($number / $prev_divider)), [self::$dividers[$key - 1]['spell']]);
                return array_merge($arr, self::_spellNumber($number % $prev_divider));
            endif;
        endforeach;
    }

    public static function spell($value)
    {
        if (!preg_match(self::$pattern, $value)): return null; endif;
        return implode(" ", self::_spellNumber($value));
    }

    public function getSpelled($value){
        return self::spell($value);
    }


}