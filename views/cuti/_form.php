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

    <?php 
        $nama_karyawan = ArrayHelper::map(User::find()->all(),'id_user','nama_karyawan');
        echo $form->field($model, 'id_user')->dropDownList($nama_karyawan,['prompt'=>'Pilih Nama Karyawan...']);
    ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput(['type'=> 'date']) ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput(['type'=> 'date']) ?>

    <?= $form->field($model, 'status')->textInput(['value'=> 'Belum Disetujui', 'readonly'=> true]) ?>

    <?= $form->field($model, 'jumlah_cuti')->textInput(['value'=> 0, 'readonly'=> true]) ?>

    <?= $form->field($model, 'Keterangan')->textInput(['maxlength' => true, 'placeholder'=>'Alasan mengambil cuti']) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
