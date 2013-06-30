<h2>Quick Count</h2>
<p>Total Vote : <?php echo $total_votes; ?></p>
<?php foreach ( $candidates as $candidate ): ?>
    <hr>
    <div class="row">
        <div class="large-3 columns">
            <div class="img-layer">
                <img src="<?php echo $candidate->photo; ?>" class="can-img" alt="<?php echo $candidate->name; ?>">                
            </div>
        </div>
        <div class="large-9 columns">
            <h3><?php echo $candidate->name; ?></h3>
            <div class="large-11 progress"><span class="meter" style="width: <?php echo $candidate->vote_percent; ?>%;"><?php echo $candidate->vote_percent; ?>%</span></div>
            <p class="total-vote"><b><?php echo $candidate->vote; ?></b><small> Votes</small></p>
        </div>
    </div>
<?php endforeach; ?>