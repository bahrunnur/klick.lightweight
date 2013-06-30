<?php if ( $this->uri->segment(2) == 'voter' ): ?>
  <div id="newVoter" class="medium reveal-modal">
    <h3>New Voter</h3>
    <?php echo form_open(site_url('admin/voter')); ?>
      <div class="row">
        <div class="large-3 columns">
          <label for="vname" class="inline">Name</label>
        </div>
        <div class="large-9 columns">
          <input type="text" name="vname" id="vname">
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <input type="submit" value="Register" class="small button">
        </div>
      </div>
    <?php echo form_close(); ?>
    <a class="close-reveal-modal">&#215;</a>
  </div>
<?php endif; ?>

<?php if ( $this->uri->segment(2) == 'candidate' ): ?>
  <?php foreach ( $candidates as $candidate ): ?>
    <div id="deleteCandidate<?php echo $candidate->id; ?>" class="medium reveal-modal">
      <p>Are you sure want to delete <?php echo $candidate->name; ?></p>
      <a href="<?php echo site_url('admin/candidate/delete/' . $candidate->id); ?>" class="small alert button">Yes</a>
      <a class="small secondary button">No</a>
      <a class="close-reveal-modal">&#215;</a>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<?php if ( $this->uri->segment(2) == 'administration' ): ?>
  <?php foreach ( $admins as $admin ): ?>
    <div id="deleteAdmin<?php echo $admin->id; ?>" class="medium reveal-modal">
      <p>Are you sure want to delete <?php echo $admin->username; ?></p>
      <a href="<?php echo site_url('admin/administration/delete') .'/'. $admin->id; ?>" class="small alert button">Yes</a>
      <a class="small secondary button">No</a>
      <a class="close-reveal-modal">&#215;</a>
    </div>
  <?php endforeach; ?>
<?php endif; ?>