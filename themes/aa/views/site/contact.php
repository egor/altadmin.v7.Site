<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="span12">                        
                <h1><?php echo $this->pageHeader; ?></h1>
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
            ?>

        </div>
    </div>
</div>