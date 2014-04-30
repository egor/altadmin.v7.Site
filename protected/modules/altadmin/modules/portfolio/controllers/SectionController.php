<?php

/**
 * SectionController. Управление разделами портфолио
 * 
 * @package CMS
 * @category Portfolio
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SectionController extends Controller {

    /**
     * Список разделов портфолио
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.position, t.menuName';
        $count = ALTPortfolioSection::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['portfolio']['sectionLimit'];
        $paginator->applyLimit($criteria);
        $model = ALTPortfolioSection::model()->with('portfolioCount')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Разделы';
        $this->pageAddHeader = 'Список разделов';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление раздела портфолио
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление раздела';
        $model = new ALTPortfolioSection;
        if (isset($_POST['ALTPortfolioSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTPortfolioSection'];
            if (empty($model->url)) {
                //если пустой урл, то транслитим из краткого заголовка
                $model->url = Transliteration::ruToLat($model->menuName);
            } else {
                //если урл не пустой, то транслитим для исключения кириллицы
                $model->url = Transliteration::ruToLat($model->url);
            }            
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/portfolio/section');
                } else {
                    Yii::app()->request->redirect('/altadmin/portfolio/section/edit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->render('_form', array('model' => $model));
    }

    /**
     * Редактирование раздела портфолио
     * 
     * @param int $id - id раздела
     */
    public function actionEdit($id) {
        $model = ALTPortfolioSection::model()->findByPk($id);
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование раздела';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTPortfolioSection']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTPortfolioSection'];
            if ($model->validate()) {                
                $model->save();
                Yii::app()->user->setFlash('success', 'Раздел успешно отредактирован.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/portfolio/section');
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
        if (ALTPortfolioSection::deleteRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении новости!'));
        }        
    }    
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['portfolio']['work'] && Yii::app()->params['altadmin']['modules']['news']['section']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTPortfolioSection::deleteRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
}