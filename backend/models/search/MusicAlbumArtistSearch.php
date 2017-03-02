<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MusicAlbumArtist;

/**
 * MusicAlbumArtistSearch represents the model behind the search form about `common\models\MusicAlbumArtist`.
 */
class MusicAlbumArtistSearch extends MusicAlbumArtist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'album_id', 'artist_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MusicAlbumArtist::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'album_id' => $this->album_id,
            'artist_id' => $this->artist_id,
        ]);

        return $dataProvider;
    }
}
