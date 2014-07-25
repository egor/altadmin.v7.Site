<div class="adminBtn">
    <small>
        <a href="/altadmin/blog/default/edit/<?php echo $data['id'] ?>" title="редактировать запись блога" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" title="удалить запись блога" alt="удалить" onclick="deleteRecord(<?php echo $data['id'] ?>);
                return false;"><span class="glyphicon glyphicon-remove"></span></a>
    </small>
</div>
<script>
    function deleteRecord(id) {
        if (confirm("Удалить запись блога?")) {
            $.ajax({
            type: "GET",
            url: '/altadmin/blog/default/delete',
            data: "id=" + id,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    $('#blogRecord-'+id).hide(500);
                } else {
                    alert('Ошибка при удалении!');
                }
            },
            error: function() {
                alert('Ошибка при удалении!');
            }
        });
            
        }
    }
</script>
    <?php
