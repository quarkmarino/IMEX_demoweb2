<div class="container">
    <div class="row">
        <div class="span<?php echo(isset($_GET['w']) ? $_GET['w'] : '12')?>">
            <?php
            $this->widget('GalleryManager', array(
                'gallery' => $gallery,
            ));
            ?>

        </div>
    </div>
</div>