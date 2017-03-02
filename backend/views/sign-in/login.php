<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \backend\models\LoginForm */

$this->title = Yii::t('backend', 'Sign In');
$this->params['breadcrumbs'][] = $this->title;
$this->params['body-class'] = 'login-page';
?>

<div class="text-xs-center">
    <div class="page-content vertical-align-middle">
        <div class="panel">
            <div class="panel-body">
                <div class="brand">
                    <h2 class="brand-text font-size-18">Admin Panel</h2>
                </div>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <div class="body">
                    <?php echo $form->field($model, 'username') ?>
                    <?php echo $form->field($model, 'password')->passwordInput() ?>
                    <?php echo $form->field($model, 'rememberMe')->checkbox(['class'=>'simple']) ?>
                </div>
                <div class="footer">
                    <?php echo Html::submitButton('Log in', [
                        'class' => 'btn btn-primary btn-block btn-lg m-t-40',
                        'name' => 'login-button'
                    ]) ?>
                </div>
                <?php ActiveForm::end(); ?>


            </div>
        </div>

    </div>
</div>
