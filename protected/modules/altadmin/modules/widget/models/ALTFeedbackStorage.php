<?php

class ALTFeedbackStorage extends FeedbackStorage {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Удаление новости и ее данных
     * 
     * @param int $id - id новости
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTFeedbackStorage::model()->findByPk($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }
    
    public function toTrashRecord($id) {
        $model = ALTFeedbackStorage::model()->findByPk($id);
        if ($model) {
            $model->trash = 1;
            $model->save();
            return true;
        }
        return false;
    }

}