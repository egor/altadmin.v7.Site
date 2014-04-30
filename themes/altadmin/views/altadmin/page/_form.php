<!--
 Nested Set Admin GUI
 Form  View File  _form.php

This Form uses client validation.Check Yii Class Reference for rules supported by  client validation.
If your validation rule is not supported you may need to modify this file,possibly enabling
ajax validation -in this case you'll have to write the validation code in the controller.

 @author Spiros Kabasakalis <kabasakalis@gmail.com>,myspace.com/spiroskabasakalis
 @copyright Copyright &copy; 2011 Spiros Kabasakalis
 @since 1.0
 @license The MIT License-->
<div id="categorydemo_form_con"   class="client-val-form">
<?php if ($_POST['create_root']=='true' && $model->isNewRecord) : ?>              <h3 id="create_header">Create New Root Categorydemo </h3>
<?php elseif ($model->isNewRecord) : ?>     <h3 id="create_header">Create New Categorydemo </h3>
     <?php  elseif (!$model->isNewRecord):  ?>     <h3 id="update_header">Update Categorydemo <?php  echo $model->menu_name;  ?> (ID:<?php   echo $model->id;  ?>) </h3>
    <?php   endif;  ?>
    <div   id="success-categorydemo" class="notification success png_bg" style="display:none;">
				<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl.'/css/images/icons/cross_grey_small.png';  ?>"
                                                                title="Close this notification" alt="close" /></a>
			</div>

<div  id="error-categorydemo" class="notification errorshow png_bg" style="display:none;">
				<a href="#" class="close"><img src="<?php echo Yii::app()->request->baseUrl.'/css/images/icons/cross_grey_small.png';  ?>"
                                                                title="Close this notification" alt="close" /></a>
			</div>

<div class="form">

<?php   $formId='categorydemo-form';
 $ajaxUrl=($model->isNewRecord)?
              ( ($_POST['create_root']!='true')?CController::createUrl('pages/create'):CController::createUrl('pages/createRoot')):
               CController::createUrl('pages/update');
$val_error_msg='Error.Categorydemo was not saved.';
$val_success_message=($model->isNewRecord)?
( ($_POST['create_root']!='true')?'Categorydemo was created successfuly.':'Root Categorydemo was created successfuly.'):
                                                  'Categorydemo was updated successfuly.';


$success='function(data){
    var response= jQuery.parseJSON (data);

    if (response.success ==true)
    {
         jQuery("#'.Categorydemo::ADMIN_TREE_CONTAINER_ID.'").jstree("refresh");
         $("#success-categorydemo")
        .fadeOut(1000, "linear",function(){
                                                             $(this)
                                                            .append("<div> '.$val_success_message.'</div>")
                                                            .fadeIn(2000, "linear")
                                                            }
                       );
        $("#categorydemo-form").slideToggle(1500);'.
        $updatesuccess.
    '}
         else {
                   $("#error-categorydemo")
                   .hide()
                    .show()
                    .css({"opacity": 1 })
                   .append("<div>"+response.message+"</div>").fadeIn(2000);

              jQuery("#'.Categorydemo::ADMIN_TREE_CONTAINER_ID.'").jstree("refresh");

                  }
                     }//function';

$js_afterValidate="js:function(form,data,hasError) {


        if (!hasError) {                         //if there is no error submit with  ajax
        jQuery.ajax({'type':'POST',
                              'url':'$ajaxUrl',
                         'cache':false,
                         'data':$(\"#$formId\").serialize(),
                         'success':$success
                           });
                         return false; //cancel submission with regular post request,ajax submission performed above.
    } //if has not error submit via ajax

else{
return false;       //if there is validation error don't send anything
    }                    //cancel submission with regular post request,validation has errors.

}";


