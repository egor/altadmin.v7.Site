<?php

/**
 * FeedbackController. Виджеты
 * 
 * @package CMS
 * @category Widget
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SliderMainPageController extends Controller {

    /**
     * Список сообщений ФОС
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 'position';
        $model = ALTSliderMainPage::model()->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Слайдер';
        $this->pageAddHeader = 'Список слайдов';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model));
        } else {
            $this->render('index', array('model' => $model));
        }
    }
    
    /**
     * Добавление слайда
     * 
     * После сохранинеия слайда
     * переадресовывает на список или на редактирование
     */
    public function actionAdd() {
        $this->pageTitle = $this->pageHeader = $this->breadcrumbsTitle = 'Добавление слайда';
        $this->pageAddHeader = 'Добавление слайда на главную страницу';
        $model = new ALTSliderMainPage();
        if (isset($_POST['ALTSliderMainPage']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTSliderMainPage'];
            $max = ALTSliderMainPage::model()->find(array('order' => 'position DESC'));
            $model->position = $max->position + 1;
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Слайд успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/sliderMainPage/index');
                } else {
                    Yii::app()->request->redirect('/altadmin/widget/sliderMainPage/edit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
            }
        }
        $this->render('_form', array('model' => $model));
    }
    
    public function actionEdit($id) {
        $this->pageTitle = $this->pageHeader = $this->breadcrumbsTitle = 'Редактирование слайда';        
        $model = ALTSliderMainPage::model()->findByPk($id);
        $model->oldImage = $model->image;
        $this->pageAddHeader = $model->header;
        if (isset($_POST['ALTSliderMainPage']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTSliderMainPage'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Слайд успешно добавлен.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/sliderMainPage/index');
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }
    
        /**
     * Удаление изображения записи блога
     * 
     * @param int $id - id записи
     */
    public function actionDeleteImage($id) {
        if (ALTSliderMainPage::model()->findByPk($id)->deleteImage($id, 'image', '/images/slider/mainPage/')) {
            ALTLoger::saveLog('Удаление изображения слайда', 'Изображение слайда успешно удалено. id: ' . $id . '.', 1, 'delete slide', 'slide');
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление изображения слайда', 'Ошибка при удалении слайда. Не удалось удалить слайд. id: ' . $id .'.', 0, 'delete slide', 'slide');
            echo json_encode(array('error' => 1));
        }
    }

    /**
     * Изменение позиции пункта меню AJAX
     */
    public function actionChangeOrder() {
        $data = json_decode($_POST['neworder']);
        if (null == $data) {
            echo json_encode(array('error' => 1));
        }
        $count = count($data);
        foreach ($data as $note) {            
            $model = ALTSliderMainPage::model()->findByPk(substr($note->id, 5));
            $model = ALTSliderMainPage::model()->updateByPk(substr($note->id, 5), array('position' => ($count - $note->order) + 1));
            //$model->position = ($count - $note->order) + 1;
            //echo substr($note->id, 5).' '.(($count - $note->order)+1).'|';
            //$model->save();
        }
        echo json_encode(array('status' => 'OK'));
    }
    
    /**
     * Удаление записи блога
     * 
     * @param int $id - id записи
     */
    public function actionDelete($id) {
        if (ALTSliderMainPage::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление слайда', 'Ошибка при удалении слайда. id: ' . $id .'.', 0, 'delete', 'slider');
            echo json_encode(array('error' => 1));
        }        
    }
}