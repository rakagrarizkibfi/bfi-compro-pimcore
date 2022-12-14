<!-- START Mobille -->
<?php

use Pimcore\Model\Document;

?>
<?php $lang = $this->getLocale(); ?>
<div class="top-nav--mobille hidden-md">
    <div class="container">
        <div class="row top-nav">

            <div class="col-xs-8">
                <a class="_grup" href="/<?= $lang; ?>" class="cta-top-nav "><?= $this->translate("personal") ?></a>
                <a class="_personal" href="/<?= $lang . '/corporate'; ?>" class="cta-top-nav active"><?= $this->translate("corporate") ?></a>
            </div>

            <div class="col-xs-4 text-right">
                <?= $this->template("Includes/mobile-language.html.php"); ?>
            </div>
        </div>
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= "/" . $lang . "/corporate"; ?>">
                <img src="/static/images/logo-bfi.png" alt="logo-bfi" class="img-responsive">
            </a>
            <div class="header-button-wrapper">
                <div class="search-button">
                    <a href="<?= "/" . $lang . "/search"; ?>"><i class="fa fa-search"></i></a>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="close-bar">x</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div id="navbar" class="navbar-collapse collapse collapse-mobile" aria-expanded="false">
    <ul class="nav navbar-nav">
        <?php

        $listMenu = Document::getByPath("/" . $this->getLocale() . "/corporate");
        $subPage = $this->navigation()->buildNavigation($this->document, $listMenu);

        if ($subPage) {
            foreach ($subPage as $page) {
                $hasChildren = $page->hasPages();

                if (strpos($page->getUri(), 'branch-office') !== false) {
                    continue;
                }

                if ($hasChildren) {
        ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle <?= $page->getActive() ? "active" : "" ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?= $page->getLabel() ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($page->getPages() as $child) {
                            ?>
                                <li><a href="<?= $child->getHref() ?>" class="title-dropdown <?= $child->getActive() ? "active" : "" ?>"><?= $child->getLabel() ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                <?php
                } else {
                ?>
                    <li class="<?php echo $page->getActive() ? 'active' : '' ?>">
                        <a href="<?= $page->getHref() ?>">
                            <?= $page->getLabel() ?>
                        </a>
                    </li>
        <?php
                }
            }
        }
        ?>
        <li role="separator" class="divider"></li>
        <li> <a href="<?= $this->websiteConfig("career_link") ? $this->websiteConfig("career_link") : "#"; ?>">
                <?= $this->translate("career"); ?></a></li>
    </ul>
</div>
<!-- END Mobile -->