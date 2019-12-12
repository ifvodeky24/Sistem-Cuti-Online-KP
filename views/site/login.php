<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <br><br>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="login-box-body">
                <div class="login-logo">
                <a href="#"><b>Sistem </b>Cuti Online</a>
                </div>

                <div class="text-center">
                             <i><h5 class="text">Silahkan login terlebih dahulu</h5></i>
                             <br>
                     </div>

            <form action="../../index2.html" method="post">
              <div class="form-group has-feedback">
                <?= $form
                                ->field($model, 'username')
                                ->textInput(['placeholder' => $model->getAttributeLabel('username')])
                                ->label(false) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <?= $form
                        ->field($model, 'password')
                        ->passwordInput(['placeholder' => $model->getAttributeLabel('password')])
                        ->label(false) ?>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-xs-4">

                </div>
                <!-- /.col -->
                <div class="col-xs-12">
                            <?= Html::submitButton('Login', ['class'=>['btn btn-primary btn-bordred col-xs-12'], 'name' => 'login']) ?>
                </div>
                <!-- /.col -->
              </div>
            </form>

                <div class="logo text-center">
                    <br>
                <p> <b>&copy;PT.Kunango Jantan<br> <?=date('Y') ?></b></p>

            </div>

          </div>
    <?php ActiveForm::end(); ?>


</div>