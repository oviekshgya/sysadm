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
                <span id="emailError" style="color: red; display: none;">Email sudah digunakan!</span>
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

                <div class="input-group mb-3">
                    <select class="form-control" name="idRole">
                        <option value="0">=== ACCESS ===</option>
                        <option value="0">Admin</option>
                        <option value="1">SubAdmin</option>
                    </select>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa-solid fa-universal-access"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select class="form-control" name="idHeaderUser" id="idHeaderUser">
                        <option value="0">=== HEADER USER ===</option>
                    </select>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa-solid fa-universal-access"></span>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
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

document.getElementById("email").addEventListener("input", function() {
    var email = this.value;
    var emailError = document.getElementById("emailError");

    if (email.length > 0) {
        // Kirim permintaan AJAX ke server untuk mengecek email
        var formData = new FormData();
        formData.append('email', email);

        fetch('/users/check', {
                method: 'POST',
                // headers: {
                //     'Content-Type': 'application/json',
                // },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'exists') {
                    emailError.style.display = "inline";
                } else {
                    emailError.style.display = "none";
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        emailError.style.display = "none";
    }
});

document.querySelector("select[name='idRole']").addEventListener("change", function() {
    var idRole = this.value;

    // Jika idRole bukan 0, ambil data dari server
    if (idRole !== "0") {
        fetch(`/get-header-user/${idRole}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                var headerUserSelect = document.getElementById("idHeaderUser");

                // Kosongkan dropdown `HEADER USER` sebelum menambahkan opsi baru
                headerUserSelect.innerHTML = '<option value="0">=== HEADER USER ===</option>';

                // Loop data hasil response dan tambahkan opsi ke dropdown `HEADER USER`
                data.forEach(user => {
                    var option = document.createElement("option");
                    option.value = user.id;
                    option.textContent = user.nameUser;
                    headerUserSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    } else {
        // Kosongkan dropdown jika `ACCESS` tidak dipilih
        document.getElementById("idHeaderUser").innerHTML =
            '<option value="0" disabled>=== HEADER USER ===</option>';
    }
});
</script>

<?= view('partial/footerLogin') ?>