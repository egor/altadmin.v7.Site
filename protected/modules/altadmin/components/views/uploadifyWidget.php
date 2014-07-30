<h4>Загрузить изображения галереи</h4>
<small><b>Размер</b>. Изображение будет автоматически сжато и обрезано под 3 размера (маленький: ширина: <?php echo Yii::app()->params['altadmin']['modules']['gallery']['imageSettings']['small']['width']; ?> px, 
    высота: <?php echo Yii::app()->params['altadmin']['modules']['gallery']['imageSettings']['small']['height']; ?> px; 
    большой: ширина: <?php echo Yii::app()->params['altadmin']['modules']['gallery']['imageSettings']['big']['width']; ?> px, 
    высота: <?php echo Yii::app()->params['altadmin']['modules']['gallery']['imageSettings']['big']['height']; ?> px; реальный: остается как есть)</small><br />
<small><b>Имя файла</b>. Имя файла будет сформировано по формуле: id_галереи-имя_файла.расширение</small><br />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/uploadify/uploadify.css">
<form>
    <div id="queue"></div>
    <input id="file_upload" name="file_upload" type="file" multiple="true">
</form>

<script type="text/javascript">
<?php $timestamp = time(); ?>
    $(function() {
        $('#file_upload').uploadify({
            'formData': {
                'timestamp': '<?php echo $timestamp; ?>',
                'token': '<?php echo md5('unique_salt' . $timestamp); ?>',
                'pid': '<?php echo $pid; ?>',
                'model': '<?php echo $model; ?>',
                'modelId': '<?php echo $modelId; ?>',
                'folder': '<?php echo $folder; ?>',
            },
            'swf': '<?php echo Yii::app()->theme->baseUrl; ?>/js/uploadify/uploadify.swf',
            //'uploader' : '/library/admin/uploadify/uploadify.php'
            'uploader': '/altadmin/uploadify/uploadImg',
            'buttonText': 'Обзор ...',
            //'buttonClass' : 'btn-primary',
            'onUploadSuccess': function() {
                $.ajax({
                    type: "POST",
                    url: "/altadmin/uploadify/showImagesList",
                    data: "pid=<?php echo $pid; ?>&folder=<?php echo $folder; ?>&model=<?php echo $model; ?>&modelId=<?php echo $modelId; ?>",
                    success: function(data) {
                        $("#images-list").html(data);
                    }
                });
            }
        });
    });
</script>