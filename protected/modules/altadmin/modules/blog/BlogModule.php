<?php

class BlogModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'blog.models.*',
            'altadmin.blog.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

}
