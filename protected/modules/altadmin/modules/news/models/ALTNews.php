<?php

class ALTNews extends News {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Удаление изображения новости
     * 
     * @param int $id - id новости
     * @return boolean
     */
    public function deleteImage($id) {
        $model = ALTNews::model()->findByPk($id);
        if ($model) {
            if (ImagesBasicOperations::delete($id, '/images/news/list/', 'News', 'image')) {
                $model->image = '';
                $model->imageAlt = '';
                $model->imageTitle = '';
                $model->save();
            }
            return true;
        }
        return false;
    }

    /**
     * Удаление новости и ее данных
     * 
     * @param int $id - id новости
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTNews::model()->findByPk($id);
        if ($model) {
            if (ALTNews::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }

}