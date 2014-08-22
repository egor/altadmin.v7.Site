<?php

class NavigationMenu extends CWidget {

    /**
     * Вывод основного меню
     */
    public function init() {
        $this->render('webroot.themes.' . Yii::app()->theme->name . '.widgets.NavigationMenu.menu', array('data' => $this->menuData()));
    }

    protected function menuData() {
        $menu = array(
            0 => array('ico' => 'icon-file', 'title' => 'Страницы', 'url' => 'page', 'class' => ( Yii::app()->controller->id == 'page' ? 'active open' : ''),
                'subMenu' => array(0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'index', 'class' => ( Yii::app()->controller->id == 'page' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                ),
            ),
        );
        if (Yii::app()->params['altadmin']['modules']['news']['work']) {
            $newsMenu = array(1 => array('ico' => 'icon-calendar', 'title' => 'Новости', 'url' => 'news', 'class' => ( Yii::app()->controller->module->id == 'altadmin/news' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        1 => array('ico' => 'icon-double-angle-right', 'title' => 'Настройка', 'url' => 'settings', 'class' => ( Yii::app()->controller->id == 'settings' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        2 => array('ico' => 'icon-double-angle-right', 'title' => 'Разделы', 'url' => 'section', 'class' => ( Yii::app()->controller->id == 'section' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),                        
                    ),
                ),
            );
            $menu = array_merge($menu, $newsMenu);
        }
        if (Yii::app()->params['altadmin']['modules']['blog']['work']) {
            $blogMenu = array(1 => array('ico' => 'icon-comment', 'title' => 'Блог', 'url' => 'blog', 'class' => ( Yii::app()->controller->module->id == 'altadmin/blog' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        1 => array('ico' => 'icon-double-angle-right', 'title' => 'Настройка', 'url' => 'settings', 'class' => ( Yii::app()->controller->id == 'settings' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        2 => array('ico' => 'icon-double-angle-right', 'title' => 'Разделы', 'url' => 'section', 'class' => ( Yii::app()->controller->id == 'section' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                    ),
                ),
            );
            $menu = array_merge($menu, $blogMenu);
        }
        if (Yii::app()->params['altadmin']['modules']['portfolio']['work']) {
            $portfolioMenu = array(1 => array('ico' => 'icon-calendar', 'title' => 'Портфолио', 'url' => 'portfolio', 'class' => ( Yii::app()->controller->module->id == 'altadmin/portfolio' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        1 => array('ico' => 'icon-double-angle-right', 'title' => 'Разделы', 'url' => 'section', 'class' => ( Yii::app()->controller->id == 'section' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                    ),
                ),
            );
            $menu = array_merge($menu, $portfolioMenu);
        }
        if (Yii::app()->params['altadmin']['modules']['widget']['work']) {
            $widgetMenu = array(1 => array('ico' => 'icon-list-alt', 'title' => 'Виджеты', 'url' => 'widget', 'class' => ( Yii::app()->controller->module->id == 'altadmin/widget' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'ФОС', 'url' => 'feedback', 'class' => ( Yii::app()->controller->id == 'feedback' ? 'active open' : ''),
                            'subMenu' => array(
                                0 => array('ico' => 'icon-envelope', 'title' => 'База', 'url' => 'index', 'class' => ( Yii::app()->controller->id == 'feedback' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                                1 => array('ico' => 'icon-cog', 'title' => 'Настройка', 'url' => 'settings', 'class' => ( Yii::app()->controller->id == 'feedback' && Yii::app()->controller->action->id == 'settings' ? 'active' : '')),
                            )
                        ),
                        1 => array('ico' => 'icon-double-angle-right', 'title' => 'Подвал', 'url' => 'footer', 'class' => ( Yii::app()->controller->id == 'footer' ? 'active open' : '')),
                        2 => array('ico' => 'icon-double-angle-right', 'title' => 'Карта проезда', 'url' => 'mapSettings', 'class' => ( Yii::app()->controller->id == 'footer' ? 'active open' : ''),
                        ),
                    ),
                ),
            );
            $menu = array_merge($menu, $widgetMenu);
        }

        if (Yii::app()->params['altadmin']['modules']['user']['work']) {
            $userMenu = array(1 => array('ico' => 'icon-user', 'title' => 'Пользователи', 'url' => 'user', 'class' => ( Yii::app()->controller->module->id == 'altadmin/user' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' ? 'active open' : ''),
                        ),
                    ),
                ),
            );
            $menu = array_merge($menu, $userMenu);
        }        
        if (Yii::app()->params['altadmin']['modules']['comment']['work']) {
            $commentMenu = array(1 => array('ico' => 'icon-comments', 'title' => 'Комментарии', 'url' => 'comment', 'class' => ( Yii::app()->controller->module->id == 'altadmin/comment' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        1 => array('ico' => 'icon-double-angle-right', 'title' => 'Настройка', 'url' => 'settings', 'class' => ( Yii::app()->controller->id == 'settings' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                    ),
                ),
            );
            $menu = array_merge($menu, $commentMenu);
        }
        if (Yii::app()->params['altadmin']['modules']['gallery']['work']) {
            $galleryMenu = array(1 => array('ico' => 'icon-picture', 'title' => 'Галерея', 'url' => 'gallery', 'class' => ( Yii::app()->controller->module->id == 'altadmin/gallery' ? 'active open' : ''),
                    'subMenu' => array(
                        0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                        //1 => array('ico' => 'icon-double-angle-right', 'title' => 'Настройка', 'url' => 'settings', 'class' => ( Yii::app()->controller->id == 'settings' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                    ),
                ),
            );
            $menu = array_merge($menu, $galleryMenu);
        }
        if (Yii::app()->params['altadmin']['modules']['loger']['work']) {
            $logerMenu = array(1 => array('ico' => 'icon-rocket', 'title' => 'Лог', 'url' => 'loger', 'class' => ( Yii::app()->controller->module->id == 'altadmin/loger' ? 'active open' : ''),
                //'subMenu' => array(
                //    0 => array('ico' => 'icon-double-angle-right', 'title' => 'Список', 'url' => 'default', 'class' => ( Yii::app()->controller->id == 'default' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                //    1 => array('ico' => 'icon-double-angle-right', 'title' => 'Разделы', 'url' => 'section', 'class' => ( Yii::app()->controller->id == 'section' && Yii::app()->controller->action->id == 'index' ? 'active' : '')),
                //),
                ),
            );
            $menu = array_merge($menu, $logerMenu);
        }
        return $menu;
    }

}
