<?php

/**
 * StringOperations. Обработка строк
 * 
 * @package Default
 * @category String
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class StringOperations {

    /**
     * Обрезка строки до указанной длины
     * 
     * @param string $string - исходная строка
     * @param integer $maxlen - максимальная длина получаемой строки
     * @param string $add - добавочные символы при обрезке строки
     * @return string - обрезанная строку согласно заданным параметрам
     */
    public static function cutString($string, $maxlen, $add = '') {
        $len =  (mb_strlen($string, 'UTF-8') > $maxlen) ? mb_strripos(mb_substr($string, 0, $maxlen, 'UTF-8'), ' ', 0, 'UTF-8') : $maxlen; 
        $cutStr = mb_substr($string, 0, $len, 'UTF-8');
        return (mb_strlen($string, 'UTF-8') > $maxlen) ? $cutStr.$add : $cutStr;
    }

}