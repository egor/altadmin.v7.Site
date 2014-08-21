<?php

/**
 * ALTFooterSettings. Модель для CMS таблицы FooterSettings
 * 
 * @package CMS
 * @category Main
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTFooterSettings extends FooterSettings {

    /**
     * Возвращает статическую модель указанного класса
     * 
     * @param string $className имя активной записи класса
     * return FooterSettings статическая модель класса 
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
