<?php include_once 'Views/template/header-principal.php' ?>
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row product-detail mx-auto">
                <div class="col-lg-5 mt-5">
                    <div  class="card mb-3">
                        <img class="card-img img-fluid h-100" 
                            src="<?php 
                                $img = $data['producto']['imagen'];
                                echo (strpos($img, 'http') === 0) ? $img : BASE_URL . 'assets/images/productos/' . $img; 
                            ?>" 
                            alt="<?php echo $data['producto']['nombre']; ?>" 
                            id="product-detail"
                            style="object-fit: cover;">

                    </div>
                </div>
                <!-- col end -->
                <div  class="col-lg-7 mt-5 d-flex">
                    <div id="trgta" class="card mb-3 flex-fill d-flex">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                            <h1 class="h2"><?php echo $data['producto']['nombre'] ?></h1>
                            <p class="h3 py-2"><?php echo MONEDA . ' ' . $data['producto']['precio'] ?></p>
                            <ul class="list-inline text-center">
                                <li class="list-inline-item">
                                    <h6>Categoria:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong><?php echo $data['producto']['categoria'] ?></strong></p>
                                </li>
                            </ul>

                            <h6>Descripción:</h6>
                            <p><?php echo $data['producto']['descripcion'] ?></p>
                            <ul class="list-inline">
                            </ul>


                            <form action="" method="GET">
                                <input type="hidden" id="idProducto" value="<?php echo $data['producto']['id'] ?>">
                                <div class="row">
                                    <div class="row mb-3">
                                        <div class="col-auto d-flex align-items-center">
                                            <span class="me-2">Cantidad:</span>
                                            <button type="button" class="btn btn-success btn-sm" id="btn-minus">-</button>
                                            <span class="badge bg-secondary mx-2" id="var-value">1</span>
                                            <button type="button" class="btn btn-success btn-sm" id="btn-plus">+</button>
                                            <input type="hidden" id="product-quanity" value="1">
                                        </div>
                                    </div>

                                </div>
                                <div class="row pb-3 g-2">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Comprar</button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="button" class="btn btn-success btn-lg" id="btnAddCart" >Añadir</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center p-2 pb-3">
                <h4>Productos Relacionados</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product" class="row g-1">

                <?php foreach ( $data['relacionados'] as $producto) { ?>
                    <div class="p-2 pb-3 d-flex align-items-stretch">
                        <div class="product-wap card rounded-0 w-100">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" 
                                    src="<?php 
                                        $img = $producto['imagen'];
                                        echo (strpos($img, 'http') === 0) ? $img : BASE_URL . 'assets/images/productos/' . $img; 
                                    ?>">

                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white btnAddDeseo" href="#" prod="<?php echo $producto['id']; ?>"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2 btnAddCarrito" href="#" prod="<?php echo $producto['id']; ?>"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h3 text-decoration-none"><?php echo $producto['nombre']; ?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0"><?php echo MONEDA . ' ' . $producto['precio']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </section>
    <!-- End Article -->


    <<?php include_once 'Views/template/footer-principal.php' ?>

    <script src="<?php echo BASE_URL; ?>assets/js/modulos/detail.js"></script>
    <!-- Start Slider Script -->
    <script src="<?php echo BASE_URL; ?>assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>