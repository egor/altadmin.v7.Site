<?php

/**
 * This is the model class for table "galleryRelations".
 *
 * The followings are the available columns in table 'galleryRelations':
 * @property string $id
 * @property string $galleryId
 * @property string $recordId
 * @property string $type
 * @property string $position
 */
class ALTGalleryRelations extends GalleryRelations {

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return GalleryRelations the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Сохранение связи галлереи со страницей
     * 
     * @param integer $galleryId - id галлереи
     * @param integer $recordId - id записи страницы
     * @param integer $recordType - тип записи
     */
    static function saveRelationsRecord($galleryId, $recordId, $recordType) {
        ALTGalleryRelations::deleteRelationsRecord($galleryId, $recordId, $recordType);
        if ($galleryId > 0) {
        $model = new ALTGalleryRelations;
            $model->galleryId = $galleryId;
            $model->recordId = $recordId;
            $model->type = $recordType;
            $model->position = 0;
            $model->save();
        }
    }
    
    static function deleteRelationsRecord($galleryId, $recordId, $recordType) {
        return ALTGalleryRelations::model()->deleteAll(array('condition' => 'galleryId="' . $galleryId . '" AND recordId="' . $recordId . '" AND type="' . $recordType . '"'));
    }
        
}
