<?php

/**
 * DefaultController. Управление пользователями
 * 
 * @package CMS
 * @category User
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
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['portfolio']['work']) {
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
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.name DESC';
        $count = ALTUser::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['user']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTUser::model()->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Пользователи';
        $this->pageAddHeader = 'Список пользователей';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление пользователя
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление пользователя';
        $model = new ALTUser;
        if (isset($_POST['ALTUser']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTUser'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Пользователь успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/user');
                } else {
                    Yii::app()->request->redirect('/altadmin/user/default/edit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->render('_form', array('model' => $model));
    }

    /**
     * Редактирование пользователя
     * 
     * @param integer $id - id записи
     */
    public function actionEdit($id) {
        $model = ALTUser::model()->findByPk($id);
        $model->oldImage = $model->image;
        $model->oldPassword = $model->password;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование пользователя';
        $this->pageAddHeader = $model->name . ' ' . $model->surname;
        if (isset($_POST['ALTUser']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTUser'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Пользователь успешно отредактирован.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/user');
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $model->password = '';
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление пользователя
     * 
     * @param int $id - id записи
     */
    public function actionDelete($id) {
        if (ALTUser::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1));
        }
    }

    /**
     * Удаление изображения пользователя
     * 
     * @param integer $id - id записи
     */
    public function actionDeleteImage($id) {
        if (ALTUser::model()->findByPk($id)->deleteImage($id, 'image', '/images/user/list/')) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1));
        }
    }

    /**
     * Массовое удаление пользователей
     */
    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTUser::model()->findByPk((int) $key)->delete();
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }
    }

}
