<?php
use yii\bootstrap\Modal;
use yii\bootstrap\Tabs;
use yii\helpers\Url;
use yii\helpers\Html;

?>



<h1 class="page-title">Create Collection</h1>

<div class="panel">
    <div class="panel-body container-fluid">
        <div class="col-xs-12 text-right">

            <button type="button" class="btn btn-success">Save Collection</button>

        </div>
        <div class="row">
            <div class="col-sm-3">
                <img src="/images/4.jpg" alt="..." class="img-thumbnail img-responsive">
                <input type="file" id="input-file-events" class="dropify-event" style="margin: 10px 0">


            </div>
            <div class="col-sm-9">


                <div class="form-group">
                    <label class="control-label">Title</label>
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

            </div>

        <div class="col-xs-12">
            <?php
             Modal::begin([
                'header' => '<h2>Select Movie</h2>',
                'toggleButton' => [
                    'tag' => 'button',
                    'class' => 'btn btn-block btn-info',
                    'label' => 'Add Movie',
                ]
            ]);

            echo 'Movies List.';

            Modal::end();
            ?>

            <div class="example-wrap">

                    <div class="dd" data-plugin="nestable">
                        <ol class="dd-list">
                            <li class="dd-item dd-item-with-media" data-id="1">
                                <div class="dd-handle"> An Unexpected Journey</div>
                                <div class="dd-content">
                                    <div class="media">
                                        <div class="media-left">
                                            <a  class="avatar " href="javascript:void(0)">
                                                <img class="img-responsive" src="/images/4.jpg" alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"></h4>
                                            <small>2012</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dd-item dd-item-with-media" data-id="1">
                                <div class="dd-handle"> The Desolation of Smaug</div>
                                <div class="dd-content">
                                    <div class="media">
                                        <div class="media-left">
                                            <a  class="avatar " href="javascript:void(0)">
                                            <img class="img-responsive" src="/images/4.jpg" alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"></h4>
                                            <small>2013</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dd-item dd-item-with-media" data-id="1">
                                <div class="dd-handle"> The Battle of the Five Armies</div>
                                <div class="dd-content">
                                    <div class="media">
                                        <div class="media-left">
                                            <a  class="avatar " href="javascript:void(0)">
                                                <img class="img-responsive" src="/images/4.jpg" alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"></h4>
                                            <small>2014</small>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
            </div>
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
