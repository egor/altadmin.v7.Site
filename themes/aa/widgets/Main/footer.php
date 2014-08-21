<footer>
            <div class="container">
                <div class="row">
                    <div class="widget span3">
                        <?php $this->widget('application.widgets.Menu', array('method' => 'footerMenu')); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock1'); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock2'); ?>
                    </div>
                    <div class="widget span3">
                        <?php echo FrontEditFields::getSettings('FooterSettings', 'addBlock3'); ?>
                    </div>
                </div>
                <div class="footer-border"></div>
                <div class="row">
                    <div class="copyright span4">
                        <p><?php echo FrontEditFields::getSettings('FooterSettings', 'copy'); ?></p>
                    </div>
                    <div class="social span8">
                        <a class="facebook" href=""></a>
                        <a class="dribbble" href=""></a>
                        <a class="twitter" href=""></a>
                        <a class="pinterest" href=""></a>
                    </div>
                </div>
            </div>
        </footer>