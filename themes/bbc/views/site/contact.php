<div class="row">
    <div class="box">
        <div class="col-lg-12 text-center">
            <h1 class="brand-name"><?php echo $this->pageHeader; ?></h1>        
            <hr class="tagline-divider">
        </div>
        <?php
        echo $model->text;
        ?>
    </div>
</div>
<?php
$this->widget('application.widgets.Feedback');