<?php

/**
 * DefaultController. Управление записями блога
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список записей блога
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = ALTBlog::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['blog']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTBlog::model()->with('blogSection')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Блог';
        $this->pageAddHeader = 'Список записей блога';
        ALTLoger::saveLog('Просмотр списка записей блога', 'Список записей блога, страница: ' . (isset($_GET['page']) && (int)$_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'list', 'blog');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление записи блога
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление записи блога';
        $model = new ALTBlog;
        if (isset($_POST['ALTBlog']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTBlog'];
            $model->tags = $_POST['ALTBlog']['tags'];
            $model->galleryId = $_POST['ALTBlog']['galleryId'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Запись блога успешно добавлена.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/blog' : '/altadmin/blog/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
                ALTLoger::saveLog('Добавление записи блога', 'Ошибка при добавлении записи блога. заголовок: ' . $model->menuName .'.', 0, 'add', 'blog');
            }
        }
        $this->render('_form', array('model' => $model));
    }

    /**
     * Редактирование записи блога
     * 
     * @param int $id - id записи
     */
    public function actionEdit($id) {
        $model = ALTBlog::model()->findByPk($id);
        $model->oldListImage = $model->image;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование записи блога';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTBlog']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTBlog'];
            $model->tags = $_POST['ALTBlog']['tags'];
            $model->galleryId = $_POST['ALTBlog']['galleryId'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Запись блога успешно отредактирована.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/blog' : '/altadmin/blog/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
                ALTLoger::saveLog('Редактирование записи блога', 'Ошибка при редактировании записи блога. id: ' . $model->id . ', заголовок: ' . $model->menuName .'.', 0, 'edit', 'blog');
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление записи блога
     * 
     * @param int $id - id записи
     */
    public function actionDelete($id) {
        if (ALTBlog::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление записи блога', 'Ошибка при удалении записи блога. id: ' . $id .'.', 0, 'delete', 'blog');
            echo json_encode(array('error' => 1));
        }        
    }    
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['blog']['work']) {
            return true;
        } else {
            ALTLoger::saveLog('Контроллер блога', 'Доступ запрещен.', 0, 'access denied', 'blog');
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    /**
     * Удаление изображения записи блога
     * 
     * @param int $id - id записи
     */
    public function actionDeleteImage($id) {
        if (ALTBlog::model()->findByPk($id)->deleteImage($id, 'image', '/images/blog/list/')) {
            ALTLoger::saveLog('Удаление изображения записи блога', 'Изображение записи блога успешно удалено. id: ' . $id . '.', 1, 'delete image', 'blog');
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление изображения записи блога', 'Ошибка при удалении изображения записи блога. Не удалось удалить изображение. id: ' . $id .'.', 0, 'delete image', 'blog');
            echo json_encode(array('error' => 1));
        }
    }

    /**
     * Массовое удаление записей блога
     */
    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTBlog::model()->findByPk((int)$key)->delete();
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
            ALTLoger::saveLog('Массовое удаление записей блога', 'Нет данных для удаления', 0, 'mass delete', 'blog');
        }        
    }
}