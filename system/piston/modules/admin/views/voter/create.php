<h2>New Voter</h2>
<?php echo form_open_multipart(current_url(), array('id' => 'newVoter')); ?>
	<div class="row">
		<div class="large-3 columns">
			<label for="name" class="inline">Voter Name</label>
		</div>
		<div class="large-9 columns <?php echo form_error('name') ? 'error' : ''; ?>">
			<input type="text" name="name" id="name" value="" placeholder="New Voter Name ... ">
			<?php echo form_error('name'); ?>
		</div>
	</div>
	<div class="row">
		<div class="large-3 columns">
			<label for="nomor" class="inline">Voter Identity</label>
		</div>
		<div class="large-9 columns <?php echo form_error('nomor') ? 'error' : ''; ?>">
			<input type="text" name="nomor" id="nomor" value="" placeholder="New Voter ID .....">
			<?php echo form_error('nomor'); ?>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<input type="submit" value="Create" class="button">
		</div>
	</div>
	<?php echo form_close(); ?>