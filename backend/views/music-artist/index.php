<?php

use common\base\PublicParams;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Artists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-artist-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Music Artist', ['create'], ['class' => 'btn btn-block btn-primary waves-effect']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'letter',
                'value'=>function($data){
                    return PublicParams::returnLetter($data->letter);
                },
                'filter'=>PublicParams::returnAlphabet(),
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update} &nbsp; {delete}'],
        ],
    ]); ?>

</div>
