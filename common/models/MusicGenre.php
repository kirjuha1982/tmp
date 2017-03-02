<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "music_genre".
 *
 * @property integer $id
 * @property string $name
 */
class MusicGenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name' => 'Name',
        ];
    }



    public static function genreAlbum($album_id){
        $genre_id = ArrayHelper::toArray(MusicAlbumGenre::findAll(['album_id'=>$album_id]));
        $genre_id = ArrayHelper::map($genre_id, 'genre_id', 'genre_id');
        $genre = MusicGenre::findAll(['id'=>$genre_id]);
        return $genre;
    }


    public static function genreTextList($album_id){
        $genre = ArrayHelper::toArray(self::genreAlbum($album_id));
        $genre = ArrayHelper::map($genre, 'id', 'name');
        return implode(', ', $genre);
    }
}
