<div class="row-fluid">
    <div class="span12">
        <div class="page-header">
            <div class="row-fluid">
                <div class="span12">
                    <h1><?php echo $this->pageHeader; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid contact">
    <div class="span12">
    <?php echo $model->text; ?>
    </div>
    <div class="span12">
        <div class="wpcf7" id="wpcf7-f75-t1-o1">
            <?php $this->widget('application.widgets.Feedback'); ?>
        </div>
    </div>
</div>