<?php
$this->breadcrumbs = array(
    'Новости' => '/altadmin/news',
    'Настройка' => '/altadmin/news/settings',
    $this->breadcrumbsTitle
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'editForm', 'data'=>array('modelName' => $modelName, 'linkToBack' => $linkToBack, 'editId' => $editId)));