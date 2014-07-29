<?php

class CommentModule extends CWebModule {

    public function init() {
        $this->setImport(array(
            'comment.models.*',
            'altadmin.comment.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

}
