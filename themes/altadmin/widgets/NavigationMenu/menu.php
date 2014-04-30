<ul class="nav nav-list">
    <?php
    foreach ($data as $value) {
        echo '<li ' . ($value['class'] ? 'class="' . $value['class'] . '"' : '') . '>';
        echo '<a href="/altadmin/' . $value['url'] . '" ' . ($value['subMenu'] ? 'class="dropdown-toggle"' : '') . '>
                ' . ($value['ico'] ? '<i class="' . $value['ico'] . '"></i>' : '') . '
                <span class="menu-text"> ' . $value['title'] . ' </span>
                    ' . ($value['subMenu'] ? '<b class="arrow icon-angle-down"></b>' : '') . '
                    </a>';
        if ($value['subMenu']) {
            echo '<ul class="submenu">';
            foreach ($value['subMenu'] as $level2) {
                echo '<li ' . ($level2['class'] ? 'class="' . $level2['class'] . '"' : '') . '>
                    <a href="/altadmin/' . $value['url'] . '/' . $level2['url'] . '" ' . ($level2['subMenu'] ? 'class="dropdown-toggle"' : '') . '>
                    ' . ($level2['ico'] ? '<i class="' . $level2['ico'] . '"></i>' : '') . '
                    ' . $level2['title'] . '
                        ' . ($level2['subMenu'] ? '<b class="arrow icon-angle-down"></b>' : '') . '
                        
                    </a>';
                if ($level2['subMenu']) {
                    echo '<ul class="submenu">';
                    foreach ($level2['subMenu'] as $level3) {
                        echo '<li ' . ($level3['class'] ? 'class="' . $level3['class'] . '"' : '') . '>
                    <a href="/altadmin/' . $value['url'] . '/' . $level2['url'] . '/' . $level3['url'] . '">
                    ' . ($level3['ico'] ? '<i class="' . $level3['ico'] . '"></i>' : '') . '
                    ' . $level3['title'] . '
                    </a>
                </li>';
                    }
                    echo '</ul>';
                }
                echo '
                </li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
    ?>    
</ul><!--/.nav-list-->