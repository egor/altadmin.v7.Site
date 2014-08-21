<!--============================== slider =================================-->
<div class="flexslider">
    <ul class="slides">
        <?php
        foreach ($model as $value) {
            ?>
            <li> <img src="/images/slider/mainPage/<?php echo $value->image; ?>" alt="" style="width: 770px; height: 393px;"> </li>
                <?php
            }
            ?>
    </ul>
</div>