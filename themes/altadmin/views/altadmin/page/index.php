<?php
/* @var $this PageController */
?>
<?php
$this->breadcrumbs = array(
    $this->breadcrumbsTitle
);
?>
<div id="<?php echo Page::ADMIN_TREE_CONTAINER_ID;?>" >
</div>

<script  type="text/javascript">
    baseUrl = '<?php echo $baseUrl;?>';
    csrfToken = '<?php echo Yii::app()->request->csrfToken;?>';
    adminTreeContainerId = '<?php echo Page::ADMIN_TREE_CONTAINER_ID;?>';
    openNodes = <?php echo $open_nodes;?>;    
</script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/page/main.js"></script>         
    <?php $this->widget('application.modules.altadmin.widgets.PageOperations', array('method' => 'deletePage')); ?>