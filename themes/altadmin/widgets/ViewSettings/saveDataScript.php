$("#sidebar-collapse").on(ace.click_event, function () {
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=leftMenuCollapse&value=" + $("#sidebar").hasClass("menu-min"),
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
});
});

$('#ace-settings-header').click(function() {
if ($('#ace-settings-header').is(':checked')) {
headerFixed = 1;
} else {
headerFixed = 0;
}                    
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=headerFixed&value=" + headerFixed,
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
});                  
});

$('#ace-settings-sidebar').click(function() {
if ($('#ace-settings-sidebar').is(':checked')) {
leftMenuFixed = 1;
} else {
leftMenuFixed = 0;
}                    
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=leftMenuFixed&value=" + leftMenuFixed,
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
});                  
});

$('#ace-settings-breadcrumbs').click(function() {
if ($('#ace-settings-breadcrumbs').is(':checked')) {
breadcrumbsFixed = 1;
} else {
breadcrumbsFixed = 0;
}                    
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=breadcrumbsFixed&value=" + breadcrumbsFixed,
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
});                  
});

$('#ace-settings-rtl').click(function() {
if ($('#ace-settings-rtl').is(':checked')) {
rtl = 1;
} else {
rtl = 0;
}                    
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=rtl&value=" + rtl,
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
});                  
});

$('#skin-colorpicker').change(function() {
colorSkin = $('#skin-colorpicker').val();
if (colorSkin == '#438EB9') {
skin = 'default';
} else if(colorSkin == '#222A2D') {
skin = 'skin-1';
} else if(colorSkin == '#C6487E') {
skin = 'skin-2';
} else if(colorSkin == '#D0D0D0') {
skin = 'skin-3';
}
$.ajax({
type: "GET",
url: "/altadmin/user/default/setCmsViewSetting",
data: "key=skin&value=" + skin,
success: function(data) {
var obj = $.parseJSON(data);
if (obj.error == 0) {
} else {
}
}
}); 
});