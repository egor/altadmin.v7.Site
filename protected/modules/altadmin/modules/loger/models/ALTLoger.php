<?php

class ALTLoger extends Loger {

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function saveLog($header, $data, $status, $type, $module) {
        $model = new ALTLoger;
        $model->userId = Yii::app()->user->uid;
        $model->date = time();
        $model->info = $data;
        $model->header = $header;
        $model->status = $status;
        $model->type = $type;
        $model->module = $module;
        return $model->save();       
    }
}
