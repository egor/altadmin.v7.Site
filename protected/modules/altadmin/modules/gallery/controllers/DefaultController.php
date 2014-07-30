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
        $criteria->order = 't.id DESC';
        $count = ALTGallery::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['gallery']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTGallery::model()->with()->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Галерея';
        $this->pageAddHeader = 'Список галерей';
        $addForm = new ALTGallery();
        ALTLoger::saveLog('Просмотр списка галереи', 'Список галерии, страница: ' . (isset($_GET['page']) && (int)$_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'list', 'gallery');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator, 'addForm' => $addForm));
        }
    }

    /**
     * Добавление новости
     */
    public function actionAdd() {
        $model = new ALTGallery;
        if (isset($_POST['ALTGallery'])) {
            $model->attributes = $_POST['ALTGallery'];                                    
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Галлерея успешно добавлена.');
                echo json_encode(array('error' => 0, 'id' => $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
                ALTLoger::saveLog('Добавление галереи', 'Ошибка при добавлении галереи. заголовок: ' . $model->menuName .'.', 0, 'add', 'gallery');
            }
        }
    }

    /**
     * Редактирование новости
     * 
     * @param int $id - id новости
     */
    public function actionEdit($id) {
        $model = ALTGallery::model()->findByPk($id);
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование галереи';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTGallery']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTGallery'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Галерея успешно отредактирована.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/gallery' : '/altadmin/gallery/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
                ALTLoger::saveLog('Редактирование галереи', 'Ошибка при редактировании галереи. id: ' . $model->id . ', заголовок: ' . $model->menuName .'.', 0, 'edit', 'gallery');
            }
        }
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление новости
     * 
     * @param int $id - id новости
     */
    public function actionDelete($id) {
        if (ALTGallery::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление галереи', 'Ошибка при удалении галереи. id: ' . $id .'.', 0, 'delete', 'gallery');
            echo json_encode(array('error' => 1));
        }        
    }    
    
    /**
     * Удаление изображения новости
     * 
     * @param int $id - id новости
     */
    public function actionDeleteImage($id) {
        if (ALTGalleryItem::model()->findByPk($id)->delete()) {
            ALTLoger::saveLog('Удаление картинки галереи', 'Картинка галереи успешно удалено. id: ' . $id . '.', 1, 'delete image', 'gallery');
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление картинки галереи', 'Ошибка при удалении картинки галереи. Не удалось удалить изображение. id: ' . $id .'.', 0, 'delete image', 'gallery');
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
    public function actionChangeOrder() {
        echo ImagesBasicOperations::changeOrder('GalleryItem', $_POST['neworder']);
    }
    
    public function actionEditMetaImage() {
        echo ImagesBasicOperations::editMetaImage('GalleryItem', $_POST);
    }
}