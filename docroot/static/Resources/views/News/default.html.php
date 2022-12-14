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
            <h2 class="margin-top-10"><?= $this->t("news-title");?></h2>
            <p><?= $this->t("news-text1");?></p>
            <p><?php //echo $this->t("news-text2");?></p>
        </article>
        <div class="pengajuan">
            <div class="cek-pengajuan">
                <form action="#">
                    <div class="_parentboxkirikanan">
                        <div class="_boxkiri">
                            <div class="input-group">
                                <div class="plaintext-cekpengajuan"><?= $this->t("news-category");?></div>
                            </div>
                        </div>
                        <div class="_boxkanan">
                            <div class="_boxkananchild1">
                                <div class="input-group inputform">
                                    <select class="c-custom-select-home form-control bp-select" id="category"  onchange="this.form.submit()" name="category">
                                        <option value="" <?php echo ($this->getParam("category") == "") ? "selected" : ""; ?>><?= $this->t("all-news");?></option>
                                        <?php foreach ($this->newsCategories as $category):?>
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
        <?php foreach($this->paginator as $news) : ?>
            <a href="<?= '/'.$lang.'/news/'.$news->getSlug();?>" class="card-item">
                <picture>
                    <img src="<?= $news->getImage();?>" alt="">
                </picture>
                <div class="caption">
                    <h3 class="tag"><?= $news->getCategory() ? $news->getCategory()->getName(): "";?></h3>
                    <h2 class="title"><?= $news->getTitle();?></h2>
                    <div class="dateview">
                        <span class="date"><?= $news->getDate();?></span>
                        <span class="view"><i class="fa fa-eye"></i> <?= $news->getViews() == "" ? "0": $news->getViews(); ?></span>
                    </div>
                </div>
            </a>
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
