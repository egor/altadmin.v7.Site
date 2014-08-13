<?php

/**
 * DefaultSettingsOperations.
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DefaultSettingsOperations extends CWidget
{
    /**
     * Вызываемый метод
     * 
     * @var string 
     */
    public $method;
    
    /**
     * Передаваемые данные методу
     * 
     * @var array 
     */
    public $data = array();
    
    /**
     * Вызов необходимого метода
     */
    public function init()
    {
        $method = $this->method;
        $this->$method();
    }
    
    public function table() {
        $model = new $this->data['modelName'];
        $data = $model->findAll(array('order' => 'position'));        
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.DefaultSettingsOperations.table', array('data' => $data, 'linkToEdit' => $this->data['linkToEdit']));
    }
    
    public function editForm() {
        $model = new $this->data['modelName'];
        $data = $model->findByPk($this->data[editId]);        
        $this->render('webroot.themes.'.Yii::app()->theme->name.'.widgets.DefaultSettingsOperations.editForm', array('data' => $data));
    }
}