<?php

/**
 * Comment. 
 * 
 * @package Widget
 * @category Comment
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SGallery extends CWidget {

    public $method = '';
    public $data = array();

    public function init() {
        Yii::app()->getModule('gallery');
        $method = $this->method;
        $this->$method();
    }

    public function printGallery() {        
        //var_dump($this->data); die;
        $model = SiteGalleryRelations::model()->find(array('condition' => 'type = "' . $this->data['type'] . '" AND recordId="' . $this->data['recordId'] . '"'));
        if ($model) {
            $gallery = SiteGallery::model()->find(array('condition' => 'id="' . $model->galleryId . '" AND visibility="1"'));
            if ($gallery) {
                $gallery = SiteGalleryItem::model()->findAll(array('condition' => 'galleryId="' . $model->galleryId . '"', 'order' => 'position DESC'));
                $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.' . __CLASS__ . '.' . __FUNCTION__, array('gallery' => $gallery));
            }
        }        
    }

}
