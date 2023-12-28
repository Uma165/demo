<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<img src="..\web\image\logo.png" class="img-fluid" alt="...">
<div class="site-index">
<?php foreach ($categoris as $category): ?>
    <a href="<?php echo Url::toRoute('site/about')?> "><?php echo $category['name']?></a>
    <?php endforeach ?>
</div>
