<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicArtist */

$this->title = 'Create Music Artist';
$this->params['breadcrumbs'][] = ['label' => 'Music Artists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-artist-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
