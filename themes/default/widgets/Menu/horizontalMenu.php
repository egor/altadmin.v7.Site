<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">    
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ALT studio</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php
                $path = explode('?', Yii::app()->request->getRequestUri());
                $path = explode('/', $path[0]);
                foreach ($menu as $value) {
                    echo '<li ' . (in_array($value->url, $path) || $value->url == 'main' && $path[1] == '' ? 'class="active"' : '') . '><a href="/' . ($value->url == 'main' ? '' : $value->url) . '">' . $value->menuName . '</a>';
                    $this->widget('application.widgets.AdminBtn', array('method' => 'moduleEditField', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/edit/' . $value->id)));
                    echo '</li>';
                }
                ?>
                <?php $this->widget('application.widgets.AdminBtn', array('method' => 'moduleSettingsLi', 'data' => array('moduleName' => 'menu', 'edit' => '/altadmin/page/index', 'title' => 'редактировать меню', 'alt' => 'редактировать меню'))); ?>
            </ul>
        </div>
    </div>
</div>