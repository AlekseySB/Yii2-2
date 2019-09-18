<?php


namespace backend\modules\profiles\controllers;


use backend\modules\profiles\base\BaseController;
use backend\modules\profiles\infrastructure\ProfileStorageMysql;
use backend\modules\profiles\models\ProfileCreateForm;
use backend\modules\profiles\services\contracts\ProfileService;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;

class ProfileController extends BaseController
{
    /**
     * @var ProfileService
     */
    public $service;

    public function __construct(string $id, $module, array $config = [])
    {
        $connection = \Yii::$app->db;
//        print_r($connection);exit();
        $storage = new ProfileStorageMysql($connection);
        $this->service = new \backend\modules\profiles\services\ProfileService($storage) ;

        parent::__construct($id, $module, $config);
    }

    public function actionCreate(){

        $model = new ProfileCreateForm();

        if (\Yii::$app->request->isPost){

            $model->load(\Yii::$app->request->post());

            if($profile = $this->service->createProfile($model)){

                return $this->redirect(['/profile/view', 'uuid'=>$profile->getUuid()]);
            }
        }

        return $this->render('create',['model'=>$model]);
    }
}