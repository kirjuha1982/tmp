<?php

namespace backend\controllers;

use common\base\PublicParams;
use common\models\MusicAlbumArtist;
use common\models\MusicAlbumGenre;
use common\models\MusicAlbumTag;
use common\models\MusicArtist;
use common\models\MusicGenre;
use common\models\MusicSong;
use Yii;
use common\models\MusicAlbum;
use backend\models\search\MusicAlbumSearch;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use yii\imagine\Image;
use Imagine\Image\Point;
use Imagine\Image\Box;

/**
 * MusicAlbumController implements the CRUD actions for MusicAlbum model.
 */
class MusicAlbumController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'remove-music' => ['post'],
                    'save-sort-music' => ['post'],
                    'save-song-name' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MusicAlbum models.
     * @return mixed
     */
    public function actionIndex()
    {

        $model = new MusicAlbum();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }


        $searchModel = new MusicAlbumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }

    /**
     * Displays a single MusicAlbum model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionUploadMusic($id)
    {
        $musicFile = UploadedFile::getInstanceByName('file');
        $directory = Yii::getAlias("@storage") . "/web/source/music/album/" . $id . "/music/";
        $album = MusicAlbum::findOne($id);


        if ($musicFile && $album) {
            BaseFileHelper::createDirectory($directory);
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $musicFile->extension;

            $filePath = $directory . $fileName;
            if ($musicFile->saveAs($filePath)) {

                $music = new MusicSong();
                $music->album_id = $id;
                $music->name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $musicFile->name);
                $music->file = $fileName;
                $music->active = 1;
                $music->sort = 0;
                if($music->save()){
                    return Json::encode([
                       'id'=> $music->id,
                       'file'=> $music->file,
                       'name'=> $music->name,
                       'sort'=> $music->sort,
                    ]);
                }
            }
        }
        return 0;
    }


    public function actionUploadImage($id){
        $imageFile = UploadedFile::getInstanceByName('file');
        $directory = Yii::getAlias("@storage")."/web/source/music/album/".$id."/image/";

        $album = MusicAlbum::findOne($id);


        if ($imageFile && $album) {
            BaseFileHelper::createDirectory($directory);

            if($album->image){
                @unlink($directory.$album->image);
            }

            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;

            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $size = getimagesize($filePath);
                if($size[0] > $size[1]){
                    $size_resize = $size[1];
                }else{
                    $size_resize = $size[0];
                }
                $tumb = $directory.'tumb_'.$fileName;

                if($size_resize > 300){
                    Image::crop($filePath, $size_resize, $size_resize, [(($size[0] - $size_resize)/2), (($size[1] - $size_resize)/2)])
                        ->save($tumb, ['quality' => 70]);
                    Image::frame($tumb, 0, '666', 0)
                        ->thumbnail(new Box(300,300))
                        ->save($tumb, ['quality' => 70]);
                }
                else{

                    Image::frame($filePath, 0, '666', 0)
                        ->thumbnail(new Box(300,300))
                        ->save($tumb, ['quality' => 70]);
                }

                Image::frame($filePath, 0, '666', 0)
                    ->thumbnail(new Box(3000,3000))
                    ->save($filePath, ['quality' => 70]);

                $album->image = $fileName;
                $album->save();

                return Yii::getAlias("@storageUrl")."/web/source/music/album/".$id."/image/".$fileName;
            }
        }
        return 0;
    }


    public function actionRemoveMusic($id){
        $song_id = Yii::$app->request->post('song_id');
        $music = MusicSong::findOne(['id'=>$song_id, 'album_id'=>$id]);
        if($music){
            $directory = Yii::getAlias("@storage") . "/web/source/music/album/" . $id . "/music/";
            @unlink($directory.$music->file);
            if($music->delete())
                return 1;
        }
        return 0;
    }

    public function actionSaveSortMusic($id){
        $songs = Yii::$app->request->post('result');
        if(count($songs) > 0){
            foreach ($songs as $song){
                $s = MusicSong::findOne(['id'=>$song['id'], 'album_id'=>$id]);
                if($s){
                    $s->sort = $song['sort'];
                    $s->save();
                }
            }
        }
        return 1;
    }

    public function actionSaveSongName($id){
        $song_id = Yii::$app->request->post('song_id');
        $name = Yii::$app->request->post('name');
        if($song_id && $name){
            $song = MusicSong::findOne(['id'=>$song_id, 'album_id'=>$id]);
            if($song){
                $song->name = $name;
                if($song->save()){
                    return 1;
                }
            }
        }
        return 0;
    }

    /**
     * Updates an existing MusicAlbum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $post = Yii::$app->request->post();

            MusicAlbumGenre::deleteAll(['album_id'=>$model->id]);

            if(isset($post['Genres'])  && count($post['Genres']) > 0){
                foreach ($post['Genres'] as $key=>$item){
                    $mag = new MusicAlbumGenre();
                    $mag->album_id = $model->id;
                    $mag->genre_id = $key;
                    $mag->save();
                }
            }

            MusicAlbumArtist::deleteAll(['album_id'=>$model->id]);
            if(isset($post['Artist'])  && count($post['Artist']) > 0){
                foreach ($post['Artist'] as $key=>$item){
                    $maa = new MusicAlbumArtist();
                    $maa->album_id = $model->id;
                    $maa->artist_id = $key;
                    $maa->save();
                }
            }


            return $this->redirect(['index', 'id' => $model->id]);
        } else {

            $checked_genre = ArrayHelper::toArray(MusicGenre::genreAlbum($model->id));
            $checked_genre = ArrayHelper::map($checked_genre, 'id', 'id');

            $checked_artist = ArrayHelper::toArray(MusicArtist::artistAlbum($model->id));
            $checked_artist = ArrayHelper::map($checked_artist, 'id', 'id');

            $genres = ArrayHelper::toArray(MusicGenre::find()->select(['id', 'name'])->orderBy(['name'=>SORT_ASC])->all());

            $artistes = [];

            $art_tmp = [];
            $art = ArrayHelper::toArray(MusicArtist::find()->select(['id', 'letter', 'name'])->orderBy(['letter'=>SORT_ASC, 'name'=>SORT_ASC])->all());
            foreach ($art as $artist){
                $art_tmp[$artist['letter']][] = $artist;
            }



            if(count($art_tmp)> 0){
                foreach ($art_tmp as $main_key=>$main_item){
                    $tmp = [];
                    $tmp['label'] = PublicParams::returnLetter($main_key);
                    $tmp['content'] = '<ul>';
                    if(count($main_item) > 0){
                        foreach ($main_item as $item){
                            $tmp['content'] .= '<li>'.Html::checkbox(
                                    'Artist['.$item['id'].']',
                                    in_array($item['id'], $checked_artist)?true:false,
                                    ['label'=>$item['name']]).'</li>';
                        }
                       // $tmp['content'] .= Html::checkbox('Artist['.$main_item['id'].']', false, ['label'=>$main_item['name']]);
                    }
                    $tmp['content'] .= '</ul>';

                    $artistes[] = $tmp;
                }
            }


            $music = MusicSong::find()->where(['album_id'=>$model->id])->orderBy(['sort'=>SORT_ASC])->all();

            return $this->render('update', [
                'model' => $model,
                'genres' => $genres,
                'artistes'=>$artistes,
                'checked_genre'=>$checked_genre,
                'musics'=>$music
            ]);
        }
    }

    /**
     * Deletes an existing MusicAlbum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $directory = Yii::getAlias("@storage") . "/web/source/music/album/" . $id;
        BaseFileHelper::removeDirectory($directory);
        return $this->redirect(['index']);
    }

    /**
     * Finds the MusicAlbum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MusicAlbum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MusicAlbum::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    public function beforeAction($action) {
        $this->enableCsrfValidation = (
            $action->id !== "upload-image" &&
            $action->id !== "remove-music" &&
            $action->id !== "save-sort-music" &&
            $action->id !== "save-song-name" &&
            $action->id !== "upload-music"
        );
        return parent::beforeAction($action);
    }
}
