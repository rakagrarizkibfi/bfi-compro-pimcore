

<?php $category = $this->document->getProperty("category")->getId();
$reports = new \Pimcore\Model\DataObject\Report\Listing();
$reports->addConditionParam("Category__id = ?",$category,"AND");

?>

<div class="container report-list-wrapper">
    <div class="row">
        <article class="sect-title text-center">
            <h2 class=""><?= $this->input("title")?></h2>
            <p><?= $this->textarea('text');?></p>
        </article>

        <?php foreach($reports as $data):?>


        <div class="list-container">
            <div class="information">
                <?php if($data->getDate() != null) : ?>
                    <div class="year">
                        <?= $data->getDate()->formatLocalized("%Y");?>
                    </div>
                <?php endif; ?>
                <div class="report-download-container">
                    <div class="title">
                        <?= $data->getFilename();?>
                    </div>
                </div>
            </div>
            <div class="download-btn">
                <div class="down-box">
                    <a href=" <?= $data->getUrl();?>" class="cta cta-down">
                        <span><?=  $this->t("download-document")?></span>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach;?>

    </div>
</div>
