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
class FeedbackController extends Controller {

    /**
     * Список сообщений ФОС
     */
    public function actionIndex() {
        $condition = 't.trash=0';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = ALTFeedbackStorage::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['widget']['feedback']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTFeedbackStorage::model()->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'База ФОС';
        $this->pageAddHeader = 'Список сообщений';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Подробная информация сообщения
     * 
     * @param int $id - id сообщения
     */
    public function actionDetail($id) {
        $model = ALTFeedbackStorage::model()->findByPk($id);
        $model->new = 0;
        $model->save();
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Подробна информация сообщения';
        $this->pageAddHeader = date('d.m.Y H:i:s', $model->date);
        $this->render('detail', array('model' => $model, 'edit' => 1));
    }

    public function actionToTrash($id) {
        if (ALTFeedbackStorage::toTrashRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при отправке в корзину!'));
        }
    }
    /**
     * Удаление сообщения
     * 
     * @param int $id - id сообщения
     */
    public function actionDelete($id) {
        if (ALTFeedbackStorage::deleteRecord($id)) {
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => 'Ошибка при удалении сообщения!'));
        }        
    }    
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['widget']['work'] && Yii::app()->params['altadmin']['modules']['widget']['feedback']['work']) {
            return true;
        } else {
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }    

    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTFeedbackStorage::deleteRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
        }        
    }
    
    public function actionToTrashMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTFeedbackStorage::toTrashRecord((int)$key);
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для отправки в корзину!</p>'));
        }        
    }
    
    public function actionSettings() {
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Настройка ФОС';
        $this->render('settings', array('modelName' => 'ALTFeedbackSettings', 'linkToEdit' => '/altadmin/widget/feedback/settingsEdit/'));
    }
    
    public function actionSettingsEdit($id) {
        $model = ALTFeedbackSettings::model()->findByPk($id);
        if ($_POST['ALTFeedbackSettings']) {
            $model->attributes = $_POST['ALTFeedbackSettings'];
            if ($model->validate()) {
                $model->save();
                Yii::app()->user->setFlash('success', 'Редактирование прошло успешно.');
                if (isset($_POST['yt1'])) {
                    Yii::app()->request->redirect('/altadmin/widget/feedback/settings/');
                } else {
                    Yii::app()->request->redirect('/altadmin/widget/feedback/settingsEdit/' . $model->id);
                }
            } else {
                Yii::app()->user->setFlash('error', 'Проверте поля еще раз.');
            }
        }
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование настройки';
        $this->pageAddHeader = $model->name;
        $this->render('settingsEdit', array('modelName' => 'ALTFeedbackSettings', 'editId' => $id));
    }
}