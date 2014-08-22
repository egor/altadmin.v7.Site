<hr>
<div class="bestPage">
<h3>
    <?php 
    echo FrontEditFields::getSettings('EditFieldSettings', 'mainPageBest'); 
    $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/widget/editFieldSettings/edit/' . FrontEditFields::getIdSettings('EditFieldSettings', 'mainPageBest'))));
    ?>
    
</h3>
<?php

foreach ($model as $value) {
    $url = Page::getUrl($value->id);
    ?>
<div class="span12" id="bestPageRecord-<?php echo $value->id; ?>">
    <h4>
        <a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a>
        <?php
                $this->widget('application.widgets.AdminBtn', array(
                    'method' => 'modulePageList',
                    'data' => array(
                        'moduleName' => 'page',
                        'id' => $value->id,
                        'edit' => '/altadmin/page/edit/' . $value->id,
                        'delete' => '/altadmin/page/remove',
                        'moduleCssId' => 'bestPageRecord-', 
                    )
                        )
                );
                ?>
    </h4>
    <?php echo $value->shortText; ?>
    <div class="span12">
    <a href="<?php echo $url; ?>" style="float: right;" class="moreLink">
        <?php echo FrontEditFields::getSettings('EditFieldSettings', 'moreText'); ?>
        <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/widget/editFieldSettings/edit/' . FrontEditFields::getIdSettings('EditFieldSettings', 'moreText')))); ?>
    </a>
    </div>
</div>
<br clear="all" />
<?php
}
?>
</div>