$form=$this->beginWidget('CActiveForm', array(
     'id'=>'categorydemo-form',
  // 'enableAjaxValidation'=>true,
     'enableClientValidation'=>true,
     'focus'=>array($model,'menu_name'),
     'errorMessageCssClass' => 'input-notification-error  error-simple png_bg',
     'clientOptions'=>array('validateOnSubmit'=>true,
                                        'validateOnType'=>false,
                                        'afterValidate'=>$js_afterValidate,
                                        'errorCssClass' => 'err',
                                        'successCssClass' => 'suc',
                                        'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){
                                                   if(!hasError){
                                                                    $("#success-"+attribute.id).fadeIn(500);
                                                                   $("label[for=\'Categorydemo_"+attribute.name+"\']").removeClass("error");
                                                                      }else {
                                                                                  $("label[for=\'Categorydemo_"+attribute.name+"\']").addClass("error");
                                                                                   $("#success-"+attribute.id).fadeOut(500);
                                                                                   }

                                                                                                                            }'
                                                                             ),
)); 

 ?>
<?php echo $form->errorSummary($model, '<div style="font-weight:bold">Please correct these errors:</div>', NULL, array('class' => 'errorsum notification errorshow png_bg')); ?><p class="note">Fields with <span class="required">*</span> are required.</p>

  

 <div class="row" >
  <?php echo $form->labelEx($model,'menu_name'); ?>    <?php  echo $form->textField($model,'menu_name',array('size'=>60,'maxlength'=>128,'value'=>$_POST['menu_name'],'style'=>'width:88%;'));  ?>       <span  id="success-Categorydemo_name"  class="hid input-notification-success  success png_bg"></span>
    <div><small></small> </div>
     <?php   echo $form->error($model,'menu_name');  ?>    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_text'); ?>
		<?php echo $form->textArea($model,'short_text',array('rows'=>6, 'cols'=>50)); ?>
             <span  id="success-Categorydemo_description"  class="hid input-notification-success  success png_bg"></span>
           <div><small></small> </div>
		<?php echo $form->error($model,'short_text'); ?>
	</div>

<table class="image-form-table">
        <tr>
            <td class="span9">
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'image'); ?>
                    <?php echo $form->fileField($model, 'image', array('class' => 'span12')); ?>
                    <?php echo $form->error($model, 'image'); ?>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageAlt'); ?>
                    <?php echo $form->textField($model, 'imageAlt', array('class' => 'span12', 'id' => 'image-alt')); ?>
                    <?php echo $form->error($model, 'imageAlt'); ?>
                </div>
                <div class="control-group">
                    <?php echo $form->labelEx($model, 'imageTitle'); ?>
                    <?php echo $form->textField($model, 'imageTitle', array('class' => 'span12', 'id' => 'image-title')); ?>
                    <?php echo $form->error($model, 'imageTitle'); ?>
                </div>
            </td>
            <td class="span3">
                <?php
                if (!empty($model->image)) {
                    echo '<div id="image-preview"><img src="/images/news/' . $model->image . '" width="150px" /><br /><a href="#" onclick="deleteImg(' . $model->id . '); return false;" rel="tooltip" title="удалить картинку" class="i-remove"><i class="icon-remove"></i></a></div>';
                } else {
                    echo '<div id="image-preview"><div class="image-preview-empty">нет фото</div></div>';
                }
                ?>
            </td>
        </tr>
    </table>
<input type="hidden" name= "YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->csrfToken; ?>"  />
  <input type="hidden" name= "parent_id" value="<?php echo $_POST['parent_id']; ?>"  />

  <?php  if (!$model->isNewRecord): ?>    <input type="hidden" name= "update_id" value=" <?php echo $_POST['update_id']; ?>"  />
     <?php endif; ?>      
    
   <div class="row buttons">
 <?php   echo  CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array('class' => 'button align-right')); ?>	</div>
     
 <?php  $this->endWidget(); ?></div><!-- form -->

</div>
<script  type="text/javascript">
$(document).ready(function() {
    //$('#categorydemo-form').submit();
});    
 //Close button:

		$(".close").click(
			function () {
				$(this).parent().fadeTo(400, 0, function () { // Links with the class "close" will close parent
					$(this).slideUp(600);
				});
				return false;
			}
		);


</script>


