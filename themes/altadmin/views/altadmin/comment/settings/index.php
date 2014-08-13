<?php
$this->breadcrumbs = array(
    'Коментарии' => '/altadmin/comment',
    $this->breadcrumbsTitle,
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'table', 'data'=>array('modelName' => $modelName, 'linkToEdit' => $linkToEdit)));