<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "music_album_genre".
 *
 * @property integer $id
 * @property integer $album_id
 * @property integer $genre_id
 */
class MusicAlbumGenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_album_genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'genre_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Album ID',
            'genre_id' => 'Genre ID',
        ];
    }

}
