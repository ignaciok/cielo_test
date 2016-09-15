    <div class="table-responsive">
    <div class="submenu pull-right">
        <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success">Add</a> 
        <a href="<?php echo site_url('user/add_ajax'); ?>" class="btn btn-success">Add (with Ajax)</a>     
    </div>
    <?= $pagination; ?>
    <table class="table table-striped table-hover">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>E-mail</th>
            <th>Favorite Color</th>
            <th>Actions</th>
        </tr>
        <?php foreach($users as $u){ ?>
        <tr>
            <td><?php echo $u['first_name']; ?></td>
            <td><?php echo $u['last_name']; ?></td>
            <td><?php echo date("m/d/Y", strtotime($u['dob'])); ?></td>
            <td><?php echo $u['email']; ?></td>
            <td><div class="box" style="background:<?php echo $u['favorite_color']; ?>;"></div></td>
            <td>
                <a href="<?php echo site_url('user/edit/'.$u['idx']); ?>" class="btn btn-info">Edit</a> 
                <a href="<?php echo site_url('user/remove/'.$u['idx']); ?>" class="btn btn-danger delete_item" data-confirm-delete="Are you sure to delete this user?">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?= $pagination; ?>
    </div>
<script>
var todelete = document.querySelectorAll('.delete_item');
for (var i = 0; i < todelete.length; i++) {
  todelete[i].addEventListener('click', function(event) {
      event.preventDefault();
      var choice = confirm(this.getAttribute('data-confirm-delete'));
      if (choice) {
        window.location.href = this.getAttribute('href');
      }
  });
}
</script>