<?php

/**
 * UrlManager. URL менеджер
 * 
 * @package Site
 * @category URL
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class UrlManager extends CUrlManager {

    public $connectionID = 'db';
    public $currentLanguage = 'db';
    private $arrUrlPath = array();
    private $endUrlPath = '';
    public function createUrl($manager, $route, $params, $ampersand) {        
        return false;  // не применяем данное правило
    }

    public function parseUrl($manager, $request, $pathInfo, $rawPathInfo) {
        $this->arrUrlPath = explode('/', $pathInfo);
        $this->endUrlPath = end($this->arrUrlPath);        
        //Страницы
        $page = Page::model()->find(array('condition' => '`url`="'.$this->endUrlPath.'"'));
        if ($page) {            
            if (in_array($page->id, Yii::app()->params['altadmin']['systemPageId'])) {
                if ($page->id == Yii::app()->params['altadmin']['systemPageId']['contact']) {
                    return 'site/contact';
                }
                return false;
            }
            $good = 1;
            $count = count($this->arrUrlPath);
            $ancestors=$page->ancestors()->findAll();
            $ancestorsCount=$page->ancestors()->count();
            foreach ($ancestors as $value) {
                if ($value->id != Yii::app()->params['altadmin']['systemPageId']['root']) {
                    if ($value->url == $this->arrUrlPath[($value->level-3)]) {
                        $good++;
                    }                
                }
            }
            if ($count == $good && $ancestorsCount == $count) {
                return 'page/index/id/' . $page->id;
            }
        }
        
        return false;
    }

    private function _isPage() {
        
    }
}