<?php

use common\models\MusicAlbum;
use common\models\MusicArtist;
use common\models\MusicGenre;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicAlbumSearch */
/* @var $model common\models\MusicAlbum */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Albums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?php echo Html::a('Create Music Album', ['create'], [
                'class' => 'btn btn-block btn-primary waves-effect',
            'data-toggle'=>'modal',
            'data-target'=>'#createAlbum'
        ]) ?>
    <div class="example table-responsive">

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'year',
            'tags',
            'views',

/*
 * <a class="avatar" data-toggle="tooltip" href="<?=Url::to(['/tpl/audio-album-creation'])?>" data-placement="left" title="">
                                <img src="/images/2.jpg" alt="Edward Fletcher">
                            </a>
 * */
            [
                'header'=>'Genre',
                'value'=>function($data){
                    return MusicGenre::genreTextList($data->id);
                },
                'format' => 'raw',
            ],
            [
                'header'=>'Artists',
                'value'=>function($data){
                    return MusicArtist::artistTextList($data->id);
                },

                'format' => 'raw',
            ],
            [
                'attribute'=>'image',
                'value'=>function($data){
                    return Html::img(MusicAlbum::albumImage($data->id, $data->image), ["class"=>"img-responsive img-thumbnail"]);
                },
                'filter'=>false,
                'format' => 'raw',
            ],
            //'description:ntext',
           // 'image',
            // 'views',
            // 'active',
            [
                'attribute'=>'active',
                'value'=>function($data){
                    return ($data->active == 1)?'Yes':'No';
                },
                'filter'=>['0'=>'No', '1'=>'Yes'],
            ],
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update} {delete}'],
        ],
    ]); ?>

    </div>
</div>
<?php
Modal::begin([
    'header' => '',
    'id'=>'createAlbum',
]);
?>
<h3>Enter album name</h3>
<?php $form = ActiveForm::begin(); ?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Create Album', ['class' => ' btn-primary waves-effect']) ?>
    </div>

<?php ActiveForm::end(); ?>
<?php Modal::end(); ?>