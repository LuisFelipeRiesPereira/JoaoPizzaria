<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>João Pizzaria</title>
  <link rel="stylesheet" href="<?= base_url('public/assets/bootstrap.min.css') ?>">
</head>

<body style=
    "min-height: 100vh;  
    display: flex;
    flex-direction: column;">
  <header class="p-0 bg-dark text-white fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="<?= site_url('clientHome') ?>/">
          <img src="<?= base_url('public/assets/images/logo.png') ?>" style="width:3rem"
            class="d-inline-block align-text-top" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li>
            <a class="nav-link px-2 text-white" aria-current="page" href="<?= site_url('clientHome') ?>/">Pagina
              inicial</a>
      </div>
      <div class="container " style="width: 3%; padding-right: 5.40%;">
        <form action="<?= site_url('logout') ?>">
          <?= $userInfo['name'] ?>
            <?= $userInfo['type'] ?>
              <input class="form-control form-control-dark text-bg-dark" type="submit" value="Logout">
        </form>
      </div>

    </nav>
  </header>
  <main >
    <?php if ($userInfo['type'] == 'admin') {
      $this->renderSection('adminHome');
    } else {
      $this->renderSection('clientHome');
    }
    ?>


  </main>
</body>

<footer class="container" style="margin-top: auto;">
<hr>
    <div class="row">
      <div class="col text-center">
        João pizzaria &copy; <?= date('Y') ?>
      </div>
    </div>
  </footer>
  <script src="<?= base_url('public/assets/bootstrap.bundle.min.js') ?>"></script>
</html>