<?php

use yii\helpers\Html;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */
$data = User::find()
                ->where(['id_user' => $model['id_user']])
                ->one();


$this->title = 'Ubah Data Cuti ' . $data->nama_karyawan;
$this->params['breadcrumbs'][] = ['label' => 'Data Master Cuti', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $data->nama_karyawan, 'url' => ['view', 'id' => $model->id_cuti]];
$this->params['breadcrumbs'][] = 'Ubah Data Cuti';
?>
<div class="cuti-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
