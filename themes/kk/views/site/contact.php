<div class='row'>
<article class="span8">
<h3><?php echo $this->pageHeader; ?></h3>
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