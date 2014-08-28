<div class="portfolio container">    
    <div class="row lastBlog">        
        <div class="span12">
            <hr>
            <h3 style="float:left;">
                <?php
                echo FrontEditFields::getSettings('BlogSettings', 'mainLastBlogTitle');
$this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'blog', 'edit' => '/altadmin/blog/settings/edit/' . FrontEditFields::getIdSettings('BlogSettings', 'mainLastBlogTitle') )));
                ?>
            </h3>
            <small style="float:right; margin-top:30px;">
                <a href="/<?php echo Yii::app()->params['altadmin']['modules']['blog']['baseUrl']; ?>"><?php echo FrontEditFields::getSettings('BlogSettings', 'mainAllBlogText'); ?></a>
<?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'blog', 'edit' => '/altadmin/blog/settings/edit/' . FrontEditFields::getIdSettings('BlogSettings', 'mainAllBlogText') ))); ?>
            </small>
        </div>



<?php
foreach ($model as $value) {
    ?>
                <div class="work span4" id="blogRecord-<?php echo $value->id; ?>">
                <h4><?php echo StringOperations::cutString($value->menuName, 20, '...'); ?>
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
                </h4>
                <small><?php echo date('d.m.Y', $value->date); ?> | <?php echo $value->blogSection->name; ?></small>
    <?php echo StringOperations::cutString($value->shortText, 150, '...'); ?>
                <div class="icon-awesome">
                    <a href="/<?php echo Yii::app()->params['altadmin']['modules']['blog']['baseUrl'] . '/' . $value->url; ?>"><i class="icon-link"></i></a>
                </div>
            </div>
<?php
}
?>
    </div>
</div>