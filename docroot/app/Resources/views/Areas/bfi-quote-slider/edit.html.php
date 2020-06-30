<?php
/**
 * Created by PhpStorm.
 * User: salt
 * Date: 03/12/18
 * Time: 17:04
 */
?>
<div class="row">
    <div class="col-sm-12">
        <?php while($this->block("contentblock")->loop()) { ?>
            <div class="row">
                <div class="col-sm-4">Name Author</div>
                <div class="col-sm-8"><?= $this->input("name-author"); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">Position Author</div>
                <div class="col-sm-8"><?= $this->input("position-author"); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">Text</div>
                <div class="col-sm-8"><?= $this->textarea("text"); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">Image - Author</div>
                <div class="col-sm-8"><?= $this->image('image-author');?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">Alt Image</div>
                <div class="col-sm-8"><?= $this->input("alt-img"); ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">Image</div>
                <div class="col-sm-8"><?= $this->image('image');?></div>
            </div>
        <?php } ?>
    </div>
</div>


