<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicGenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-genre-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Music Genre', ['create'], ['class' => 'btn btn-block btn-primary waves-effect']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn', 'template'=>'{update} &nbsp; {delete}'],
        ],
    ]); ?>

</div>
