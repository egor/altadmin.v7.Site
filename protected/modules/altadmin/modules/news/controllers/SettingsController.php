<?php

/**
 * SettingsController. Управление настройками новостей
 * 
 * @package Settings
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SettingsController extends Controller {

    /**
     * Список настроек
     */
    public function actionIndex() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Настройка';
        ALTLoger::saveLog('Настройка новостей', 'Просмотр списка настроек.', 1, 'settingsList', 'news');
        $this->render('index', array('modelName' => 'ALTNewsSettings', 'linkToEdit' => '/altadmin/news/settings/edit/'));
    }
    
    /**
     * Редактирование настройки
     * 
     * @param integer $id - записи
     */
    public function actionEdit($id) {
        $model = ALTNewsSettings::model()->findByPk($id);
        if ($_POST['ALTNewsSettings']) {
            $model->attributes = $_POST['ALTNewsSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/news/settings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/news/settings/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка новостей', 'Ошибка при редактировании настройки. название: ' . $model->name .'.', 0, 'settingsEdit', 'news');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTNewsSettings', 'editId' => $id));
    }
}