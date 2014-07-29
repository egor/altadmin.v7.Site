<?php

/**
 * Comment. 
 * 
 * @package Widget
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SComment extends CWidget {

    public $method = '';
    public $data = array();

    public function init() {
        Yii::app()->getModule('comment');
        //if (!Yii::app()->user->isGuest && Yii::app()->user->role == 'admin') {
            $method = $this->method;
            $this->$method();
        //}
    }

    public function printForm() {
        $model = new SiteComment;
        /*
        if (Yii::app()->user->isGuest) {
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.noAuthForm', array('model' => $model, 'data' => $this->data));
        } else {
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.authForm', array('model' => $model, 'data' => $this->data));
        } */
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.form', array('model' => $model, 'data' => $this->data));
    }
    
    public function printComment() {
        $model = SiteComment::model()->with('user')->findAll(array('condition' => 'type = "' . $this->data['type'] .'" AND recordId="' . $this->data['recordId'] . '"' . ((!Yii::app()->user->isGuest && Yii::app()->user->role == 'admin') ? '' : ' AND visibility="1"'), 'order' => 't.date'));
        /*
        if (Yii::app()->user->isGuest) {
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.noAuthPrintComment', array('model' => $model, 'data' => $this->data));
        } else {
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.authPrintComment', array('model' => $model));
        }
         * 
         */
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.printComment', array('model' => $model));
    }

}
