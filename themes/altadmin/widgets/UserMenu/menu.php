<li class="light-blue">
    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
        <img class="nav-user-photo" src="<?php echo $userImage; ?>" alt="Jason's Photo" />
        <span class="user-info">
            <small>Добропожаловать,</small>
            <?php echo Yii::app()->user->title; ?>
        </span>

        <i class="icon-caret-down"></i>
    </a>

    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
        <li>
            <a href="#">
                <i class="icon-cog"></i>
                Настройки
            </a>
        </li>

        <li>
            <a href="/altadmin/user/default/edit/<?php echo Yii::app()->user->uid; ?>">
                <i class="icon-user"></i>
                Профиль
            </a>
        </li>

        <li class="divider"></li>

        <li>
            <a href="/site/logout">
                <i class="icon-off"></i>
                Выход
            </a>
        </li>
    </ul>
</li>