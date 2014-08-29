<!-- Slider -->
<div class="slider">
    <div class="container">
        <div class="row">
            <div class="span10 offset1">                
                <div class="flexslider">
                    <ul class="slides">

                        <?php
                        foreach ($model as $value) {
                            ?>
                            <li data-thumb="/images/slider/mainPage/<?php echo $value->image; ?>" id="sliderMainPage-<?php echo $value->id; ?>">
                                <img src="/images/slider/mainPage/<?php echo $value->image; ?>">
                                <p class="flex-caption"><?php echo $value->text; ?></p>
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
                                <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleSettingsField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/widget/sliderMainPage', 'title' => 'редактировать слайдер', 'alt' => 'редактировать слайдер'))); ?>  
                            </li>
                            <?php
                        }
                        ?>
                    </ul>                    
                </div>                
            </div>
        </div>
    </div>    
</div>