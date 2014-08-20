<div class="row">
    <div class="box">
        <div class="col-lg-12 text-center">
            <h1 class="brand-name"><?php echo $this->pageHeader; ?></h1>        
            <hr class="tagline-divider">
        </div>
        <?php
        echo $model->text;
        if (Yii::app()->params['altadmin']['modules']['gallery']['work'] && Yii::app()->params['altadmin']['modules']['page']['gallery']) {
            ?>
            <div id="galleryList">    
                <?php
                $this->widget('application.widgets.SGallery', array('method' => 'printGallery', 'data' => array('type' => 'page', 'recordId' => $model->id)));
                ?>
            </div>
            <?php
        }
        if (Yii::app()->params['altadmin']['modules']['comment']['work'] && Yii::app()->params['altadmin']['modules']['page']['comment'] && $model->comment == 1) {
            ?>
            <div id="commentList">    
                <?php
                $this->widget('application.widgets.SComment', array('method' => 'printComment', 'data' => array('type' => 'page', 'recordId' => $model->id)));
                ?>
            </div>
            <?php
            $this->widget('application.widgets.SComment', array('method' => 'printForm', 'data' => array('pid' => 0, 'type' => 'page', 'recordId' => $model->id)));
        }
        ?>
    </div>
</div>
<?php
if ($children) {
    ?>
    <div class="row">
        <div class="box">
            <?php
            foreach ($children as $value) {
                $url = $pageUrl . '/' . $value->url;
                ?>
                <div class="media">
                    <div class="media-body">
                        <hr>
                        <h2 class="intro-text text-center"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a></h2>
                        <hr>
                        <?php echo $value->shortText; ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div></div>
            <?php
        }
        ?>
</div>
</div>