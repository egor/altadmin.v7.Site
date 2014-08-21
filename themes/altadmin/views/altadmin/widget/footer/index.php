<?php
$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Подвал' => '#',
    $this->breadcrumbsTitle,
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'table', 'data'=>array('modelName' => $modelName, 'linkToEdit' => $linkToEdit)));