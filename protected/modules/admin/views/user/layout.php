<div class="container">
    <div class="row">
        <div class="span2">
            <!--            <br/>-->
            <!--            <br/>-->

            <div>
                <!--                <ul class="nav nav-list">-->
                <!--                    <li class="nav-header">Действия</li>-->
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'items' => $this->menu,
                    'htmlOptions' => array(
                        'class' => 'nav nav-list'
                    ),
                    'encodeLabel' => false,
                ));
                ?>
            </div>
        </div>
        <div class="span10">
            <?php echo $content; ?>
        </div>

    </div>
</div>