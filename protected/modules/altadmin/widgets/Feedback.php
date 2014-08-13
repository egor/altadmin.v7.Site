<?php
/**
 * Feedback.
 * 
 * @package Widget
 * @category Feedback
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class Feedback extends CWidget {

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
        $method = $this->method;
        $this->$method();
    }

    /**
     * Вывод уведомлений о новых сообщениях в панели уведомлений
     */
    private function feedbackNotification() {
        if (FrontEditFields::getSettings('FeedbackSettings', 'notification')) {
            $model = FeedbackStorage::model()->findAll(array('condition' => '`new`="1" AND `trash`="0"', 'order' => 'date DESC'));
            $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('model' => $model));
        }
    }
}
