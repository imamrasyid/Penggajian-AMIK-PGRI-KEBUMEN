<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_description ?>" />
        <meta name="author" content="<?php echo $this->mainlibrary->InitSettings(2)->meta_author ?>" />
        <title><?php echo $this->mainlibrary->InitSettings(2)->web_title ?> - <?php echo $title ?></title>
        <!-- [START] Main Style -->
        <link href="<?php echo base_url() ?>assets/css/styles.css" rel="stylesheet" />
        <!-- [END] Main Style -->
        
        <!-- [START] Icons -->
        <script data-search-pseudo-elements defer src="<?php echo base_url() ?>assets/vendors/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/vendors/cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <!-- [END] Icons -->

        <!-- [START] Jquery -->
        <script src="<?php echo base_url() ?>assets/vendors/code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <!-- [END] Jquery -->
        
        <!-- [START] SweetAlert2 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/sweetalert2/dist/sweetalert2.min.css">
        <script src="<?php echo base_url() ?>assets/vendors/sweetalert2/dist/sweetalert2.min.js"></script>
        <!-- [END] SweetAlert2 -->
        
        <!-- [START] Custom JS -->
        <script src="<?php echo base_url() ?>assets/js/custom.js"></script>
        <!-- [END] Custom JS -->
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center">
                                        <h3 class="my-4 text-uppercase">HALAMAN LOGIN<br><?php echo $this->mainlibrary->InitSettings(2)->web_title ?><br>AMIK PGRI KEBUMEN</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php echo form_open(base_url('login/do_login'), 'id="form_login" class="form-horizontal" autocomplete="off"') ?>
                                            <div id="messages">

                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">NIP</label>
                                                <input type="text" id="nip" name="nip" class="form-control" placeholder="Masukkan NIP Anda" autofocus required>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Password</label>
                                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Masuk Sebagai</label>
                                                <select name="level_access" id="level_access" class="form-control">
                                                    <option value="" disabled selected>Silahkan Pilih Masuk Sebagai</option>
                                                    <option value="Pegawai">Pegawai</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="javascript:void(0)" onclick="ShowToast(2000, 'info', 'Fitur belum tersedia saat ini.')">Lupa Password?</a>
                                                <input type="submit" id="submit" class="btn btn-outline-primary" value="Login">
                                            </div>
                                        <?php echo form_close() ?>
                                        <script>
                                            var CSRF_TOKEN = '<?php echo $this->security->get_csrf_hash() ?>';
                                            $(document).ready(() => {
                                                $('#form_login').on('submit', (e) => {
                                                    e.preventDefault();

                                                    return Do_Login();
                                                });
                                            });

                                            function Do_Login(){
                                                if ($('#nip').val() === '' || $('#nip').val() === null){
                                                    ShowToast(2000, 'warning', 'NIP tidak boleh kosong.');
                                                    return;
                                                }
                                                else if ($('#password').val() === '' || $('#password').val() === null){
                                                    ShowToast(2000, 'warning', 'Password tidak boleh kosong.');
                                                    return;
                                                }
                                                else if ($('#level_access').val() === '' || $('#level_access').val() === null){
                                                    ShowToast(2000, 'warning', 'Masuk Sebagai tidak boleh kosong.');
                                                    return;
                                                }
                                                else{
                                                    ButtonState('submit', 'button', 'Memproses...');

                                                    $.ajax({
                                                        url: '<?php echo base_url('login/do_login') ?>',
                                                        type: 'POST',
                                                        dataType: 'JSON',
                                                        data: {
                                                            '<?php echo $this->security->get_csrf_token_name() ?>' : CSRF_TOKEN,
                                                            'nip' : $('#nip').val(),
                                                            'password' : $('#password').val(),
                                                            'level_access' : $('#level_access').val()
                                                        },
                                                        success: (response) => {
                                                            var GetString = JSON.stringify(response);
                                                            var Result = JSON.parse(GetString);

                                                            if (Result.status === true){
                                                                ButtonState('submit', 'submit', 'Login');
                                                                ShowToast(2000, 'success', Result.message);
                                                                CSRF_TOKEN = Result.token;
                                                                setTimeout(() => {
                                                                    window.location = '<?php echo base_url('home') ?>';
                                                                }, 2000);
                                                            }
                                                            else{
                                                                ButtonState('submit', 'submit', 'Login');
                                                                ShowToast(2000, 'error', Result.message);
                                                                CSRF_TOKEN = Result.token;
                                                                return;
                                                            }
                                                        },
                                                        error: () => {
                                                            ButtonState('submit', 'submit', 'Login');
                                                            ShowToast(2000, 'error', 'Error: Server tidak merespon.');
                                                            setTimeout(() => {
                                                                window.location.reload();
                                                            }, 2000);
                                                        }
                                                    });
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer mt-auto footer-dark">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &#xA9; <a href="<?php echo base_url() ?>" target="_blank">AMIK PGRI KEBUMEN</a> <?php echo date('Y') ?></div>
                            <div class="col-md-6 text-md-right small">
                                Version: 2.0.0
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url() ?>assets/vendors/cdn.jsdelivr.net/npm/bootstrap%404.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
    </body>
</html>
