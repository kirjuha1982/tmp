<?php
use yii\bootstrap\Tabs;
use yii\helpers\Url;
use yii\helpers\Html;

?>



<h1 class="page-title">Create Movie</h1>

<div class="panel">
    <div class="panel-body container-fluid">
        <div class="col-xs-12 text-right">

            <button type="button" class="btn btn-success">Save Movie</button>

        </div>
        <div class="row">
            <div class="col-sm-3">
                <img src="/images/3.jpg" alt="..." class="img-thumbnail img-responsive">
                <input type="file" id="input-file-events" class="dropify-event" style="margin: 10px 0">
                <h4>Trailer</h4>
                <video width="100%"  controls>
                    <source src="/images/1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <input type="file" iclass="dropify-event" style="margin: 10px 0">


                <div class="form-group">
                    <label class="control-label">Video Link</label>
                    <input type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label class="control-label">Audio Link</label>
                    <input type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label class="control-label">Imdb</label>
                    <input type="text" class="form-control" >
                </div>
            </div>
            <div class="col-sm-9">


                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" >
                </div>

                <div class="form-group">
                    <label class="control-label">Year</label>
                    <input type="text" class="form-control" >
                </div>


                <h4>Short Description</h4>
                <?php echo \vova07\imperavi\Widget::widget([
                    'name' => 'redactor',
                    'settings' => [
                        'minHeight' => 150,
                        'plugins' => [
                            'clips',
                            'fullscreen'
                        ]
                    ]
                ]);?>

                <h4>Full Description</h4>
                <?php echo \vova07\imperavi\Widget::widget([
                    'name' => 'redactor',
                    'settings' => [
                        'minHeight' => 200,
                        'plugins' => [
                            'clips',
                            'fullscreen'
                        ]
                    ]
                ]); ?>

                <div class="form-group">
                    <h4 class="control-label">Genre</h4>
                    <div class="form-group field-article-status has-success">
                        <label><input type="checkbox" name="" value="1"> Adventure</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Comedies</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Action</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Crime</label>
                    </div>
                </div>
                <div class="form-group">
                    <h4>Tags</h4>
                    <div class="example">
                        <input type="text" class="form-control" data-plugin="tokenfield" value="red,green,blue">
                    </div>
                </div>
                    <h4>Artists</h4>
                        <?php

                        echo Tabs::widget([
                            'items' => [
                                [
                                    'label' => 'A',
                                    'content' => <<<HTML
<div class="form-group field-article-status has-success">
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Artist</label></div>
</div>
HTML
                                    ,
                                    'active' => true
                                ],
                                [
                                    'label' => 'B',
                                    'content' => <<<HTML
<div class="form-group field-article-status has-success">
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Artist</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Artist</label></div>
</div>
HTML
                                    ,
                                ],

                            ]
                        ]);

                        ?>
                <h4>Producer</h4>
                <?php

                echo Tabs::widget([
                    'items' => [
                        [
                            'label' => 'A',
                            'content' => <<<HTML
<div class="form-group field-article-status has-success">
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> A Producer</label></div>
</div>
HTML
                            ,
                            'active' => true
                        ],
                        [
                            'label' => 'B',
                            'content' => <<<HTML
<div class="form-group field-article-status has-success">
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Producer</label></div>
    <div class="checkbox"><label><input type="checkbox" name="" value="1"> B Producer</label></div>
</div>
HTML
                            ,
                        ],

                    ]
                ]);

                ?>
            </div>
        </div>

    </div>


</div>

<?php
$this->registerJs( <<<JS
$(function(){
    $('#tokenfield').tokenfield()
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

    
    $("#song_list").on("click", ".edit_song", function(){
        var block = $(this).parents("li");
        var text = block.find(".edit_field").html();
        block.find(".edit_field").html('<input type="text" class="form-control" value="'+text+'">');
        return false;
    })
})

JS
);
?>


<?php
$this->registerCss( <<<CSS
.edit_field .form-control{
max-width: 60%;
}

CSS
);
?>
