<?php
use yii\helpers\Url;

?>



<h1 class="page-title">Movies List</h1>

<div class="panel">
    <div class="panel-body container-fluid">

        <a href="<?=Url::to(['/tpl/movie-creator'])?>" type="button" class="btn btn-block btn-primary waves-effect">Create Movie</a>

        <div class="example table-responsive">
            <div id="w0" class="grid-view table-responsive"><div class="summary">Showing <b>1-2</b> of <b>2</b> item.</div>
                <table class="table table-striped table-bordered"><thead>
                    <tr>
                        <th><a href="#" data-sort="id">ID</a></th>
                        <th><a href="#" data-sort="title">Title</a></th>

                        <th><a href="#" data-sort="title">Year</a></th>
                        <th><a href="#" data-sort="title">Short Description</a></th>
                        <th><strong>Genre</strong></th>
                        <th><strong>Artists</strong></th>
                        <th><strong>Producer</strong></th>

                        <th><strong>Image</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                    <tr id="w0-filters" class="filters">
                        <td><input type="text" class="form-control" name="PageSearch[id]"></td>
                        <td><input type="text" class="form-control" name="PageSearch[title]"></td>
                        <td><input type="text" class="form-control" name="PageSearch[title]"></td>
                        <td><input type="text" class="form-control" name="PageSearch[title]"></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td></tr>
                    </thead>
                    <tbody>
                    <tr data-key="1">
                        <td>1</td>
                        <td>Assassin's Creed</td>
                        <td>December 13, 2016</td>
                        <td>Assassin's Creed is a 2016 action adventure film based on the video game franchise of the same name. The film is directed by Justin Kurzel, written by Michael Lesslie, Adam Cooper and Bill Collage, and stars Michael Fassbender, Marion Cotillard, Jeremy Irons, Brendan Gleeson, Charlotte Rampling and Michael K. Williams.</td>

                        <td>Action</td>
                        <td>Michael Fassbender,
                            Marion Cotillard,
                            Jeremy Irons,
                            Brendan Gleeson,
                            Charlotte Rampling,
                            Michael K. Williams</td>

                        <td>Jean-Julien Baronnet,
                            Gérard Guillemot,
                            Frank Marshall,
                            Patrick Crowley,
                            Michael Fassbender,
                            Conor McCaughan,
                            Arnon Milchan</td>
                        <td>
                            <a data-toggle="tooltip" href="<?=Url::to(['/tpl/movie-creator'])?>" data-placement="left" title="">
                                <img src="/images/3.jpg" alt="Edward Fletcher"  class="img-responsive img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/movie-creator'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>
                    <tr data-key="1">
                        <td>1</td>
                        <td>Assassin's Creed</td>
                        <td>December 13, 2016</td>
                        <td>Assassin's Creed is a 2016 action adventure film based on the video game franchise of the same name. The film is directed by Justin Kurzel, written by Michael Lesslie, Adam Cooper and Bill Collage, and stars Michael Fassbender, Marion Cotillard, Jeremy Irons, Brendan Gleeson, Charlotte Rampling and Michael K. Williams.</td>

                        <td>Action</td>
                        <td>Michael Fassbender,
                            Marion Cotillard,
                            Jeremy Irons,
                            Brendan Gleeson,
                            Charlotte Rampling,
                            Michael K. Williams</td>

                        <td>Jean-Julien Baronnet,
                            Gérard Guillemot,
                            Frank Marshall,
                            Patrick Crowley,
                            Michael Fassbender,
                            Conor McCaughan,
                            Arnon Milchan</td>
                        <td>
                            <a data-toggle="tooltip" href="<?=Url::to(['/tpl/movie-creator'])?>" data-placement="left" title="">
                                <img src="/images/3.jpg" alt="Edward Fletcher"  class="img-responsive img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/movie-creator'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>

                    </tbody></table>
            </div>
        </div>

    </div>
</div>