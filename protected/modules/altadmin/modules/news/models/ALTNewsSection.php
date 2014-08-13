<?php

/**
 * ALTNewsSection. Модель для CMS таблицы NewsSection
 * 
 * @package CMS
 * @category News
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTNewsSection extends NewsSection {

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
        if (!Yii::app()->params['altadmin']['modules']['news']['section']) {
            //Если разделы новостей выключены, то родителем устанавливаем основной раздел
            $this->newsSectionId = 1;
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
            ALTLoger::saveLog('Добавление раздела новости', 'Раздел новости успешно добавлен. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'add', 'section news');
        } else {
            ALTLoger::saveLog('Редактирование раздела новости', 'Раздел новости успешно отредактирован. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'edit', 'section news');
        }
        return true;
    }

    protected function beforeDelete() {
        parent::beforeDelete();
        $news = ALTNews::model()->findAll(array('condition' => 'newsSectionId="' . $this->id . '"'));
        if ($news) {
            foreach ($news as $value) {
                ALTNews::model()->findByPk($value->id)->delete();
            }
        }
        return true;
    }

    protected function afterDelete() {
        parent::afterDelete();
        ALTLoger::saveLog('Удаление раздела новости', 'Раздел новостей и все новости этого раздела успешно удалены. id: ' . $this->id . ', заголовок: ' . $this->name . '.', 1, 'delete', 'section news');
        return true;
    }

}
