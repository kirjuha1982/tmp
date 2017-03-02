<?php

namespace common\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "music_song".
 *
 * @property integer $id
 * @property integer $album_id
 * @property string $name
 * @property string $description
 * @property string $file
 * @property integer $length
 * @property integer $sort
 * @property string $views
 * @property integer $active
 */
class MusicSong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_song';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id'], 'required'],
            [['album_id', 'length', 'sort', 'active'], 'integer'],
            [['description'], 'string'],
            [['name', 'file', 'views'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'description' => 'Description',
            'file' => 'File',
            'length' => 'Length',
            'sort' => 'Sort',
            'views' => 'Views',
            'active' => 'Active',
        ];
    }


    public static function songUrl($album_id, $file){
        return Url::to(Yii::getAlias("@storageUrl")."/web/source/music/album/".$album_id."/song/".$file, true);
    }
}


//return Yii::getAlias("@storageUrl")."/web/source/music/album/".$id."/image/".$fileName;