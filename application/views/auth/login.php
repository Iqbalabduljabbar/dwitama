<div class="limiter">
        <div class="container-login100" style="background-image: url('http://localhost/dwitama/assets/css/login/images/fotodwi.jpg');">  
            <div class="wrap-login100 p-t-50 p-b-30">
                <form action="<?php echo site_url('auth/login');?>" method="post" class="login100-form validate-form">
                    <div class="login100-form-avatar">
                        <img src="http://localhost/dwitama/assets/css/login/images/logodwi.png" alt="AVATAR"> 
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Menu Login <br>
                        Sistem Informasi Manajemen Tools <br>
                        PT.Dwitama Mulya Persada
                    </span>
                    
                    <span class="text-center w-full" style="color: red;"><strong><?php echo $this->session->flashdata('msg');?></strong></span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Masukan Username">
                        <input class="input100" type="text" name="username" id="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Masukan Password">
                        <input class="input100" type="password" name="password" id="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn" type="submit" name="login">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-20">
                        <!-- Link Registrasi --><!-- 
                        <a href="<?= base_url('auth/registration'); ?>" class="txt1" style="font-size:14px;"> Buat akun</a><br> -->
                        <a href="<?= base_url('auth/forgot_password'); ?>" class="txt1" style="font-size:14px;">Lupa akun? Klik disini!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>