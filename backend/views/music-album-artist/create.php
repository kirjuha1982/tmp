<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbumArtist */

$this->title = 'Create Music Album Artist';
$this->params['breadcrumbs'][] = ['label' => 'Music Album Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-artist-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
