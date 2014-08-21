<?php
$retUrl = explode('/', $data['afterDelete']);
if (count($retUrl) > 1) {
    $i=0;
    $rU = '';
    foreach ($retUrl as $value) {
        if ($i+1<count($retUrl)) {
            $rU .= $value.'/';
        }
        $i++;
    }
} else {
    $rU = '/';
}
?>
<div class="adminBtn">
    <small>
        <a href="<?php echo $data['edit']; ?>" title="редактировать страницу" alt="редактировать" target="_blank"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="#" onclick="deleteRecord(<?php echo $data['id'] ?>); return false;" title="удалить страницу" alt="удалить"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
    </small>
</div>
<script>
    function deleteRecord(id) {
        if (confirm("Удалить страницу? Так же будут удалены все подстраницы!")) {
            $.ajax({
            type: "GET",
            url: '<?php echo $data['delete'] ?>',
            data: "id=" + id,
            success: function(data) {
                var obj = $.parseJSON(data);
                if (obj.success == true) {
                    alert('Запись удалена!');
                    document.location.href = '<?php echo $rU; ?>';
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
