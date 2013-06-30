<h2>Voter</h2>
<a href="<?php echo site_url("admin/voter/create"); ?>" class="small button" ><i class="icon-plus-sign"></i>Register New Voter</a>

<div class="row">
  <div class="large-12 columns">
  <fieldset> <legend>VOTER LIST</legend>
    <table>
      <thead>
        <tr>
          <th >ID</th>
          <th width="250">Nama</th>
          <th width="200"> <i class="icon-lock">Acces Key</th>
          <th width="200">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($voters as $voter ): ?>
        <tr>
          <td><?php echo $voter->id; ?></td>
          <td><?php echo $voter->name; ?></td>
          <td><?php echo $voter->access_key; ?></td>
          <td>
              <a href="<?php echo site_url('admin/voter/edit/' . $voter->id); ?>" class="small button"><i class="icon-edit"></i> Edit</a>
              <a href="<?php echo site_url('admin/voter/delete/' . $voter->id); ?>" class="small alert button"><i class="icon-trash"></i> Delete</a>

          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </fieldset>
</div>
</div>


<div id="verifyDelete" class="reveal-modal">
  <h3>Masukkan Password Admin</h3>
  <?php echo form_open('admin/voter/delete'); ?>
    <fieldset>
      <legend><h4>Delete Voter</h4></legend>
      <div class="row">
      <div class="large-3 columns">
        <label for="name" class="inline">Password</label>
      </div>
      <div class="large-9 columns <?php echo form_error('name') ? 'error' : ' ' ;?>">
        <input type="password" name="name" value="" placeholder="Administrator's Password">
        <?php echo form_error('name'); ?>
      </div>
    </div>
      <section class="row">
        <section class="small-6 columns">
          <section class="small-4 columns">
          <br><input type="submit" class="button radius right" value="Daftar!">
        </section>
    </fieldset>
  <?php echo form_close(); ?>
  <a class="close-reveal-modal">&#215;</a>
</div>
