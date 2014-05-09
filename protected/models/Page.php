<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $pages_id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $url
 * @property string $menuName
 * @property integer $header
 * @property string $shortText
 * @property string $text
 * @property string $metaTitle
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property integer $visibility
 * @property integer $date
 */
class Page extends CActiveRecord {

    const ADMIN_TREE_CONTAINER_ID = 'categorydemo_admin_tree';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Pages the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'page';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            //array('root, lft, rgt, level, url, menuName, header, shortText, text, metaTitle, metaKeywords, metaDescription, visibility, date', 'required'),
            array('url, menuName, header, metaTitle', 'required', 'on'=>'edit'),
            array('root, lft, rgt, level, url, menuName, header, shortText, text, metaTitle, metaKeywords, metaDescription, visibility, inMain, date, module, controller, action, system, image, imageAlt, imageTitle, showDate, addMenuName', 'safe'),
            array('root, lft, rgt, level, visibility, inMain, date, inMenu, showDate', 'numerical', 'integerOnly' => true),
            array('url, menuName, header, metaTitle, metaKeywords, module, controller, action, system, image, imageAlt, imageTitle, addMenuName', 'length', 'max' => 255),
            array('url', 'unique'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, root, lft, rgt, level, url, menuName, header, shortText, text, metaTitle, metaKeywords, metaDescription, visibility, inMain, date, module, controller, action, system, image, imageAlt, imageTitle, showDate, addMenuName', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Pages',
            'root' => 'Root',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'level' => 'Level',
            'url' => 'Url',
            'menuName' => 'Краткое название',
            'header' => 'Заголовок (H1)',
            'shortText' => 'Краткое описание',
            'text' => 'Текст',
            'metaTitle' => 'Meta Title',
            'metaKeywords' => 'Meta Keywords',
            'metaDescription' => 'Meta Description',
            'visibility' => 'Выводить',
            'inMain' => 'Выводить в меню',
            'date' => 'Дата',
            'module' => '', 
            'controller' => '', 
            'action'=> '', 
            'system' => '',
            'inMenu' => 'Выводить в меню',
            'image' => 'Выводить в меню',
            'imageAlt' => 'Выводить в меню',
            'imageTitle' => 'Выводить в меню',
            'showDate' => 'Выводить дату',
            'addMenuName' => 'Текст под названием пункта меню',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('root', $this->root);
        $criteria->compare('lft', $this->lft);
        $criteria->compare('rgt', $this->rgt);
        $criteria->compare('level', $this->level);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('menuName', $this->menuName, true);
        $criteria->compare('header', $this->header);
        $criteria->compare('shortText', $this->shortText, true);
        $criteria->compare('text', $this->text, true);
        $criteria->compare('metaTitle', $this->metaTitle, true);
        $criteria->compare('metaKeywords', $this->metaKeywords, true);
        $criteria->compare('metaDescription', $this->metaDescription, true);
        $criteria->compare('visibility', $this->visibility);
        $criteria->compare('inMain', $this->inMain);
        $criteria->compare('date', $this->date);
        $criteria->compare('module', $this->module);
        $criteria->compare('controller', $this->controller);
        $criteria->compare('action', $this->action);
        $criteria->compare('system', $this->system);
        $criteria->compare('inMenu', $this->inMenu);
        $criteria->compare('image', $this->image);
        $criteria->compare('imageAlt', $this->imageAlt);
        $criteria->compare('imageTitle', $this->imageTitle);
        $criteria->compare('showDate', $this->showDate);
        $criteria->compare('addMenuName', $this->addMenuName);
        
        

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array(
            'NestedSetBehavior' => array(
                'class' => 'ext.nestedBehavior.NestedSetBehavior',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'levelAttribute' => 'level',
                'hasManyRoots' => true
            )
        );
    }

