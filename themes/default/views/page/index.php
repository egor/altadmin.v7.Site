<?php
/*
$this->breadcrumbs = array(
    $breadcrumbs,
    $model->menuName,
);
 * 
 */
?>
<h1><?php echo $this->pageHeader; ?></h1>
<?php 
echo $model->text;
foreach ($children as $value) {
    $url = $pageUrl . '/' . $value->url;    
    ?>
    <div class="media">
        <div class="media-body">
            <h4 class="media-heading"><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a></h4>
            <?php echo $value->shortText; ?>
        </div>
    </div>
<?php
}