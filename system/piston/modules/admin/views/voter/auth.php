<h2>Delete Voter <?php echo $voter->name; ?></h2>
<?php echo $voter->id; ?>
<?php echo form_open_multipart(current_url(), array('id' => 'deleteVoter' )); ?>
<div class"row">
	<div class="large-12 columns">
		<label for="password" class="inline">Administrator Password</label>
	</div>
	<div class="row">
		<div class="large-12 columns <?php echo form_error('password') ? 'error' : ''; ?>">
			<input type="password" name="password" id="password" value="" >
			<?php echo form_error('password'); ?>
		</div>
	</div>
</div>
	<div class="row">
		<div class="large-12 columns">
			<input type="hidden" value="<?php echo $voter->id; ?>">
			<input type="submit" value="delete" class="button">
		</div>
	</div>
	<?php echo form_close(); ?>