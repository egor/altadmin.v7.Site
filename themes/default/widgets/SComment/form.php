<?php
if (Yii::app()->user->isGuest && FrontEditFields::getSettings('CommentSettings', 'noAuthUser') == 0) {
    echo '<p>' . FrontEditFields::getSettings('CommentSettings', 'textToNoAuthUser') . '</p>';
} else {
    ?>
    <script>
        function reloadCommentList() {
            $('#SiteComment_text').val('');
            $.ajax({
                type: "GET",
                url: '/comment/default/reloadList',
                data: 'type=<?php echo $this->data['type']; ?>&recordId=<?php echo $this->data['recordId']; ?>',
                beforeSend: function() {
                    $('#commentList').append('<div class="preloadImg"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/preloader.gif" class="preloader"/></div>');
                },
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
        <h4><?php echo FrontEditFields::getSettings('CommentSettings', 'formHeader'); ?></h4>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'uComment',
            'action' => '/comment/default/saveComment',
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'method' => 'POST',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                //'validateOnChange'=>true,
                //'validateOnType'=>false,
                'afterValidate' => 'js:function(form, data, hasError) {if (!hasError) {reloadCommentList();}}',
                
            ),
            'htmlOptions' => array('class' => 'contact-form', 'role' => 'form'),
        ));

        echo $form->hiddenField($model, 'pid', array('value' => $this->data['pid']));
        echo $form->hiddenField($model, 'type', array('value' => $this->data['type']));
        echo $form->hiddenField($model, 'recordId', array('value' => $this->data['recordId']));

        if (Yii::app()->user->isGuest) {
            echo $form->labelEx($model, 'userName');
            echo $form->textField($model, 'userName', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder')));
            echo $form->error($model, 'userName');
            echo $form->labelEx($model, 'userEmail');
            echo $form->textField($model, 'userEmail', array('class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder')));
            echo $form->error($model, 'userEmail');
        }
        echo $form->labelEx($model, 'text');
        echo $form->textArea($model, 'text', array('rows' => 3, 'cols' => 40, 'class' => 'form-control', 'placeholder' => FrontEditFields::getSettings('CommentSettings', 'namePlaceholder')));
        echo $form->error($model, 'text');
        echo CHtml::submitButton(FrontEditFields::getSettings('CommentSettings', 'sendBtnText'), array('class' => 'btn btn-success alt-right mrgn-top-10'));
        $this->endWidget();
        ?>
    </div>
    <?php
}