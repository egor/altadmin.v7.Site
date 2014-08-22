<div class="row lastNews">    
    <div style="overflow: hidden; padding:0 20px;"><h3 style="float:left;">
<?php
echo FrontEditFields::getSettings('NewsSettings', 'mainLastNewsTitle');
$this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'news', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('NewsSettings', 'mainLastNewsTitle') )));
?>
</h3>
<small style="float:right; margin-top:30px;">
    <a href="/<?php echo Yii::app()->params['altadmin']['modules']['news']['baseUrl']; ?>"><?php echo FrontEditFields::getSettings('NewsSettings', 'mainAllNewsText'); ?></a>
<?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'news', 'edit' => '/altadmin/widget/footer/edit/' . FrontEditFields::getIdSettings('NewsSettings', 'mainAllNewsText') ))); ?>
</small></div>
<?php
foreach ($model as $value) {
    ?>
  <div class="col-sm-6 col-md-4" id="newsRecord-<?php echo $value->id; ?>">
    <div class="thumbnail">
      <div class="caption">
          <h3>
              <a href="/<?php echo Yii::app()->params['altadmin']['modules']['news']['baseUrl'].'/'.$value->url; ?>"><?php echo StringOperations::cutString($value->menuName, 20, '...'); ?></a>
          <?php $this->widget('application.widgets.AdminBtn', 
                        array(
                            'method' => 'moduleRecordList', 
                            'data' => array(
                                'moduleName' => 'news', 
                                'id' => $value->id, 
                                'moduleCssId' => 'newsRecord-', 
                                'edit' => '/altadmin/news/default/edit/' . $value->id, 
                                'delete' => '/altadmin/news/default/delete'
                                )
                            )
                        ); ?>
          </h3>
          <small><?php echo date('d.m.Y', $value->date); ?> | <?php echo $value->newsSection->name; ?></small>
        <?php echo StringOperations::cutString($value->shortText, 150, '...'); ?>
      </div>
    </div>
  </div>

<?php
}
?>
</div>