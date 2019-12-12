<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

use Yii;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accesToken
 * @property int $NIP
 * @property string $nama_karyawan
 * @property string $jenis_kelamin
 * @property string $jabatan
 * @property string $divisi
 * @property string $level
 * @property int $cuti
 * @property string $foto_profil
 *
 * @property TbCuti[] $tbCutis
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accesToken', 'NIP', 'nama_karyawan', 'jenis_kelamin', 'jabatan', 'divisi', 'level', 'foto_profil'], 'required'],
            [['foto_profil'], 'file', 'extensions' => 'gif, jpg, png'],
            [['NIP', 'cuti'], 'integer'],
            [['jenis_kelamin', 'divisi', 'level'], 'string'],
            [['username', 'authKey', 'accesToken', 'nama_karyawan', 'jabatan', 'foto_profil'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accesToken' => 'Acces Token',
            'NIP' => 'Nip',
            'nama_karyawan' => 'Nama Karyawan',
            'jenis_kelamin' => 'Jenis Kelamin',
            'jabatan' => 'Jabatan',
            'divisi' => 'Divisi',
            'level' => 'Level',
            'cuti' => 'Total Cuti',
            'foto_profil' => 'Foto Profil',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // mencari user berdasarkan ID dan yg dicari hanya 1
        $user = User::findOne($id);

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      // mencari user berdasarkan accesToken dan yang dicari hanya 1
      $user = User::find()->where(['accessToken' => $token])->one();

      if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
      // mencari user berdasarkan username dan yang dicari haya 1
        $user = User::find()->where(['username' => $username])->one();

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuti()
    {
        return $this->hasMany(Cuti::className(), ['id_user' => 'id_user']);
    }
}
