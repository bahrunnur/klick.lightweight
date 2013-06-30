<h2>File Permissions</h2>
<p>We feel sorry, seems like your server does not give us permissions to write this directory and file :</p>
<section class="permission-handler">
    <?php if ( ! $status['writeable_directory'] ): ?>
        <p><?php echo $permissions['directory']; ?></p>
    <?php elseif ( ! $status['writeable_file'] ): ?>
        <p><?php echo $permissions['file']; ?></p>
    <?php endif; ?>
</section>
<p>Terminal Commands that should fix the problem :</p>
<section class="terminal-command">
    <?php if ( ! $status['writeable_directory'] ): ?>
        <p><?php echo 'chmod 777 ' . $permissions['directory']; ?></p>
    <?php elseif ( ! $status['writeable_file'] ): ?>
        <p><?php echo 'chmod 666 ' . $permissions['file']; ?></p>
    <?php endif; ?>
</section>
<?php if ( $step_passed ): ?>
    <a href="<?php echo site_url('index.php/install/step3'); ?>" class="small button">Next Step</a>
<?php else: ?>
    <a href="<?php echo site_url('index.php/install/step2'); ?>" class="small button">Retry</a>
<?php endif; ?>