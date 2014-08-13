<?php

class TagsModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'tags.models.*',
            'altadmin.tags.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

}
