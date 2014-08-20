<?php
$img = '';
foreach ($model as $value) {
    ?>
    <div class="container show-case-item" id="sliderMainPage-<?php echo $value->id; ?>">
        <h1><?php echo $value->header; ?></h1>
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
        <p><?php echo $value->text; ?></p>
        <a href="<?php echo $value->link; ?>" class="bigbtn"><?php echo $value->btnText; ?></a>

        <div class="clearfix"> </div>
    </div>

    <?php
    $img .= '<div class="splash"> <img src="/images/slider/mainPage/' . $value->image . '" /> </div>';
}
?>
<div id="banner-pagination">
    <ul>
        <?php
        for ($i = 0; $i < count($model); $i++) {
            if ($i == 0) {
                ?>
                <li><a href="#" class="active" rel="0"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot-active.png" alt="" /></a></li>
                        <?php
                    } else {
                        ?>
                <li><a href="#" rel="<?php echo $i; ?>"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slidedot.png" alt="" /></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>
<?php
echo $img;