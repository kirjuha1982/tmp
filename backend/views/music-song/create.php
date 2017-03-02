<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MusicSong */

$this->title = 'Create Music Song';
$this->params['breadcrumbs'][] = ['label' => 'Music Songs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-song-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
