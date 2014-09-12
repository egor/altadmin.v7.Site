<?php

/**
 * Управление комментариями
 * 
 * @package Site
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    public function actionIndex() {        
    }
    
    public function actionSaveComment() {
        if (isset($_POST['SiteComment'])) {
            $model = new SiteComment;
            $model->attributes = $_POST['SiteComment'];
            if (Yii::app()->user->isGuest) {
                $scenario = 'addNoAuthUserComment';
            } else {
                $scenario = 'addAuthUserComment';
            }
            $model->setScenario($scenario);
            if ($model->validate($scenario)) {
                $model->save();
                //echo CActiveForm::validate($model);
                Yii::app()->end();
                //Yii::app()->end();
                echo json_encode(array('error' => 0, 'id' => $model->id));
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
                echo json_encode(array('error' => 1));
                //print_r($model->errors);
            }
        }
    }
    
    public function actionPrintCommentById($id) {
        
    }
    
    public function actionReloadList($type, $recordId) {
        $this->renderPartial('printList', array('type' => $type, 'recordId' => $recordId));
    }
}
