var globalObj = '';
globalObjIco = '';
$(function() {
    $("#" + adminTreeContainerId)
            .jstree({
        "html_data": {
            "ajax": {
                "type": "POST",
                "url": baseUrl + "/altadmin/page/fetchTree",
                "data": function(n) {
                    return {
                        id: n.attr ? n.attr("id") : 0,
                        "YII_CSRF_TOKEN": csrfToken
                    };
                }
            }
        },
        "contextmenu": {'items': {
                "rename": {
                    "label": "Переименовать",
                    "action": function(obj) {
                        this.rename(obj);
                    }
                },
                /*                          
                 "update" : {
                 "label"	: "Update",
                 "action"	: function (obj) {
                 id=obj.attr("id").replace("node_","");
                 $.ajax({
                 type: "POST",
                 url: baseUrl + "/altadmin/page/returnForm",
                 data:{
                 'update_id':  id,
                 "YII_CSRF_TOKEN": csrfToken
                 },
                 'beforeSend' : function(){
                 $("#" + adminTreeContainerId).addClass("ajax-sending");
                 },
                 'complete' : function(){
                 $("#" + adminTreeContainerId).removeClass("ajax-sending");
                 },
                 success: function(data){
                 
                 $.fancybox(data,
                 {    "transitionIn"	:	"elastic",
                 "transitionOut"    :      "elastic",
                 "speedIn"		:	600,
                 "speedOut"		:	200,
                 "overlayShow"	:	false,
                 "hideOnContentClick": false,
                 "onClosed":    function(){
                 } //onclosed function
                 })//fancybox
                 
                 } //success
                 });//ajax
                 
                 }//action function
                 
                 },//update
                 */
                /*
                 "properties" : {
                 "label"	: "Properties",
                 "action" : function (obj) {
                 id=obj.attr("id").replace("node_","")
                 $.ajax({
                 type:"POST",
                 url:baseUrl + "/altadmin/page/returnView",
                 data:   {
                 "id" :id,
                 "YII_CSRF_TOKEN":csrfToken
                 },
                 beforeSend : function(){
                 $("#" + adminTreeContainerId).addClass("ajax-sending");
                 },
                 complete : function(){
                 $("#" + adminTreeContainerId).removeClass("ajax-sending");
                 },
                 success :  function(data){
                 $.fancybox(data,
                 {    "transitionIn"	:	"elastic",
                 "transitionOut"    :      "elastic",
                 "speedIn"		:	600,
                 "speedOut"		:	200,
                 "overlayShow"	:	false,
                 "hideOnContentClick": false,
                 "onClosed":    function(){
                 } //onclosed function
                 })//fancybox
                 
                 } //function
                 
                 
                 
                 });//ajax
                 
                 },
                 "_class"			: "class",	// class is applied to the item LI node
                 "separator_before"	: false,	// Insert a separator before the item
                 "separator_after"	: true	// Insert a separator after the item
                 
                 },//properties
                 */
                "remove": {
                    "label": "Удалить",
                    "action": function(obj) {
                        nodeId = (obj).attr('id');
                        globalObj = nodeId.substr(5)
                        
                        $('#modalDeletePage').modal('show');
                        $('#modalDeletePageName').html((obj).attr('rel'));
                        /*  
                         $('<div class="modal hide fade in" title="Delete Confirmation">\n\
                         <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>\n\
                         Page <span style="color:#FF73B4;font-weight:bold;">'+(obj).attr('rel')+'</span> and all it\'s subcategories will be deleted.Are you sure?</div>')
                         .dialog({
                         resizable: false,
                         height:170,
                         modal: true,
                         buttons: {
                         "Delete": function() {
                         jQuery("#< ?php echo Page::ADMIN_TREE_CONTAINER_ID;? >").jstree("remove",obj);
                         $( this ).dialog( "close" );
                         },
                         Cancel: function() {
                         $( this ).dialog( "close" );
                         }
                         }
                         });*/

                    }
                }, //remove

                "edit_page": {
                    "label": "Редактировать",
                    "action": function(obj) {
                        id = obj.attr("id").replace("node_", "");
                        window.location = "/altadmin/page/edit/" + id;


                    }
                }, //remove

                "create": {
                    "label": "Создать",
                    "action": function(obj) {
                        this.create(obj);
                    },
                    "separator_after": false
                },
//The next two context menu items,add_product and list_products are commented out because they are meaningful only if you have
// a related Product Model (Nested Model HAS MANY Product).

                /*
                 "add_product" : {
                 "label"	: "Add Product",
                 "action" : function (obj) {
                 id=obj.attr("id").replace("node_","")
                 $.ajax({
                 type:"POST",
                 url:baseUrl + "/product/returnProductForm",
                 data:  {
                 "id" :id,
                 "YII_CSRF_TOKEN":csrfToken
                 },
                 beforeSend : function(){
                 $("#" + adminTreeContainerId).addClass("ajax-sending");
                 },
                 complete : function(){
                 $("#" + adminTreeContainerId).removeClass("ajax-sending");
                 },
                 
                 success: function(data){
                 
                 $.fancybox(data,
                 {    "transitionIn"	:	"elastic",
                 "transitionOut"    :      "elastic",
                 "speedIn"		:	600,
                 "speedOut"		:	200,
                 "overlayShow"	:	false,
                 "hideOnContentClick": false,
                 "onClosed":    function(){
                 } //onclosed function
                 })//fancybox
                 
                 } //function
                 
                 });//ajax
                 
                 
                 }
                 //	"separator_before"	: false,	// Insert a separator before the item
                 //	"separator_after"	: false	// Insert a separator after the item
                 },//add product
                 */
                /*
                 "list_products" : {
                 "label"	: "List Products",
                 "action" : function (obj) {
                 id=obj.attr("id").replace("node_","")
                 $.ajax({
                 type:"POST",
                 url:baseUrl + "/product/productList",
                 data:{
                 "id" :id,
                 "YII_CSRF_TOKEN": csrfToken
                 },
                 beforeSend : function(){
                 $("#" + adminTreeContainerId).addClass("ajax-sending");
                 },
                 complete : function(){
                 $("#" + adminTreeContainerId).removeClass("ajax-sending");
                 },
                 success: function(data){
                 $.fancybox(data,
                 {  "transitionIn"	:	"elastic",
                 "transitionOut"    :      "elastic",
                 "speedIn"		:	600,
                 "speedOut"		:	200,
                 "overlayShow"	:	false,
                 "hideOnContentClick": false,
                 "onClosed":    function(){
                 } //onclosed function
                 })//fancybox
                 
                 } //function
                 
                 });//post
                 
                 }
                 
                 }*/
//	"separator_before"	: false,	// Insert a separator before the item
//	"separator_after"	: false	// Insert a separator after the item
            }, //add product

            "list_products": {
                "label": "List Products",
                "action": function(obj) {
                    id = obj.attr("id").replace("node_", "")
                    $.ajax({
                        type: "POST",
                        url: baseUrl + "/product/productList",
                        data: {
                            "id": id,
                            "YII_CSRF_TOKEN": csrfToken
                        },
                        beforeSend: function() {
                            $("#" + adminTreeContainerId).addClass("ajax-sending");
                        },
                        complete: function() {
                            $("#" + adminTreeContainerId).removeClass("ajax-sending");
                        },
                        success: function(data) {
                            $.fancybox(data,
                                    {"transitionIn": "elastic",
                                        "transitionOut": "elastic",
                                        "speedIn": 600,
                                        "speedOut": 200,
                                        "overlayShow": false,
                                        "hideOnContentClick": false,
                                        "onClosed": function() {
                                        } //onclosed function
                                    })//fancybox

                        } //function

                    });//post

                }
//	"separator_before"	: false,	// Insert a separator before the item
//	"separator_after"	: true	// Insert a separator after the item
//	}//list products

            }//items
        }, //context menu

        // the `plugins` array allows you to configure the active plugins on this instance
        //"plugins" : ["themes","html_data","contextmenu","crrm","dnd"],
        "plugins": ["themes", "html_data", "ui", "crrm", "cookies", "dnd", "search", "types", "hotkeys", "contextmenu"],
        // each plugin you have included can have its own config object
        "core": {"initially_open": [openNodes], 'open_parents': false}
        // it makes sense to configure a plugin only if overriding the defaults

    })

            ///EVENTS
            .bind("rename.jstree", function(e, data) {
        $.ajax({
            type: "POST",
            url: baseUrl + "/altadmin/page/rename",
            data: {
                "id": data.rslt.obj.attr("id").replace("node_", ""),
                "new_name": data.rslt.new_name,
                "YII_CSRF_TOKEN": csrfToken
            },
            beforeSend: function() {
                $("#" + adminTreeContainerId).addClass("ajax-sending");
            },
            complete: function() {
                $("#" + adminTreeContainerId).removeClass("ajax-sending");
            },
            success: function(r) {
                response = $.parseJSON(r);
                if (!response.success) {
                    $.jstree.rollback(data.rlbk);
                } else {
                    data.rslt.obj.attr("rel", data.rslt.new_name);
                }
                ;
            }
        });
    })

            .bind("remove.jstree", function(e, data) {
        $.ajax({
            type: "POST",
            url: baseUrl + "/altadmin/page/remove",
            data: {
                "id": data.rslt.obj.attr("id").replace("node_", ""),
                "YII_CSRF_TOKEN": csrfToken
            },
            beforeSend: function() {
                $("#" + adminTreeContainerId).addClass("ajax-sending");
            },
            complete: function() {
                $("#" + adminTreeContainerId).removeClass("ajax-sending");
            },
            success: function(r) {
                response = $.parseJSON(r);


                if (!response.success) {
                    $.jstree.rollback(data.rlbk);
                    //alert(data.rslt.obj.attr("id").replace("node_",""));
                    //alert(response.message);
                    $('#myModalSystem').modal('show');

                }
                ;
            }
        });
    })

            .bind("create.jstree", function(e, data) {
        newname = data.rslt.name;
        parent_id = data.rslt.parent.attr("id").replace("node_", "");
        //alert())
        $.ajax({
            type: "POST",
            url: baseUrl + "/altadmin/page/returnForm",
            //url: "<?php echo $baseUrl;?>/altadmin/page/create",
            data: {'name': newname,
                'parent_id': parent_id,
                "YII_CSRF_TOKEN": csrfToken
            },
            beforeSend: function() {
                $("#" + adminTreeContainerId).addClass("ajax-sending");
            },
            complete: function() {
                $("#" + adminTreeContainerId).removeClass("ajax-sending");
            },
            success: function(data) {
                adminAnswer = $.parseJSON(data);
                if (adminAnswer.success == true) {
                    window.location = "/altadmin/page/edit/" + adminAnswer.id;
                } else {
                    $.fancybox(adminAnswer.message,
                            {"transitionIn": "elastic",
                                "transitionOut": "elastic",
                                "speedIn": 600,
                                "speedOut": 200,
                                "overlayShow": false,
                                "hideOnContentClick": false,
                                "onClosed": function() {
                                } //onclosed function
                            })
                }

/*
                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "onClosed": function() {
                            } //onclosed function
                        })//fancybox
                         */

            } //success
        });//ajax

    })
            .bind("move_node.jstree", function(e, data) {
        data.rslt.o.each(function(i) {

            //jstree provides a whole  bunch of properties for the move_node event
            //not all are needed for this view,but they are there if you need them.
            //Commented out logs  are for debugging and exploration of jstree.

            next = jQuery.jstree._reference('#' + adminTreeContainerId)._get_next(this, true);
            previous = jQuery.jstree._reference('#' + adminTreeContainerId)._get_prev(this, true);

            pos = data.rslt.cp;
            moved_node = $(this).attr('id').replace("node_", "");
            next_node = next != false ? $(next).attr('id').replace("node_", "") : false;
            previous_node = previous != false ? $(previous).attr('id').replace("node_", "") : false;
            new_parent = $(data.rslt.np).attr('id').replace("node_", "");
            old_parent = $(data.rslt.op).attr('id').replace("node_", "");
            ref_node = $(data.rslt.r).attr('id').replace("node_", "");
            ot = data.rslt.ot;
            rt = data.rslt.rt;
            copy = typeof data.rslt.cy != 'undefined' ? data.rslt.cy : false;
            copied_node = (typeof $(data.rslt.oc).attr('id') != 'undefined') ? $(data.rslt.oc).attr('id').replace("node_", "") : 'UNDEFINED';
            new_parent_root = data.rslt.cr != -1 ? $(data.rslt.cr).attr('id').replace("node_", "") : 'root';
            replaced_node = (typeof $(data.rslt.or).attr('id') != 'undefined') ? $(data.rslt.or).attr('id').replace("node_", "") : 'UNDEFINED';


//                      console.log(data.rslt);
//                      console.log(pos,'POS');
//                      console.log(previous_node,'PREVIOUS NODE');
//                      console.log(moved_node,'MOVED_NODE');
//                      console.log(next_node,'NEXT_NODE');
//                      console.log(new_parent,'NEW PARENT');
//                      console.log(old_parent,'OLD PARENT');
//                      console.log(ref_node,'REFERENCE NODE');
//                      console.log(ot,'ORIGINAL TREE');
//                      console.log(rt,'REFERENCE TREE');
//                      console.log(copy,'IS IT A COPY');
//                      console.log( copied_node,'COPIED NODE');
//                      console.log( new_parent_root,'NEW PARENT INCLUDING ROOT');
//                      console.log(replaced_node,'REPLACED NODE');


            $.ajax({
                async: false,
                type: 'POST',
                url: baseUrl + "/altadmin/page/moveCopy",
                data: {
                    "moved_node": moved_node,
                    "new_parent": new_parent,
                    "new_parent_root": new_parent_root,
                    "old_parent": old_parent,
                    "pos": pos,
                    "previous_node": previous_node,
                    "next_node": next_node,
                    "copy": copy,
                    "copied_node": copied_node,
                    "replaced_node": replaced_node,
                    "YII_CSRF_TOKEN": csrfToken
                },
                beforeSend: function() {
                    $("#" + adminTreeContainerId).addClass("ajax-sending");
                },
                complete: function() {
                    $("#" + adminTreeContainerId).removeClass("ajax-sending");
                },
                success: function(r) {
                    response = $.parseJSON(r);
                    if (!response.success) {
                        $.jstree.rollback(data.rlbk);
                        alert(response.message);
                    }
                    else {
                        //if it's a copy
                        if (data.rslt.cy) {
                            $(data.rslt.oc).attr("id", "node_" + response.id);
                            if (data.rslt.cy && $(data.rslt.oc).children("UL").length) {
                                data.inst.refresh(data.inst._get_parent(data.rslt.oc));
                            }
                        }
                        //  console.log('OK');
                    }

                }
            }); //ajax



        });//each function
    });   //bind move event

    ;//JSTREE FINALLY ENDS (PHEW!)

//BINDING EVENTS FOR THE ADD ROOT AND REFRESH BUTTONS.
    $("#add_root").click(function() {
        $.ajax({
            type: 'POST',
            url: baseUrl + "/altadmin/page/returnForm",
            data: {
                "create_root": true,
                "YII_CSRF_TOKEN": csrfToken
            },
            beforeSend: function() {
                $("#" + adminTreeContainerId).addClass("ajax-sending");
            },
            complete: function() {
                $("#" + adminTreeContainerId).removeClass("ajax-sending");
            },
            success: function(data) {

                $.fancybox(data,
                        {"transitionIn": "elastic",
                            "transitionOut": "elastic",
                            "speedIn": 600,
                            "speedOut": 200,
                            "overlayShow": false,
                            "hideOnContentClick": false,
                            "onClosed": function() {
                            } //onclosed function
                        })//fancybox

            } //function

        });//post
    });//click function

    $("#reload").click(function() {
        jQuery("#" + adminTreeContainerId).jstree("refresh");
    });
});


//$('#test').onclick(function() { alert ('123');});
