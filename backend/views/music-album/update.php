<?php

use common\models\MusicAlbum;
use common\models\MusicArtist;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Progress;
use yii\helpers\Html;
use yii\bootstrap\Tabs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model common\models\MusicAlbum */
/* @var $music common\models\MusicSong */
/* @var $genres array */
/* @var $artistes array */
/* @var $checked_genre array */
/* @var $musics array */

$this->title = 'Update Music Album: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Music Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?php $form = ActiveForm::begin(); ?>

<div class="col-xs-12 text-right">
    <?php echo $form->field($model, 'active')->checkbox() ?>

    <?php echo Html::submitButton('Save Album', ['class' => 'btn btn-success']) ?>
</div>


<div class="row">
    <div class="col-sm-3">
        <img src="<?=MusicAlbum::albumImage($model->id, $model->image, 'full')?>" alt="..." class="img-thumbnail img-responsive" id="album-image">
        <?php
        echo Progress::widget([
            'percent' => 0,
            'barOptions' => [
                'class' => 'progress-bar progress-bar-success progress-bar-indicating active'
            ],
            'options' => [
                'class' => 'progress progress-xs upload-image-uploader'
            ]
        ]);
        ?>
        <input type="file" id="upload-image"  style="margin: 10px 0" value="Upload Image">
        <hr>
        <h4>Add song</h4>



        <div id="song_fields_input">
            <input type="file" class="dropify" id="music_file" multiple/>
        </div>
        <br>
        <br>
    </div>
    <div class="col-sm-9">
        <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?php echo $form->field($model, 'year')->textInput(['maxlength' => true]) ?>
        <?php echo $form->field($model, 'tags')->textInput(['maxlength' => true, 'data-plugin'=>'tokenfield']) ?>



        <div class="form-group">
            <h4 class="control-label">Genre</h4>
            <div class="row">
                <div class="col-md-6">
                <?php
                $i = 0;
                foreach ($genres as $genre): ?>
                    <label><input type="checkbox" name="Genres[<?=$genre['id']?>]" <?=in_array($genre['id'], $checked_genre)?"checked":""?> value="1"> <?=$genre['name']?></label><br>
                    <?php
                    $i++;
                    if(round(count($genres)/2) == $i){
                        echo '</div><div class="col-md-6">';
                    }
                    ?>

                <?php endforeach;?>
                </div>
            </div>
        </div>

        <h4>Artists</h4>
        <?=MusicArtist::artistTextList($model->id); ?>
        <div class="artist-tabs">
            <?php
            echo Tabs::widget([
                'items' => $artistes,
            ]);
            ?>
        </div>

    </div>


    <div class="col-xs-12">
        <h4>Songs list</h4>

        <div id="progress_upload_song">
            <div>

                <span class="s_name">File name</span>
                <span class="glyphicon glyphicon-remove remove-uploading" aria-hidden="true"></span>
                <?php

                echo Progress::widget([
                    'percent' => 0,
                    'barOptions' => [
                        'class' => 'progress-bar progress-bar-striped active'
                    ],
                    'options' => [
                        'class' => 'progress progress-xs'
                    ]
                ]);
                ?>

            </div>

        </div>


        <ul class="list-group list-group-gap sortable" id="song_list">
            <?php foreach ($musics as $music): ?>
                <li class="list-group-item list-group-item-success" data-id="<?=$music->id?>">
                    <span class="pull-xs-right">
                      <a href="#" class="edit_song"><i class="icon md-edit white" aria-hidden="true"></i></a>
                      <a href="#" class="remove_song"><i class="icon md-close white" aria-hidden="true"></i></a>
                    </span>
                    <span class="pull-xs-left"><i class="icon md-swap-vertical" aria-hidden="true"></i></span>
                    <span class="edit_field"><?=$music->name?></span>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

<?php ActiveForm::end(); ?>


<div id="music_single_tpl" class="hidden">
    <li class="list-group-item list-group-item-success">
                    <span class="pull-xs-right">
                      <a href="#" class="edit_song"><i class="icon md-edit white" aria-hidden="true"></i></a>
                      <a href="#" class="remove_song"><i class="icon md-close white" aria-hidden="true"></i></a>
                    </span>
        <span class="pull-xs-left"><i class="icon md-swap-vertical" aria-hidden="true"></i></span>
        <span class="edit_field"></span>
    </li>
</div>

<script>
    var upload_image = "<?=Url::to(['upload-image', 'id'=>$model->id])?>";
    var upload_music = "<?=Url::to(['upload-music', 'id'=>$model->id])?>";

    var remove_music = "<?=Url::to(['remove-music', 'id'=>$model->id])?>";

    var save_sort_music = "<?=Url::to(['save-sort-music', 'id'=>$model->id])?>";
    var save_song_name = "<?=Url::to(['save-song-name', 'id'=>$model->id])?>";
