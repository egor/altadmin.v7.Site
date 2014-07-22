<?php

class UserMenu extends CWidget {

    /**
     * Вывод меню пользователя
     */
    public function init() {
        $user = ALTUser::model()->findByPk(Yii::app()->user->uid);
        if ($user->image != '') {
            $userImage = '/images/user/list/' . $user->image;
        } else {
            $userImage = '/images/user/default.jpg';
        }
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.UserMenu.menu', array('userImage' => $userImage));
    }
}