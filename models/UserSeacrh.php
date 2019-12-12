<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSeacrh represents the model behind the search form of `app\models\User`.
 */
class UserSeacrh extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'NIP', 'cuti'], 'integer'],
            [['username', 'password', 'authKey', 'accesToken', 'nama_karyawan', 'jenis_kelamin', 'jabatan', 'divisi', 'level', 'foto_profil'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_user' => $this->id_user,
            'NIP' => $this->NIP,
            'cuti' => $this->cuti,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'authKey', $this->authKey])
            ->andFilterWhere(['like', 'accesToken', $this->accesToken])
            ->andFilterWhere(['like', 'nama_karyawan', $this->nama_karyawan])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'divisi', $this->divisi])
            ->andFilterWhere(['like', 'level', $this->level])
            ->andFilterWhere(['like', 'foto_profil', $this->foto_profil]);

        return $dataProvider;
    }
}
