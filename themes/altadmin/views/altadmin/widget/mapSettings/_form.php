<?php
$this->breadcrumbs = array(
    'Виджеты' => '#',    
    'Карта проезда' => '#',    
    'Настройка' => '/altadmin/widget/mapSettings',
    $this->breadcrumbsTitle
);

$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'editForm', 'data'=>array('modelName' => $modelName, 'linkToBack' => $linkToBack, 'editId' => $editId)));