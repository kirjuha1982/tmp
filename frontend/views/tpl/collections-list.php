<?php
use yii\helpers\Url;

?>



<h1 class="page-title">Collection List</h1>

<div class="panel">
    <div class="panel-body container-fluid">

        <a href="<?=Url::to(['/tpl/collection-creator'])?>" type="button" class="btn btn-block btn-primary waves-effect">Create Collection</a>

        <div class="example table-responsive">
            <div id="w0" class="grid-view table-responsive"><div class="summary">Showing <b>1-2</b> of <b>2</b> item.</div>
                <table class="table table-striped table-bordered"><thead>
                    <tr>
                        <th><a href="#" data-sort="id">ID</a></th>
                        <th><a href="#" data-sort="title">Title</a></th>

                        <th><a href="#" data-sort="title">Short Description</a></th>

                        <th><strong>Files</strong></th>
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
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-key="1">
                        <td>1</td>
                        <td>The Hobbit (film series)</td>
                        <td>The Hobbit is a film series consisting of three high fantasy adventure films directed by Peter Jackson. They are based on the 1937 novel The Hobbit by J. R. R. Tolkien, with large portions of the trilogy inspired by the appendices to The Return of the King, which expand on the story told in The Hobbit, as well as new material and characters written especially for the films. Together they act as a prequel to Jackson's The Lord of the Rings film trilogy. The films are subtitled An Unexpected Journey (2012), The Desolation of Smaug (2013), and The Battle of the Five Armies (2014).</td>

                        <td>
                            3
                        </td>
                        <td>
                            <a data-toggle="tooltip" href="<?=Url::to(['/tpl/collection-creator'])?>" data-placement="left" title="">
                                <img src="/images/4.jpg" alt="Edward Fletcher"  class="img-responsive img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/collection-creator'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>
                    <tr data-key="1">
                        <td>2</td>
                        <td>The Hobbit (film series)</td>
                        <td>The Hobbit is a film series consisting of three high fantasy adventure films directed by Peter Jackson. They are based on the 1937 novel The Hobbit by J. R. R. Tolkien, with large portions of the trilogy inspired by the appendices to The Return of the King, which expand on the story told in The Hobbit, as well as new material and characters written especially for the films. Together they act as a prequel to Jackson's The Lord of the Rings film trilogy. The films are subtitled An Unexpected Journey (2012), The Desolation of Smaug (2013), and The Battle of the Five Armies (2014).</td>

                        <td>
                            3
                        </td>
                        <td>
                            <a data-toggle="tooltip" href="<?=Url::to(['/tpl/collection-creator'])?>" data-placement="left" title="">
                                <img src="/images/4.jpg" alt="Edward Fletcher"  class="img-responsive img-thumbnail">
                            </a>
                        </td>
                        <td>
                            <a href="<?=Url::to(['/tpl/collection-creator'])?>" title="Update" aria-label="Update"><i class="icon md-wrench" aria-hidden="true"></i></a>
                            <a href="#" title="Delete" aria-label="Delete" data-confirm="Are you sure you want to delete this item?" data-method="post">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </td></tr>

                    </tbody></table>
            </div>
        </div>

    </div>
</div>