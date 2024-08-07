<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Login</title>
    <link rel="stylesheet" href="<?= base_url("assets/vendors/feather/feather.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/ti-icons/css/themify-icons.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/css/vendor.bundle.base.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/font-awesome/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendors/mdi/css/materialdesignicons.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/css/style.css")?>">
    <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.png")?>" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="<?= base_url("assets/images/logo.svg")?>" alt="logo">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" id="data-form-submit" action="<?= base_url('login/auth'); ?>" method="post">
                  <?= view('includes/messages') ?>
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="inputPassword" placeholder="Password" required>
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                        SIGN IN
                    </button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                     Don't have an account? 
                     <a href="<?= base_url("register")?>" class="text-primary">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?= base_url("assets/vendors/js/vendor.bundle.base.js")?>"></script>
    <script src="<?= base_url("assets/js/off-canvas.js")?>"></script>
    <script src="<?= base_url("assets/js/template.js")?>"></script>
    <script src="<?= base_url("assets/js/settings.js")?>"></script>
    <script src="<?= base_url("assets/js/todolist.js")?>"></script>
    <script src="<?= base_url("assets/js/custom.js")?>"></script>
  </body>
</html>