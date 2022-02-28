<?php
	$componentName = "registrationForm.php";
	require_once "component.php";
?>

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-3"></div>
		<div class="col-12 col-md-6">
			<form class="row g-3 needs-validation" novalidate action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="post">
				<div class="col-md-6">
					<label for="validationCustom01" class="form-label">Username</label>
					<input type="text" class="form-control" name="username" id="validationCustom01" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please choose a valid username.
					</div>
				</div>

				<div class="col-md-6">
					<label for="validationCustom02" class="form-label">Password</label>
					<input type="password" class="form-control" name="password" id="validationCustom02" required>
					<div class="valid-feedback">
						Looks good!
					</div>
					<div class="invalid-feedback">
						Please select a valid password.
					</div>
				</div>

				<div class="col-6">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="invalidCheck" required>
						<label class="form-check-label normalstuff" for="invalidCheck">
							Are you over 18?
						</label>
						<div class="invalid-feedback">
							You must be over 18 to register.
						</div>
					</div>
				</div>

				<div class="col-6">
					<button class="btn btn-primary float-md-end" type="submit">Register User</button>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>


<!-- Form validation -->
<script>
	(function () {
	'use strict'

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	var forms = document.querySelectorAll('.needs-validation')

	// Loop over them and prevent submission
	Array.prototype.slice.call(forms)
		.forEach(function (form) {
		form.addEventListener('submit', function (event) {
			if (!form.checkValidity()) {
			event.preventDefault()
			event.stopPropagation()
			}

			form.classList.add('was-validated')
		}, false)
		})
	})()
</script>