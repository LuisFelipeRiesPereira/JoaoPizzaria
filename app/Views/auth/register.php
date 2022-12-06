<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('public/assets/bootstrap.min.css') ?>">
</head>
<body>
<section class="vh-100" style="background-color: #212529;">
    <div class="container py-5 h-100">
    <div class="col col-xl-10" style="margin-right: 0px; margin-left: 6vw">
    <div class="card" style="border-radius: 1rem;">
    <div class="row g-0">
    <div class="col-md-6 col-lg-5 d-none d-md-block">
    <img src="<?= base_url('public/assets/images/pizza-top.jpg') ?>"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <?php
                    if(!empty(session()->getFlashdata('success'))){
                        ?>
                        <div class="alert alert-success">
                            <?= 
                                session()->getFlashdata('success');
                            ?>
                        </div>
                        <?php
                    } else if(!empty(session()->getFlashdata('fail'))){
                        ?>
                        <div class="alert alert-danger">
                            <?= 
                                session()->getFlashdata('fail');
                            ?>
                        </div>
                        <?php
                    } 
                ?>

                <form action="<?= site_url('registerUser') ?>" 
                      class="form mb-3"
                      method="post">
                    <?= csrf_field(); ?>
                    <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="<?= base_url('public/assets/images/logo.png') ?>" style="width: 5vw;"/></i>
                    <span class="h1 fw-bold mb-0">João pizzaria</span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registre sua conta</h5>
                    <div class="form-outline mb-4">
                        <label for="">Nome</label>
                            <input type="text" 
                                    class="form-control"
                                    name="name"
                                    value="<?= set_value('name') ?>"
                                    placeholder="Seu nome">
                            <span class="text-danger text-sm">
                                <?= isset($validation) ? display_form_errors($validation, 'name') : '' ?>
                            </span>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="">E-mail</label>
                        <input type="text" 
                               class="form-control"
                               name="email"
                               value="<?= set_value('email') ?>"
                               placeholder="Seu e-mail">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'email') : '' ?>
                        </span>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="">Senha</label>
                        <input type="password" 
                               class="form-control"
                               name="password"
                               value="<?= set_value('password') ?>"
                               placeholder="Sua senha">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'password') : '' ?>
                        </span>
                    </div>

                    <div class="form-outline mb-4">
                        <label for="">Confirme sua senha</label>
                        <input type="password" 
                               class="form-control"
                               name="passwordConf"
                               value="<?= set_value('passwordConf') ?>"
                               placeholder="Confirme sua senha">
                        <span class="text-danger text-sm">
                            <?= isset($validation) ? display_form_errors($validation, 'passwordConf') : '' ?>
                        </span>
                    </div>


                    <div class="pt-1 mb-4">
                        <input type="submit" 
                        class="btn btn-dark btn-lg btn-block"
                               value="Cadastrar!">
                    </div> 

                </form>
                <div>
                <p class="mb-5 pb-lg-2" style="color: #393f81;"><a href="<?= site_url('auth') ?>"
                    style="color: #393f81;"> Já tenho uma conta, logar</a></p>
                    <a href="<?= site_url('/') ?>">
                    Voltar ao home
                </a>
                </div>
                
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>






    <script src="<?= base_url('public/assets/bootstrap.bundle.min.css') ?>"></script>
</body>
</html>
