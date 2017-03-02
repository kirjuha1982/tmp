<?php
use yii\bootstrap\Tabs;
use yii\helpers\Url;
use yii\helpers\Html;
?>



<h1 class="page-title">Create Album</h1>

<div class="panel">
    <div class="panel-body container-fluid">
        <div class="col-xs-12 text-right">

            <button type="button" class="btn btn-success">Save Album</button>

        </div>
        <div class="row">
            <div class="col-sm-3">
                <img src="/images/1.png" alt="..." class="img-thumbnail img-responsive">
                <input type="file" id="input-file-events" class="dropify-event" style="margin: 10px 0">
                <hr>
                <h4>Add song</h4>
                <input type="file" id="input-file-now" data-plugin="dropify" data-default-file=""/>
                <br>
                <br>
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


                <div class="form-group">
                    <h4 class="control-label">Genre</h4>
                    <div class="form-group field-article-status has-success">
                        <label><input type="checkbox" name="" value="1"> Pop</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Dance-pop</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Teen</label> &nbsp;
                        <label><input type="checkbox" name="" value="1"> Pop</label>
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
    <div class="checkbox"><label><input type="checkbox" name="" value="1" checked> Britney Spears</label></div>
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

            </div>

        <div class="col-xs-12">
            <h4>Songs list</h4>
            <ul class="list-group list-group-gap sortable" data-plugin="sortable" id="song_list">
                <li class="list-group-item list-group-item-success">

                <span class="pull-xs-right">

                  <a href="#" class="edit_song">
                    <i class="icon md-edit white" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="icon md-close white" aria-hidden="true"></i>
                  </a>
                </span>

                <span class="pull-xs-left">
                  <i class="icon md-swap-vertical" aria-hidden="true"></i>
                </span>
                <span class="edit_field">1 Vestibulum at eros</span>


                </li>

                <li class="list-group-item list-group-item-success">
                <span class="pull-xs-right">
                  <a href="#" class="edit_song">
                    <i class="icon md-edit white" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="icon md-close white" aria-hidden="true"></i>
                  </a>
                </span>
                    <span class="pull-xs-left">
                  <i class="icon md-swap-vertical" aria-hidden="true"></i>
                    </span> <span class="edit_field">2 Vestibulum at eros</span>
                </li>

                <li class="list-group-item list-group-item-success">
                <span class="pull-xs-right">
                  <a href="#" class="edit_song">
                    <i class="icon md-edit white" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="icon md-close white" aria-hidden="true"></i>
                  </a>
                </span>
                    <span class="pull-xs-left">
                  <i class="icon md-swap-vertical" aria-hidden="true"></i>
                    </span> <span class="edit_field">3 Vestibulum at eros</span>
                </li>

                <li class="list-group-item list-group-item-success">
                <span class="pull-xs-right">
                  <a href="#" class="edit_song">
                    <i class="icon md-edit white" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="icon md-close white" aria-hidden="true"></i>
                  </a>
                </span>
                    <span class="pull-xs-left">
                  <i class="icon md-swap-vertical" aria-hidden="true"></i>
                    </span> <span class="edit_field">4 Vestibulum at eros</span>
                </li>

                <li class="list-group-item list-group-item-success">
                <span class="pull-xs-right">
                  <a href="#" class="edit_song">
                    <i class="icon md-edit white" aria-hidden="true"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i class="icon md-close white" aria-hidden="true"></i>
                  </a>
                </span>
                    <span class="pull-xs-left">
                  <i class="icon md-swap-vertical" aria-hidden="true"></i>
                    </span> <span class="edit_field">5 Vestibulum at eros</span>
                </li>
            </ul>
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
