<?php

/**
 * ALTBlogSettings. Модель для работы с таблицей "blogSettings"
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTBlogSettings extends BlogSettings {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }
}