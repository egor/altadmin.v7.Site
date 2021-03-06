jQuery(function () {
    handle_side_menu();
    enable_search_ahead();
    general_things();
    widget_boxes()
});

function handle_side_menu() {
    $("#menu-toggler").on(ace.click_event, function () {
        $("#sidebar").toggleClass("display");
        $(this).toggleClass("display");
        return false
    });
    var b = $("#sidebar").hasClass("menu-min");
    $("#sidebar-collapse").on(ace.click_event, function () {
        $("#sidebar").toggleClass("menu-min");
        $(this).find('[class*="icon-"]:eq(0)').toggleClass("icon-double-angle-right");
        b = $("#sidebar").hasClass("menu-min");
        if (b) {
            $(".open > .submenu").removeClass("open")
        }
    });
    var a = "ontouchend" in document;
    $(".nav-list").on(ace.click_event, function (g) {
        var f = $(g.target).closest("a");
        if (!f || f.length == 0) {
            return
        }
        if (!f.hasClass("dropdown-toggle")) {
            if (b && ace.click_event == "tap" && f.get(0).parentNode.parentNode == this) {
                var h = f.find(".menu-text").get(0);
                if (g.target != h && !$.contains(h, g.target)) {
                    return false
                }
            }
            return
        }
        var d = f.next().get(0);
        if (!$(d).is(":visible")) {
            var c = $(d.parentNode).closest("ul");
            if (b && c.hasClass("nav-list")) {
                return
            }
            c.find("> .open > .submenu").each(function () {
                if (this != d && !$(this.parentNode).hasClass("active")) {
                    $(this).slideUp(200).parent().removeClass("open")
                }
            })
        } else {} if (b && $(d.parentNode.parentNode).hasClass("nav-list")) {
            return false
        }
        $(d).slideToggle(200).parent().toggleClass("open");
        return false
    })
}

function enable_search_ahead() {
    $("#nav-search-input").typeahead({
        source: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York", "North Dakota", "North Carolina", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"],
        updater: function (a) {
            $("#nav-search-input").focus();
            return a
        }
    })
}

function general_things() {
    $('.ace-nav [class*="icon-animated-"]').closest("a").on("click", function () {
        var b = $(this).find('[class*="icon-animated-"]').eq(0);
        var a = b.attr("class").match(/icon\-animated\-([\d\w]+)/);
        b.removeClass(a[0]);
        $(this).off("click")
    });
    $(".nav-list .badge[title],.nav-list .label[title]").tooltip({
        placement: "right"
    });
    $("#ace-settings-btn").on(ace.click_event, function () {
        $(this).toggleClass("open");
        $("#ace-settings-box").toggleClass("open")
    });
    $("#ace-settings-header").removeAttr("checked").on("click", function () {
        if (!this.checked) {
            if ($("#ace-settings-sidebar").get(0).checked) {
                $("#ace-settings-sidebar").click()
            }
        }
        $(".navbar").toggleClass("navbar-fixed-top");
        $(document.body).toggleClass("navbar-fixed")
    });
    $("#ace-settings-sidebar").removeAttr("checked").on("click", function () {
        if (this.checked) {
            if (!$("#ace-settings-header").get(0).checked) {
                $("#ace-settings-header").click()
            }
        } else {
            if ($("#ace-settings-breadcrumbs").get(0).checked) {
                $("#ace-settings-breadcrumbs").click()
            }
        }
        $("#sidebar").toggleClass("fixed")
    });
    $("#ace-settings-breadcrumbs").removeAttr("checked").on("click", function () {
        if (this.checked) {
            if (!$("#ace-settings-sidebar").get(0).checked) {
                $("#ace-settings-sidebar").click()
            }
        }
        $("#breadcrumbs").toggleClass("fixed");
        $(document.body).toggleClass("breadcrumbs-fixed")
    });
    $("#ace-settings-rtl").removeAttr("checked").on("click", function () {
        switch_direction()
    });
    $("#btn-scroll-up").on(ace.click_event, function () {
        var a = Math.max(100, parseInt($("html").scrollTop() / 3));
        $("html,body").animate({
            scrollTop: 0
        }, a);
        return false
    });
    $("#skin-colorpicker").ace_colorpicker().on("change", function () {
        var b = $(this).find("option:selected").data("class");
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
    })
}

