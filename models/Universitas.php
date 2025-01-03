<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "universitas".
 *
 * @property int $id_univ
 * @property string|null $nama_lembaga
 *
 * @property Fakultas[] $fakultas
 */
class Universitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'universitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_univ'], 'required', 'message' => 'Kode universitas tidak boleh kosong.'],
            [['id_univ'], 'integer'],
            [['nama_lembaga'], 'string', 'max' => 45, 'message' => 'Nama lembaga tidak boleh kosong.'],
            [['id_univ'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_univ' => 'Id Univ',
            'nama_lembaga' => 'Nama Lembaga',
        ];
    }

    /**
     * Gets query for [[Fakultas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasMany(Fakultas::class, ['id_univ' => 'id_univ']);
    }
}
