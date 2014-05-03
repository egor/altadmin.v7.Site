<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Project name</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <?php
                        $path = explode('?', Yii::app()->request->getRequestUri());
                        $path = explode('/', $path[0]);
                        foreach ($menu as $value) {
                            echo '<li ' . (in_array($value->url, $path) || $value->url == 'main' && $path[1] == '' ? 'class="active"' : '') . '><a href="/' . ($value->url == 'main' ? '' : $value->url) . '">' . $value->menuName . '</a></li>';
                        }
                        ?>                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>