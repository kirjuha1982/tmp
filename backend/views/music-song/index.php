<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicSongSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Songs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-song-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Music Song', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'album_id',
            'name',
            'description:ntext',
            'file',
            // 'length',
            // 'sort',
            // 'views',
            // 'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
