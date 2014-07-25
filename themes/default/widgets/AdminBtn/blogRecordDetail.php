<div class="adminBtn">
    <small>
        <a href="/altadmin/blog/default/edit/<?php echo $data['id'] ?>" title="редактировать запись блога" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" onclick="deleteRecord(<?php echo $data['id'] ?>); return false;" title="удалить запись блога" alt="удалить"><span class="glyphicon glyphicon-remove"></span></a>
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
                    alert('Запись удалена!');
                    document.location.href = '/blog';
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
