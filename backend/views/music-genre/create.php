<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicGenre */

$this->title = 'Create Music Genre';
$this->params['breadcrumbs'][] = ['label' => 'Music Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-genre-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
