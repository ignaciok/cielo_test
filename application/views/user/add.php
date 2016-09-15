	<?php if (validation_errors() != "")
	{ ?>
	<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?= validation_errors(); ?>
    </div>
    <?php } 
	?>
	<?php echo form_open('user/add',array("class"=>"form","name"=>"user_add")); ?>
	<div class="form-group">
		<label for="first_name" class="col-md-4 control-label">First Name</label>
		<div class="col-md-8">
			<input type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="last_name" class="col-md-4 control-label">Last Name</label>
		<div class="col-md-8">
			<input type="text" name="last_name" value="<?php echo $this->input->post('last_name'); ?>" class="form-control" id="last_name" />
		</div>
	</div>
	<div class="form-group">
		<label for="dob" class="col-md-4 control-label">Date of Birth (MM/DD/YYYY format)</label>
		<div class="col-md-8">
			<input type="text" name="dob" value="<?php 
			echo ($this->input->post('dob') ? date("m/d/Y", strtotime($this->input->post('dob'))) : ''); 
			
			?>" class="form-control" id="dob" />		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-4 control-label">Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
		</div>
	</div>
	<div class="form-group">
		<label for="favorite_color" class="col-md-4 control-label">Favorite Color</label>
		<div class="col-md-8">
			<input type="hidden" name="favorite_color" value="<?php echo $this->input->post('favorite_color'); ?>" class="form-control" id="favorite_color" />
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>
<?php echo form_close(); ?>
