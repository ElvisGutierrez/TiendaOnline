<?php include_once 'Views/template/header-principal.php'; ?>



<style>
    .img-fluid1 {
    width: 150px;  /* Define un ancho fijo */
    height: 150px; /* Define un alto fijo */
    object-fit: cover; /* Para que la imagen mantenga su proporción */
}



</style>
    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://i.pinimg.com/1200x/86/d7/c2/86d7c2b8648accea9dccf5c4d4b7f49d.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Tienda Online</b> Ropa Casual</h1>
                                <h3 class="h2">Estilo y comodidad para tu día</h3>
                                <p>
                                    Descubre nuestra colección de ropa casual diseñada para brindarte frescura y comodidad sin perder el estilo. 
                                    Desde camisetas modernas hasta jeans de alta calidad, combina tus outfits de manera versátil para cada ocasión.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="https://i.pinimg.com/736x/11/e8/87/11e88743cbc18dafae1296ef34d9e075.jpg" alt="">

                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Elegancia a tu alcance</h1>
                                <h3 class="h2">Lo último en moda formal</h3>
                                <p>
                                    Trajes, camisas y blusas confeccionados con telas de primera, pensados para realzar tu personalidad en cada 
                                    evento importante. Viste con distinción y seguridad, marcando la diferencia en cualquier lugar.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="https://i.pinimg.com/1200x/65/cd/09/65cd099d2f564a010b11f984584e87a9.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Los detalles que marcan tu estilo</h1>
                                <h3 class="h2">Accesorios de temporada</h3>
                                <p>
                                    Complementa tu look con bolsos, cinturones y zapatos que siguen las últimas tendencias de la moda. 
                                    Diseñados para quienes buscan destacar en cada detalle y transformar un outfit sencillo en uno inolvidable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <!-- Título -->
        <div class="row text-center pt-3">
            <div class="col-lg-6 mx-auto">
                <h1 class="h1">Categorías</h1>
                <p>Todo en un solo lugar</p>
            </div>
        </div>

        <!-- Categorías -->
       <div class="categorias-container">
            <?php foreach ($data['categorias'] as $categoria) { ?>
                <div class="categoria-item">
                    <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>">
                        <img src="<?php echo $categoria['imagen']; ?>" class="categoria-img">
                    </a>
                    <h5 class="categoria-title"><?php echo $categoria['categoria']; ?></h5>
                </div>
            <?php } ?>
        </div>


    </section>

    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5 ">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Producto destacado</h1>
                </div>
            </div>
            <div class="row productos-destacados justify-content-center mx-auto">
                <?php foreach ($data['nuevoProductos'] as $producto) { ?>
                    <div class="col-12 col-sm-6 col-md-3 mb-4 d-flex justify-content-center">
                        <div class="card card-uniform">
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                                <img src="<?php echo $producto['imagen']; ?>" class="card-img-top producto-img" alt="<?php echo $producto['nombre']; ?>">
                            </a>
                            <div class="card-body d-flex flex-column">
                                <ul class="list-unstyled d-flex justify-content-between mb-2">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio']; ?></li>
                                </ul>
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h5 text-decoration-none text-dark mb-2"><?php echo $producto['nombre']; ?></a>
                                <p class="card-text mb-2"><?php echo $producto['descripcion']; ?></p>
                                <p class="text-muted mt-auto">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </section>
    <!-- End Featured Product -->

<?php include_once 'Views/template/footer-principal.php'; ?>

</body>

</html>