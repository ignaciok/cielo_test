<div class="table-responsive">
<div class="submenu pull-right">
	<a href="<?php echo site_url('user/add'); ?>" class="btn btn-success">Add</a>  
</div>
<table class="table table-striped table-hover">
    <tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>DOB</th>
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
		<td><?php echo $u['favorite_color']; ?></td>
		<td>
            <a href="<?php echo site_url('user/edit/'.$u['idx']); ?>" class="btn btn-info">Edit User</a> 
            <a href="<?php echo site_url('user/remove/'.$u['idx']); ?>" class="btn btn-danger">Delete User</a>
        </td>
    </tr>
	<?php } ?>
</table>
</div>
