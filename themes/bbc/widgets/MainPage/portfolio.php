<!-- Our Work Section -->
<div id="work" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Портфолио</h2>                    
                </div>
            </div>
        </div>
        <!-- End Title Page -->

        <!-- Portfolio Projects -->

        <div class="row">
            <div class="span3">
                <!-- Filter -->
                <nav id="options" class="work-nav">
                    <ul id="filters" class="option-set" data-option-key="filter">
                        <li class="type-work">Типы работ</li>
                        <li><a href="#filter" data-option-value="*" class="selected">Все работы</a></li>
                        <?php
                        foreach ($section as $value) {
                            echo '<li><a href="#filter" data-option-value=".' . $value->url . '">' . $value->menuName . '</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
                <!-- End Filter -->
            </div>

            <div class="span9">
                <div class="row">
                    <section id="projects">
                        <ul id="thumbs">

                            <?php
                            foreach ($portfolio as $value) {

                                $imgDetail = Yii::app()->theme->baseUrl . '/images/work/full/image-01-full.jpg';
                                if (!empty($value->imageDetail) && file_exists(Yii::getPathOfAlias('webroot') . '/images/portfolio/detail/' . $value->imageDetail)) {
                                    $imgDetail = '/images/portfolio/detail/' . $value->imageDetail;
                                }
                                ?>
                                <li class="item-thumbs span3 <?php echo $value->portfolioSection->url; ?>">
                                    <a class="hover-wrap fancybox" data-fancybox-group="<?php echo $value->imageDetailAlt; ?>" title="<?php echo $value->imageDetailTitle; ?>" href="<?php echo $imgDetail; ?>">
                                        <span class="overlay-img"></span>
                                        <span class="overlay-img-thumb font-icon-plus"></span>
                                    </a>
                                    <?php
                                    $img = Yii::app()->theme->baseUrl . '/images/work/thumbs/image-01.jpg';
                                    if (!empty($value->image) && file_exists(Yii::getPathOfAlias('webroot') . '/images/portfolio/list/' . $value->image)) {
                                        $img = '/images/portfolio/list/' . $value->image;
                                    }
                                    ?>
                                    <img src="<?php echo $img; ?>" alt="<?php echo $value->imageAlt; ?>" title="<?php echo $value->imageTitle; ?>">

                                </li>
                                <?php
                            }
                            ?>                    
                            <!-- End Item Project -->
                        </ul>
                    </section>

                </div>
            </div>
        </div>
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->
