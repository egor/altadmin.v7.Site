<?php

/**
 * PageController. Страницы сайта
 * 
 * @package Site
 * @category Page
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class PageController extends Controller {

    public function actionIndex($id) {
        $model = Page::model()->findByPk($id);
        if (!$model || $model->visibility == 0) {
            throw new CHttpException(404, 'Указанная запись не найдена');
        }
        Yii::app()->clientScript->registerMetaTag($model->metaKeywords, 'keywords');
        Yii::app()->clientScript->registerMetaTag($model->metaDescription, 'description');
        
        $this->pageHeader = $model->header;
        $this->pageTitle = $model->metaTitle;
        $pageUrl = Page::getUrl($id);
        
        $this->breadcrumbs = Page::getBreadcrumbs($id);        
        $this->breadcrumbs = array_merge($this->breadcrumbs, array($model->menuName));
        
        $children = $model->children()->findAll(array('condition' => 'visibility = "1"'));
        $this->render('index', array('model' => $model, 'children' => $children, 'pageUrl' => $pageUrl));
    }

}