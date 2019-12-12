<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accesToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIP')->textInput() ?>

    <?= $form->field($model, 'nama_karyawan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'divisi')->dropDownList([ 'Direksi' => 'Direksi', 'Operasional' => 'Operasional', 'PPIC' => 'PPIC', 'Produksi' => 'Produksi', 'HRD' => 'HRD', 'Litbang&QC' => 'Litbang&QC', 'Maintenance' => 'Maintenance', 'Marketing' => 'Marketing', 'Purchasing' => 'Purchasing', 'Accounting&Keuangan' => 'Accounting&Keuangan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'level')->dropDownList([ 'Admin' => 'Admin', 'Manager HRD' => 'Manager HRD', 'Karyawan' => 'Karyawan', 'Supervisor' => 'Supervisor', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cuti')->textInput() ?>

    <?= $form->field($model, 'foto_profil')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
