<?php

/**
 * DefaultController. Работа с логами
 * 
 * @package CMS
 * @category Loger
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Действие перед экшенами
     * 
     * @param string $action
     * @return boolean
     * @throws CHttpException
     */
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['loger']['work']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }

    /**
     * Список пользователей
     */
    public function actionIndex() {
        $condition = 'module<>"loger"';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC';
        $count = ALTLoger::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['loger']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTLoger::model()->with('user')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Лог';
        $this->pageAddHeader = 'Лог действий пользователей в CMS';
        ALTLoger::saveLog('Просмотр списка логов CMS', 'Список логов CMS, страница: ' . (isset($_GET['page']) && (int)$_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'list', 'loger');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }    

}
