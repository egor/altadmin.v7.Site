<?php

/**
 * Вывод записей блога
 * 
 * @package Site
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultController extends Controller {

    /**
     * Список записей блога
     */
    public function actionIndex() {
        $condition = 't.visibility="1"';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        $count = SiteBlog::model()->count($criteria);
        $paginator = new CPagination($count);
        $paginator->pageSize = SiteBlogSettings::getPagerSize();
        $paginator->route = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'];
        $paginator->applyLimit($criteria);
        $model = SiteBlog::model()->with('blogSection', 'tagsRelationsCondition.tags')->findAll($criteria);
        $page = Page::model()->findByPk(Yii::app()->params['altadmin']['systemPageId']['blog']);
        $this->pageTitle = $page->metaTitle;
        $this->metaKeywords = $page->metaKeywords;
        $this->metaDescription = $page->metaDescription;
        $this->pageHeader = $page->header;
        $this->breadcrumbsTitle = $page->menuName;
        $this->breadcrumbs = array($page->menuName);
        if (isset($_GET['page'])) {
            $page->text = '';
        }
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteBlogSettings::getPagerMaxButtonCount()));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteBlogSettings::getPagerMaxButtonCount()));
        }
    }

    /**
     * Подробная информация о записи
     * @param string $url - url записи
     * @throws CHttpException
     */
    public function actionDetail($url) {
        $model = SiteBlog::model()->with('blogSection', 'tagsRelations.tags')->find(array('condition' => 't.url="' . $url . '"'));        
        $page = Page::model()->findByPk(Yii::app()->params['altadmin']['systemPageId']['blog']);        
        if ($model) {
            $this->pageTitle = $model->metaTitle;
            $this->pageHeader = $model->header;
            $this->breadcrumbsTitle = $model->menuName;
            $this->metaKeywords = $model->metaKeywords;
            $this->metaDescription = $model->metaDescription;

            $this->render('detail', array('model' => $model, 'page' => $page));
        } else {
            throw new CHttpException(404, 'Указанная запись не найдена');
        }
    }
    
    /**
     * Список записей содержащих запрашивамый тег
     * @param integer $tagId - id тега
     */
    public function actionTags($tagId) {
        $criteria->condition = 't.visibility="1"';
        $criteria = new CDbCriteria();
        $criteria->condition = $condition;
        $criteria->order = 't.date DESC, t.id DESC';
        //$count = SiteBlog::model()->with('tagsRelationsById')->count($criteria);
        $count = TagsRelations::model()->with('blog')->count(array('condition' => 'tagsId="' . $tagId . '" AND type="blog" AND blog.visibility=1'));
        $tagName = Tags::model()->findByPk($tagId, array('select' => 'name'));
        $paginator = new CPagination($count);
        $paginator->pageSize = SiteBlogSettings::getPagerSize();
        //$paginator->route = '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/tags/' . $tagId.'/';
        $paginator->applyLimit($criteria);
        $criteria->condition = 't.visibility="1" AND tagsRelationsById.tagsId="' . $tagId . '"';
        $model = SiteBlog::model()->with('blogSection', 'tagsRelationsById')->findAll($criteria);
        $page = Page::model()->findByPk(Yii::app()->params['altadmin']['systemPageId']['blog']);
        $this->pageTitle = $this->pageHeader = $this->breadcrumbsTitle = 'Записи блога с тегом: ' . $tagName->name;
        $this->breadcrumbs = array($page->menuName => '/' . Yii::app()->params['altadmin']['modules']['blog']['baseUrl'], $this->breadcrumbsTitle);
        $page->text = '';        
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteBlogSettings::getPagerMaxButtonCount()));
        } else {
            $this->render('index', array('model' => $model, 'paginator' => $paginator, 'page' => $page, 'maxButtonCount' => SiteBlogSettings::getPagerMaxButtonCount()));
        }
    }
}