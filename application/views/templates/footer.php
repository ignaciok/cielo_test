	</div>
	</div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">This is a demo for the CIELO Team by Ignacio Kassis</p>
      </div>
    </footer>
<?php 
	if (isset($validate_user) && $validate_user === true) { ?>
    <script src="<?php echo site_url('../assets/js/user_form_validation.js'); ?>"></script>        
<?php } ?>

</body>
</html>