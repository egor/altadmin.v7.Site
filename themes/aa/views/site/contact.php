<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="span12">                        
                <h1>
                    <?php echo $this->pageHeader; ?>
                    <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/edit/' . Yii::app()->params['altadmin']['systemPageId']['contact']))); ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="about-us container">
    <div class="row">
        <div class="about-us-text span12">

            <?php
            echo $model->text;
            ?>
            <?php
            $this->widget('application.widgets.Feedback');
            
            $this->widget('application.widgets.SContact', array('method' => 'map'));
            ?>

        </div>
    </div>
</div>