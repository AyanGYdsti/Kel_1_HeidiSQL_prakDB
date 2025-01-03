<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_akreditas".
 *
 * @property int $id_kategori
 * @property string|null $deskripsi
 *
 * @property AkreditasProdi[] $akreditasProdis
 */
class KategoriAkreditas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_akreditas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kategori'], 'required', 'message' => 'Kode kategori akreditasi tidak boleh kosong.'],
            [['id_kategori'], 'integer'],
            [['deskripsi'], 'string', 'max' => 45],
            [['id_kategori'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'deskripsi' => 'Deskripsi',
        ];
    }

    /**
     * Gets query for [[AkreditasProdis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasProdis()
    {
        return $this->hasMany(AkreditasProdi::class, ['id_kategori' => 'id_kategori']);
    }
}
