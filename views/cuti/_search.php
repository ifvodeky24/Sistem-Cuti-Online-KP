<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CutiSeacrh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cuti') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'Keterangan') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?= $form->field($model, 'tanggal_selesai') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'jumlah_cuti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
