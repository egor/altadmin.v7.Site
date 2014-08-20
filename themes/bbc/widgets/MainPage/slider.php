<div id="carousel-example-generic" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">
        <?php
        for ($i = 0; $i < count($model); $i++) {
            ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php echo ($i == 0 ? 'class="active"' : ''); ?>></li>
            <?php
        }
        ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($model as $value) {
            ?>
            <div class="item<?php echo ($i == 0 ? ' active' : '') ?>" id="sliderMainPage-<?php echo $value->id; ?>">
                <img class="img-responsive img-full" style="height:320px;" src="/images/slider/mainPage/<?php echo $value->image ?>">
                <?php
                $this->widget('application.widgets.AdminBtn', array(
                    'method' => 'moduleRecordList',
                    'data' => array(
                        'moduleName' => 'sliderMainPage',
                        'id' => $value->id,
                        'moduleCssId' => 'sliderMainPage-',
                        'edit' => '/altadmin/widget/sliderMainPage/edit/' . $value->id,
                        'delete' => '/altadmin/widget/sliderMainPage/delete'
                    )
                        )
                );
                ?>            
            </div>
            <?php
            $i++;
        }
        ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>