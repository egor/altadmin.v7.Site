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
        $paginator->pageSize = Yii::app()->params['altadmin']['modules']['news']['limit'];
        $paginator->applyLimit($criteria);
        $model = SiteNews::model()->with('newsSection')->findAll($criteria);
        $this->pageHeader = $this->pageTitle = $this->breadcrumbsTitle = 'Новости';
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator));
        }
    }

    public function actionDetail($url) {
        $model = SiteNews::model()->find(array('condition' => 'url="' . $url . '"'));
        if ($model) {
            $this->pageTitle = $model->metaTitle;
            $this->pageHeader = $model->header;            
            $this->render('detail', array('model' => $model));
        } else {
            throw new CHttpException(404, 'Указанная запись не найдена');
        }
    }
}