<?php

/**
 * ShowNotifications Вывод уведомлений
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2013, Egor Rihnov
 */
class ShowNotifications extends CWidget {

    /**
     * Вывод уведомлений
     */
    public function init() {
        foreach (Yii::app()->user->getFlashes() as $key => $message) {
            $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.ShowNotifications.'.$key, array('message' => $message));            
        }
    }

}