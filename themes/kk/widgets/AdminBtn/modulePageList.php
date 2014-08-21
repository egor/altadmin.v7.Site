<div class="adminBtn">
    <small>
        <a href="<?php echo $data['edit']; ?>" title="редактировать страницу" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" onclick="deleteRecord(<?php echo $data['id'] ?>); return false;" title="удалить страницу" alt="удалить"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
    </small>
</div>
<script>
    function deleteRecord(id) {
        if (confirm("Удалить страницу? Так же будут удалены все подстраницы!<?php echo $this->data['moduleCssId'] ?>"+id)) {
            $.ajax({
            type: "GET",
            url: '<?php echo $data['delete'] ?>',
            data: "id=" + id,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.success == true) {
                    //alert('Запись удалена!');
                    $('#<?php echo $this->data['moduleCssId'] ?>'+id).hide(500);
                    //document.location.href = '<?php echo $data['afterDelete']; ?>';
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
