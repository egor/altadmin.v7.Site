
    <div class="row">
            <div class="box">
<?php
if (Yii::app()->user->isGuest && FrontEditFields::getSettings('CommentSettings', 'noAuthUser') == 0) {

    echo '<p>' . FrontEditFields::getSettings('CommentSettings', 'textToNoAuthUser') . '</p>';
    
} else {
?>
<script>
    function saveComment() {
        data = $("#uComment").serialize();
        $.ajax({
            type: "POST",
            url: '/comment/default/saveComment',
            data: data,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    //$('#<?php echo $this->data['moduleCssId'] ?>'+id).hide(500);
                    $('#SiteComment_text').val('');
                    //$('#SiteComment_userEmail').val('');
                    //$('#SiteComment_userName').val('');
                    reloadCommentList();
                    
                } else {
                    //alert('Ошибка!');
                }
            },
            error: function() {
                //alert('Ошибка!');
            }
        });
    }

    function reloadCommentList() {
        $.ajax({
            type: "GET",
            url: '/comment/default/reloadList',
            data: 'type=<?php echo $this->data['type']; ?>&recordId=<?php echo $this->data['recordId']; ?>' ,
            success: function(data) {
                $('#commentList').html(data);
                <?php 
                    if (Yii::app()->user->isGuest && FrontEditFields::getSettings('CommentSettings', 'moderation') == 1) {
                        ?>
                        $('#commentInfo').html('<?php echo FrontEditFields::getSettings('CommentSettings', 'textModeration'); ?>');
                        $('#uCommentForm').hide();
                        <?php
                    }
                ?>
            },
            error: function() {
                alert('Ошибка!');
            }
        });

    }
</script>
<div id="commentInfo"></div>
<div id="uCommentForm">   
    <hr>
    <h2 class="intro-text text-center"><?php echo FrontEditFields::getSettings('CommentSettings', 'formHeader'); ?></h2>
    <hr>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'uComment',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>false,
    ),
    'htmlOptions' => array('class' => 'contact-form', 'role' => 'form'),
        ));
?>
<?php echo $form->hiddenField($model, 'pid', array('value' => $this->data['pid'])); ?>
<?php echo $form->hiddenField($model, 'type', array('value' => $this->data['type'])); ?>
<?php echo $form->hiddenField($model, 'recordId', array('value' => $this->data['recordId'])); ?>
<?php
if (Yii::app()->user->isGuest) {
    ?>
    <?php echo $form->labelEx($model, 'userName'); ?>
    <?php echo $form->textField($model, 'userName', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder'))); ?>
    <?php echo $form->error($model, 'userName'); ?>
    <?php echo $form->labelEx($model, 'userEmail'); ?>
    <?php echo $form->textField($model, 'userEmail', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder'))); ?>
    <?php echo $form->error($model, 'userEmail'); ?>

    <?php
}
?>
<?php echo $form->labelEx($model, 'text'); ?>
<?php echo $form->textArea($model, 'text', array('rows' => 3, 'cols' => 40, 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder'))); ?>
<?php echo $form->error($model, 'text'); ?>
<?php echo CHtml::submitButton(FrontEditFields::getSettings('CommentSettings', 'sendBtnText'), array('class' => 'btn btn-success alt-right', 'onclick' => 'saveComment(); return false;')); ?>
<?php
$this->endWidget();
?>
</div>
<?php
}
?>
            </div></div>