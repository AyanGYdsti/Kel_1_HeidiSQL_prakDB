<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $id_fakultas
 * @property int $id_univ
 * @property string|null $nama_fakultas
 * @property string|null $singkatan
 *
 * @property Prodi[] $prodis
 * @property Universitas $univ
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fakultas', 'id_univ'], 'required', 'message' => 'Kode fakultas tidak boleh kosong.'],
            [['id_fakultas', 'id_univ'], 'integer'],
            [['nama_fakultas', 'singkatan'], 'string', 'max' => 45, 'message' => 'Nama fakultas tidak boleh kosong.'],
            [['id_fakultas'], 'unique'],
            [['id_univ'], 'exist', 'skipOnError' => true, 'targetClass' => Universitas::class, 'targetAttribute' => ['id_univ' => 'id_univ']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fakultas' => 'Id Fakultas',
            'id_univ' => 'Id Univ',
            'nama_fakultas' => 'Nama Fakultas',
            'singkatan' => 'Singkatan',
        ];
    }

    /**
     * Gets query for [[Prodis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdis()
    {
        return $this->hasMany(Prodi::class, ['id_fakultas' => 'id_fakultas']);
    }

    /**
     * Gets query for [[Univ]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUniv()
    {
        return $this->hasOne(Universitas::class, ['id_univ' => 'id_univ']);
    }
}
