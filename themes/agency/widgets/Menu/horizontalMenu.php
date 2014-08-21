<div id="main-nav">
    <div class="nav-collapse collapse">
        <ul class="nav">
            <?php
            $path = explode('?', Yii::app()->request->getRequestUri());
            $path = explode('/', $path[0]);
            foreach ($menu as $value) {
                echo '<li ' . (in_array($value->url, $path) || $value->url == 'main' && $path[1] == '' ? 'class="active"' : '') . '><a href="/' . ($value->url == 'main' ? '' : $value->url) . '">' . $value->menuName . '</a>';
                $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/edit/' . $value->id)));
                echo '</li>';
            }
            ?>
            <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditLi', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/index', 'title' => 'редактировать меню', 'alt' => 'редактировать меню'))); ?>
        </ul>
    </div>
</div>
