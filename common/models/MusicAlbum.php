<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "music_album".
 *
 * @property integer $id
 * @property string $name
 * @property string $year
 * @property string $description
 * @property string $image
 * @property string $views
 * @property string $tags
 * @property integer $active
 */
class MusicAlbum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'music_album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['active', 'views'], 'integer'],
            [['name', 'year', 'image', 'tags'], 'string', 'max' => 255],
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
            'year' => 'Year',
            'description' => 'Description',
            'image' => 'Image',
            'views' => 'Views',
            'active' => 'Active',
            'tags' => 'Tags',
        ];
    }

    public static function albumImage($album_id, $image, $full=false){
        if($image != '' && $album_id){
            if($full)
                return Yii::getAlias("@storageUrl")."/web/source/music/album/".$album_id."/image/".$image;
            else
                return Yii::getAlias("@storageUrl")."/web/source/music/album/".$album_id."/image/tumb_".$image;
        }
        return '/backend/web/img/noimage.png';
    }
}
