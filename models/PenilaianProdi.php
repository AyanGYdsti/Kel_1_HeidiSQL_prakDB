<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian_prodi".
 *
 * @property string $tahun
 * @property int $id_indikator
 * @property int $id_prodi
 * @property float|null $nilai
 *
 * @property Indikator $indikator
 * @property Prodi $prodi
 */
class PenilaianProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian_prodi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun',], 'required', 'message' => 'Tahun tidak boleh kosong.'],
            [['id_indikator',], 'required', 'message' => 'Nama indikator tidak boleh kosong.'],
            [['id_prodi'], 'required', 'message' => 'Nama Prodi tidak boleh kosong.'],
            [['id_indikator', 'id_prodi'], 'integer'],
            [['nilai'], 'number'],
            [['tahun'], 'string', 'max' => 4],
            [['tahun', 'id_indikator', 'id_prodi'], 'unique', 'targetAttribute' => ['tahun', 'id_indikator', 'id_prodi']],
            [['id_indikator'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::class, 'targetAttribute' => ['id_indikator' => 'id_indikator']],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::class, 'targetAttribute' => ['id_prodi' => 'id_prodi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tahun' => 'Tahun',
            'id_indikator' => 'Nama Indikator',
            'id_prodi' => 'Nama Prodi',
            'nilai' => 'Nilai',
        ];
    }

    /**
     * Gets query for [[Indikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(Indikator::class, ['id_indikator' => 'id_indikator']);
    }

    /**
     * Gets query for [[Prodi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdi()
    {
        return $this->hasOne(Prodi::class, ['id_prodi' => 'id_prodi']);
    }
}
