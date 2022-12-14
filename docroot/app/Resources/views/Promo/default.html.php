<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');
$lang = $this->getLocale();
?>

<div class="blog-promo">
    <div class="container">
        <article class="sect-title text-center">
            <h1 class="margin-top-10"><?= $this->t("promo-title");?></h1>
            <p><?= $this->t("promo-text1");?></p>
            <p><?= $this->t("promo-text2");?></p>
        </article>
        <div class="pengajuan">
            <div class="cek-pengajuan">
                <form method="get">
                    <div class="_parentboxkirikanan">
                        <div class="_boxkiri">
                            <div class="input-group">
                                <div class="plaintext-cekpengajuan"><?= $this->t("promo-category");?></div>
                            </div>
                        </div>
                        <div class="_boxkanan">
                            <div class="_boxkananchild1">
                                <div class="input-group inputform">
                                    <select class="c-custom-select-home form-control bp-select" id="category"  onchange="this.form.submit()" name="category">
                                        <option value="<?php echo ($this->getParam("category") == "") ? "selected" : ""; ?>"><?= $this->t("all-promo");?></option>
                                        <?php foreach ($this->promoCategories as $category):?>
                                        <option value="<?= $category->getId()?>" <?php echo ($this->getParam("category") == $category->getId()) ? "selected" : ""; ?>><?= $category->getName();?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (count($this->paginator) > 0) { ?>
        <div class="list-card">
        <?php foreach($this->paginator as $promo) : ?>
            <div class="card-item">
                <a href="<?= '/'.$lang.'/promo/'.$promo->getSlug();?>">
                    <div class="card-content card-static-promo" style="background-image: url(<?= $promo->getImage();?>)">
                    </div>
                    <div class="caption">
                        <h2 class="tag"><?= $promo->getPromoCategory() ? $promo->getPromoCategory()->getName(): "";?></h2>
                        <h3 class="title"><?= $promo->getTitle();?></h3>
                        <div class="dateview periode">
                            <div><?= $this->t("period-promo"); ?> : </div>
                            <?php
                                $timestampStartDate = \Carbon\Carbon::parse($promo->getPromoStartDate());
                                $dateUnixStart = $timestampStartDate->timestamp;
                                $dateStart = date("d F", $dateUnixStart);
                                
                                $timestampEndDate = \Carbon\Carbon::parse($promo->getPromoEndDate());
                                $dateUnixEnd = $timestampEndDate->timestamp;
                                $dateEnd = date("d F Y", $dateUnixEnd);
                            ?>
                            <?= $dateStart;?> - <?= $dateEnd;?>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
        </div>
        <?php }?>

        <?php if(count($this->paginator) > 1): ?>
            <?= $this->render("Includes/paging.html.php", get_object_vars($this->paginator->getPages("Sliding")), [
                'urlprefix' => $this->document->getFullPath() . '?page=', // just example (this parameter could be used in paging.php to construct the URL)
                'appendQueryString' => true // just example (this parameter could be used in paging.php to construct the URL)
            ]); ?>
        <?php endif;?>
    </div>
</div>
