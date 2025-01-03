<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indikator".
 *
 * @property int $id_indikator
 * @property int $id_elemen
 * @property string|null $nama_indikator
 * @property int|null $no_urut
 * @property int|null $aktif
 *
 * @property Elemen $elemen
 * @property PenilaianProdi[] $penilaianProdis
 */
class Indikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_indikator'], 'required', 'message' => 'Kode indikator tidak boleh kosong.'],
            [['id_elemen'], 'required', 'message' => 'Kode elemen tidak boleh kosong.'],
            [['id_indikator', 'id_elemen', 'no_urut', 'aktif'], 'integer'],
            [['nama_indikator'], 'string'],
            [['id_indikator'], 'unique'],
            [['id_elemen'], 'exist', 'skipOnError' => true, 'targetClass' => Elemen::class, 'targetAttribute' => ['id_elemen' => 'id_elemen']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_indikator' => 'Id Indikator',
            'id_elemen' => 'Id Elemen',
            'nama_indikator' => 'Nama Indikator',
            'no_urut' => 'No Urut',
            'aktif' => 'Aktif',
        ];
    }

    /**
     * Gets query for [[Elemen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getElemen()
    {
        return $this->hasOne(Elemen::class, ['id_elemen' => 'id_elemen']);
    }

    /**
     * Gets query for [[PenilaianProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenilaianProdis()
    {
        return $this->hasMany(PenilaianProdi::class, ['id_indikator' => 'id_indikator']);
    }
}
