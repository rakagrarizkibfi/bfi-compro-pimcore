<!-- HEADER -->
<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

use Pimcore\Model\Document;
use Pimcore\Model\Document\Page;
?>
<?php $pageCurrent = $this->getParam('page', 1); ?>
<?php
$lang = $this->getLocale();
$name = $_COOKIE["customer"];
?>
<nav id="site-header">
    <div class="navbar-fixed-top hidden-xs">

        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 left-side-top">
                        <a class="_personal" href="/<?php echo $this->getLocale() ?>"><?= $this->translate("personal") ?></a>
                        <a class="_grup" href="<?= "/" . $lang . "/corporate" ?>">
                            <?= $this->translate("corporate") ?></a>
                    </div>
                    <div class="col-md-6 col-sm-6 right-side-top">
                        <?php if (!isset($name) || $name == "") { ?>
                            <div class="link-about-top">
                                <a href="<?= "/" . $lang . "/tentang-kami" ?>">
                                    <?= $this->translate("tentang-kami") ?></a>
                                <a href="<?= "/" . $lang . "/blog" ?>">
                                    <?= $this->translate("blog") ?></a>
                            </div>
                        <?php } ?>

                        <div class="link-log">
                            <?php if (!isset($name) || $name == "") { ?>
                                <a href="<?= "/" . $lang . "/login"; ?>" class="login"><?= $this->translate("login") ?></a>
                            <?php } ?>
                            <div class="user hide">
                                <a href="/<?= $this->getLocale() ?>/user/dashboard" class="full_name">Deborah Morris</a> | <a href="#" class="logout" onclick="return logout('<?= $this->getLocale() ?>');"><?= $this->translate("logout") ?></a>
                            </div>
                            <?php echo $this->template("Includes/language.html.php") ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-4 header-bottom-logo">
                        <a href="<?php echo "/" . $this->getLocale(); ?>">
                            <img src="/static/images/logo-bfi.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-md-8 col-sm-8 header-bottom-menu">
                        <div class="header-link-menu">
                            <ul class="nav">
                                <?php
                                $listMenu = Document::getByPath("/" . $this->getLocale() . "/");
                                $subPage = $this->navigation()->buildNavigation($this->document, $listMenu);
                                if ($subPage) {
                                    foreach ($subPage as $page) {
                                        $hasChildren = $page->hasPages();

                                        if (strpos($page->getUri(), 'branch-office') !== false) {
                                            continue;
                                        }
                                        if ($page->getHref() == "/" . $this->getLocale() . "/corporate") {
                                            break;
                                        }
                                        if ($hasChildren && (strpos($page->getUri(), '#product') !== false)) {
                                ?>

                                            <li class="dropdown" id="produk" onmouseover="hoverDropdown()" onmouseout="closeDropdown()">
                                                <a href="#" class="<?php echo $page->getActive() ? 'active' : '' ?> produk"><?= $page->getLabel() ?></a>
                                                <div class="dropdown-content main">
                                                    <div class="produk-hover container">
                                                        <div class="">
                                                            <?php
                                                            foreach ($page->getPages() as $child) {
                                                            ?>
                                                                <div class="col-md-6">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="label-title"><?= $child->getLabel() ?></div>
                                                                        </li>
                                                                        <?php

                                                                        $hasGrandChildren = $child->hasPages();

                                                                        if ($hasGrandChildren) {
                                                                            foreach ($child->getPages() as $grandChild) {
                                                                        ?>
                                                                                <?php if ($grandChild->getDocumentType() != "link") : ?>
                                                                                    <li>
                                                                                        <a class="<?php echo $grandChild->getActive() ? 'active' : '' ?>" href="<?= $grandChild->getHref() ?>"><?= $grandChild->getLabel() ?></a>
                                                                                    </li>
                                                                                <?php else : ?>
                                                                                    <li>
                                                                                        <div class="label-title"><?= $grandChild->getLabel(); ?></div>
                                                                                    </li>
                                                                                <?php endif ?>
                                                                                <?php
                                                                                $hasGreatGrandChild = $grandChild->hasPages();
                                                                                if ($hasGreatGrandChild) {
                                                                                    foreach ($grandChild->getPages() as $greatGrandChild) {
                                                                                ?>
                                                                                        <li>
                                                                                            <a class="<?php echo $greatGrandChild->getActive() ? 'active' : '' ?>" href="<?= $greatGrandChild->getHref() ?>"><?= $greatGrandChild->getLabel() ?></a>
                                                                                        </li>
                                                                        <?php }
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
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

                            </ul>
                            <div class="search-button">
                                <a href="<?= "/" . $lang . "/search" ?>"><i class="fa fa-search"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php echo $this->template("Includes/mobile-navigation.html.php") ?>

</nav>
<!-- HEADER -->