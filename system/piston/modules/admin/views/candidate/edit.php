<h2>Edit Candidate</h2>
<?php echo form_open_multipart(current_url(), array('id' => 'newCandidate')); ?>
  <div class="row">
    <div class="large-3 columns">
      <label for="name" class="inline">Candidate Name</label>
    </div>
    <div class="large-9 columns <?php echo form_error('name') ? 'error' : ''; ?>">
      <input type="text" name="name" id="name" value="<?php echo set_value('name', $candidate->name); ?>">
      <?php echo form_error('name'); ?>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns <?php echo form_error('info') ? 'error' : ''; ?>">
      <label for="info" class="inline">Candidate Info</label>
      <?php echo form_error('info'); ?>
      <textarea name="info" id="info"><?php echo set_value('info', $candidate->info); ?></textarea>
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <input type="submit" value="Create" class="button">
    </div>
  </div>
<?php echo form_close(); ?>