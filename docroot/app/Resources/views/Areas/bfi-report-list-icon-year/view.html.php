<?php $category = $this->document->getProperty("category")->getId();
$reports = new \Pimcore\Model\DataObject\Report\Listing();
$reports->addConditionParam("Category__id = ?", $category, "AND");
$reports->setOrderKey("Date");
$reports->setOrder('desc');
?>



<!-- Template -->
<div class="container">
    <article class="sect-title text-center">
        <?php 
        if($this->input('title')->isEmpty()) { ?>
        <?php } else {?>
        <h2 class=""><?= $this->input('title');?></h2>
        <?php }?>
    </article>
    <ul class="card-list-box">
        <?php foreach ($reports as $data) : ?>
        <li class="card-list">
            <?php $asset = Pimcore\Model\Asset::getById($data->getPdf()->getId());
            if (!!!$data->getImage()){ ?>
                <img src="<?php echo $asset->getImageThumbnail('tes'); ?>" alt=""> 
            <?php } else { ?>
                <img src="<?= $data->getImage(); ?>" alt="">
            <?php }?>

            <div class="card-content">
                <p><?= $data->getDate()->formatLocalized("%Y"); ?></p>
                <h3><?= $data->getFilename(); ?></h3>
                <a href="<?= $data->getUrl(); ?>" target="_blank" download>
                    <img src="/static/images/download.png" alt="">
                    <span><u><?= $this->t("download-document") ?></u></span>
                </a>
            </div>
        </li>
        <?php endforeach; ?>

    </ul>
</div>
<!-- Template -->
