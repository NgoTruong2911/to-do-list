<?php require APP_ROOT . '/views/inc/header.php' ?>
<div class="card card-body mb-3">
    <div class="row">
        <div class="col-3">
            <input type="text" id="daterange" value="" name="daterange"/>
        </div>
        <div class="col-3 mr-3 mb-3">
            <a type="button" href="<?php echo URL_ROOT; ?>/works/create" class="btn btn-primary">Create + </a>
        </div>
    </div>
    <div class="card-block">
        <div class="table">
            <table class="table table-sm table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['works'] as $work) : ?>
                        <tr>
                            <td><?= $work->id; ?></td>
                            <td><?= $work->name; ?></td>
                            <td><?= $work->start_date; ?></td>
                            <td><?= $work->end_date; ?></td>
                            <td>
                                <?php
                                switch ($work->status) {
                                    case 1:
                                        $status_view = 'Planning';
                                        break;

                                    case 2:
                                        $status_view = 'Doing';
                                        break;

                                    case 3:
                                        $status_view = 'Complete';
                                        break;

                                    default:
                                        $status_view = 'Planning';
                                        break;
                                }
                                echo $status_view;
                                ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <a type="button" href="<?php echo URL_ROOT; ?>/works/edit?id=<?= $work->id ?>" class="btn btn-primary btn-sm">Update </a>
                                    </div>
                                    <div class="col-4">
                                        <form action="<?php echo URL_ROOT; ?>/works/delete" method="POST">
                                            <input type="hidden" name="id" value="<?php echo $work->id; ?>">
                                            <button type="submit" href="<?php echo URL_ROOT; ?>/works/edit?id=<?= $work->id ?>" class="btn btn-danger btn-sm">Delete </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!-- end div table-responsive -->
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="<?= URL_ROOT . '/public/js/index.js' ?>"></script>