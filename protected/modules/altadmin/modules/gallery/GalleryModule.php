<?php

class GalleryModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'gallery.models.*',
            'altadmin.jallery.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }

}
