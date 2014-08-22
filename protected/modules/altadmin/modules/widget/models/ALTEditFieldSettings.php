<?php

/**
 * ALTEditFieldSettings. Модель для CMS таблицы EditFieldSettings
 * 
 * @package CMS
 * @category EditFields
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTEditFieldSettings extends EditFieldSettings {

    /**
     * Возвращает статическую модель указанного класса
     * 
     * @param string $className имя активной записи класса
     * return ALTEditFieldSettings статическая модель класса 
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
