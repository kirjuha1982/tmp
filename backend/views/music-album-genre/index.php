<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicAlbumGenreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Album Genres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-genre-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Music Album Genre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'album_id',
            'genre_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
