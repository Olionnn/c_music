
<?= $this->extend('auth/layout/default') ?>

<?= $this->section('content') ?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url() ?>/assets/images/img-01.png" alt="IMG">
				</div>
				 sd
				<form class="login100-form validate-form"  method="post" action="<?php echo base_url('Auth/loginacc') ?>">
					<span class="login100-form-title">
						Login To C Mu
					</span>
					<?php $session = \Config\Services::session();
						if($session->getFlashdata('sukses')) { ?>
						<p class="alert alert-success"><?php echo $session->getFlashdata('sukses'); ?></p>
						<?php } ?>
						<?php 
						if($session->getFlashdata('error')) { ?>
						<p class="alert alert-danger"><?php echo $session->getFlashdata('error'); ?></p>
						<?php } ?>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz"> 
						<input class="input100" type="text" name="user_email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="user_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					</form>
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-40">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
			</div>
		</div>
	</div>
	<?= $this->endSection() ?>