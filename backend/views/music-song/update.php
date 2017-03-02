<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicSong */

$this->title = 'Update Music Song: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Music Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-song-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
