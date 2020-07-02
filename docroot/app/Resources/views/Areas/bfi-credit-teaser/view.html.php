<div class="container">
    <div class="row">
        <div class="cont-credit">
            <h1 class="title-wrapper"><?= $this->input("title"); ?></h1>
            <p class="paragraf-title"><?= $this->textarea('text');?></p>

            <div class="list-credit">
              <h2><?= $this->input("credit-jaminan-title"); ?></h2>
                <div class="list-credit--icon">
                    <div class="credit--icon col-md-3 col-xs-3">
                        <?php $assetMobil = $this->image("image-mobil");?>
                        <a href="<?= $this->link('url-mobil')->getHref(); ?>">
                            <div class="icon">
                                <img class="imggetcredit" src="<?= $assetMobil->getImage()?>" alt="<?= $assetMobil = $this->input("alt-img-mobil")?>">
                                <p><?= $this->input("title-mobil"); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="credit--icon col-md-3 col-xs-3">
                        <?php $assetMotor = $this->image("image-motor");?>
                        <a href="<?= $this->link('url-motor')->getHref(); ?>">
                            <div class="icon">
                                <img class="imggetcredit" src="<?= $assetMotor->getImage()?>" alt="<?= $assetMotor = $this->input("alt-img-motor")?>">
                                <p><?= $this->input("title-motor"); ?></p>
                            </div>

                        </a>
                    </div>
                    <div class="credit--icon col-md-3 col-xs-3">
                        <?php $assetRumah = $this->image("image-rumah");?>
                        <a href="<?= $this->link('url-rumah')->getHref(); ?>">
                            <div class="icon">
                                <img class="imggetcredit" src="<?= $assetRumah->getImage()?>" alt="<?=$assetRumah =  $this->input("alt-img-rumah")?>">
                                <p><?= $this->input("title-rumah"); ?></p>
                            </div>

                        </a>
                    </div>
                </div>
            </div>

            <div class="list-credit">
              <h2><?= $this->input("credit-lainnya-title"); ?></h2>
                <div class="list-credit--icon">
                    <?php if(!$this->input("title-education")->isEmpty()) { ?>
                      <div class="credit--icon col-md-3 col-xs-3">
                          <?php $assetMobil = $this->image("image-education");?>
                          <a href="<?= $this->link('url-education')->getHref(); ?>">
                              <div class="icon">
                                  <img class="imggetcredit" src="<?= $assetMobil->getImage()?>" alt="<?= $assetMobil = $this->input("alt-img-education")?>">
                                  <p><?= $this->input("title-education"); ?></p>
                              </div>
                          </a>
                      </div>
                    <?php } ?>

                    <?php if(!$this->input("title-travel")->isEmpty()) { ?>
                    <div class="credit--icon col-md-3 col-xs-3">
                        <?php $assetMotor = $this->image("image-travel");?>
                        <a href="<?= $this->link('url-travel')->getHref(); ?>">
                            <div class="icon">
                                <img class="imggetcredit" src="<?= $assetMotor->getImage()?>" alt="<?= $assetMotor = $this->input("alt-img-travel")?>">
                                <p><?= $this->input("title-travel"); ?></p>
                            </div>

                        </a>
                    </div>
                    <?php } ?>

                    <?php if(!$this->input("title-mesin")->isEmpty()) { ?>
                    <div class="credit--icon col-md-3 col-xs-3">
                        <?php $assetRumah = $this->image("image-mesin");?>
                        <a href="<?= $this->link('url-mesin')->getHref(); ?>">
                            <div class="icon">
                                <img class="imggetcredit" src="<?= $assetRumah->getImage()?>" alt="<?= $assetRumah = $this->input("alt-img-mesin")?>">
                                <p><?= $this->input("title-mesin"); ?></p>
                            </div>

                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>