<!-- Окно с подтверждением удаления страницы -->
<div id="modalDeletePage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-norm-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-trash icon-animated-hand-pointer blue"></i> Удалить?</h3>
    </div>
    <div class="modal-body">
        <p>Вы действительно хотите удалить страницу <span class="label label-info" id="modalDeletePageName"></span> и все ее подразделы?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Нет, это была случайность</button>
        <button class="btn btn-primary" id="test" onclick="modalDeletePage();">Да, удалить</button>
    </div>
</div>

<!-- Сообщение о том что это системная страница и ее нельзя удалить -->
<div id="myModalSystem" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-error-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-bolt icon-animated-hand-pointer red"></i> Ошибка!</h3>
    </div>
    <div class="modal-body">
        <p>Нельзя удалить системный раздел!</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>    
    </div>
</div>

<!-- Сообщение о том что страница успешно удалена -->
<div id="myModalSuccess" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header modal-success-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel"><i class="icon-ok icon-animated-hand-pointer green"></i> Успех!</h3>
    </div>
    <div class="modal-body">
        <p>Страница успешно удалена!</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Продолжить</button>    
    </div>
</div>

<script>
            function modalConfirmedDeletePage(id, name) {
                globalObj = id;
                $('#modalDeletePage').modal('show');
                $('#modalDeletePageName').html(name);
            }

            function modalDeletePage() {
                $.ajax({
                    type: "GET",
                    url: baseUrl + "/altadmin/page/remove",
                    data: {
                        "id": globalObj,
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
                            //$.jstree.rollback(globalObj);
                            $('#myModalSystem').modal('show');
                        } else {
                            $('#myModalSuccess').modal('show');
                            $('#node_' + globalObj).hide();
                        }
                    }
                });
                $('#modalDeletePage').modal('hide');
            }
</script>