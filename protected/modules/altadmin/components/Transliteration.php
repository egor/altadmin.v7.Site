<?php

/**
 * Transliteration. Транслитерация строки
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class Transliteration {

    /**
     * Транслитерация строки с кирилицы в латиницу
     * 
     * @param string $str - строка транслитерации
     * @param int $type - тип ответа (0 - вернет строку транслитерации, 
     * 1 - транслитерация в нижний регистр, 
     * 2 - транслитирация в верхний регистр)
     * 
     * @return string - строка транслитерации
     */
    public function ruToLat($str, $type = 0) {        
        $tr = array(
        "А" => "a", "Б" => "b", "В" => "v", "Г" => "g",
        "Д" => "d", "Е" => "e", "Ж" => "j", "З" => "z", "И" => "i",
        "Й" => "y", "К" => "k", "Л" => "l", "М" => "m", "Н" => "n",
        "О" => "o", "П" => "p", "Р" => "r", "С" => "s", "Т" => "t",
        "У" => "u", "Ф" => "f", "Х" => "h", "Ц" => "ts", "Ч" => "ch",
        "Ш" => "sh", "Щ" => "sch", "Ъ" => "", "Ы" => "yi", "Ь" => "",
        "Э" => "e", "Ю" => "yu", "Я" => "ya", "а" => "a", "б" => "b",
        "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "j",
        "з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
        "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
        "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
        "ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya", "ё"=>"e",
        " " => "-", "." => "", "/" => "-","," => "-","\\" => "-",
        "{" => "-","}" => "-","[" => "-","]" => "-","?" => "-","!" => "-",
        "@" => "-","#" => "-","$" => "-",":" => "-","]" => ";","]" => "-",
        "(" => "-",")" => "-","=" => "-",">" => "-","<" => "-","`" => "-",
        "~" => "-","]" => "-","]" => "-","]" => "-","|" => "-", "'"=>'-', "\""=>"-", "*"=>"-"
        );
        $rStr = strtr($str, $tr);
        if ($type == 1) {
            $rStr = strtolower($rStr);
        } else if ($type == 2) {
            $rStr = strtoupper($rStr);
        }
        return $rStr;
    }    
}