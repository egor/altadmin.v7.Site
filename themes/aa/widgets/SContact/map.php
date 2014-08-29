<div class="alt-map">
    <h3>
        <?php echo FrontEditFields::getSettings('MapSettings', 'mapTitle'); ?>
        <?php $this->widget('application.widgets.AdminBtn', 
                array('method' => 'moduleSettingsField', 'data' => 
                    array('moduleName' => 'map', 
                        'edit' => '/altadmin/widget/mapSettings', 
                        'title' => 'настроить карту проезда', 
                        'alt' => 'настроить карту проезда')
                    )
                ); 
        ?>
    </h3>
    <br clear="all" />
    <div class="mapa">
<?php
echo FrontEditFields::getSettings('MapSettings', 'mapCode');
?>
    </div>
</div>