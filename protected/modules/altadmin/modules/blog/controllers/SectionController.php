<?php

/**
 * SectionController. Управление разделами записей блога
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SectionController extends Controller {

    /**
     * Список разделов блога
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.position, t.name';
        $count = ALTBlogSection::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['blog']['sectionLimit'];
        $paginator->applyLimit($criteria);
        $model = ALTBlogSection::model()->with('blogCount')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Разделы';
        $this->pageAddHeader = 'Список разделов';
        ALTLoger::saveLog('Просмотр списка разделов блога', 'Список разделов блога, страница: ' . (isset($_GET['page']) && (int)$_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'section list', 'blog');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление раздела блога
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление раздела';
        $model = new ALTBlogSection;
        if (isset($_POST['ALTBlogSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTBlogSection'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/blog/section');
                } else {
                    Yii::app()->request->redirect('/altadmin/blog/section/edit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
                ALTLoger::saveLog('Добавление раздела блога', 'Ошибка при добавлении раздела блога. заголовок: ' . $model->name .'.', 0, 'section add', 'blog');
            }
        }
        $this->render('_form', array('model' => $model));
    }

    /**
     * Редактирование раздела блога
     * 
     * @param int $id - id записи
     */
    public function actionEdit($id) {
        $model = ALTBlogSection::model()->findByPk($id);
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование раздела';
        $this->pageAddHeader = $model->name;
        if (isset($_POST['ALTBlogSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTBlogSection'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно отредактирован.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/blog/section');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
                ALTLoger::saveLog('Редактирование раздела блога', 'Ошибка при редактировании раздела блога. id: ' . $model->id . ', заголовок: ' . $model->name .'.', 0, 'section edit', 'blog');
            }
        }
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление раздела блога
     * 
     * @param int $id - id записи
     */
    public function actionDelete($id) {
        if (ALTBlogSection::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление раздела блога', 'Ошибка при удалении раздела блога. id: ' . $id .'.', 0, 'section delete', 'blog');
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении раздела блога!'));
        }        
    }    
    
    /**
     * Действие перед вызовом экшина
     * 
     * @param string $action
     * @return boolean
     * @throws CHttpException
     */
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['blog']['work'] && Yii::app()->params['altadmin']['modules']['blog']['section']) {
            return true;
        } else {
            ALTLoger::saveLog('Контроллер разделов блога', 'Доступ запрещен.', 0, 'section access denied', 'blog');
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    /**
     * Массовое удаление разделов блога
     */
    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {                
                ALTBlogSection::model()->findByPk((int)$key)->delete();
            }
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Массовое удаление разделов блога', 'Нет данных для удаления', 0, 'section mass delete', 'blog');
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
}