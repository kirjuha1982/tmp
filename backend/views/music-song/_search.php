<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\MusicSongSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="music-song-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'album_id') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'description') ?>

    <?php echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
