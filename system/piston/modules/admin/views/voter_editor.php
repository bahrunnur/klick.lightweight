<h2>Edit Voter</h2>

<p> <?php echo $data->id; ?> </p>


<div class="row">
  <div class="large-12 columns">
    <form action="admin/voter/edita" method="post">
  <fieldset> <legend>VOTER EDITOR for <?php echo $data->name; ?></legend>
    <table>
      <thead>
        <tr>
          <th width="250">Data</th>
          <th width="200">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="name" value="<?php echo $data->name; ?>"></td>
        </tr>
        <tr>
          <td><input type="text" name="idn" value="<?php echo $data->id; ?>"></td>        
        </tr>
        <tr>
          <td><input type="text" name="jenisid" value="<?php echo $data->jenisid; ?>"></td>
          <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        </tr>
      </tbody>
    </table>
        <input type="submit" class="small button" value="Edit">
  </fieldset>
</form>
</div>
</div>

<div class="row">
  <div class="large-12 columns">
  <fieldset> <legend>VOTER EDITOR for <?php echo $data->name; ?></legend>
    <table>
      <thead>
        <tr>
          <th width="250">Data</th>
          <th width="200">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $data->name; ?></td>
          <td><a href="#" data-reveal-id="nameModal" class="small alert action button">Edit</a></td>
          </td>
        </tr>
        <tr>
          <td><?php echo $data->id; ?></td>
          <td><a href="#" data-reveal-id="idModal" class="small alert action button">Edit</a></td>        
        </tr>
        <tr>
          <td><?php echo $data->jenisid; ?></td>
          <td><a href="#" data-reveal-id="jenisModal" class="small alert action button">Edit</a></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</div>
</div>




<div id="nameModal" class="reveal-modal">
  <form action="admin/voter/edita" method="post">
    <fieldset>
      <legend><h4>Edit Name</h4></legend>
      <input type="text" name="name" value="" placeholder="masukkan Nama Voter ..">
      <input type="hidden" name="id" value="<?php echo $data->id ?>">
      <br><input type="submit" class="button radius right" value="Edit!">
    </fieldset>
  </form>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="idModal" class="reveal-modal">
  <form action="admin/voter/edita" method="post">
    <fieldset>
      <legend><h4>Edit ID</h4></legend>
      <input type="text" name="idn" value="" placeholder="masukkan identitas ..">
      <input type="hidden" name="id" value="<?php echo $data->id ?>">
      <br><input type="submit" class="button radius right" value="Daftar!">
    </fieldset>
  </form>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="jenisModal" class="reveal-modal">
  <form action="admin/voter/create" method="post">
    <fieldset>
      <legend><h4>Edit Jenis Identitas</h4></legend>
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
          <input type="hidden" name="id" value="<?php echo $data->id ?>">
          <section class="small-4 columns">
          <br><input type="submit" class="button radius right" value="Daftar!">
        </section>
    </fieldset>
  </form>
  <a class="close-reveal-modal">&#215;</a>
</div>