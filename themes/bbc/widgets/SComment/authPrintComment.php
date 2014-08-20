<h2>Комментрии</h2>
<?php
if ($model) {
    foreach ($model as $value) {
        $img = '<img data-src="holder.js/100x100" class="media-object">';

        if ($value->user) {
            $userName = $value->user->name . ' ' . $value->user->surname;
            if ($value->user->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/user/list/' . $value->user->image)) {
                $img = '<img src="/images/user/list/' . $value->user->image . '" class="media-object">';
            }
        } else {
            $userName = $value->userName;
        }
        ?>
        <div class="media" id="comment-<?php echo $value->id; ?>">
            <a href="<?php echo $url; ?>" class="pull-left"><?php echo $img; ?></a>
            <div class="media-body">
                <span class="label label-primary" style="float: left; margin-right: 10px;"><?php echo date('d.m.Y', $value->date); ?></span>
                <h5 class="media-heading" style="float: left;"><a href="#" name="comment-<?php echo $value->id; ?>"><?php echo $userName; ?></a>                
                </h5>
                <br clear="all" />
                <?php echo $value->text; ?>
                <?php
                $this->widget('application.widgets.AdminBtn', array(
                    'method' => 'modeleCommentList',
                    'data' => array(
                        'moduleName' => 'blog',
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
    ?>
    Нет комментриев, Вы можете быть первым!
    <?php
}