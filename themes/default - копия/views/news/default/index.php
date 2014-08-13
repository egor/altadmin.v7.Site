<section class="post">    
    <ul class="news-list">
        <?php
        foreach ($model as $value) {
            $url = '/'. Yii::app()->params['altadmin']['modules']['news']['baseUrl'] . '/' . $value->url;
            $img = '';
            if ($value->image && file_exists(Yii::getPathOfAlias('webroot') . '/images/news/list/'.$value->image)) {
                $img = '<div class="news-list-img"><a href="'.$url.'"><img src="/images/news/list/'.$value->image.'" /></a></div>';
            }
            ?>
        <li>
            <h2><a href="<?php echo $url; ?>"><?php echo $value->menuName; ?></a></h2>
            <?php echo $img; ?>
            <?php echo $value->shortText; ?>
            <br clear="all"/>
            <a class="more-news" href="<?php echo $url; ?>">подробнее...</a>
        </li>
        <?php           
        }
        ?>
    </ul>
    <div class="cl">&nbsp;</div>
</section>