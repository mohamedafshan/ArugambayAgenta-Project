<!DOCTYPE html>
<html lang="zxx">

<?php include('Header/header.php') ?>

<body>
    <!--====== Start Breadcrumb Section ======-->
    <section class="page-banner overlay pt-170 pb-170 bg_cover" style="background-image: url(assets/images/bg/Tourists\ travel\ with\ Hanas.jpg); height: 80px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="page-banner-content text-center text-white">
                        <h1 class="page-title">Contact Us</h1>
                        <ul class="breadcrumb-link text-white">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== Start Contact Section ======-->
    <section class="contact-section pb-100 mt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="section-title text-center mb-50 wow fadeInDown">
                        <span class="sub-title">Contact With Us</span>
                        <h2>Have Questions? Feel free to write us</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-area contact-form wow fadeInUp">
                        <form id="contactForm" class="contactForm" action="assets/php/form-process.php" name="contactForm" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form_group form-group">
                                        <input type="text" placeholder="Name" class="form_control" name="name" id="name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group form-group">
                                        <input type="text" placeholder="WhatsApp Number" class="form_control" id="phone_number" name="phone_number" required data-error="Please enter your WhatsApp number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group form-group">
                                        <input type="email" placeholder="Email Address" class="form_control" name="email" id="email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form_group form-group">
                                        <input type="text" placeholder="Website" class="form_control" id="website" name="website" required data-error="Please enter your website">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group form-group">
                                        <textarea name="message" id="message" placeholder="Write Message" class="form_control" rows="6" required data-error="Please enter your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group form-group text-center">
                                        <button class="main-btn primary-btn">Send Us Message<i class="fas fa-paper-plane"></i></button>

                                        <div id="msgSubmit" class="hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Contact Section ======-->

    <!--====== Start Contact Map Section ======-->
    <section class="contact-page-map pb-100 wow fadeInUp">
        <!--=== Map Box ===-->
        <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d247.58542694450796!2d81.83110090030263!3d6.846553250694873!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae5bdd4ea90a9dd%3A0x7011ba04a540ae4e!2sArugambay%20Agenda!5e0!3m2!1sen!2slk!4v1708843295706!5m2!1sen!2slk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section><!--====== End Contact Map Section ======-->
    <!--====== Start Footer ======-->
    <?php include('Footer/footer.php') ?>

    <!-- For Contact Form -->

    <a href="https://wa.me/message/L2MV5OGPQV2RH1" class="back-to-top"><i class="fab fa-whatsapp"></i></a>
    <script src="assets/vendor/form-validation/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendor/form-validation/form-validator.min.js"></script>
    <script src="assets/vendor/form-validation/contact-form-script.js"></script>
</body>

</html>