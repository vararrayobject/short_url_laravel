<?php

namespace App\Http\Traits;

trait UrlTrait
{
    static $CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_';

    public function int2Radix64($num)
    {
        $charMap = str_split(UrlTrait::$CHARACTERS);
        
        $char = [];
        $q = $num;

        while ($q > 0) {
            $r = $q % 64;
            array_push($char, $charMap[$r]);
            $q = (int)($q / 64);
        }

        return implode(array_reverse($char));
    }

    public function radix64ToInt($str)
    {
        $charMap = str_split(UrlTrait::$CHARACTERS);
        $char = array_reverse(str_split($str));
        $num = 0;

        for ($i=0; $i < count($char) ; $i++) {
            $num += (int) array_search($char[$i], $charMap) * pow(64, $i);
        }

        return $num;
    }

}