<h1>
    <?php echo $this->pageHeader; ?>
    <?php $this->widget('application.widgets.AdminBtn', 
            array('method' => 'moduleEditField', 'data' => 
                array('moduleName' => 'menu', 
                    'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['404'])
                )
            ); 
    ?>
</h1>
<?php
echo $model->text;
