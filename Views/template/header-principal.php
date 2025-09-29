<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo TITLE . ' - ' . $data['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo BASE_URL . 'assets/img/apple-icon.png'; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL . 'assets/img/favicon.ico'; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/templatemo.css'; ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/custom.css'; ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">



    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">

         <!-- PayPal Initialize the JS-SDK -->
         <script
            src="https://www.paypal.com/sdk/js?client-id=ASgRVqLbf_WqxHuyG3W39JVBS9EcXNjr_joHsbdgnDy4QnQ-y33bsglf84Y2yU5rucnxmDro-58JzFqE&buyer-country=US&currency=USD&components=buttons&enable-funding=venmo"
            data-sdk-integration-source="developer-studio"
        ></script>

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/slick.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/css/slick-theme.css'; ?>">

    <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/fontawesome.min.css'; ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script
            src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>&buyer-country=US&currency=<?php echo MONEDA;?>&components=buttons&enable-funding=venmo"
            data-sdk-integration-source="developer-studio"
        ></script>
    <!--


    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none"
                        href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:23823425"></a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
                            class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i
                            class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i
                            class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
                            class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav id="main-header" class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo BASE_URL; ?>">
                e - Commerce
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between"
                id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL; ?>">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/about' ?>">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/shop' ?>">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/contact' ?>">Contactos</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text text-light">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline text-light" href="#" data-bs-toggle="modal"
                        data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-light mr-2"></i>
                    </a>
                    
                  
                    <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none' ; ?>" href="#" id="verCarrito">
                        <i class="fas fa-fw fa-cart-arrow-down text-light me-1"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark" id="btnCantidadCarrito">0</span>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none' ; ?>" href="<?php echo BASE_URL . 'principal/deseo'; ?>">
                        <i class="fas fa-fw fa-heart text-light me-1"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark" id="btnCantidadDeseo">0</span>
                    </a>
                <?php  ?>

                    <?php if (!empty($_SESSION['correoCliente'])) { ?>
                        <a class="nav-icon position-relative text-decoration-none"
                            href="<?php echo BASE_URL . 'clientes' ?>">
                            <img class="img-thumbnail" src="<?php echo BASE_URL . 'assets_tmp/img/login.png' ?>"
                                alt="Logo Cliente" width="50">
                        </a>
                    <?php } else { ?>

                        <a class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal"
                            data-bs-target="#modalLogin">
                            <i class="fas fa-fw fa-user text-light mr-3"></i>
                        </a>
                    <?php } ?>

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                <div class="row" id="resultBusqueda">

            </div>
            </div>
            
        </div>
    </div>