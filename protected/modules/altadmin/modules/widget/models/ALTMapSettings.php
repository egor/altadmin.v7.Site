<?php

/**
 * ALTMapSettings. Модель для CMS таблицы MapSettings
 * 
 * @package CMS
 * @category Map
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTMapSettings extends MapSettings {

    /**
     * Возвращает статическую модель указанного класса
     * 
     * @param string $className имя активной записи класса
     * return MapSettings статическая модель класса 
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
