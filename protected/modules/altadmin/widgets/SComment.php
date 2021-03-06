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

    /**
     * Имя вызываемого метода
     * 
     * @var string 
     */
    public $method = '';

    /**
     * Инициализация виджета
     */
    public function init() {
        //Yii::app()->getModule('comment');
        $method = $this->method;
        $this->$method();
    }

    /**
     * Вывод уведомлений о новых сообщениях в панели уведомлений
     */
    private function notification() {
        if (Yii::app()->params['altadmin']['modules']['comment']['work'] == 1 && FrontEditFields::getSettings('CommentSettings', 'notification')) {
            $model = ALTComment::model()->with('user')->findAll(array('condition' => '`new`="1"', 'order' => 't.date DESC'));
            $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('model' => $model));
        }
    }
}
