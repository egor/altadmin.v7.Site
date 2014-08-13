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
class SectionController extends Controller {

    /**
     * Список разделов новостей
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.position, t.name';
        $count = ALTNewsSection::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['news']['sectionLimit'];
        $paginator->applyLimit($criteria);
        $model = ALTNewsSection::model()->with('newsCount')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Разделы';
        $this->pageAddHeader = 'Список разделов';
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
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление раздела';
        $model = new ALTNewsSection;
        if (isset($_POST['ALTNewsSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTNewsSection'];
            if (empty($model->url)) {
                //если пустой урл, то транслитим из краткого заголовка
                $model->url = Transliteration::ruToLat($model->name);
            } else {
                //если урл не пустой, то транслитим для исключения кириллицы
                $model->url = Transliteration::ruToLat($model->url);
            }            
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/news/section');
                } else {
                    Yii::app()->request->redirect('/altadmin/news/section/edit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
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
        $model = ALTNewsSection::model()->findByPk($id);
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование раздела';
        $this->pageAddHeader = $model->name;
        if (isset($_POST['ALTNewsSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTNewsSection'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно отредактирован.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/news/section');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
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
        if (ALTNewsSection::deleteRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении новости!'));
        }        
    }    
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['news']['work'] && Yii::app()->params['altadmin']['modules']['news']['section']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTNewsSection::deleteRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
}