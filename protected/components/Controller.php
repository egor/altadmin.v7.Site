<?php

/**
 * Controller. Базовый контроллер
 * 
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * 
 * @package Site
 * @category Main
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * H1 Страницы
     * @var string
     */
    public $pageHeader = '';

    /**
     * Заголовок хлебных крошек
     * 
     * @var string
     */
    public $breadcrumbsTitle = '';

    /**
     * Дополнительный заголовок
     * 
     * @var string 
     */
    public $pageAddHeader = '';

    /**
     * Meta keywords
     * 
     * @var string 
     */
    public $metaKeywords = '';

    /**
     * Meta description
     * 
     * @var string 
     */
    public $metaDescription = '';

    /**
     * Обьект внешнего вида cms
     * 
     * @var object
     */
    public $cmsViewSettings;

    public function init() {
        parent::init();
        if (!Yii::app()->user->isGuest) {
            $this->cmsViewSettings = new CmsViewSettings();
        }
        if (isset($_GET['theme'])) {
            $_SESSION['uTheme'] = $_GET['theme'];
        }
        if (!empty($_SESSION['uTheme'])) {            
            if (!substr_count(Yii::app()->controller->module->id, 'altadmin')) {
                Yii::app()->theme = $_SESSION['uTheme'];
            }
        }
        return true;
    }

}
