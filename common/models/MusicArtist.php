<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "music_artist".
 *
 * @property integer $id
 * @property integer $letter
 * @property string $name
 */
class MusicArtist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['letter'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'letter' => 'Letter',
            'name' => 'Name',
        ];
    }

    public static function artistAlbum($album_id){
        $artist_id = ArrayHelper::toArray(MusicAlbumArtist::findAll(['album_id'=>$album_id]));
        $artist_id = ArrayHelper::map($artist_id, 'artist_id', 'artist_id');
        $artist = MusicArtist::findAll(['id'=>$artist_id]);
        return $artist;
    }


    public static function artistTextList($album_id){
        $artist = ArrayHelper::toArray(self::artistAlbum($album_id));
        $artist = ArrayHelper::map($artist, 'id', 'name');
        return implode(', ', $artist);
        //$artist_id

    }
}
