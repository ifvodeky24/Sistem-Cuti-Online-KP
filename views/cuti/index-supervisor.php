<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CutiSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$id_user=Yii::$app->user->identity->id_user;
$datas = User::find()
        ->where(['id_user' => $id_user])
        ->one();

$this->title = 'Laporan Data Cuti';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
    <div class="box-header">
    <b><center> <h3 class="box-title">Laporan Data Cuti</h3></center></b>
    </div>

    <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
        <th><center>No</center></th>
        <th><center>Nama Karyawan</center></th>
        <th><center>NIP</center></th>
        <th><center>Jabatan</center></th>
        <th><center>Tanggal Mulai Cuti</center></th>
        <th><center>Tanggal Selesai Cuti</center></th>
        <th><center>Status Cuti</center></th>
        <th><center>Tanggal Update</center></th>
        <th><center>Aksi</center></th>
        </tr>

    </thead>
    <tbody>
        <?php
        $no=1;foreach($model as $db):

        $data = User::find()
                ->where(['id_user' => $db['id_user']])
                ->one();
        ?>

        <tr>
        <td><center> <?= $no;?> </center> </td>
        <td><center> <?= $data['nama_karyawan'];?> </center> </td>
        <td><center> <?= $data['NIP'];?> </center> </td>
        <td><center> <?= $data['jabatan'];?> </center> </td>
        <td><center> <?= $db['tanggal_mulai'];?> </center> </td>
        <td><center> <?= $db['tanggal_selesai'];?> </center> </td>
        <?php if($db['status']=='Belum Disetujui'){?>

        <td><center> <label class="label label-danger"><?= $db['status'];?></label>  </center> </td>

        <?php }else{ ?>

        <td><center> <label class="label label-success"><?= $db['status'];?></label>  </center> </td>

        <?php } ?>

        <td><center> <?= $db['tanggal_update'];?> </center> </td>

        <td><center> 
        <?= Html::a('<i class="fa fa-search"></i>', ['/cuti/view-supervisor', 'id' =>$db['id_cuti']], ['class' => 'btn btn-warning btn-xs']) ?>

        <?php if($db['status']=='Belum Disetujui'){?>

        <?= Html::a('<i class="fa fa-flag-o"></i>', ['/cuti/validasi-supervisor', 'id' => $db['id_cuti']], [
                    'class' => 'btn btn-success btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin ingin memvalidasi data cuti "'.$data['nama_karyawan'].'"?',
                    'method' => 'post',
                    ]
                    ]);
        ?>

        <?php }else{ ?>

        <?= Html::a('<i class="fa fa-flag-o"></i>', ['/cuti/batal-validasi-supervisor', 'id' => $db['id_cuti']], [
                    'class' => 'btn btn-danger btn-xs',
                    'data' => [
                    'confirm' => 'anda yakin ingin membatalkan validasi data cuti "'.$data['nama_karyawan'].'"?',
                    'method' => 'post',
                    ]
                    ]);
        ?>

        <?php } ?>

            </center> </td>
            </tr>

            <?php $no++;endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
</div>
