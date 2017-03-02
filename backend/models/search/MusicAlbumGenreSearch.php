<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MusicAlbumGenre;

/**
 * MusicAlbumGenreSearch represents the model behind the search form about `common\models\MusicAlbumGenre`.
 */
class MusicAlbumGenreSearch extends MusicAlbumGenre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'album_id', 'genre_id'], 'integer'],
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
        $query = MusicAlbumGenre::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'album_id' => $this->album_id,
            'genre_id' => $this->genre_id,
        ]);

        return $dataProvider;
    }
}
