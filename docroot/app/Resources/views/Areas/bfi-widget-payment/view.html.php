<div class="block-payment">
    <?php while ($this->block("contentblock")->loop()) { ?>
        <div class="payment-wrap">
            <h4><?= $this->input("method"); ?>:</h4>
            <div class="block-payment__item">
                <div class="row">
                <?php while ($this->block("contentblock-2")->loop()) { ?>
                    <?php $asset = $this->image("image");?>
                    
                        <div class="col-md-3 col-xs-6"><a href="<?= $this->link('url')->getHref(); ?>"><img src="<?= $asset->getImage()?>" alt=""></a></div>
                   
                <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>