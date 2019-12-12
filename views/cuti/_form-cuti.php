<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Cuti */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="cuti-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $id_user = Yii::$app->user->identity['id_user']; ?>
    <?php $nama_karyawan = Yii::$app->user->identity['nama_karyawan']; ?>

    <?= $form->field($model, 'nama_karyawan')->textInput(['value'=> $nama_karyawan, 'readonly'=> true]) ?>

    <?= $form->field($model, 'id_user')->hiddenInput(['value'=> $id_user])->label(false) ?>


    <?= $form->field($model, 'tanggal_mulai')->textInput(['type'=> 'date']) ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput(['type'=> 'date']) ?>

    <?= $form->field($model, 'status')->hiddenInput(['value'=> 'Belum Disetujui'])->label(false) ?>

    <!-- <?= $form->field($model, 'status')->dropDownList([ 'Disetujui' => 'Disetujui', 'Belum Disetujui' => 'Belum Disetujui', ], ['prompt' => 'Pilih Status Cuti']) ?> -->

    <?= $form->field($model, 'jumlah_cuti')->hiddenInput(['value'=> '1'])->label(false) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true, 'placeholder'=>'Alasan mengambil cuti']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
