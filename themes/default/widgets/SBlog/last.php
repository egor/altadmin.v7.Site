<div class="row lastBlog">    
    <div style="overflow: hidden; padding:0 20px;"><h3 style="float:left;">
<?php
echo FrontEditFields::getSettings('BlogSettings', 'mainLastBlogTitle');
$this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'blog', 'edit' => '/altadmin/widget/blog/settings/edit/' . FrontEditFields::getIdSettings('BlogSettings', 'mainLastBlogTitle') )));
?>
</h3>
<small style="float:right; margin-top:30px;">
    <a href="/<?php echo Yii::app()->params['altadmin']['modules']['blog']['baseUrl']; ?>"><?php echo FrontEditFields::getSettings('BlogSettings', 'mainAllBlogText'); ?></a>
<?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'blog', 'edit' => '/altadmin/blog/settings/edit/' . FrontEditFields::getIdSettings('BlogSettings', 'mainAllBlogText') ))); ?>
</small></div>
<?php
foreach ($model as $value) {
    ?>
  <div class="col-sm-6 col-md-4" id="blogRecord-<?php echo $value->id; ?>">
    <div class="thumbnail">
      <div class="caption">
          <h3>
            <a href="/<?php echo Yii::app()->params['altadmin']['modules']['blog']['baseUrl'].'/'.$value->url; ?>"><?php echo StringOperations::cutString($value->menuName, 20, '...'); ?></a>
            <?php $this->widget('application.widgets.AdminBtn', 
                    array('method' => 'moduleRecordList', 'data' => 
                        array(
                            'moduleName' => 'blog', 
                            'id' => $value->id, 
                            'moduleCssId' => 'blogRecord-', 
                            'edit' => '/altadmin/blog/default/edit/' . $value->id, 
                            'delete' => '/altadmin/blog/default/delete')
                        )
                    ); ?>
          </h3>
          <small><?php echo date('d.m.Y', $value->date); ?> | <?php echo $value->blogSection->name; ?></small>
        <?php echo StringOperations::cutString($value->shortText, 150, '...'); ?>
      </div>
    </div>
  </div>

<?php
}
?>
</div>