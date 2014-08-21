<div class="gallery-block">
    <?php
    foreach ($gallery as $value) {
        ?>
        <div class="col-xs-6 col-md-3">
            <a href="/images/gallery/real/<?php echo $value->image; ?>" data-lightbox="example-set" data-title="<?php echo $value->imageTitle; ?>" class="thumbnail">
                <?php
                echo '<img src="/images/gallery/big/' . $value->image . '" alt="' . $value->imageAlt . '" title="' . $value->imageAlt . '" with="180px" height="180px" />';            
            ?>
        </a>
    </div>
    <?php } ?>
</div>