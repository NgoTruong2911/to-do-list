<?php require APP_ROOT . '/views/inc/header.php' ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
   <h3>Update work</h3>
   <p>Update work</p>
   <form action="<?php echo URL_ROOT; ?>/works/update" method="POST">
      <input type="hidden" name="id" value="<?= $data->id; ?>">
      <div class="form-group">
         <label for="name">Name: <sup>*</sup></label>
         <input type="text" name="name" value="<?= $data->name; ?>" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="name">Start date: <sup>*</sup></label>
         <input type="date" name="start_date" value="<?= $data->start_date; ?>" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="name">End date: <sup>*</sup></label>
         <input type="date" name="end_date" value="<?= $data->end_date; ?>" class="form-control form-control">
      </div>
      <div class="form-group">
         <label for="status">Status</label>
         <select class="form-control" id="status" name="status">
            <option value="1" <?= $data->status == 1 ? 'selected' : ''; ?>>Planning</option>
            <option value="2" <?= $data->status == 2 ? 'selected' : ''; ?>>Doing</option>
            <option value="3" <?= $data->status == 3 ? 'selected' : ''; ?>>Complete</option>
         </select>
      </div>
      <input type="submit" class="btn btn-success" value="Submit" />
   </form>
</div>
<?php require APP_ROOT . '/views/inc/footer.php' ?>