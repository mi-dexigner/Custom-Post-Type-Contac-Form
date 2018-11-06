<form action="#" id="miContactForm" method="post" data-url='<?php echo admin_url('admin-ajax.php'); ?>'>
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Your Name" id='name' name="name" required="required">
	</div>
	<div class="form-group">
		<input type="email" class="form-control" placeholder="Your Email" id='email' name="email" required="required">
	</div>

	<div class="form-group">
		<textarea name="message" id="message" class="form-control" required="required"></textarea>
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
	<small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
	<small class="text-success form-control-msg js-form-success">Message Successfully submitted, thank you!</small>
<small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
</form>