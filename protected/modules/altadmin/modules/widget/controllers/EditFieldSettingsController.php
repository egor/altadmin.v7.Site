<?php

/**
 * EditFieldsSettingsController. Управление редактируемыми полями
 * 
 * @package CMS
 * @category EditFields
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class EditFieldSettingsController extends Controller {

    public function actionIndex() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактируемые поля';
        ALTLoger::saveLog('Настройка подвала', 'Просмотр списка настроек.', 1, 'list', 'editFields');
        $this->render('index', array('modelName' => 'ALTEditFieldSettings', 'linkToEdit' => '/altadmin/widget/editFieldSettings/edit/'));
    }
    
    public function actionEdit($id) {
        $model = ALTEditFieldSettings::model()->findByPk($id);
        if ($_POST['ALTEditFieldSettings']) {
            $model->attributes = $_POST['ALTEditFieldSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/editFieldSettings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/widget/editFieldSettings/edit/' . $model->id);
                }
            } else {
                ALTLoger::saveLog('Настройка редактируемых полей', 'Ошибка при редактировании настройки. название: ' . $model->name .'.', 0, 'edit', 'editFields');
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('_form', array('modelName' => 'ALTEditFieldSettings', 'editId' => $id));
    }
}
