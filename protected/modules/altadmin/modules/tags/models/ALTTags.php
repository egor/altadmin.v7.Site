<?php

/**
 * ALTTags. Модель для CMS таблицы Tags
 * 
 * @package CMS
 * @category Tags
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTTags extends Tags {

    /**
     * Возвращает статическую модель указанного класса AR
     * 
     * @param string $className active record имя класса
     * @return ALTTags статическая модель класса
     */
    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
}
