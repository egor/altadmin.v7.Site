<div class="adminBtn">
    <small>
        <a href="<?php echo $data['edit']; ?>" title="редактировать запись блога" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" onclick="deleteRecord(<?php echo $data['id'] ?>); return false;" title="удалить запись блога" alt="удалить"><span class="glyphicon glyphicon-remove"></span></a>
    </small>
</div>
<script>
    function deleteRecord(id) {
        if (confirm("Удалить запись?")) {
            $.ajax({
            type: "GET",
            url: '<?php echo $data['delete'] ?>',
            data: "id=" + id,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.error == 0) {
                    alert('Запись удалена!');
                    document.location.href = '/<?php echo Yii::app()->params['altadmin']['modules'][$this->data['moduleName']]['baseUrl']; ?>';
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
