<?= view('partial/headerLogin') ?>
<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>System</b>Ads</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="/register/store" method="post" id="registerForm">
                <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Full name" name="name" id="name" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" id="retypePassword">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <span id="passwordError" style="color: red; display: none;">Password tidak cocok!</span>
                <div class="row">
                    <!-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center">
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div> -->

            <a href="/" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<script>
<?php if (session()->getFlashdata('success')): ?>
Swal.fire({
    icon: 'success',
    title: 'Sukses',
    text: '<?= session()->getFlashdata('success') ?>',
    showConfirmButton: false,
    timer: 2000
});
<?php endif; ?>
</script>

<script>
document.getElementById("registerForm").addEventListener("submit", function(e) {
    // Ambil nilai dari field password dan retypePassword
    var password = document.getElementById("password").value;
    var retypePassword = document.getElementById("retypePassword").value;

    // Cek apakah password dan retypePassword sama
    if (password !== retypePassword) {
        e.preventDefault(); // Mencegah form submit jika password tidak sama
        document.getElementById("passwordError").style.display = "inline";
    } else {
        document.getElementById("passwordError").style.display = "none";
    }
});

// Cek secara real-time ketika user mengetik
document.getElementById("retypePassword").addEventListener("input", function() {
    var password = document.getElementById("password").value;
    var retypePassword = document.getElementById("retypePassword").value;

    if (password !== retypePassword) {
        document.getElementById("passwordError").style.display = "inline";
    } else {
        document.getElementById("passwordError").style.display = "none";
    }
});
</script>

<?= view('partial/footerLogin') ?>