<?php

namespace frontend\modules\api\v1\resources;

use yii\helpers\Url;
use yii\web\Linkable;
use yii\web\Link;

class MusicSong extends \common\models\MusicSong implements Linkable
{

    public function fields()
    {
        return [
            'id',
            'album_id',
            'name',
        ];
    }

    public function extraFields()
    {
        return [
            'description',
            'file'=>function(){
                return MusicSong::songUrl($this->album_id, $this->file);
            },
            'length',
            'sort',
            'views',
        ];
    }


    /**
     * Returns a list of links.
     *
     * @return array the links
     */
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['music-song/view', 'id' => $this->id], true)
        ];
    }


}
