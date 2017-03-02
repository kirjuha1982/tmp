<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbumArtist */

$this->title = 'Update Music Album Artist: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Music Album Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-album-artist-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
