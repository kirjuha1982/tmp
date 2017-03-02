<?php

namespace frontend\modules\api\v1\controllers;

use common\models\User;
use frontend\modules\api\v1\resources\User as UserResource;
use yii\base\Exception;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UserController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'frontend\modules\api\v1\resources\User';

    /**
     * @return array
     */
    public function behaviors()
    {

        $behaviors = parent::behaviors();
        /*$behaviors['authenticator']['class'] = HttpBearerAuth::className();
        $behaviors['authenticator']['only'] = ['update'];*/
        /*
                $behaviors['authenticator'] = [
                    'class' => CompositeAuth::className(),
                    'authMethods' => [
                        [
                            'class' => HttpBasicAuth::className(),
                            'auth' => function ($username, $password) {
                                $user = User::findByLogin($username);
                                return $user->validatePassword($password)
                                    ? $user
                                    : null;
                            }
                        ],
                        HttpBearerAuth::className(),
                        QueryParamAuth::className()
                    ]
                ];*/

        return $behaviors;
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass
            ],

            'options' => [
                'class' => 'yii\rest\OptionsAction'
            ]
        ];
    }


    public function actionChangePassword($id, $email, $password){
        $user = User::findOne(['email'=>$email, 'id'=>$id]);
        if($user && $user->id != 1){
            $user->setPassword($password);
            if(!$user->save()) {
                return [
                    'status'=>false,
                    'message'=>'Password couldn\'t be  saved'
                ];
            };
            return [
                'status'=>true,
                'message'=>'Password saved',
                'user_id'=>$user->id
            ];
        }else{
            return [
                'status'=>false,
                'email'=>$email,
                'user_id'=>$id,
                'message' =>'User not found or user_id = 1'
            ];
        }
    }

    public function actionCheckEmail($email){
        $user = User::findOne(['email'=>$email]);
        if($user){
            return [
                'status'=>false,
                'email'=>false,
                'user_id'=>$user->id
            ];
        }else{
            return [
                'status'=>true,
                'email'=>true
            ];
        }
    }

    public function actionRegistration($email, $password)
    {
        $model = User::findOne(['email'=>$email]);
        if ($model) {
            return [
                'status'=>false,
                'email'=>false,
                'message'=>'Email busy'
            ];
        }

        $user = new User();
        $user->email = $email;
        $user->status = User::STATUS_ACTIVE;
        $user->setPassword($password);
        if(!$user->save()) {
            return [
                'status'=>false,
                'email'=>true,
                'message'=>'User couldn\'t be  saved'
            ];
        };
        $user->afterSignup();

        return [
            'status'=>true,
            'email'=>true,
            'id'=>$user->id
        ];
    }

    /**
     * @param $id
     * @return null|static
     * @throws NotFoundHttpException
     */
    public function findModel($id)
    {
        $model = UserResource::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }
        return $model;
    }
}
