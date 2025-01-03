<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lembaga_akreditas".
 *
 * @property int $id_lembaga
 * @property string|null $nama_lembaga
 *
 * @property AkreditasProdi[] $akreditasProdis
 */
class LembagaAkreditas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lembaga_akreditas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lembaga'], 'required', 'message' => 'Kode lembaga akreditasi tidak boleh kosong.'],
            [['id_lembaga'], 'integer'],
            [['nama_lembaga'], 'string', 'max' => 145],
            [['id_lembaga'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lembaga' => 'Id Lembaga',
            'nama_lembaga' => 'Nama Lembaga',
        ];
    }

    /**
     * Gets query for [[AkreditasProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasProdis()
    {
        return $this->hasMany(AkreditasProdi::class, ['id_lembaga' => 'id_lembaga']);
    }
}
