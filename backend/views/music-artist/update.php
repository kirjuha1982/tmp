<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MusicArtist */

$this->title = 'Update Music Artist: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Music Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-artist-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
