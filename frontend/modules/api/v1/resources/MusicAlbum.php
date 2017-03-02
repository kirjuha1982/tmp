<?php

namespace frontend\modules\api\v1\resources;

use common\models\MusicSong;
use yii\helpers\Url;
use yii\web\Linkable;
use yii\web\Link;

class MusicAlbum extends \common\models\MusicAlbum implements Linkable
{




    public function fields()
    {
        return [
            'id',
            'name',
            'year',
            'tags',
            'image' => function () {
                return Url::to(MusicAlbum::albumImage($this->id, $this->image, "full"), true);
            },
        ];
    }

    public function extraFields()
    {
        return [
            'views',
            'description',
            'totalSong' => function () {
                return MusicSong::find()->where(['album_id'=>$this->id])->count();
            },

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
            Link::REL_SELF => Url::to(['music-album/view', 'id' => $this->id], true)
        ];
    }


}
