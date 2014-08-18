<?php
///////////////////////////////////////////////////////////
if ($this->cmsViewSettings->getSetting('leftMenuCollapse')) {
    ?>


                    $("#sidebar").toggleClass("menu-min");
                    $(this).find('[class*="icon-"]:eq(0)').toggleClass("icon-double-angle-right");
                    b = $("#sidebar").hasClass("menu-min");
                    if (b) {
                        $(".open > .submenu").removeClass("open");
                        //$(".sidebar-collapse i").removeClass("icon-double-angle-left");
                        $(".sidebar-collapse i").addClass("icon-double-angle-right");
                    }

    <?php
}
if ($this->cmsViewSettings->getSetting('headerFixed')) {
    ?>
                    $("#ace-settings-header").click();
    <?php
}
if ($this->cmsViewSettings->getSetting('leftMenuFixed')) {
?>
        $("#ace-settings-sidebar").click();
        <?php
}
if ($this->cmsViewSettings->getSetting('breadcrumbsFixed')) {
    ?>
            $("#ace-settings-breadcrumbs").click();
            <?php
}
if ($this->cmsViewSettings->getSetting('rtl')) {
    ?>
    $("#ace-settings-rtl").click();
    <?php
}
?>
        
var b = '<?php echo $this->cmsViewSettings->getSetting('skin'); ?>';
var a = $(document.body);
a.removeClass("skin-1 skin-2 skin-3");
if (b != "default") {
a.addClass(b)
}
if (b == "skin-1") {
$(".ace-nav > li.grey").addClass("dark")
} else {
$(".ace-nav > li.grey").removeClass("dark")
} if (b == "skin-2") {
$(".ace-nav > li").addClass("no-border margin-1");
$(".ace-nav > li:not(:last-child)").addClass("light-pink").find('> a > [class*="icon-"]').addClass("pink").end().eq(0).find(".badge").addClass("badge-warning")
} else {
$(".ace-nav > li").removeClass("no-border margin-1");
$(".ace-nav > li:not(:last-child)").removeClass("light-pink").find('> a > [class*="icon-"]').removeClass("pink").end().eq(0).find(".badge").removeClass("badge-warning")
} if (b == "skin-3") {
$(".ace-nav > li.grey").addClass("red").find(".badge").addClass("badge-yellow")
} else {
$(".ace-nav > li.grey").removeClass("red").find(".badge").removeClass("badge-yellow")
}