<?php

/**
 * DefaultController. Виджеты
 * 
 * @package CMS
 * @category Widget
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список новостей
     */
    public function actionIndex() {
        die();
    }

    /**
     * 
     * @param type $action
     * @return boolean
     * @throws CHttpException
     */
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['widget']['work']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    
}