<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MusicSong;

/**
 * MusicSongSearch represents the model behind the search form about `common\models\MusicSong`.
 */
class MusicSongSearch extends MusicSong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'album_id', 'length', 'sort', 'active'], 'integer'],
            [['name', 'description', 'file', 'views'], 'safe'],
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
        $query = MusicSong::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'album_id' => $this->album_id,
            'length' => $this->length,
            'sort' => $this->sort,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'views', $this->views]);

        return $dataProvider;
    }
}