function widget_boxes() {
    $(".page-content").delegate(".widget-toolbar > [data-action]", "click", function (k) {
        k.preventDefault();
        var j = $(this);
        var l = j.data("action");
        var a = j.closest(".widget-box");
        if (a.hasClass("ui-sortable-helper")) {
            return
        }
        if (l == "collapse") {
            var d = a.find(".widget-body");
            var i = j.find("[class*=icon-]").eq(0);
            var e = i.attr("class").match(/icon\-(.*)\-(up|down)/);
            var b = "icon-" + e[1] + "-down";
            var f = "icon-" + e[1] + "-up";
            var h = d.find(".widget-body-inner");
            if (h.length == 0) {
                d = d.wrapInner('<div class="widget-body-inner"></div>').find(":first-child").eq(0)
            } else {
                d = h.eq(0)
            }
            var c = 300;
            var g = 200;
            if (a.hasClass("collapsed")) {
                if (i) {
                    i.addClass(f).removeClass(b)
                }
                a.removeClass("collapsed");
                d.slideUp(0, function () {
                    d.slideDown(c)
                })
            } else {
                if (i) {
                    i.addClass(b).removeClass(f)
                }
                d.slideUp(g, function () {
                    a.addClass("collapsed")
                })
            }
        } else {
            if (l == "close") {
                var n = parseInt(j.data("close-speed")) || 300;
                a.hide(n, function () {
                    a.remove()
                })
            } else {
                if (l == "reload") {
                    j.blur();
                    var m = false;
                    if (a.css("position") == "static") {
                        m = true;
                        a.addClass("position-relative")
                    }
                    a.append('<div class="widget-box-layer"><i class="icon-spinner icon-spin icon-2x white"></i></div>');
                    setTimeout(function () {
                        a.find(".widget-box-layer").remove();
                        if (m) {
                            a.removeClass("position-relative")
                        }
                    }, parseInt(Math.random() * 1000 + 1000))
                } else {
                    if (l == "settings") {}
                }
            }
        }
    })
}

function switch_direction() {
    var c = $(document.body);
    c.toggleClass("rtl").find(".dropdown-menu:not(.datepicker-dropdown,.colorpicker)").toggleClass("pull-right").end().find('.pull-right:not(.dropdown-menu,blockquote,.dropdown-submenu,.profile-skills .pull-right,.control-group .controls > [class*="span"]:first-child)').removeClass("pull-right").addClass("tmp-rtl-pull-right").end().find(".pull-left:not(.dropdown-submenu,.profile-skills .pull-left)").removeClass("pull-left").addClass("pull-right").end().find(".tmp-rtl-pull-right").removeClass("tmp-rtl-pull-right").addClass("pull-left").end().find(".chzn-container").toggleClass("chzn-rtl").end().find('.control-group .controls > [class*="span"]:first-child').toggleClass("pull-right").end();

    function a(g, f) {
        c.find("." + g).removeClass(g).addClass("tmp-rtl-" + g).end().find("." + f).removeClass(f).addClass(g).end().find(".tmp-rtl-" + g).removeClass("tmp-rtl-" + g).addClass(f)
    }

    function b(g, f, h) {
        h.each(function () {
            var j = $(this);
            var i = j.css(f);
            j.css(f, j.css(g));
            j.css(g, i)
        })
    }
    a("align-left", "align-right");
    a("arrowed", "arrowed-right");
    a("arrowed-in", "arrowed-in-right");
    var d = $("#piechart-placeholder");
    if (d.size() > 0) {
        var e = $(document.body).hasClass("rtl") ? "nw" : "ne";
        d.data("draw").call(d.get(0), d, d.data("chart"), e)
    }
};