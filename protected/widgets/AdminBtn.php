<?php

/**
 * Feedback. Форма обратной связи
 * 
 * @package Widget
 * @category Feedback
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class AdminBtn extends CWidget {

    public $method = '';
    public $data = array();

    public function init() {
        if (!Yii::app()->user->isGuest && Yii::app()->user->role == 'admin') {
            // получение экземпляра менеджера ресурсов
            $cs = Yii::app()->clientScript;
            // регистрация css-ресурсов 
            // через указание URL 
            $cs->registerCssFile(Yii::app()->theme->baseUrl . '/admin/css/' . 'adminIcon.css');
            // регистрация js-ресурсов
            // через указание URL 
            //$cs->registerScriptFile('/site/js/'.'jquery.timers-1.1.2.js');
            $method = $this->method;
            $this->$method();
        }
    }

    public function blogRecord() {
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array());
    }

    public function blogRecordList() {
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('data' => $this->data));
    }
    
    public function blogRecordDetail() {
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('data' => $this->data));
    }

}
