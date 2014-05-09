<?php

/**
 * DefaultDataBehavior. Управляния стандартными данными записей
 * 
 * @package CMS
 * @category Default
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultDataBehavior extends CActiveRecordBehavior {
    
    /**
     * Установка url для записи
     * 
     * @return string - url записи
     */
    public function setUrl($url, $mName) {
        if (empty($url)) {
            return Transliteration::ruToLat($mName);
        } else {
            return Transliteration::ruToLat($url);
        }
    }

    /**
     * Установить хеш записи
     * 
     * @return string - уникальная строка
     */
    public function setHash() {
        return md5(time() . rand(1000, 9999));
    }

    /**
     * Установка даты
     * 
     * @return int - unix время
     */
    public function setDate($date = '') {
        if (empty($date)) {
            return DateOperations::dateToUnixTime(date('d.m.Y'));
        } else {
            return DateOperations::dateToUnixTime($date);
        }
    }
}