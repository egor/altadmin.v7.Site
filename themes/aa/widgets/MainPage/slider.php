<!-- Slider -->
<div class="slider">
    <div class="container">
        <div class="row">
            <div class="span10 offset1">
                <div class="flexslider">
                    <ul class="slides">

                        <?php
                        foreach ($model as $value) {
                            ?>
                            <li data-thumb="/images/slider/mainPage/<?php echo $value->image; ?>">
                                <img src="/images/slider/mainPage/<?php echo $value->image; ?>">
                                <p class="flex-caption"><?php echo $value->text; ?></p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>