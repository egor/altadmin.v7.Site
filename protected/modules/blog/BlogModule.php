<?php

class BlogModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'blog.models.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

}
