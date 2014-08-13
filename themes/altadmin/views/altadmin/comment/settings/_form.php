<?php
$this->breadcrumbs = array(
    'Комментарии' => '/altadmin/comment/default',    
    'Настройка' => '/altadmin/comment/settings',
    $this->breadcrumbsTitle
);

$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'editForm', 'data'=>array('modelName' => $modelName, 'linkToBack' => $linkToBack, 'editId' => $editId)));