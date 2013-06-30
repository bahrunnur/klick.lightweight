<h2>Administration</h2>
<a href="<?php echo site_url('admin/administration/create'); ?>" class="small button"><i class="icon-plus-sign"></i>New Admin</a>
<div class="row">
  <div class="large-12 columns">
    <h3>Tools</h3>
    <a href="<?php echo site_url('admin/administration/backupdb'); ?>" class="small secondary button"><i class="icon-hdd"></i>Backup Database</a>
    <a href="<?php echo site_url('admin/administration/exportcsv'); ?>" class="small secondary button"><i class="icon-share"></i>Export Voter Data to Excel (CSV)</a>
    <a href="<?php echo site_url('admin/administration/printresult'); ?>" class="small secondary button"><i class="icon-print"></i>Print Result</a>
    <h3>Admin List</h3>
    <table>
      <thead>
        <tr>
          <th width="200">Administrator Name</th>
          <th>Email</th>
          <th>Roles</th>
          <th width="200">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $admins as $admin ): ?>
          <tr>
            <td><?php echo $admin->username; ?></td>
            <td><?php echo $admin->email; ?></td>
            <td><?php echo $admin->role; ?></td>
            <td>
              <a href="<?php echo site_url('admin/administration/edit') .'/'. $admin->id; ?>" class="small button"><i class="icon-edit"></i>Edit</a>
              <a href="#" data-reveal-id="deleteAdmin<?php echo $admin->id; ?>" class="small alert button"><i class="icon-trash"></i>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>