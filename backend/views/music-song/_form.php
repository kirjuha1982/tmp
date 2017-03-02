<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MusicSong */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="music-song-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'album_id')->textInput() ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'file')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'length')->textInput() ?>

    <?php echo $form->field($model, 'sort')->textInput() ?>

    <?php echo $form->field($model, 'views')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
