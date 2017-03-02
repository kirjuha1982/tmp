<?php
namespace frontend\modules\api\v1\controllers;

use Yii;
use frontend\modules\api\v1\resources\MusicSong;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;


class MusicSongController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'frontend\modules\api\v1\resources\MusicSong';
    /**
     * @var array
     */
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items'
    ];

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => [$this, 'prepareDataProvider']
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'findModel' => [$this, 'findModel']
            ],
        ];
    }

    /**
     * @param integer $album
     * @return ActiveDataProvider
     */
    public function prepareDataProvider()
    {
        $query = MusicSong::find()
            ->where(['active'=>1]);
        if(Yii::$app->request->get('album_id') && (int)Yii::$app->request->get('album_id') > 0){
            $query->andWhere(['album_id' => (int)Yii::$app->request->get('album_id')]);
        }

        return new ActiveDataProvider(array(
            'query' => $query,
            /*'pagination' => [
                'pageSize' => 2,
            ],*/
        ));
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     * @throws HttpException
     */
    public function findModel($id)
    {
        $model = MusicSong::find()
            ->where(['active'=>1])
            ->andWhere(['id' => (int) $id])
            ->one();
        if (!$model) {
            throw new HttpException(404);
        }
        return $model;
    }
}
