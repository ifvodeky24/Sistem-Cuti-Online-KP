<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */

$data = User::find()
                ->where(['id_user' => $model['id_user']])
                ->one();

$this->title = $data->nama_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Status Pengajuan Cuti', 'url' => ['index-pengajuan']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cuti-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cuti',
            'user.nama_karyawan',
            'user.NIP',
            'user.jabatan',
            'user.divisi',
            // [
            //     'label'=>'user.foto_profil',
            //     'format'=>'raw',
            //     'value' => function($data){
            //         $url = Yii::$app->getHomeUrl()."/files/images/".$data['foto_profil'];
            //         return Html::img($url,['alt'=>'Gambar Tidak Ada', 'class'=>'img-circle user-img', 'height'=>'100', 'width'=>'100', 'style'=>'object-fit: cover']);
            //     }
            // ],
            'Keterangan',
            'tanggal_mulai',
            'tanggal_selesai',
            'status',
            'jumlah_cuti',
            'tanggal_update',
        ],
    ]) ?>

</div>
