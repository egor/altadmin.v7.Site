<!-- navigation -->
<nav class="footer-nav">
    <ul>
        <?php
        $path = explode('?', Yii::app()->request->getRequestUri());
        $path = explode('/', $path[0]);
        foreach ($menu as $value) {
            echo '<li '.(in_array($value->url, $path) || $value->url == 'main' && $path[1]=='' ? 'class="active"' : '').'><a href="/' . ($value->url == 'main' ? '' : $value->url) . '">'.$value->menuName.'</a></li>';
        }
        ?>
    </ul>
</nav>
<!-- end of navigation -->