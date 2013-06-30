<h2>Voter</h2>
<a href="#" class="small button" data-reveal-id="newVoter"><i class="icon-plus-sign"></i>Register New Voter</a>

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
        <?php foreach ($voter as $key => $list): ?>
        <tr>
          <td><?php echo $list['id']; ?></td>
          <td><?php echo $list['name']; ?></td>
          <td><?php echo $list['access_key']; ?></td>
          <td>
            <!-- <form action="admin/voter/edit" method="post">
                <input type="hidden" value="<?php echo $list['id']?>" name="id">
                <button type="submit" class="small success button"><i class="icon-edit"></i>Edit</button>
              </form>
              <form action="admin/voter/delete" method="post">
                <input type="hidden" value="<?php echo $list['id']; ?>">
                <button type="submit" class="small alert button"><i class="icon-edit"></i>Delete</buttom>
              </form> -->
              <a href="<?php echo site_url('admin/voter/edit/' . $list['id']); ?>" class="small button"><i class="icon-edit"></i> Edit</a>
              <a href="<?php echo site_url('admin/voter/delete/' . $list['id']); ?>" class="small alert button"><i class="icon-trash"></i> Delete</a>

          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </fieldset>
</div>
</div>



<table>
  <thead>
    <tr>
      <th width="350">Nama</th>
      <th><i class="icon-lock"></i>Access Key</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Wagiman</td>
      <td>1bhg9</td>
      <td><a href="#" class="small action button"><i class="icon-edit"></i>Edit</a><a href="#" class="small alert action button"><i class="icon-trash"></i>Delete</a></td>
    </tr>
    <tr>
      <td>Susilo Bambang Kusumo Yudhoyono</td>
      <td>8j2nd</td>
      <td><a href="#" class="small action button"><i class="icon-edit"></i>Edit</a><a href="#" class="small alert action button"><i class="icon-trash"></i>Delete</a></td>
    </tr>
  </tbody>
</table>


<div id="newVoter" class="reveal-modal">
  <h3>Masukkan Data Voter</h3>
  <?php echo form_open(current_url()); ?>
    <fieldset>
      <legend><h4>Voter</h4></legend>
      <input type="text" name="name" value="" placeholder="masukkan Nama Voter ..">
      <input type="text" name="nomor" value="" placeholder="masukkan identitas ..">
      <section class="row">
        <section class="small-6 columns">
          <p> Jenis Identitas</p> </section>
          <section class="small-6 columns">
            <select name="jenisid">
              <option value="SIM">SIM</option>
              <option value="KTP">KTP</option>
              <option value="KTM">KTM</option>
              <option value="lainnya">Lainnya..</option>
            </select>
          </section>
          <section class="small-4 columns">
          <br><input type="submit" class="button radius right" value="Daftar!">
        </section>
    </fieldset>
  <?php echo form_close(); ?>
  <a class="close-reveal-modal">&#215;</a>
</div>
