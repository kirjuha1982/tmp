<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbumGenre */

$this->title = 'Update Music Album Genre: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Music Album Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-album-genre-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
