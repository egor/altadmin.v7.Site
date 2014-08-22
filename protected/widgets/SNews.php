<?php

/**
 * SNews. Виджет работы с новостями сайта
 * 
 * @package Widget
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SNews extends CWidget {

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
            Yii::app()->getModule('news');
            $method = $this->method;
            $this->$method();
        }
    }

    /**
     * Последние новости
     */
    protected function last() {
        if (Yii::app()->params['altadmin']['modules']['news']['work'] == 1 && FrontEditFields::getSettings('NewsSettings', 'mainLastNewsPrint') == 1) {
            $model = SiteNews::model()->with('newsSection')->findAll(array('condition' => 't.visibility="1"', 'order' => 't.date DESC, t.id DESC', 'limit' => FrontEditFields::getSettings('NewsSettings', 'mainLastNewsCount')));
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('model' => $model));
        }
    }

}
