<?php

/**
 * ALTUserCmsSettings. Модель для CMS таблицы UserCmsSettings
 * 
 * @package CMS
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTUserCmsSettings extends UserCmsSettings {

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return ALTUserCmsSettings статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
