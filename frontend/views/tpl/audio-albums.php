<?php
use yii\helpers\Url;

?>



<h1 class="page-title">Albums</h1>

<div class="panel">
    <div class="panel-body container-fluid">

        <a href="<?=Url::to(['/tpl/audio-album-creation'])?>" type="button" class="btn btn-block btn-primary waves-effect">Create Album</a>

        <div class="example table-responsive">
            <div id="w0" class="grid-view table-responsive"><div class="summary">Showing <b>1-2</b> of <b>2</b> item.</div>
                <table class="table table-striped table-bordered"><thead>
                    <tr>
                        <th><a href="#" data-sort="id">ID</a></th>
                        <th><a href="#" data-sort="title">Title</a></th>

                        <th><a href="#" data-sort="title">Year</a></th>
                        <th><strong>Genre</strong></th>
                        <th><strong>Artists</strong></th>

                        <th><strong>Image</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                    <tr id="w0-filters" class="filters">
                        <td><input type="text" class="form-control" name="PageSearch[id]"></td>
                        <td><input type="text" class="form-control" name="PageSearch[title]"></td>
                        <td><input type="text" class="form-control" name="PageSearch[title]"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td></tr>
                    </thead>
                    <tbody>
                    <tr data-key="1">
                        <td>1</td>
                        <td>...Baby One More Time</td>
                        <td>1999</td>
                        <td>Pop, dance-pop, teen, pop</td>

                        <td>Britney Spears</td>
                        <td>
                            <a class="avatar" data-toggle="tooltip" href="<?=Url::to(['/tpl/audio-album-creation'])?>" data-placement="left" title="">
                                <img src="/images/1.png" alt="Edward Fletcher">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/audio-album-creation'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>
                    <tr data-key="2">
                        <td>2</td>
                        <td>S&M</td>
                        <td>November 23, 1999</td>
                        <td>Heavy metal, hard rock, thrash metal, symphonic metal</td>

                        <td>James Hetfield,
                            Lars Ulrich,
                            Kirk Hammett,
                            Robert Trujillo</td>
                        <td>
                            <a class="avatar" data-toggle="tooltip" href="<?=Url::to(['/tpl/audio-album-creation'])?>" data-placement="left" title="">
                                <img src="/images/2.jpg" alt="Edward Fletcher">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/audio-album-creation'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>

                    </tbody></table>
            </div>
        </div>

    </div>
</div>