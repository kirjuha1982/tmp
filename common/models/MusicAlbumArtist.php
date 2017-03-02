<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "music_album_artist".
 *
 * @property integer $id
 * @property integer $album_id
 * @property integer $artist_id
 */
class MusicAlbumArtist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_album_artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'artist_id'], 'integer'],
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
            'artist_id' => 'Artist ID',
        ];
    }
}
