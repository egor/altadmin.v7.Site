<?php

class GalleryModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'gallery.models.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

}
