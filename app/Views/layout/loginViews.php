<?= view('partial/headerLogin') ?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>System</b>Ads</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="/forgotPassword">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="/register" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
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

<?= view('partial/footerLogin') ?>