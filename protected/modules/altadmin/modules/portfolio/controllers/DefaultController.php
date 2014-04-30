<?php

/**
 * DefaultController. Управление работами в портфолио
 * 
 * @package CMS
 * @category Portfolio
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список работ портфолио
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.menuName DESC';
        $count = ALTPortfolio::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['portfolio']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTPortfolio::model()->with('portfolioSection')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Работы';
        $this->pageAddHeader = 'Список работ';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Добавление работы
     */
    public function actionAdd() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Добавление работы';
        $model = new ALTPortfolio;
        if (isset($_POST['ALTPortfolio']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTPortfolio'];
            if (empty($model->url)) {
                //если пустой урл, то транслитим из краткого заголовка
                $model->url = Transliteration::ruToLat($model->menuName);
            } else {
                //если урл не пустой, то транслитим для исключения кириллицы
                $model->url = Transliteration::ruToLat($model->url);
            }
            if (empty($model->date)) {
                //если дата пустая, то устанавливаем текущюю
                $model->date = DateOperations::dateToUnixTime(date('d.m.Y'));
            } else {
                //если не пустая, то переводим в unix время
                $model->date = DateOperations::dateToUnixTime($model->date);
            }
            if (!Yii::app()->params['altadmin']['modules']['portfolio']['section']) {
                //Если разделы новостей выключены, то родителем устанавливаем основной раздел
                $model->portfolioSectionId = 1;
            }            
            if ($model->validate()) {
                $model->save();
                $model->image = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/portfolio/list/', 
                        'ALTPortfolio', 
                        'image', 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['width'], 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['list']['height']
                        );
                $model->imageDetail = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/portfolio/detail/', 
                        'ALTPortfolio', 
                        'imageDetail', 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['width'], 
                        Yii::app()->params['altadmin']['modules']['portfolio']['image']['detail']['height']
                        );
                $model->save();
                Yii::app()->user->setFlash('success', 'Работа успешно добавлена.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/portfolio');
                } else {
                    Yii::app()->request->redirect('/altadmin/portfolio/default/edit/' . $model->id);
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