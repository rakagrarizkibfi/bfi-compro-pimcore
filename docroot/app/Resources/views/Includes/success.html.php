<?php

/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

// $this->extend('layout.html.php');
?>

<?php
$this->headScript()->offsetSetFile(100, '/static/js/Includes/contact-us.js');
?>

<div class="container">
    <div class="row">
        <div id="success" class="contact-us success-wrapper">
            <div class="img-wrap">
                <img class="icon-thank-page" src="/static/images/icon/m_thank_you.png" alt="">
            </div>
            <div class="text-wrap text-center">
                <h3><?= $this->t('thankyou_msg'); ?></h3>
                <p><?= $this->t('success_msg'); ?></p>
            </div>
        </div>
    </div>
</div>