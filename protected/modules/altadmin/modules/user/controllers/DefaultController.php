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
            if ($model->validate()) {
                $model->password = md5($model->password);
                $model->date = time();
                $model->save();
                $model->image = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/user/list/', 
                        'ALTUser', 
                        'image', 
                        Yii::app()->params['altadmin']['modules']['user']['image']['list']['width'], 
                        Yii::app()->params['altadmin']['modules']['user']['image']['list']['height']
                        );                
                $model->save();
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
     * Редактирование работы
     * 
     * @param int $id - id новости
     */
    public function actionEdit($id) {
        $model = ALTPortfolio::model()->findByPk($id);
        $oldImg = $model->image;
        $oldImgDetail = $model->imageDetail;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование работы';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTPortfolio']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTPortfolio'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {
                $model->image = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/portfolio/list/', 
                        'ALTPortfolio', 
                        'image', 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['width'], 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['height'],
                        $oldImg
                        );
                $model->imageDetail = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/portfolio/detail/', 
                        'ALTPortfolio', 
                        'imageDetail', 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['width'], 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['height'],
                        $oldImgDetail
                        );
                $model->save();
                Yii::app()->user->setFlash('success', 'Работа успешно отредактирована.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/portfolio');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление работы
     * 
     * @param int $id - id работы
     */
    public function actionDelete($id) {
        if (ALTPortfolio::deleteRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении новости!'));
        }        
    }    
    
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
     * Удаление изображения новости
     * 
     * @param int $id - id новости
     */
    public function actionDeleteImage($id) {
        if (ALTPortfolio::deleteImage($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Файл не найден!</p>'));
        }
    }

    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTPortfolio::deleteRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
}