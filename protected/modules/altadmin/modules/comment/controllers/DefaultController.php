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
class DefaultController extends Controller {

    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = ALTComment::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['comment']['limit'];
        $paginator->applyLimit($criteria);
        $model = ALTComment::model()->with('user', 'blog')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Комментарии';
        $this->pageAddHeader = 'Список комментариев';
        ALTLoger::saveLog('Просмотр списка комментариев', 'Список комментариев, страница: ' . (isset($_GET['page']) && (int) $_GET['page'] > 1 ? $_GET['page'] : 1) . '.', 1, 'list', 'comment');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    /**
     * Редактирование записи блога
     * 
     * @param int $id - id записи
     */
    public function actionEdit($id) {
        $model = ALTComment::model()->with('user')->findByPk($id);
        $model->new = 0;
        $model->save();
        $this->breadcrumbsTitle = $this->pageHeader = $this->pageTitle = 'Редактирование комментария';
        //$this->pageAddHeader = $model->menuName;
        if (isset($_POST['ALTComment']) && !isset($_POST['yt2'])) {
            $model->attributes = $_POST['ALTComment'];
            if ($model->validate()) {
                $model->save();
                ALTLoger::saveLog('Редактирование комментария', 'Комментарий успешно отредактирован. id: ' . $model->id . '.', 1, 'edit', 'comment');
                Yii::app()->user->setFlash('success', 'Комментарий успешно отредактирован.');
                Yii::app()->request->redirect((isset($_POST['yt1']) ? '/altadmin/comment' : '/altadmin/comment/default/edit/' . $model->id));
            } else {
                Yii::app()->user->setFlash('error', '<strong>Ошибка!</strong> Проверте поля еще раз.');
                ALTLoger::saveLog('Редактирование комментария', 'Ошибка при редактировании комментария. id: ' . $model->id . '.', 0, 'edit', 'comment');
            }
        }
        $model->date = date('d.m.Y', $model->date);
        $this->render('_form', array('model' => $model, 'edit' => 1));
    }

    /**
     * Удаление записи блога
     * 
     * @param int $id - id записи
     */
    public function actionDelete($id) {
        if (ALTComment::model()->findByPk($id)->delete()) {
            echo json_encode(array('error' => 0));
        } else {
            ALTLoger::saveLog('Удаление комментария', 'Ошибка при удалении комментария. id: ' . $id .'.', 0, 'delete', 'comment');
            echo json_encode(array('error' => 1));
        }        
    } 
    
    /**
     * Массовое удаление записей блога
     */
    public function actionDeleteMass() {
        if ($_POST) {
            foreach ($_POST as $key => $value) {
                ALTComment::model()->findByPk((int)$key)->delete();
            }
            echo json_encode(array('error' => 0));
        } else {
            echo json_encode(array('error' => 1, 'message' => '<p>Нет данных для удаления!</p>'));
            ALTLoger::saveLog('Массовое удаление комментариев', 'Нет данных для удаления', 0, 'mass delete', 'comment');
        }        
    }
    
    protected function beforeAction($action) {
        parent::beforeAction($action);
        if (Yii::app()->user->role == 'admin' && Yii::app()->params['altadmin']['modules']['comment']['work']) {
            return true;
        } else {
            ALTLoger::saveLog('Контроллер комментариев', 'Доступ запрещен.', 0, 'access denied', 'comment');
            throw new CHttpException(403, 'Доступ запрещен!');
            return false;
        }
    }  
}
