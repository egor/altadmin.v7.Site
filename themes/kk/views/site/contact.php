<div class='row'>
<article class="span8">
<h3>
    <?php echo $this->pageHeader; ?>
    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['contact']))); ?>
</h3>
<?php
echo $model->text;
?>
</article>
<article class="span4">
    <?php
$this->widget('application.widgets.Feedback');
?>
</article>
</div>