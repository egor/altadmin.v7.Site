<?php

/**
 * ALTBlog. Модель для работы с таблицей "blog"
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTBlog extends Blog {

    /**
     * Список тегов
     * @var string
     */
    public $tags = '';
    
    /**
     * Имя старого изображения списка
     * 
     * @var string
     */
    public $oldListImage = '';

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
            //работа с изображениями
            'ImageDataBehavior' => array(
                'class' => 'ImageDataBehavior',
                'modelName' => __CLASS__,
                'aiName' => $this->primaryKey,
            ),
            //работа с базовыми данными
            'DefaultDataBehavior' => array(
                'class' => 'DefaultDataBehavior',
            ),
        );
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array('tags' => 'Теги'));
    }
    /**
     * Действия перед проверкой данных
     * 
     * @return boolean
     */
    protected function beforeValidate() {        
        parent::beforeValidate();        
        $this->url = $this->setUrl($this->url, $this->menuName);
        if (!Yii::app()->params['altadmin']['modules']['blog']['section']) {
            //Если разделы блога выключены, то родителем устанавливаем основной раздел
            $this->blogSectionId = 1;
        }
        if (Yii::app()->params['altadmin']['modules']['blog']['tags']) {
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
        return true;
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        $this->image = $this->uploadImage($this->id, 'image', '/images/blog/list/', Yii::app()->params['altadmin']['modules']['blog']['image']['list']['width'], Yii::app()->params['altadmin']['modules']['blog']['image']['list']['height'], $this->oldListImage);
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление записи блога', 'Запись блога успешно добавлена. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'add', 'blog');
        } else {
            ALTLoger::saveLog('Редактирование записи блога', 'Запись блога успешно отредактирована. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'edit', 'blog');
        }
        ALTTagsRelations::saveRecordTags($this->id, 'blog', explode(',', $this->tags));
        return true;
    }

    /**
     * Действия перед удалением записи
     * 
     * @return boolean
     */
    protected function beforeDelete() {
        parent::beforeDelete();
        $this->deleteImage($this->id, 'image', '/images/blog/list/');
        return true;
    }
    
    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление записи блога', 'Запись блога успешно удалена. id: ' . $this->id . ', заголовок: ' . $this->menuName .'.', 1, 'delete', 'blog');
        return true;
    }

    /**
     * Удаление записи блога и ее данных
     * 
     * @param int $id - id записи
     * @return boolean
     */
    public function deleteRecord($id) {
        $model = ALTBlog::model()->findByPk($id);
        if ($model) {
            if (ALTBlog::deleteImage($id)) {
                $model->delete();
                return true;
            }
        }
        return false;
    }

    public function afterFind() {
        parent::afterFind();
        
        $this->tags = implode(',', ALTTagsRelations::getRecordTags($this->id, 'blog'));
    }
}