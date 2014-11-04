<?php

/**
 * ALTNews. Управляние новостями
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTNews extends News {

    /**
     * Имя старого изображения списка
     * 
     * @var string
     */
    public $oldListImage = '';

    /**
     * ID галереи
     * 
     * @var integer
     */
    public $galleryId = 0;
    
    /**
     * Тип записи
     * 
     * @var string
     */
    public $recordType = 'news';
    
    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            //работа с изображениями
            'ImageDataBehavior' => array(
                'class' => 'ImageDataBehavior',
                'modelName' => 'ALTNews',
                'aiName' => 'id',
            ),
            //работа с базовыми данными
            'DefaultDataBehavior' => array(
                'class' => 'DefaultDataBehavior',
            ),
        );
    }

    /**
     * Действия перед проверкой данных
     * 
     * @return boolean
     */
    protected function beforeValidate() {        
        parent::beforeValidate();        
        $this->url = $this->setUrl($this->url, $this->menuName);
        if (!Yii::app()->params['altadmin']['modules']['news']['section']) {
            //Если разделы новостей выключены, то родителем устанавливаем основной раздел
            $this->newsSectionId = 1;
        }
        if (Yii::app()->params['altadmin']['modules']['news']['tags']) {
            //если включены теги, то обрабатываем их
            //todo сохранение тегов
        }
        return true;
    }

    /**
     * Действия перед сохранением записи
     * 
     * @return boolean
     */
    protected function beforeSave() {
        $this->date = $this->setDate($this->date);
        parent::beforeSave();        
        //$this->hash = $this->setHash();
        return true;
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        $this->image = $this->uploadImage($this->id, 'image', '/images/news/list/', Yii::app()->params['altadmin']['modules']['news']['image']['list']['width'], Yii::app()->params['altadmin']['modules']['news']['image']['list']['height'], $this->oldListImage);
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление новости', 'Новость успешно добавлена. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'add', 'news');
        } else {
            ALTLoger::saveLog('Редактирование новости', 'Новость успешно отредактирована. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'edit', 'news');
        }
        ALTGalleryRelations::saveRelationsRecord($this->galleryId, $this->id, $this->recordType);
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->deleteImage($this->id, 'image', '/images/news/list/');
        return true;
    }
    
    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление новости', 'Новость успешно удалена. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'delete', 'news');
        return true;
    }

    /**
     * Удаление новости и ее данных
     * 
     * @param int $id - id новости
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTNews::model()->findByPk($id);
        if ($model) {
            if (ALTNews::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }

    public function attributeLabels() {
        $data = array_merge(parent::attributeLabels(), array('tags' => 'Теги', 'galleryId' => 'Вывести галерею'));        
        $data['visibility'] .= ' <i class="icon-question-sign grey tooltip-info" data-rel="popover" data-placement="top" title="<i class=\'icon-exclamation-sign blue\'></i> Выводить" data-content="<small>Флаг вывода новости на сайт.</small>"></i> ';
        $data['menuName'] .= ' <i class="icon-question-sign grey tooltip-info" data-rel="popover" data-placement="top" title="<i class=\'icon-exclamation-sign blue\'></i> Краткий заголовок" data-content="<small>Используется при выводе списка записей.</small>"></i> ';
        $data['header'] .= ' <i class="icon-question-sign grey tooltip-info" data-rel="popover" data-placement="top" title="<i class=\'icon-exclamation-sign blue\'></i> Заголовок" data-content="<small>Заголовок (<b>H1</b>) страницы первого уровня.<br />Используется при выводе подробного описания записи.</small>"></i> ';
        $data['url'] .= ' <i class="icon-question-sign grey tooltip-info" data-rel="popover" data-placement="top" title="<i class=\'icon-exclamation-sign blue\'></i> URL" data-content="<small>URL служит стандартизированным способом записи адреса ресурса в сети Интернет.<br /> Должен быть уникален для раздела.<br /> Пример: new-page</small>"></i> ';
        return $data;
    }
    
    public function afterFind() {
        parent::afterFind();
        $this->galleryId = ALTGalleryRelations::getGalleryId($this->id, $this->recordType);
        return true;
    }
    
}