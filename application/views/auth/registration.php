    <div class="limiter">
		<div class="container-login100" style="background-image: url('http://localhost/dwitama/assets/css/login/images/fotodwi.jpg');">
			<div class="wrap-login100 p-t-20 p-b-30">
				<form action="<?= base_url('auth/registration'); ?>" method="post" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="http://localhost/dwitama/assets/css/login/images/logodwi.png" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						Registrasi Akun <br>
                        Sistem Informasi Manajemen Tools <br>
                        PT.Dwitama Mulya Persada
					</span>
					
					<?php if( isset($error) ) : ?>
						<span class=" login100-form-title p-b-5" style="color: red;"> username / password salah</p>
						</span>
					<?php endif; ?>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="nama" id="nama" placeholder="Nama" value="<?=set_value('name');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="text" name="username" id="username" placeholder="Username" value="<?=set_value('username');?>">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="password" name="password" id="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10">
						<input class="input100" type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<!-- <div class="wrap-input100 validate-input m-b-10">
						<select name="level" class="input100">
							<option value = ""> -- Pilih Bagian -- </option>
							<option value = "toolkeeper">Toolkeeper</option>
							<option value = "generalaffair">General Affair</option>
						</select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>  -->

					<div class="col-sm-6 mb-3 mb-sm-0">
						<div class="container-login100-form-btn p-t-10">
							<a href="<?= base_url('auth'); ?>" class = "login100-form-btn">Kembali</a>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="container-login100-form-btn p-t-10">
							<button class="login100-form-btn" type="submit" name="register">
								Submit Registrasi
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>