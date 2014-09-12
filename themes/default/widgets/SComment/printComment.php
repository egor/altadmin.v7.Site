<h2><?php echo FrontEditFields::getSettings('CommentSettings', 'header'); ?></h2>
<?php
if ($model) {
    foreach ($model as $value) {
        $img = '<img src="/images/user/default.jpg" class="media-object" style="width:100px;">';
        if ($value->user) {
            $userName = $value->user->name . ' ' . $value->user->surname;
            if ($value->user->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/user/list/' . $value->user->image)) {
                $img = '<img src="/images/user/list/' . $value->user->image . '" class="media-object">';
            }
        } else {
            $userName = $value->userName;
        }
        ?>
        <div class="media" id="comment-<?php echo $value->id; ?>" <?php echo ($value->visibility == 0 ? 'style="color:#C6C6C6;"' : ''); ?>>
            <a href="<?php echo $url; ?>" class="pull-left"><?php echo $img; ?></a>
            <div class="media-body">
                <span class="label label-primary" style="float: left; margin-right: 10px;"><?php echo date('d.m.Y H:i:s', $value->date); ?></span>
                <h5 class="media-heading" style="float: left;"><a href="#" name="comment-<?php echo $value->id; ?>"><?php echo $userName; ?></a>                
                </h5>
                <br clear="all" />
                <?php echo preg_replace( "#\r?\n#", "<br />", $value->text); ?>
                <?php
                $this->widget('application.widgets.AdminBtn', array(
                    'method' => 'modeleCommentList',
                    'data' => array(
                        'moduleName' => 'comment',
                        'id' => $value->id,
                        'moduleCssId' => 'comment-',
                        'edit' => '/altadmin/comment/default/edit/' . $value->id,
                        'delete' => '/altadmin/comment/default/delete'
                    )
                        )
                );
                ?>
            </div>
        </div>

        <div class="" id="newComment"></div>
        <?php
    }
} else {
    echo '<p>' . FrontEditFields::getSettings('CommentSettings', 'empty') . '</p>';
}
?>