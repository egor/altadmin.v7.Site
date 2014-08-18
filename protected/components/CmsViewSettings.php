<?php

/**
 * CmsViewSettings. Настройки вывода для админа
 * 
 * @package CMS
 * @category Main
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class CmsViewSettings {

    /**
     * Настройки по умолчанию
     * 
     * @var array
     */
    private $sData = array();    
    
    /**
     * Обьект работы с видом
     * 
     * @var object
     */
    private $model;
    
    /**
     * Конструктор
     */
    public function __construct() {
        $this->model = UserCmsSettings::model()->find(array('condition' => 'userId="' . Yii::app()->user->uid . '"'));
        if ($this->model) {
            $this->setUserSettings(json_decode($this->model->data, true));
        } else {
            $this->model = new UserCmsSettings;
            $this->setDefaultSettings();
            $this->model->userId = Yii::app()->user->uid;
            $this->model->data = json_encode($this->sData);
            $this->model->save();
        }
    }
    
    /**
     * Установка значений по умолчанию
     */
    private function setDefaultSettings() {
        $this->sData['leftMenuCollapse']    = 1;
        $this->sData['headerFixed']         = 1;
        $this->sData['leftMenuFixed']       = 1;
        $this->sData['breadcrumbsFixed']    = 1;
        $this->sData['rtl']                 = 0;
        $this->sData['skin']                = 'default';
    }
    
    /**
     * Получить параметр по имени
     * 
     * @param string $name - имя параметра
     * @return string значение
     */
    public function getSetting($name) {
        return $this->sData[$name];
    }
 
    /**
     * Установка значения по имени
     * 
     * @param string $name - имя параметра
     * @param string $value - значение
     * @return boolean
     */
    public function setSetting($name, $value) {
        $this->sData[$name] = $value;
        $this->model->data = json_encode($this->sData);
        if ($this->model->save()) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Установка группы значений вывода
     * 
     * @param array $data - массив данных
     */
    public function setUserSettings($data) {
        foreach ($data as $key => $value) {
            $this->sData[$key] = $value;
        }
    }
}