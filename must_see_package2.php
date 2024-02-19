<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpEmail/PHPMailer/src/Exception.php';
require 'phpEmail/PHPMailer/src/PHPMailer.php';
require 'phpEmail/PHPMailer/src/SMTP.php';
include "assets/php/connection.php";

if (isset($_POST["submit"])) {
    // Add new data
    $fullname = $_POST['fullname'];
    $email = $_POST['email_for_form'];
    $whatsapp_no = $_POST['whatsapp_no'];
    $activity = $_POST['activity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $no_adults = $_POST['no_adults'];
    $no_kids = $_POST['no_kids'];
    $departurelocation = $_POST['departurelocation'];
    $needassist = $_POST['needassist'];

    $sql = "INSERT INTO `booking` (`o_id`, `full_name`, `e_mail`, `whatsapp_no`, `activity`, `date`, `time`, `no_adults`, `no_kids`, `departure_location`, `need_assist`) VALUES (NULL, '$fullname', '$email', '$whatsapp_no', '$activity', '$date', '$time', '$no_adults', '$no_kids', '$departurelocation','$needassist')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $author_email = 'hassan.marazin@gmail.com'; // author mail address
        try {
            $Mail = new PHPMailer(true);
            $Mail->isSMTP();
            $Mail->Host = 'smtp.gmail.com';
            $Mail->SMTPAuth = true;
            $Mail->Username = 'afshan.marazin@gmail.com';
            $Mail->Password = 'eosb hhee rodl mtep';
            $Mail->SMTPSecure = 'ssl';
            $Mail->Port = 465;


            $Mail->setFrom('afshan.marazin@gmail.com');
            $Mail->addAddress($_POST['email_for_form']);
            $Mail->addAddress($author_email);
            $Mail->isHTML(true);
            $Mail->Subject = 'Welcome to Arugambay Agenda';
            $Mail->Body = 'We received your booking successfully.' .
                '<br><br>' .
                'Full Name: ' . $fullname . '<br>' .
                'Email: ' . $email . '<br>' .
                'WhatsApp Number: ' . $whatsapp_no . '<br>' .
                'Activity: ' . $activity . '<br>' .
                'Date: ' . $date . '<br>' .
                'Time: ' . $time . '<br>' .
                'Number of Adults: ' . $no_adults . '<br>' .
                'Number of Kids: ' . $no_kids . '<br>' .
                'Departure Location: ' . $departurelocation . '<br>' .
                'Need Assistance: ' . $needassist;
            $Mail->send();

            echo "<script>alert('Email sent successfully')</script>";
        } catch (Exception $e) {
            echo "Email could not be sent. Mailer Error: {$Mail->ErrorInfo}";
        }
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<body>

    <header class="header-area header-one black-bg mt-1">
        <!--====== Header Navigation ======-->
        <div class="header-navigation navigation-white">
            <div class="nav-overlay"></div>
            <div class="container-fluid">
                <?php include('Header/header.php'); ?>
            </div>
        </div>
    </header>

    <!--====== Start Place Details Section ======-->
    <section class="place-details-section">
        <!--=== Place Slider ===-->
        <div class="place-slider-area overflow-hidden wow fadeInUp">
            <div class="place-slider">
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Maintaining good relations among Sri Lankan citizens.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Cooking class for girls.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Photo of men cooking.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Travel buddies with hanas.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Wild Deer.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Blue Water Lilly.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Tips for cooking traditional food.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Vegetables used for cooking.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Tuk Tuk Sightseeing and Cooking Class/Methodology of rice cooking.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <!--=== Tour Details Wrapper ===-->
            <div class="tour-details-wrapper pt-80">
                <!--=== Tour Title Wrapper ===-->
                <div class="tour-title-wrapper pb-30 wow fadeInUp">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="tour-title mb-20">
                                <h3 class="title">Tuk Tuk Sightseeing and Cooking Class</h3>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="tour-widget-info">
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-box-usd"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>From</span>$35.00</h4>
                                    </div>
                                </div>
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>Durations</span>5 hours</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=== Tour Area Nav ===-->
                <div class="tour-area-nav pt-20 pb-20 wow fadeInUp">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="share-nav">
                                <a href="#">Share<i class="far fa-share"></i></a>
                                <a href="#">Reviews<i class="far fa-share"></i></a>
                                <a href="#">Whislist<i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <!--=== Place Content Wrap ===-->
                        <div class="place-content-wrap pt-45 wow fadeInUp">
                            <h3 class="title">Explore Tour Package</h3>
                            <p>Experience Sri Lanka’s vibrant culture with “Tuk Tuk sightseeing and Cooking Class.” Warm “Aayubowan” welcome. Surf, cook, wildlife, and more in Panama village. Unforgettable memories await!</p>
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5">
                                    <ul class="check-list">
                                        <li><i class="fas fa-badge-check"></i>Flexible Booking</li>
                                        <li><i class="fas fa-badge-check"></i>Reserve now & pay later</li>
                                        <li><i class="fas fa-badge-check"></i>Expert Instructor</li>
                                        <li><i class="fas fa-badge-check"></i>Convenient Pickup</li>
                                        <li><i class="fas fa-badge-check"></i>Eco-Conscious Tours</li>
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <img src="assets/images/must See/Tuk Tuk Sightseeing.jpg" class="mb-20 w-100" alt="place image" width="470px" height="365px">
                                </div>
                            </div>
                            <h4>Included</h4>
                            <div class="col-lg-5 mt-5">
                                <ul class="check-list">
                                    <li><i class="fas fa-badge-check"></i>Full Tuk Tuk Transport.</li>
                                    <li><i class="fas fa-badge-check"></i>Hotel Pickup and Drop-Off.</li>
                                    <li><i class="fas fa-badge-check"></i>Cooking Class.</li>
                                    <li><i class="fas fa-badge-check"></i>Tour Around Panama Village.</li>
                                    <li><i class="fas fa-badge-check"></i>Welcome Drink.</li>
                                    <li><i class="fas fa-badge-check"></i>Photos and videos taken by the Instructor.</li>
                                </ul>
                            </div>
                        </div>
                        <!--=== Days Area ===-->

                        <h3 class="mt-5">Experience</h3>
                        <!-- Accordion -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1">
                                        Highlights
                                    </button>
                                </h2>
                                <div id="flush-collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="col-lg-5">
                                            <ul class="check-list">
                                                <li><i class="fas fa-badge-check"></i>Authentic Sri Lankan cooking lessons.</li>
                                                <li><i class="fas fa-badge-check"></i>Immersive Tuk Tuk village tour.</li>
                                                <li><i class="fas fa-badge-check"></i>Personalized interaction with locals.</li>
                                                <li><i class="fas fa-badge-check"></i>Panama beach relaxation and surfing.</li>
                                                <li><i class="fas fa-badge-check"></i>Crocodile and wildlife sightings.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Full Description
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Start your day by embarking on a Tuk Tuk adventure, as we pick you up from your Arugambay location and journey to the picturesque Panama beach. Surf the waves or bask in the tropical sun as you relax on the golden shores. <br> <br>

                                        Later, step into the heart of Panama village and connect with a local family, who will delight you with their warm hospitality. Sip on a refreshing "AayuBowan" welcome drink and dive into an interactive cooking lesson. Learn the art of preparing traditional Sri Lankan dishes using farm-fresh vegetables, and indulge in the flavors of an authentic homemade lunch. <br>  <br>

                                        As the afternoon unfolds, we'll take you on a mesmerizing journey to Panama Lake, where you'll have the rare opportunity to encounter crocodiles, spot vibrant birds, and witness elephants amidst the breathtaking flora and fauna. <br> <br>

                                        Return to Arugambay, cherishing the memories of a day filled with cultural immersion, mouthwatering cuisine, and captivating wildlife encounters.Join us for an adventure that delights all your senses and leaves you with cherished memories of Sri Lanka's enchanting beauty. <br> <br>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne12" aria-expanded="false" aria-controls="flush-collapseOne12">
                                        Important information
                                    </button>
                                </h2>
                                <div id="flush-collapseOne12" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="col-lg-5">
                                            <ul class="check-list">
                                                <u>Not allowed</u>
                                                <li><i class="fas fa-badge-check"></i>Alcohol and drugs</li>
                                                <li><i class="fas fa-badge-check"></i>Weapons or sharp objects</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne123" aria-expanded="false" aria-controls="flush-collapseOne123">
                                        Not suitable for
                                    </button>
                                </h2>
                                <div id="flush-collapseOne123" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="col-lg-5">
                                            <ul class="check-list">
                                                <li><i class="fas fa-badge-check"></i>People with food allergies.</li>
                                                <li><i class="fas fa-badge-check"></i>People with mobility impairments.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <br>

                        <!--=== Releted Tour Place ===-->
                        <div class="related-tour-place wow fadeInUp">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="section-title mb-35">
                                        <h3>Related Tours</h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="place-arrows mb-35"></div>
                                </div>
                            </div>
                            <div class="recent-place-slider">
                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/must See/Cultural excursion.jpg" alt="Place Image">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="must_see_package1.php">
                                                    Cultural Excursion and Ancient Visit
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>55.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/must See/Cooking Class.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="must_see_package3.php">
                                                    Cooking Class: Srilankan Tradition
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>35.00</p>
                                        </div>
                                    </div>
                                </div>

                                 <!--=== Single Place Item ===-->
                                 <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/must See/Cultural excursion.jpg" alt="Place Image">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="must_see_package1.php">
                                                    Cultural Excursion and Ancient Visit
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>55.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/must See/Cooking Class.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="must_see_package3.php">
                                                    Cooking Class: Srilankan Tradition
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>35.00</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--=== Reviews Area ===-->
                        <!-- <div class="reviews-wrapper mb-60 wow fadeInUp">
                            <div class="reviews-inner-box">
                                <div class="rating-value">
                                    <h4>Clients Reviews</h4>
                                    <div class="rate-score">4.9</div>
                                    <ul class="ratings">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><a href="#">(4.9)</a></li>
                                    </ul>
                                    <span class="reviews">3k Reviews</span>
                                </div>
                                <div class="reviews-progress">
                                    <div class="single-progress-bar">
                                        <div class="progress-title">
                                            <h6>Quality <span class="rate">4.8</span></h6>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="single-progress-bar">
                                        <div class="progress-title">
                                            <h6>Team Member<span class="rate">4.6</span></h6>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="single-progress-bar">
                                        <div class="progress-title">
                                            <h6>Locations<span class="rate">4.7</span></h6>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="single-progress-bar">
                                        <div class="progress-title">
                                            <h6>Cost<span class="rate">4.9</span></h6>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLeft" style="width: 95%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!--===  Comments Form  ===-->
                        <div class="comments-respond mb-30 wow fadeInUp">
                            <h3 class="comments-heading" style="margin-bottom: 15px;">Leave a Comments</h3>
                            <ul class="comment-rating-ul mb-20">
                                <li>
                                    <span class="title">Quality</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                                <li>
                                    <span class="title">Location</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                                <li>
                                    <span class="title">Services</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                                <li>
                                    <span class="title">Team</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                                <li>
                                    <span class="title">Price</span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                </li>
                            </ul>
                            <form class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="email" class="form_control" placeholder="Email Address" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Enter Name" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea name="message" class="form_control" rows="4" placeholder="Write Your Comments"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <button class="main-btn primary-btn">Send comments<i class="fas fa-angle-double-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <!--=== Sidebar Widget Area ===-->
                        <div class="sidebar-widget-area pt-60 pl-lg-30">
                            <!--=== Booking Widget ===-->
                            <div class="sidebar-widget booking-form-widget wow fadeInUp mb-40">
                                <h4 class="widget-title">Booking Now</h4>
                                <form class="sidebar-booking-form" action="" method="post">
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="fullname">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email_for_form" placeholder="E-Mail Address" name="email_for_form">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="whatsapp_no" placeholder="WhatsApp Number" name="whatsapp_no">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <select class="form-select" id="select_option" name="activity">
                                                <option value="">Select an option</option>
                                                <option value="Cultural excursion and Ancient visit">Cultural excursion and Ancient visit</option>
                                                <option value="Tuktuk sightseeking and Cooking class">Tuktuk sightseeking and Cooking class</option>
                                                <option value="Cooking - Srilankan tradition">Cooking - Srilankan tradition</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="booking-item mb-20">
                                        <div class="bk-item booking-time">
                                            <i class="far fa-calendar-alt"></i>
                                            <input type="text" placeholder="Select Date" class="datepicker" name="date">
                                        </div>
                                    </div>

                                    <div class="booking-item mb-20">
                                        <div class="bk-item booking-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <select class="wide" name="time">
                                                <option value="12.00">12.00 Am</option>
                                                <option value="01.00">01.00 Am</option>
                                                <option value="02.00">02.00 Am</option>
                                                <option value="03.00">03.00 Am</option>
                                                <option value="04.00">04.00 Am</option>
                                                <option value="05.00">05.00 Am</option>
                                                <option value="06.00">06.00 Am</option>
                                                <option value="07.00">07.00 Am</option>
                                                <option value="08.00">08.00 Am</option>
                                                <option value="09.00">09.00 Am</option>
                                                <option value="10.00">10.00 Am</option>
                                                <option value="11.00">11.00 Am</option>
                                                <option value="12.00">12.00 Pm</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email_address" placeholder="Number of Adults" name="no_adults">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Number_of_pax" placeholder="Number of Kids" name="no_kids">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Number_of_pax" placeholder="Departure location" name="departurelocation">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="Number_of_pax" placeholder="Need further assists? write us below" name="needassist">
                                        </div>
                                    </div>
                                    <div class="booking-date-time mb-20">
                                        <div class="submit-button">
                                            <button class="main-btn primary-btn" name="submit">Booking Now<i class="far fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--=== Booking Info Widget ===-->
                            <div class="sidebar-widget booking-info-widget wow fadeInUp mb-40">
                                <h4 class="widget-title">Tour Information</h4>
                                <ul class="info-list">
                                    <li><span><i class="far fa-user-circle"></i>Max Guests<span>21</span></span></li>
                                    <li><span><i class="far fa-user-circle"></i>Minimum Age<span>12+</span></span></li>
                                    <li><span><i class="far fa-map-marker-alt"></i>Tour Location<span>Srilanka</span></span></li>
                                    <li><span><i class="far fa-globe"></i>Language<span>English</span></span></li>
                                </ul>
                            </div>

                            <div class="sidebar-widget booking-info-widget wow fadeInUp mb-40">
                                <h4 class="widget-title">For More Details</h4>
                                <ul class="info-list">
                                    <li><span><i class="far fa-user-circle"></i>Talk to <span>Mr.Hanas</span></span></li>
                                    <li><span><i class="far fa-phone"></i> <span>+94 72 647 9635</span></span></li>
                                    <li><span><i class="far fa-phone"></i><span>+94 76 689 9188</span></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Place Details Section ======-->

    <?php include('Footer/footer.php'); ?>

    <!--====== Back To Top  ======-->
    <a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a>

</body>

</html>