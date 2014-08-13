<div class="row-fluid">
    <div class="position-relative">
        <div id="login-box" class="login-box widget-box no-border visible">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header blue lighter bigger">
                        <i class="icon-coffee green"></i>
                        Смена пароля
                    </h4>

                    <div class="space-6"></div>

                    <?php
                    if ($status === true) {
                        echo '<p>Пароль успешно изменен.</p>';
                    } else {
                        echo '<p>Ошибка при смене пароля</p>';
                    }
                    ?>
                    <div class="social-or-login center">
                        <span class="bigger-110"></span>
                    </div>

                </div><!--/widget-main-->

                <div class="toolbar clearfix">
                    <div>
                        <a href="/altadmin" class="forgot-password-link">
                            <i class="icon-arrow-left"></i>
                            К авторизации
                        </a>
                    </div>
                </div>
            </div><!--/widget-body-->
        </div><!--/login-box-->        
    </div><!--/position-relative-->
</div>