    public static function printULTree() {
        $pages = Page::model()->findAll(array('order' => 'root,lft'));
        $level = 0;

        foreach ($pages as $n => $page) {

            if ($page->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($page->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $page->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }

            echo CHtml::openTag('li', array('id' => 'node_' . $page->id, 'rel' => $page->menuName));
            //echo '<div id="vakata-contextmenu" style="visibility: visible; display: block; left: 407.5px; top: 194px;" class="jstree-default-context"><ul><li class=""><ins>&nbsp;</ins><a rel="create" href="#">Создать</a></li><li class=""><ins>&nbsp;</ins><a rel="rename" href="#">Переименовать</a></li><li class=""><ins>&nbsp;</ins><a rel="remove" href="#">Удалить</a></li><li class=""><ins>&nbsp;</ins><a rel="edit_page" href="#">Редактировать</a></li></ul></div>';
            //if (in_array($page->url, Yii::app()->params['altadmin']['rootPageUrl'])) {//$page->url != 'horizontal_menu') {
                echo CHtml::openTag('a', array('href' => '#', 'ondblclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\''));
            //} else {
            //    echo CHtml::openTag('a', array('href' => '#'));
            //}
            //echo CHtml::tag('small', array("class"=>"", 'title' => 'Редактировать страницу'), '('.$page->pages_id.')');                
            //echo CHtml::encode(' ');
            echo CHtml::encode($page->menuName);
            
            //echo CHtml::encode(' '.$page->menuName);
            //echo $page->url.'|'.Yii::app()->params['altadmin']['systemPageUrl']['root']; die;
            //echo in_array($page->url, Yii::app()->params['altadmin']['systemPageUrl']['root']); die;
            //if (!in_array($page->url, Yii::app()->params['altadmin']['systemPageUrl'])) {
            if (!in_array($page->id, Yii::app()->params['altadmin']['systemPageId'])) {
            echo CHtml::openTag('span', array('class'=>'', 'style'=>'float:right;'));
            echo CHtml::tag('i', array("class"=>"icon-pencil icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Редактировать страницу'));
            echo CHtml::encode(' ');
            if ($page->system == 1) {
                echo CHtml::tag('i', array("class"=>"icon-minus-sign", 'title'=>'Нельзя удалить системную страницу'));
            } else {
                echo CHtml::tag('i', array("class"=>"icon-remove icon-pointer", 'onclick'=>'modalConfirmedDeletePage(\''.$page->id.'\', \''.$page->menuName.'\')', 'rel'=>'remove', 'title'=>'Удалить страницу'));
            }
            echo CHtml::encode(' ');
            if ($page->visibility == 1) {
                echo CHtml::tag('i', array("class"=>"icon-eye-open icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Выводить страницу на сайте'));
            } else {
                echo CHtml::tag('i', array("class"=>"icon-eye-close icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Не выводить страницу на сайте'));
            }
            
            echo CHtml::encode(' ');
            echo CHtml::tag('i', array("class"=>"icon-info-sign icon-pointer", 'title' => 'ID раздела: '.$page->id));
            if($page->level == 3) {
            if ($page->inMain == 1) {
                echo CHtml::tag('i', array("class"=>"icon-eye-open icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Выводить страницу на сайте'));
            } else {
                echo CHtml::tag('i', array("class"=>"icon-eye-close icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Не выводить страницу на сайте'));
            }
            } else {
                echo CHtml::tag('i', array("class"=>"icon-pointer"));
            }
            
            echo CHtml::encode(' ');
            if ($page->system == 1) {
                echo CHtml::tag('i', array("class"=>"icon-cog icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Настроить модуль'));
            } else {
                echo CHtml::tag('i', array("class"=>"icon-pointer"));
            }
                        
            echo CHtml::closeTag('span');
            } else {
                echo CHtml::openTag('span', array('class'=>'', 'style'=>'float:right;'));
                echo CHtml::tag('i', array("class"=>"icon-cog icon-pointer", 'onclick' => 'window.location=\'/altadmin/page/edit/' . $page->id . '\'', 'title' => 'Настроить модуль'));
                echo CHtml::closeTag('span');
            }
            echo CHtml::closeTag('a');
            $level = $page->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }

    
    public static function printSiteULTree() {
        $pages = Page::model()->findAll(array('condition'=>'level>"2" AND visibility=1', 'order' => 'root,lft'));
        $level = 0;
        foreach ($pages as $n => $page) {
            $url[$page->level] = $page->url;
            if ($page->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($page->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $page->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }
            $urlToPage = '';
            for ($i=3; $i<$page->level; $i++) {
                $urlToPage .= '/'.$url[$i];
            }
            $urlToPage = $urlToPage.'/'.$page->url;
            if ($page->id == Yii::app()->params['global']['MPID']) {
                $urlToPage = '/';
            }
            echo CHtml::openTag('li', array('id' => 'node_' . $page->id, 'rel' => $page->menuName));
                echo CHtml::openTag('a', array('href' => $urlToPage));
            echo CHtml::encode($page->menuName);
            echo CHtml::closeTag('a');
            
            if ($page->id == Yii::app()->params['global']['NPID']) {
                News::printSiteMap();
            }
            
            $level = $page->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }
    
    
    public static function printULTree_noAnchors() {
        $categories = Page::model()->findAll(array('order' => 'lft'));
        $level = 0;

        foreach ($categories as $n => $page) {
            if ($page->level == $level)
                echo CHtml::closeTag('li') . "\n";
            else if ($page->level > $level)
                echo CHtml::openTag('ul') . "\n";
            else {         //if $category->level<$level
                echo CHtml::closeTag('li') . "\n";

                for ($i = $level - $page->level; $i; $i--) {
                    echo CHtml::closeTag('ul') . "\n";
                    echo CHtml::closeTag('li') . "\n";
                }
            }

            echo CHtml::openTag('li');
            echo CHtml::encode($page->menuName);
            $level = $page->level;
        }

        for ($i = $level; $i; $i--) {
            echo CHtml::closeTag('li') . "\n";
            echo CHtml::closeTag('ul') . "\n";
        }
    }

    public function getUrl ($id) {
        $url = '';
        $model = Page::model()->findByPk($id);
        $children = $model->ancestors()->findAll(array('condition' => 'visibility = "1"'));
        foreach ($children as $value) {
            $url .= $value->url.'/';
        }
        return '/' . $url . $model->url;
    }
    
    public function getBreadcrumbs ($id, $prefixUrl = '') {
        $breadcrumbs = '';
        $model = Page::model()->findByPk($id);
        $children = $model->ancestors()->findAll(array('condition' => 'visibility = "1"'));
        foreach ($children as $value) {
            $url .= $value->url;
            $breadcrumbs[$value->menuName] = '/' . $url;
            $url .= '/';
        }
        if (is_array($breadcrumbs)) {
            return $breadcrumbs;
        } else {
            return array();
        }
    }
}