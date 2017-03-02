<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicGenre */

$this->title = 'Update Music Genre: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Music Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-genre-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
