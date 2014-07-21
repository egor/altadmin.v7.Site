<div class="row-fluid">
    <div class="position-relative">        
        <div id="forgot-box" class="forgot-box widget-box no-border visible">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header red lighter bigger">
                        <i class="icon-key"></i>
                        Восстановление пароля
                    </h4>

                    <div class="space-6"></div>
                    <?php    
                    echo $info;
                    ?>
                </div><!--/widget-main-->

                <div class="toolbar center">
                    <a href="/altadmin" class="back-to-login-link">
                        Вернуться к авторизации
                        <i class="icon-arrow-right"></i>
                    </a>
                </div>
            </div><!--/widget-body-->
        </div><!--/forgot-box-->

        <?php echo $content; ?>

    </div><!--/position-relative-->
</div>