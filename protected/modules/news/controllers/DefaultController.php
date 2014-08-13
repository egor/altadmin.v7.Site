<?php

/**
 * NewsController. Управление новостями
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список новостей
     */
    public function actionIndex() {
        $condition = '';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = SiteNews::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = SiteNewsSettings::getPagerSize();
        $paginator->route = '/' . Yii::app()->params['altadmin']['modules']['news']['baseUrl'];
        $paginator->applyLimit($criteria);
        $model = SiteNews::model()->with('newsSection')->findAll($criteria);
        $page = Page::model()->findByPk(Yii::app()->params['altadmin']['systemPageId']['news']);
        $this->pageTitle = $page->metaTitle;
        $this->pageHeader = $page->header;
        $this->breadcrumbsTitle = $page->menuName;
        if (isset($_GET['page'])) {
            $page->text = '';
        }
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteNewsSettings::getPagerMaxButtonCount()));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteNewsSettings::getPagerMaxButtonCount()));
        }
    }

    public function actionDetail($url) {
        $model = SiteNews::model()->with('newsSection')->find(array('condition' => 't.url="' . $url . '"'));
        $page = Page::model()->findByPk(Yii::app()->params['altadmin']['systemPageId']['news']);
        if ($model) {
            $this->pageTitle = $model->metaTitle;
            $this->pageHeader = $model->header;            
            $this->render('detail', array('model' => $model, 'page' => $page));
        } else {
            throw new CHttpException(404, 'Указанная запись не найдена');
        }
    }
}