<h1><?php echo $this->pageHeader; ?></h1>
<span class="label label-primary"><?php echo date('d.m.Y', $model->date); ?></span> <span class="label label-default"><?php echo $model->newsSection->name; ?></span>
<?php
echo $model->text;