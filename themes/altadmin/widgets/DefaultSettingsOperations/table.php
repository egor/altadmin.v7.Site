<?php
if ($data) {
    ?>
    <form id="formTable">
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>            
            <td><i class="icon-key"></i> Ключ</td>
            <td><i class="icon-font"></i> Название</td>
            <td><i class="icon-fire"></i> Значение</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $value) {
            ?>
            <tr id="tr-<?php echo $value->id; ?>">
                <td><small><a href="<?php echo $linkToEdit.$value->id; ?>" title="Редактировать" rel="tooltip"><?php echo $value->key; ?></a></small></td>
                <td><?php echo $value->name; ?></td>
                <td><?php echo $value->value; ?></td>
                <td>
                    <nobr>
                        <a href="<?php echo $linkToEdit.$value->id; ?>" title="Редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;
                    </nobr>
                </td>
        </tr>   
        <?php
    }
    ?>
        </tbody>
    </table>
    </form>
    <?php
} else {
    echo '<p>Пусто</p>';
}