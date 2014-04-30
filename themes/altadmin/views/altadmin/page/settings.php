<?php
/* @var $this NewsWidgetSettingsController */

$this->breadcrumbs = array(
    'Страницы' => '/altadmin',
    'Настройки' => '/altadmin',
    $this->breadcrumbsTitle,
);
?>
<?php
if ($model) {
    ?>
    <table class="table table-hover">
        <tr>
            <td><a rel="tooltip" title="ключ" rel=""><i class="icon-tags"></i></a></td>
            <td><a rel="tooltip" title="описание"><i class="icon-comment"></i></a></td>
            <td><a rel="tooltip" title="значение"><i class="icon-text-width"></i></a></td>
            <td></td>
        </tr>
        <?php
        foreach ($model as $value) {
            ?>
            <tr id="tr-<?php echo $value->id; ?>">
                <td><small><?php echo $value->key; ?></small></td>
                <td><a href="/altadmin/page/settingsEdit/<?php echo $value->id; ?>" title="редактировать" rel="tooltip"><?php echo $value->name; ?></a></td>
                <td><?php echo ($value->type == 'checkbox' ? ($value->value == 1 ? 'Да' : 'Нет') : $value->value); ?></td>        
                <td><nobr>
                <a href="/altadmin/page/settingsEdit/<?php echo $value->id; ?>" title="редактировать" rel="tooltip"><i class="icon-pencil"></i></a>&nbsp;
            </nobr></td>
        </tr>          
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo '<p>Пусто :(</p>';
}