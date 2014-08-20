<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        for ($i=0; $i<count($model); $i++) {
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" '.($i == 0 ? 'class="active"' : '').'></li>';
        }
        ?>
    </ol>
    <div class="carousel-inner">
                
        <?php
        $i = 0;
        foreach ($model as $value) {            
            ?>
        <div class="item<?php echo ($i == 0 ? ' active' : ''); ?>" id="sliderMainPage-<?php echo $value->id; ?>">
            <img src="/images/slider/mainPage/<?php echo $value->image; ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h1><?php echo $value->header; ?></h1>
                    <p><?php echo $value->text; ?></p>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo $value->link; ?>" role="button"><?php echo $value->btnText; ?></a></p>
                    <?php $this->widget('application.widgets.AdminBtn', 
                        array(
                            'method' => 'moduleRecordList', 
                            'data' => array(
                                'moduleName' => 'sliderMainPage', 
                                'id' => $value->id, 
                                'moduleCssId' => 'sliderMainPage-', 
                                'edit' => '/altadmin/widget/sliderMainPage/edit/' . $value->id, 
                                'delete' => '/altadmin/widget/sliderMainPage/delete'
                                )
                            )
                        ); ?>
                </div>
            </div>
        </div>
        <?php
        $i++;
        }
        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->