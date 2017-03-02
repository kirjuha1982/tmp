<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MusicAlbumArtistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Album Artists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-album-artist-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Music Album Artist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'album_id',
            'artist_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
