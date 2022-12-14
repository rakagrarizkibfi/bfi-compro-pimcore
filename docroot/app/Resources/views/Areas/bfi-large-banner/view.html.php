<div>
    <div id="herobanner" class="herobanner">
        <?php while ($this->block("contentblock")->loop()) { ?>
            <?php $asset = $this->image("image");?>
            <?php $assetMobile = $this->image("imageMobile");?>
            <div>
                <a href="<?= $this->link('link') != "" ? $this->link('link')->getHref() : '' ?>" target="<?= $this->link('link') != "" ? $this->link('link')->getTarget() : '' ?>">
                <div class="slide hidden-xs" style="background-image: url('<?= $asset->getImage()?>')">
                    <div class="slide-cont">
                        <div class="desc-slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="desc-cont">
                                            <p><?= $this->input('title');?></p>
                                            <p class="title-banner"><?= $this->input('text'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <a href="<?= $this->link('link') != "" ? $this->link('link')->getHref() : '' ?>" target="<?= $this->link('link') != "" ? $this->link('link')->getTarget() : '' ?>">
                <div class="slide visible-xs" style="background-image: url('<?= $assetMobile->getImage()?>')">
                    <div class="slide-cont">
                        <div class="desc-slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="desc-cont">
                                            <p><?= $this->input('title');?></p>
                                            <p class="title-banner"><?= $this->input('text'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="navigation">
        <div class="row">
            <div class="slick-nav">
                <div class="prev prev-1 btn-kotak arrowbanner"></div>

            </div>
            <div class="slick-nav">
                <div class="next next-1 btn-kotak arrowbanner"></div>
            </div>
        </div>
    </div>
</div>