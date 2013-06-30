<header>
  <div class="row">
    <div class="large-6 large-offset-3 columns">
      <h1><?php echo $election->name; ?></h1>
    </div>
  </div>
</header>

<div class="container">
  <div class="row">

    <?php foreach ( $candidates as $candidate ): ?>
      <div class="large-4 columns">
        <div class="sheet" style="background-image: url('<?php echo $candidate->photo; ?>');">
          <h2><?php echo $candidate->name; ?></h2>
          <div class="details">
            <a href="#" data-reveal-id="infoCandidate<?php echo $candidate->id; ?>" class="expand success button"><i class="icon-info-sign"></i>Info</a>
            <a href="#" data-reveal-id="voteCandidate<?php echo $candidate->id; ?>" class="expand button"><i class="icon-ok-sign"></i>Vote!</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?php foreach ( $candidates as $candidate ): ?>  
  <div id="voteCandidate<?php echo $candidate->id; ?>" class="medium reveal-modal">
    <h3>Vote</h3>
    <?php echo form_open(current_url()); ?>
      <div class="row">
        <div class="large-3 columns">
          <label for="key" class="inline">Access Key</label>
        </div>
        <div class="large-9 columns">
          <input type="text" name="key" id="key">
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <input type="hidden" name="vfor" value="<?php echo $candidate->id; ?>">
          <input type="submit" value="Vote" class="small button">
        </div>
      </div>
    <?php echo form_close(); ?>
    <a class="close-reveal-modal">&#215;</a>
  </div>

  <div id="infoCandidate<?php echo $candidate->id; ?>" class="medium reveal-modal">
    <?php echo $candidate->info; ?>
    <a class="close-reveal-modal">&#215;</a>
  </div>
<?php endforeach; ?>