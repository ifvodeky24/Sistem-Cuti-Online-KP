<?php

namespace app\controllers;

use Yii;
use app\models\Cuti;
use app\models\User;
use app\models\CutiSeacrh;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;

/**
 * CutiController implements the CRUD actions for Cuti model.
 */
class CutiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cuti models.
     * @return mixed
     */
    public function actionIndex()
    {

    $model= (new \yii\db\Query())
    ->select('*')
    ->from('tb_cuti')
    ->orderBy('tanggal_update DESC')
    ->all();

    return $this->render('index', [
        'model'=>$model,
        ]);
    }

    public function actionIndexPengajuan()
    {

    $id_user = Yii::$app->user->identity['id_user'];

    $model= (new \yii\db\Query())
    ->select('*')
    ->from('tb_cuti')   
    ->where(['id_user'=> $id_user])
    ->orderBy('tanggal_update DESC')
    ->all();

    return $this->render('index-pengajuan', [
        'model'=>$model,
        ]);
    }

    public function actionIndexManager()
    {

    $model= (new \yii\db\Query())
    ->select('*')
    ->from('tb_cuti')
    ->orderBy('tanggal_update DESC')
    ->all();

    return $this->render('index-manager', [
        'model'=>$model,
        ]);
    }

    public function actionIndexSupervisor()
    {

    $divisi = Yii::$app->user->identity['divisi'];

    $model= (new \yii\db\Query())
    ->select('*')
    ->from('tb_cuti')
    ->leftJoin('tb_user', 'tb_user.id_user = tb_cuti.id_user')
    ->where(['tb_user.divisi' => $divisi])
    ->orderBy('tanggal_update DESC')
    ->all();

    return $this->render('index-supervisor', [
        'model'=>$model,
        ]);
    }

    /**
     * Displays a single Cuti model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewPengajuan($id)
    {
        return $this->render('view-pengajuan', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewManager($id)
    {
        return $this->render('view-manager', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewSupervisor($id)
    {
        return $this->render('view-supervisor', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionPrintLaporan()
    {
       $model = new Cuti();

       $data= (new \yii\db\Query());
       $data  
       ->select(['tb_cuti.*', 'tb_user.*']) 
       ->from('tb_cuti')
       ->leftJoin('tb_user', 'tb_user.id_user = tb_cuti.id_user');
       $command = $data->createCommand();
       $modelasset = $command->queryAll();


       $mpdf = new \Mpdf\Mpdf();
       $mpdf->SetTitle('Laporan Data Cuti');
       $mpdf->WriteHTML($this->renderPartial('hasil-laporan',[
            'model' => $model,
            'modelasset' => $modelasset,
        ]
        ));
        $mpdf->Output('Laporan Data Cuti.pdf','I');
        exit;
    }

    /**
     * Creates a new Cuti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cuti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cuti]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateCuti()
    {
        $model = new Cuti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-pengajuan', 'id' => $model->id_cuti]);
        }

        return $this->render('create-cuti', [
            'model' => $model,
        ]);
    }

    public function actionValidasiManager($id) {
    
      $cuti = Cuti::find()
                        ->where(['id_cuti' => $id])
                        ->one();

      $cuti->status= 'Disetujui';

      if ($cuti->update(false)) {
            $user = User::find()
                        ->where(['id_user' => $cuti->id_user])
                        ->one();

            $user->cuti  = $user->cuti+1;

            $user->update(false);
      }

      $model= (new \yii\db\Query())
                ->select('*')
                ->from('tb_cuti')
                ->orderBy('id_cuti ASC')
                ->all();

      return $this->render('index-manager', [
    // 'dataProvider' => $dataProvider,
    'model'=>$model,
    ]);

   }

   public function actionValidasiSupervisor($id) {
    
      $cuti = Cuti::find()
                        ->where(['id_cuti' => $id])
                        ->one();

      $cuti->status= 'Disetujui';

      if ($cuti->update(false)) {
            $user = User::find()
                        ->where(['id_user' => $cuti->id_user])
                        ->one();

            $user->cuti  = $user->cuti+1;

            $user->update(false);
      }

      $model= (new \yii\db\Query())
                ->select('*')
                ->from('tb_cuti')
                ->orderBy('id_cuti ASC')
                ->all();

      return $this->render('index-supervisor', [
    // 'dataProvider' => $dataProvider,
    'model'=>$model,
    ]);

   }

   public function actionBatalValidasiManager($id) {
    
      $cuti = Cuti::find()
                        ->where(['id_cuti' => $id])
                        ->one();

      $cuti->status= 'Belum Disetujui';

      if ($cuti->update(false)) {
            $user = User::find()
                        ->where(['id_user' => $cuti->id_user])
                        ->one();

            $user->cuti  = $user->cuti-1;

            $user->update(false);
      }

      $model= (new \yii\db\Query())
                ->select('*')
                ->from('tb_cuti')
                ->orderBy('id_cuti ASC')
                ->all();

      return $this->render('index-manager', [
    // 'dataProvider' => $dataProvider,
    'model'=>$model,
    ]);

   }

   public function actionBatalValidasiSupervisor($id) {
    
      $cuti = Cuti::find()
                        ->where(['id_cuti' => $id])
                        ->one();

      $cuti->status= 'Belum Disetujui';

      if ($cuti->update(false)) {
            $user = User::find()
                        ->where(['id_user' => $cuti->id_user])
                        ->one();

            $user->cuti  = $user->cuti-1;

            $user->update(false);
      }

      $model= (new \yii\db\Query())
                ->select('*')
                ->from('tb_cuti')
                ->orderBy('id_cuti ASC')
                ->all();

      return $this->render('index-supervisor', [
    // 'dataProvider' => $dataProvider,
    'model'=>$model,
    ]);

   }

    /**
     * Updates an existing Cuti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cuti]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cuti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
      $cuti = Cuti::find()
                        ->where(['id_cuti' => $id])
                        ->one();

      if ($cuti->update(false)) {
            $user = User::find()
                        ->where(['id_user' => $cuti->id_user])
                        ->one();

            $user->cuti  = $user->cuti-1;

            $user->update(false);

            $this->findModel($id)->delete();
      }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cuti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cuti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cuti::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
