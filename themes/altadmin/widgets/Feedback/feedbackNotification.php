<li class="green">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="icon-envelope icon-animated-vertical"></i>
        <span class="badge badge-success"><?php echo $count; ?></span>
    </a>

    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
        <li class="nav-header">
            <i class="icon-envelope-alt"></i>
            <?php echo Yii::t('app', '{n} Сообщение|{n} Сообщения|{n} Сообщений', $count); ?>
        </li>

        <?php
        foreach ($model as $value) {
            ?>
        <li>
            <a href="/altadmin/widget/feedback/detail/<?php echo $value->id; ?>">
                <img src="/images/user/default.jpg" class="msg-photo" alt="" />
                <span class="msg-body">
                    <span class="msg-title">
                        <span class="blue"><?php echo StringOperations::cutString($value->name, 20, '...'); ?>:</span>
                        <?php echo StringOperations::cutString($value->text, 40, '...'); ?>
                    </span>
                    <span class="msg-time">
                        <i class="icon-time"></i>
                        <span><?php echo date('d.m.Y H:i:s', $value->date); ?></span>
                    </span>
                </span>
            </a>
        </li>
        <?php
        }
        ?>
        <li>
            <a href="/altadmin/widget/feedback/index">
                Все сообщения <?php echo ($count > $limit ? '(+' . ($count - $limit) . ')' : ''); ?>
                <i class="icon-arrow-right"></i>
            </a>
        </li>
    </ul>
</li>