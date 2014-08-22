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
class SBlog extends CWidget {

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
            Yii::app()->getModule('blog');
            $method = $this->method;
            $this->$method();
        }
    }

    /**
     * Последние новости
     */
    protected function last() {
        if (Yii::app()->params['altadmin']['modules']['blog']['work'] == 1 && FrontEditFields::getSettings('BlogSettings', 'mainLastBlogPrint') == 1) {
            $model = SiteBlog::model()->with('blogSection')->findAll(array('condition' => 't.visibility="1"', 'order' => 't.date DESC, t.id DESC', 'limit' => FrontEditFields::getSettings('BlogSettings', 'mainLastBlogCount')));
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('model' => $model));
        }
    }

}
