<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbum */

$this->title = 'Create Music Album';
$this->params['breadcrumbs'][] = ['label' => 'Music Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
