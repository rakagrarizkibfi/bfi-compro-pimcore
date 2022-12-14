

<?php $category = $this->document->getProperty("category")->getId();
$reports = new \Pimcore\Model\DataObject\Report\Listing();
$reports->addConditionParam("Category__id = ?",$category,"AND");

?>



<!-- Template -->
<div class="container">
    <article class="sect-title text-center">
        <h2 class="margin-top-10"><?= $this->input("title")?></h2>

    </article>
    <ul class="card-list-box">
        <?php foreach($reports as $data):?>
        <li class="card-list">
            <?php $asset = Pimcore\Model\Asset::getById($data->getPdf()->getId());
            ?>


            <img src="<?php echo $asset->getImageThumbnail('tes'); ?>" alt="">
            <div class="card-content">
                <h6><?= $data->getDate()->formatLocalized("%B %Y")?></h6>
                <h3><?= $data->getFilename();?></h3>
                <a href="<?= $data->getUrl();?>">
                    <img src="image/logo/download.png" alt="">
                    <span><u><?= $this->t("download-document")?></u></span>
                </a>
            </div>
        </li>
        <?php endforeach;?>

    </ul>
</div>
<!-- Template -->
