<div class="adminBtn">
    <small>
        <a href="<?php echo $data['edit']; ?>" title="редактировать запись" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" title="удалить запись" alt="удалить" onclick="deleteRecord(<?php echo $data['id'] ?>);
                return false;"><span class="glyphicon glyphicon-remove"></span></a>
    </small>
</div>
<script>
    function deleteRecord(id) {
        if (confirm("Удалить запись?")) {
            $.ajax({
            type: "GET",
            url: '<?php echo $data['delete']; ?>',//'/altadmin/<?php echo $this->data['moduleName'] ?>/default/delete',
            data: "id=" + id,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    $('#<?php echo $this->data['moduleCssId'] ?>'+id).hide(500);
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
