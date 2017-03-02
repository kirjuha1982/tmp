<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace frontend\controllers;

use Yii;
use common\models\Page;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TplController extends Controller
{

    public $layout = "//admin";

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAudioAlbums()
    {
        return $this->render('audio-albums');
    }


    public function actionAudioAlbumCreation()
    {
        return $this->render('audio-album-creation');
    }

    public function actionMoviesList()
    {
        return $this->render('movies-list');
    }


    public function actionMovieCreator()
    {
        return $this->render('movie-creator');
    }

    public function actionCollectionsList()
    {
        return $this->render('collections-list');
    }


    public function actionCollectionCreator()
    {
        return $this->render('collection-creator');
    }
}
