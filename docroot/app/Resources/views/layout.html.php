<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?= $this->getLocale() ?>">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="shortcut icon" type="image/png" href="<?= \Pimcore\Tool::getHostUrl() . '/static/images/favicon/favicon.png' ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= \Pimcore\Tool::getHostUrl() . '/static/images/favicon/favicon.ico' ?>" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <?php
    $site = $this->document->getProperty("site");
    $hal = $this->document->getProperty("hal");
    $desc = "";

    if(isset($_GET['page'])){
        $desc = " | {$this->translate('page')} {$_GET['page']}";
        $param = "?page={$_GET['page']}";
    }

    if ($this->document instanceof \Pimcore\Model\Document\Page) {
        $slug = $this->getParam("slug");
        $year = $this->getParam("year");

        if (!$slug && !$year) {
            if ($this->document->getTitle()) {
                // use the manually set title if available
                $this->headTitle()->set($this->document->getTitle() . $desc);
                $this->headMeta()->appendName('title', $this->document->getTitle() . $desc);
            }
        }
    }

    $urlCanonical = rtrim("{$this->getUrl()}{$param}/{$slug}","/");

    if ($this->document instanceof \Pimcore\Model\Document\Page && $this->document->getDescription()) {
        // use the manually set description if available
        $this->headMeta()->appendName('description', $this->document->getDescription() . $desc);
    }

    echo $this->headTitle();
    echo $this->headMeta();
    ?>

    <!-- Bootstrap -->

    <?php
    $this->headLink()->appendStylesheet('/static/css/vendor.min.css');
    $this->headLink()->appendStylesheet('/static/css/plugins.min.css');
    $this->headLink()->appendStylesheet('/static/css/main.css');

    if ($this->editmode) {
        $this->headLink()->appendStylesheet('/static/css/editmode.css');
    }
    $this->headLink()->appendStylesheet('/static/css/pages/homepage.css');
    echo $this->headLink();
    ?>
    <link rel="canonical" href="<?= $urlCanonical ?>" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="overlay"></div>
    <?php if ($site == "corporate") : ?>
        <?php echo $this->template('Includes/navigation-corporate.html.php') ?>
    <?php elseif ($site == "user") : ?>
        <?php echo $this->template('Includes/navigation-dashboard.html.php') ?>
    <?php else : ?>
        <?php echo $this->template('Includes/navigation.html.php', ['documentInitiator' => $this->document->getId()]) ?>
    <?php endif ?>
    <div id="site-container">
        <?php $this->slots()->output('_content'); ?>
        <a class="backtoTop" href="#"><i class="icon-back-to-top"></i></a>
    </div>
    <!-- CONTAINER -->
    <!-- FOOTER -->
    <?php if ($site == "corporate") : ?>
        <?php if ($hal == "contact") { ?>
            <?= $this->inc("/" . $this->getLocale() . "/shared/includes/footer-corporate-contact") ?>
        <?php } else { ?>
            <?= $this->inc("/" . $this->getLocale() . "/shared/includes/footer-corporate") ?>
        <?php } ?>
    <?php elseif ($site == "user" || $hal == "contact") : ?>
        <?= $this->inc("/" . $this->getLocale() . "/shared/includes/footer-dashboard") ?>
    <?php else : ?>
        <?= $this->inc("/" . $this->getLocale() . "/shared/includes/footer") ?>
    <?php endif; ?>
    <!-- FOOTER -->
    <!-- LOADER -->
    <div id="loader-container" style="display: none;"></div>
    <!-- LOADER -->
    <?php 
    if ($this->editmode) {
        $this->headScript()->prependFile('/static/js/Includes/edit-mode-setting.js'); 
    }
    ?>
    <?php $this->headScript()->prependFile('/static/js/Includes/homepage.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/custom.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/app.min.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/plugins.min.js'); ?>
    <?php $this->headScript()->prependFile('/static/js/vendor.min.js'); ?>
    <script async="" charset="utf-8" src="https://v2.zopim.com/?5baILLmEUPUCClge2ay2fXXPtgbifxof" type="text/javascript"></script>

    <?php echo $this->headScript(); ?>
</body>

</html>
