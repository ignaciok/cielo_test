
		</div>
	</div>
</div>
<div id="footer">
    <div class="container">
    <p class="text-muted">This is a demo for the CIELO Team by Ignacio Kassis</p>
    </div>
</div>
<?php 
	if (isset($validate_user) && $validate_user === true) { ?>
    <script src="<?php echo site_url('../assets/js/user_form_validation.js'); ?>"></script>        
<?php }
	elseif (isset($validate_user_ajax) && $validate_user_ajax === true) { ?>
    <script src="<?php echo site_url('../assets/js/user_form_validation_ajax.js'); ?>"></script>        
<?php }
	if (isset($dob_format) && $dob_format === true) { ?>    
        <script type="text/javascript">
            $(function () {
                $('#dob').datepicker(
					{
					'format': "mm/dd/yyyy",
					'orientation': 'bottom'
					}
				);
            });
        </script>    
<?php } ?>
<?php if (isset($color_format) && $color_format === true) { ?>    
        <script type="text/javascript">
            $(function () {
                $('#favorite_color').minicolors(
					{
					animationSpeed: 50,
					animationEasing: 'swing',
					format: 'hex',			
					}
				);
            });
        </script>    
<?php } ?>
</body>
</html>