<?php

/**
 * SBlog. Виджет работы с записями блога
 * 
 * @package Widget
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SContact extends CWidget {

    /**
     * Имя запрашиваемого метода
     * 
     * @var string
     */
    public $method;

    /**
     * Инициализация виджета
     */
    public function init() {
        if (!empty($this->method)) {
            $method = $this->method;
            $this->$method();
        }
    }

    /**
     * Последние новости
     */
    protected function map() {
        if (FrontEditFields::getSettings('MapSettings', 'mapVisibility') == 1) {            
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__);
        }
    }

}
