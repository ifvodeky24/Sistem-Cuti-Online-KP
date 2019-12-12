<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSeacrh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'authKey') ?>

    <?= $form->field($model, 'accesToken') ?>

    <?php // echo $form->field($model, 'NIP') ?>

    <?php // echo $form->field($model, 'nama_karyawan') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'jabatan') ?>

    <?php // echo $form->field($model, 'divisi') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'cuti') ?>

    <?php // echo $form->field($model, 'foto_profil') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
