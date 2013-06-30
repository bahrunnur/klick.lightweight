<h2>Edit Voter</h2>
<?php echo form_open_multipart(current_url(), array('id' => 'newVoter')); ?>
<div class="row">
  <div class="large-3 columns">
    <label for="name" class="inline">Voter Name</label>
  </div>
  <div class="large-9 columns <?php echo form_error('name') ? 'error' : ''; ?>">
    <input type="text" name="name" value="<?php echo $voter->name; ?>"></td>
    <?php echo form_error('name'); ?>
  </div>
</div>

<div class="row">
  <div class="large-12 columns">
    <input type="hidden" name="id" value="<?php echo $voter->id; ?>">
    <input type="submit" value="edit" class="button">
  </div>
</div>
<?php echo form_close(); ?>
  