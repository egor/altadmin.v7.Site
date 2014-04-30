<?php

/**
 * ALTUser. Модель для CMS таблицы User
 * 
 * @package CMS
 * @category User
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTUser extends User {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }
}