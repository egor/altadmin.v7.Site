<?php
$this->breadcrumbs = array(
    'Виджеты' => '#',
    'Карта проезда' => '#',
    $this->breadcrumbsTitle,
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'table', 'data'=>array('modelName' => $modelName, 'linkToEdit' => $linkToEdit)));