</script>
<?php
$this->registerJs( <<<JS
$(function(){
    
    var song_list = $("#song_list");
    var song_fields_input = $("#song_fields_input");
    var progress_upload_song = $("#progress_upload_song");
    var song_file = song_fields_input.html();
    var ai = 1;
    
    var song_progress_file = progress_upload_song.html();
    progress_upload_song.html('');
    
    createFieldDropMusic();
    
    function createFieldDropMusic(){
        song_fields_input.html('');
        song_fields_input.html(song_file);
        $('.dropify').dropify();
    }
    
    song_fields_input.on("change", "input", function() {
       var inputFile = document.getElementById("music_file");
        $.each(inputFile.files, function(i, item){
            musicUpload(inputFile.files[i]);
        });
       createFieldDropMusic();
    });
   
        
    song_list.on("click", ".remove_song", function(){
        var block = $(this).parents("li");
        var song_id = block.attr("data-id");
        
        if(confirm("Delete "+block.find(".edit_field").text()+"?")){
            $.post(remove_music, {song_id:song_id}, function(data) {
              if(data == 1){
                block.fadeOut();
                setTimeout(function() {
                  block.remove();
                  sortMusic();
                }, 400);
              }
            });
        }
        return false;
    });
    
    function sortMusic(){
        var i = 1;
        var result = [];
        $.each(song_list.find('li'), function(){
            if($(this).attr("data-id")){
                result.push({
                    id:$(this).attr("data-id"),
                    sort:i
                });
                i++;
            }
        });
        
        if(result.length > 0){
            $.post(save_sort_music, {result:result}, function(data) {
              cl(data)
            })
        }
    }

    function formatBytes(bytes,decimals) {
        if(bytes == 0) return '0 Byte';
        var k = 1000; // or 1024 for binary
        var dm = decimals + 1 || 3;
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        var i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    function createNewSong(song){
        var tpl = $("#music_single_tpl");
        tpl.find(".edit_field").text(song.name);
        tpl.find("li").attr("data-id", song.id);
        
        song_list.prepend(tpl.html());
        createMusicSort();
        //sortMusic();
        cl(song);
    }
    
    createMusicSort();
    
    sortable('.sortable')[0].addEventListener('sortupdate', function(e) {
            sortMusic();
        });
    
    function createMusicSort(){
        sortable('.sortable', 'destroy');
        sortable('.sortable');
    }
    
    
    function musicUpload(file){
        
        var tpl = song_progress_file;
        
        ai++;
        
        tpl = $(tpl);
       
        tpl.find(".s_name").text(file.name+' ('+formatBytes(file.size, 1)+')');
        tpl = '<div class="__upl_pb" id="__upl_'+ai+'">'+tpl.html()+'</div>';        
        progress_upload_song.append(tpl);
        
        var parent_id = "__upl_"+ai;
        
        var prog = function (event) {
            var percent = parseInt(event.loaded / event.total * 100);
            $("#"+parent_id).find('.progress-bar').width(percent+'%');
        };

        
        
        var formData = new FormData();
        formData.append("file", file);

        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', prog, false);
        xhr.open('POST', upload_music, true);
        xhr.setRequestHeader('X-FILE-NAME', 'file');
        xhr.send(formData);
        xhr.onreadystatechange = function() { // (3)
            if (xhr.readyState != 4) return;
            if (xhr.status != 200) {
                cl(xhr.status + ': ' + xhr.statusText);
            } else {
                
                if(xhr.responseText != 0){
                    createNewSong(JSON.parse(xhr.responseText));
                    $("#"+parent_id).fadeOut();
                }

            }
        }; 
        
        $("#"+parent_id).find('.remove-uploading').bind( "click", function() {
            $("#"+parent_id).fadeOut();
            xhr.abort();
        });
        
        
    }


    var upload_image_uploader = $(".upload-image-uploader");
    
    $("#upload-image").change(function(){
        var inputFile = document.getElementById('upload-image');

        var prog = function (event) {
            var percent = parseInt(event.loaded / event.total * 100);
            upload_image_uploader.find('.progress-bar').width(percent+'%');
        };

        $(".upload-image-uploader").fadeIn();

        var formData = new FormData();
        formData.append("file", inputFile.files[0]);

        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener('progress', prog, false);
        xhr.open('POST', upload_image, true);
        xhr.setRequestHeader('X-FILE-NAME', 'file');
        xhr.send(formData);
        xhr.onreadystatechange = function() { // (3)
            if (xhr.readyState != 4) return;
            if (xhr.status != 200) {
                cl(xhr.status + ': ' + xhr.statusText);
            } else {
                if(xhr.responseText != 0){
                    $("#album-image").attr("src", xhr.responseText);
                    upload_image_uploader.fadeOut();
                    upload_image_uploader.find('.progress-bar').width('0');
                    inputFile.val = '';
                }

            }
        };
    });
    
    song_list.on("click", ".edit_song", function(){
        var block = $(this).parents("li");
        var name = block.find(".edit_field").text();
        if($(this).find("i").hasClass("md-assignment-check")){
            $(this).find("i").removeClass("md-assignment-check").addClass("md-edit");
            
            var song_id = block.attr("data-id");
            
            if($.trim(block.find(".form-control").val())  != ""){
                name = $.trim(block.find(".form-control").val());
            }else{
                name = "No name";
            }
            block.find(".edit_field").text(name);
            if(song_id && name){
                $.post(save_song_name, {song_id:song_id, name:name}, function(data) {
                })
            }
        }else{
            block.find(".edit_field").html('<input type="text" class="form-control" value="'+name+'">');
            $(this).find("i").addClass("md-assignment-check").removeClass("md-edit");
        }
        return false;
    })
})

JS
);
?>
<?php

$this->registerCss(<<<CSS
.tab-content ul{
    margin: 20px 0;
    padding: 0;
    list-style: none;
}
CSS
)
?>

