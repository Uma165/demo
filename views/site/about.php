<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Услуги';
?>
<div class="site-about">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <?php foreach ($posts as $post): ?>
                <img src="..\web\image\1.jpg">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['name'] ?></h5>
                    <h5 class="card-title"><?php echo $post['price'] ?></h5>
                    <h5 class="card-title"><?php echo $post['date'] ?></h5>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
