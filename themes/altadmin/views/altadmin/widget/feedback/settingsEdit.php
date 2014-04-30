<?php
/* @var $this BfwwStorageController */

$this->breadcrumbs = array(
    'Виджеты' => '/altadmin/widget',
    'ФОС' => '/altadmin/widget/feedback',
    'Настройка' => '/altadmin/widget/feedback/settings',
    $this->breadcrumbsTitle
);

$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'editForm', 'data'=>array('modelName' => $modelName, 'linkToBack' => $linkToBack, 'editId' => $editId)));