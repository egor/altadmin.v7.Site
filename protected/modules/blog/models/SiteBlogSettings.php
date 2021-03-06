<?php

/**
 * SiteNewsSettings. Управляние настройками новостей
 * 
 * @package Site
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SiteBlogSettings extends BlogSettings {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getPagerSize() {
        $model = SiteBlogSettings::model()->find(array('condition' => '`key`="pagerSize"', 'select' => 'value'));
        return $model->value;
    }
    
    public function getPagerMaxButtonCount() {
        $model = SiteBlogSettings::model()->find(array('condition' => '`key`="pagerMaxButtonCount"', 'select' => 'value'));
        return $model->value;
    }

}