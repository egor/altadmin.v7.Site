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
            if (!Yii::app()->params['altadmin']['modules']['news']['section']) {
                //Если разделы новостей выключены, то родителем устанавливаем основной раздел
                $model->newsSectionId = 1;
            }
            if (Yii::app()->params['altadmin']['modules']['news']['tags']) {
                //если включены теги, то обрабатываем их
                //todo сохранение тегов
            }
            if ($model->validate()) {
                $model->save();
                $model->image = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/news/list/', 
                        'ALTNews', 
                        'image', 
                        Yii::app()->params['altadmin']['modules']['news']['image']['list']['width'], 
                        Yii::app()->params['altadmin']['modules']['news']['image']['list']['height']
                        );
                $model->save();
                Yii::app()->user->setFlash('success', 'Новость успешно добавлена.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/news');
                } else {
                    Yii::app()->request->redirect('/altadmin/news/default/edit/' . $model->id);
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
        $model = ALTNews::model()->findByPk($id);
        $oldImg = $model->image;
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование новости';
        $this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTNews']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTNews'];
            $model->date = DateOperations::dateToUnixTime($model->date);
            if ($model->validate()) {
                $model->image = ImagesBasicOperations::upload(
                        $model->id, 
                        '/images/news/list/', 
                        'ALTNews', 
                        'image', 
                        Yii::app()->params['altadmin']['modules']['news']['image']['list']['width'], 
                        Yii::app()->params['altadmin']['modules']['news']['image']['list']['height'],
                        $oldImg
                        );
                $model->save();
                Yii::app()->user->setFlash('success', 'Новость успешно отредактирована.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/news');
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
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
        if (ALTNews::deleteRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении новости!'));
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
        if (ALTNews::deleteImage($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Файл не найден!</p>'));
        }
    }

    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTNews::deleteRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
}