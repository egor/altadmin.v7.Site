<?php

/**
 * SettingsController. Управление настройками блога
 * 
 * @package Settings
 * @category Blog
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
        ALTLoger::saveLog('Настройка блога', 'Просмотр списка настроек.', 1, 'settingsList', 'blog');
        $this->render('index', array('modelName' => 'ALTBlogSettings', 'linkToEdit' => '/altadmin/blog/settings/edit/'));
    }
    
    /**
     * Редактирование настройки
     * 
     * @param integer $id - записи
     */
    public function actionEdit($id) {
        $model = ALTBlogSettings::model()->findByPk($id);
        if ($_POST['ALTBlogSettings']) {
            $model->attributes = $_POST['ALTBlogSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/blog/settings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/blog/settings/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка блога', 'Ошибка при редактировании настройки. название: ' . $model->name .'.', 0, 'settingsEdit', 'blog');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTBlogSettings', 'editId' => $id));
    }
}