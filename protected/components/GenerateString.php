<?php

/**
 * GenerateString. Генерация строк
 * 
 * @package Component
 * @category String
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class GenerateString {

    /**
     * Генерация строки случайным образом
     * 
     * @param integer $id - id или случайное число
     * @param integer $length - длина строки
     * @return string полученная строка
     */
    function generateIdString($id = 0, $length = 10) {
        $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
        $numChars = strlen($chars);
        $string = '';
        for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        return $id . $string;
    }

}