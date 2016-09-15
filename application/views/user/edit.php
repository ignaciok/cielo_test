<?php if (validation_errors() != "") { ?>
	<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?= validation_errors(); ?>
    </div>
<?php } ?>
<?php echo form_open('user/edit/'.$user['idx'],array("class"=>"form","name"=>"user_edit")); ?>
	<div class="form-group">
		<label for="first_name" class="col-md-4 control-label">First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $user['first_name']); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="last_name" class="col-md-4 control-label">Last Name</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $user['last_name']); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="dob" class="col-md-4 control-label">Date of Birth (MM/DD/YYYY format)</label>
		<div class="col-md-8">
			<input type="text" name="dob" value="<?php echo date("m/d/Y", strtotime(($this->input->post('dob') ? $this->input->post('dob') : $user['dob']))); ?>" class="form-control" id="dob" />
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="favorite color" class="col-md-4 control-label">Favorite Color</label>
		<div class="col-md-8">
			<input type="hidden" name="favorite_color" value="<?php echo ($this->input->post('favorite_color') ? $this->input->post('favorite_color') : $user['favorite_color']); ?>" class="form-control" id="favorite_color" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
			<a class="btn btn-danger" href="<?= site_url(); ?>">Cancel</a> 
        </div>
	</div>
<?php echo form_close(); ?>
