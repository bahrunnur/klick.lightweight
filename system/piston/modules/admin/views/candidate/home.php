<h2>Candidate</h2>
<a href="<?php echo site_url('admin/candidate/create'); ?>" class="small button"><i class="icon-plus-sign"></i>Register New Candidate</a>
<a href="<?php echo site_url('admin/qcount'); ?>" class="small secondary button"><i class="icon-bolt"></i>Quick Count</a>
<a href="<?php echo site_url('admin/statistics'); ?>" class="small secondary button"><i class="icon-bar-chart"></i>Statistics</a>

<?php foreach ( $candidates as $candidate ): ?>
    <hr>
    <div class="row">
        <div class="large-12 columns">
            <h3 class="can-name"><?php echo $candidate->name; ?></h3>
            <div class="control-button">
                <a href="<?php echo site_url('admin/candidate/edit/' . $candidate->id); ?>" class="tiny button"><i class="icon-edit"></i> Edit</a>
                <a href="#" data-reveal-id="deleteCandidate<?php echo $candidate->id; ?>" class="tiny alert button"><i class="icon-trash"></i> Delete</a>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="info">
                <?php echo $candidate->info; ?>                
            </div>
        </div>
        <div class="large-3 columns">
            <div class="img-layer">
                <img src="<?php echo $candidate->photo; ?>" alt="<?php echo $candidate->name; ?>">
                <a href="<?php echo site_url('admin/candidate/edit/' . $candidate->id); ?>"><i class="icon-edit"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>