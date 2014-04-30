<?php
/* @var $this BfwwStorageController */

$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Кнопка ФОС' => '#',
    $this->breadcrumbsTitle,
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'table', 'data'=>array('modelName' => $modelName, 'linkToEdit' => $linkToEdit)));