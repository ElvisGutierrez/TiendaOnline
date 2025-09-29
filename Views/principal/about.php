<?php include_once 'Views/template/header-principal.php'; ?>

<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center py-5">
            <div class="col-md-8 text-white mb-4 mb-md-0 ps-5">
                <h1>Sobre Nosotros</h1>
                <p>
                    Tu tienda online especializada en moda y estilo. Desde ropa casual hasta prendas formales, accesorios y complementos, nuestra misión es ofrecer las últimas tendencias de moda directamente a tus manos, para que luzcas increíble en cualquier ocasión.
                </p>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <img src="https://i.pinimg.com/736x/11/99/7c/11997ce19630f47c4b3fdaba2c3a6562.jpg" alt="About Hero" class="about-img">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Nuestros Servicios</h1>
            <p>
                Ofrecemos una experiencia de compra única con atención personalizada, envío rápido y promociones exclusivas, para que siempre estés a la moda.
            </p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Envío a domicilio</h2>
                <p class="text-center">Recibe tus prendas directamente en tu hogar, rápido y seguro.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fas fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Devoluciones y cambios</h2>
                <p class="text-center">Si algo no te queda perfecto, puedes cambiarlo o devolverlo fácilmente.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promociones exclusivas</h2>
                <p class="text-center">Ofertas especiales en temporada, para que renueves tu closet sin gastar de más.</p>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-success text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">Atención al cliente</h2>
                <p class="text-center">Asesoría personalizada para elegir la talla, estilo y color que más te convenga.</p>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestras Marcas</h1>
                <p>
                    Contamos con las marcas de moda más reconocidas y tendencias internacionales, para que siempre luzcas a la moda.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="templatemo-slide-brand" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="<?php echo BASE_URL; ?>assets/images/marcas/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="<?php echo BASE_URL; ?>assets/images/marcas/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="<?php echo BASE_URL; ?>assets/images/marcas/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="<?php echo BASE_URL; ?>assets/images/marcas/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <!--End Second slide-->

                                <!--Third slide-->
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#templatemo-slide-brand" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->

<?php include_once 'Views/template/footer-principal.php'; ?>

</body>
</html>
