<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbumGenre */

$this->title = 'Create Music Album Genre';
$this->params['breadcrumbs'][] = ['label' => 'Music Album Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-genre-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
