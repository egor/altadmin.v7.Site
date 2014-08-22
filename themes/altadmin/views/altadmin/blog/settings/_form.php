<?php
$this->breadcrumbs = array(
    'Блог' => '/altadmin/blog',
    'Настройка' => '/altadmin/blog/settings',
    $this->breadcrumbsTitle
);
$this->widget('application.modules.altadmin.widgets.DefaultSettingsOperations', array('method' => 'editForm', 'data'=>array('modelName' => $modelName, 'linkToBack' => $linkToBack, 'editId' => $editId)));