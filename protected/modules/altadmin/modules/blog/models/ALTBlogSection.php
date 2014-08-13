<?php

/**
 * ALTBlogSection. Модель для работы с таблицей "blogSection"
 * 
 * @package CMS
 * @category Blog
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTBlogSection extends BlogSection {

    static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function behaviors() {
        return array(
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
        $this->url = $this->setUrl($this->url, $this->name);
        if (!Yii::app()->params['altadmin']['modules']['blog']['section']) {
            //Если разделы новостей выключены, то родителем устанавливаем основной раздел
            $this->blogSectionId = 1;
        }
        return true;
    }

    /**
     * Действия перед сохранением записи
     * 
     * @return boolean
     */
    protected function beforeSave() {
        return parent::beforeSave();
    }

    /**
     * Действия после сохранения записи
     * 
     * @return boolean
     */
    protected function afterSave() {
        parent::afterSave();
        if ($this->isNewRecord) {
            ALTLoger::saveLog('Добавление раздела блога', 'Раздел блога успешно добавлен. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'add', 'section blog');
        } else {
            ALTLoger::saveLog('Редактирование раздела блога', 'Раздел блога успешно отредактирован. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'edit', 'section идщп');
        }
        return true;
    }

    protected function beforeDelete() {
        parent::beforeDelete();
        $blog = ALTBlog::model()->findAll(array('condition' => 'blogSectionId="' . $this->id . '"'));
        if ($blog) {
            foreach ($blog as $value) {
                ALTBlog::model()->findByPk($value->id)->delete();
            }
        }
        return true;
    }

    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление раздела блога', 'Раздел блога и все записи этого раздела успешно удалены. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'delete', 'section blog');
        return true;
    }

}
