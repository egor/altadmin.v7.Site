<h1>
    <?php echo $this->pageHeader; ?>
    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['contact']))); ?>
</h1>
<?php
echo $model->text;
$this->widget('application.widgets.Feedback');