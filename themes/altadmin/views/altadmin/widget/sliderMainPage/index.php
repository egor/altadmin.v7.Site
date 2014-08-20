<?php
$this->breadcrumbs = array(
    'Виджеты' => '#',
    $this->breadcrumbsTitle,
);
?>
<p><a href="/altadmin/widget/sliderMainPage/add" rel="tooltip" title="добавить" class="btn btn-primary b-add"><i class="icon-plus"></i> добавить слайд</a></p>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/widget/sliderMainPage/style.css" media="all" />
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/widget/sliderMainPage/index.js"></script>
<script>
    $(function() {
        $('#sortable').sortable();

    })
</script>
<ul class="sort" id="sortable" style="margin: 0;">
    <?php
    foreach ($model as $value) {
        ?>
        <li id="note_<?php echo $value->id; ?>" class="editable btn span12" style="background-color: #fff; margin: 3px;">
            <span class="note" style="float:left;"><?php echo $value->header; ?></span>
            <span style="float:right;">
            <?php echo (!empty($value->visibility) ? '<a rel="tooltip" title="да"><i class="icon-ok-sign"></i></a>' : '<a rel="tooltip" title="нет"><i class="icon-minus-sign"></i></a>'); ?>
            <a href="/altadmin/widget/sliderMainPage/edit/<?php echo $value->id; ?>" rel="tooltip" title="редактировать"><i class="icon-pencil"></i></a>
            <a href="#" onclick="myModalDeleteSlide(<?php echo $value->id; ?>, '<?php echo $value->header; ?>');
                    return false;" title="удалить" rel="tooltip"><i class="icon-remove"></i></a>
                </span>
        </li>
        <?php
    }
    ?>
</ul>
<br clear="all" />
<div class="form-actions" style="text-align: right;">
    <button onclick="updateOrder();
        return false;" type="submit" id="change-order" class="btn btn-primary">Сохранить сортировку</button>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header header-color-green">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel" style="color: #FFF;">Успех</h3>
    </div>
    <div class="modal-body">
        <p>Сортировка сохранена!</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Ok</button>
    </div>
</div>
<script>
    var deleteSlideId = 0;
    function myModalDeleteSlide(id, header) {
        deleteSlideId = id;
        $('#myModalDeleteSlideHeader').html(header);
        $('#myModalDeleteSlide').modal('show');
    }    
</script>
<div id="myModalDeleteSlide" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-norm-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-trash icon-animated-hand-pointer blue"></i>&nbsp;&nbsp;&nbsp;Удалить?</h3>
    </div>
    <div class="modal-body">
        <div style="float: left;">Вы уверены, что хотите удалить слайд <b id="myModalDeleteSlideHeader"></b>?</div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Нет, это была случайность</button>
        <button class="btn btn-primary" id="test" onclick="deleteSlide();
        return false;" data-dismiss="modal" aria-hidden="true" >Да, удалить</button>
    </div>
</div>

<!-- Сообщение о том что изображение успешно удалено -->
<div id="myModalDeleteSlideSuccess" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-success-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-ok icon-animated-hand-pointer green"></i> Успех!</h3>
    </div>
    <div class="modal-body">
        <p>Слайд успешно удален!</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить</button>
    </div>
</div>

<!-- Сообщение об ошибке -->
<div id="myModalDeleteSlideError" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-error-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-bolt icon-animated-hand-pointer red"></i> Ошибка!</h3>
    </div>
    <div class="modal-body" id="myModalDeleteSlideErrorText">

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
    </div>
</div>
<script>
    function deleteSlide() {
        $.ajax({
            type: "GET",
            url: "/altadmin/widget/sliderMainPage/delete",
            data: "id=" + deleteSlideId,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    $('#myModalDeleteSlideSuccess').modal('show');
                    $("#note_" + deleteSlideId).html('слайд удален');
                    $("#note_" + deleteSlideId).hide(3500);
                    $("#note_" + deleteSlideId).detach();
                } else {
                    if (obj.message != '') {
                        alert(obj.message);
                    } else {
                        $('#myModalDeleteSlideError').modal('show');
                        $('#myModalDeleteSlideErrorText').html('Неизвестная ошибка :(');
                    }
                }
            },
            error: function() {
                $('#myModalDeleteSlideError').modal('show');
                $('#myModalDeleteSlideErrorText').html('Неизвестная ошибка :(');
            }
        });
        return false;
    }
</script>