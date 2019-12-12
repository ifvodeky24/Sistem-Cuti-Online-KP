<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_cuti".
 *
 * @property int $id_cuti
 * @property int $id_user
 * @property string $Keterangan
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $status
 * @property int $jumlah_cuti
 * @property string $tanggal_update
 *
 * @property TbUser $user
 */
class Cuti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_cuti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'Keterangan', 'status', 'jumlah_cuti'], 'required'],
            [['id_user', 'jumlah_cuti'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'tanggal_update'], 'safe'],
            [['status'], 'string'],
            [['Keterangan'], 'string', 'max' => 250],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cuti' => 'Id Cuti',
            'id_user' => 'Nama Karyawan',
            'Keterangan' => 'Keterangan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'status' => 'Status',
            'jumlah_cuti' => 'Jumlah Cuti',
            'tanggal_update' => 'Tanggal Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id_user' => 'id_user']);
    }
}
