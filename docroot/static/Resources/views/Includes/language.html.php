<?php
// this is an auto-generated language switcher, of course you can create your own
$service = new \Pimcore\Model\Document\Service;
$translations = $service->getTranslations($this->document);
$links = [];
$site = $this->document->getProperty("site");
foreach (\Pimcore\Tool::getValidLanguages() as $language) {
    if ($site == "corporate") {
        $target = "/" . $language . "/corporate";
    } elseif ($site == "user") {
        $target = "/" . $language . "/user/dashboard";
    } else {
        $target = "/" . $language;
    }
    if (isset($translations[$language])) {
        $localizedDocument = \Pimcore\Model\Document::getById($translations[$language]);
        if ($localizedDocument) {
            $target = $localizedDocument->getFullPath();
        }
    }
    $links[$language] = $target;
}
?>
<div class="lang">
    <?php foreach ($links as $lang => $target) { ?>
        <a class="<?php echo $this->getLocale() === $lang ? 'active' : ''; ?> " href="<?php echo $target ?>">
            <?php echo $lang == 'en' ? 'EN' : 'ID' ?>
        </a>
    <?php } ?>
</div>