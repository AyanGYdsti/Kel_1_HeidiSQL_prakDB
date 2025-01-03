<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "elemen".
 *
 * @property int $id_elemen
 * @property string|null $nama_elemen
 * @property string|null $deskripsi
 *
 * @property Indikator[] $indikators
 */
class Elemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'elemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_elemen'], 'required', 'message' => 'Kode elemen tidak boleh kosong.'],
            [['id_elemen'], 'integer'],
            [['deskripsi'], 'string'],
            [['nama_elemen'], 'string', 'max' => 45],
            [['id_elemen'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_elemen' => 'Id Elemen',
            'nama_elemen' => 'Nama Elemen',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * Gets query for [[Indikators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikators()
    {
        return $this->hasMany(Indikator::class, ['id_elemen' => 'id_elemen']);
    }
}
