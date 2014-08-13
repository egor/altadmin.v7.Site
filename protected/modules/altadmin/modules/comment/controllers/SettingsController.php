<?php

/**
 * DefaultController. Управление комментариями
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SettingsController extends Controller {

    public function actionIndex() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Настройка';
        ALTLoger::saveLog('Настройка комментариев', 'Просмотр списка настроек комментариев.', 1, 'list', 'comment');
        $this->render('index', array('modelName' => 'ALTCommentSettings', 'linkToEdit' => '/altadmin/comment/settings/edit/'));
    }
    
    public function actionEdit($id) {
        $model = ALTCommentSettings::model()->findByPk($id);
        if ($_POST['ALTCommentSettings']) {
            $model->attributes = $_POST['ALTCommentSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/comment/settings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/comment/settings/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка комментариев', 'Ошибка при редактировании настройки комментариев. название: ' . $model->name .'.', 0, 'edit', 'comment');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTCommentSettings', 'editId' => $id));
    }
}
