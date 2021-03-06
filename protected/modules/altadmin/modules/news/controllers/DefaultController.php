<?php

/**
 * NewsController. Управление новостями
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список новостей
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = ALTNews::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['news']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTNews::model()->with('newsSection')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Новости';
        $this->pageAddHeader = 'Список новостей';
        ALTLoger::saveLog('Просмотр списка новостей', 'Список новостей, страница: ' . (isset($_GET['page']) && (int)$_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'list', 'news');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление новости
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление новости';
        $model = new ALTNews;
        if (isset($_POST['ALTNews']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTNews']; 
            $model->galleryId = $_POST['ALTNews']['galleryId'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Новость успешно добавлена.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/news' : '/altadmin/news/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
                ALTLoger::saveLog('Добавление новости', 'Ошибка при добавлении новости. заголовок: ' . $model->menuName .'.', 0, 'add', 'news');
            }
        }
        $this->render('_form', array('model' => $model));
    }

    /**
     * Редактирование новости
     * 
     * @param int $id - id новости
     */
    public function actionEdit($id) {
        $model = ALTNews::model()->findByPk($id);
        $model->oldListImage = $model->image;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование новости';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTNews']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTNews'];
            $model->galleryId = $_POST['ALTNews']['galleryId'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Новость успешно отредактирована.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/news' : '/altadmin/news/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
                ALTLoger::saveLog('Редактирование новости', 'Ошибка при редактировании новости. id: ' . $model->id . ', заголовок: ' . $model->menuName .'.', 0, 'edit', 'news');
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление новости
     * 
     * @param int $id - id новости
     */
    public function actionDelete($id) {
        if (ALTNews::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление новости', 'Ошибка при удалении новости. id: ' . $id .'.', 0, 'delete', 'news');
            echo json_encode(array('error' => 1));
        }        
    }    
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['news']['work']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    /**
     * Удаление изображения новости
     * 
     * @param int $id - id новости
     */
    public function actionDeleteImage($id) {
        if (ALTNews::model()->findByPk($id)->deleteImage($id, 'image', '/images/news/list/')) {
            ALTLoger::saveLog('Удаление изображения новости', 'Изображение новости успешно удалено. id: ' . $id . '.', 1, 'delete image', 'news');
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление изображения новости', 'Ошибка при удалении изображения новости. Не удалось удалить изображение. id: ' . $id .'.', 0, 'delete image', 'news');
            echo json_encode(array('error' => 1));
        }
    }

    /**
     * Массовое удаление новостей
     */
    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTNews::model()->findByPk((int)$key)->delete();
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
            ALTLoger::saveLog('Массовое удаление новостей', 'Нет данных для удаления', 0, 'mass delete', 'news');
        }        
    }
}