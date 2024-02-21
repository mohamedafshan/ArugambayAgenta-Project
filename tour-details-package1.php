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
    $price_of_adults = $_POST['adult_value'];
    $price_of_child = $_POST['kids_value'];
    $price_of_total = $_POST['total'];

    $sql = "INSERT INTO `booking` (`o_id`, `full_name`, `e_mail`, `whatsapp_no`, `activity`, `date`, `time`, `no_adults`, `no_kids`, `departure_location`, `need_assist`,`price_of_adults`, `price_of_child`, `total_amount`) VALUES (NULL, '$fullname', '$email', '$whatsapp_no', '$activity', '$date', '$time', '$no_adults', '$no_kids', '$departurelocation','$needassist','$price_of_adults','$price_of_child','$price_of_total')";

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
                'Need Assistance: ' . $needassist .'<br>'. 
                'Total Price of Adults: '.$price_of_adults .'<br>' . 
                'Total Price of Child: '.$price_of_child . '<br>' . 
                'Total Amount: '.$price_of_total;
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
                        <img src="assets/images/wildlife_kumana_package/Visit of the wild elephant.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/herd of buffaloes.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Crane in search of prey.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/wildsafari_tiger.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Short rest time in the forest.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Group photo of tourists.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Mother and baby monkeys.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/A waiting wild tiger for hunting.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Group photo of tourists.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/The singing cuckuu is on the tree.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/A waiting tiger in kumana.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/Two traveling women.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/A visit to the wild elephant can be seen in Kumana.jpg" alt="Place Image" height="630px">
                    </div>
                </div>
                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/wildlife_kumana_package/A resting tiger.jpg" alt="Place Image" height="630px">
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
                                <h3 class="title">Half-Day Wild Safari in Kumana National Park (Sharing)</h3>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="tour-widget-info">
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-box-usd"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>From</span>$40.00</h4>
                                    </div>
                                </div>
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>Durations</span>6 hours</h4>
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
                            <p> Experience Kumana National Park’s wonders with our Shared Half-Day Wild Safari. Split costs, share memories, and explore the wild in great company. Book now!</h4>
                            <div class="row align-items-lg-center">
                                <div class="col-lg-5">
                                    <ul class="check-list">
                                        <li><i class="fas fa-badge-check"></i>Flexible Booking</li>
                                        <li><i class="fas fa-badge-check"></i>Reserve now & pay later</li>
                                        <li><i class="fas fa-badge-check"></i>Expert Driver</li>
                                        <li><i class="fas fa-badge-check"></i>Convenient Pickup</li>
                                        <li><i class="fas fa-badge-check"></i>Eco-Conscious Tours</li>
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <img src="assets/images/wildlife&eco/Wild Safari in Kumana with hanas.jpg" class="mb-20 w-100" alt="place image" height="365px">
                                </div>
                            </div>
                        </div>
                        <!--=== Days Area ===-->

                        <!-- Accordion -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Full Description
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Introducing Our Shared Half-Day Wild Safari - Discover the thrill of exploring Kumana National Park's breathtaking landscapes and diverse wildlife in the company of fellow adventurers. Our new sharing option allows you to experience the magic of the wild while splitting the cost, making it an affordable and exciting choice for all. Reserve your spot today and create unforgettable memories together. Join us in the heart of nature, where every moment becomes an extraordinary adventure. Book now and share the wonder!</div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Important information
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="check-list">
                                            <U>Not Allowed</U>
                                            <li><i class="fas fa-badge-check"></i>Alcohol and drugs</li>
                                            <li><i class="fas fa-badge-check"></i>Weapons or sharp objects</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Not suitable for
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="check-list">
                                            <li><i class="fas fa-badge-check"></i>People with mobility impairments.</li>
                                            <li><i class="fas fa-badge-check"></i>Pregnant women.</li>
                                            <li><i class="fas fa-badge-check"></i>People with heart problems.</li>
                                            <li><i class="fas fa-badge-check"></i>People with low level of fitness.</li>
                                        </ul>
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
                                        <img src="assets/images/wildlife_kumana_package/A waiting tiger in kumana.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package6.php">Full-Day Wild Safari in Kumana National park (Private)
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>130.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Selfie photo with riding buddies with hanas.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package8.php">Half Day Wild Safari in Yala National park <br><br>
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>85.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Tiger roars in yala.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package7.php">Full-Day Wild Safari in Kumana National park (Private)
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>140.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Boat trip with travel buddies.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package3.php">Full-Day Wild Safari in Yala National Park
                                                    <br><br> </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>25.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Wild tigers can be seen in yala.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package4.php">Mangrove Watching in Pottuvil Lagoon (Lagoon Eco Tour)
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>170.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Buffalo in Lahugala National Park.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package2.php">Arugambay to Yala: Wild Safari + Drop-off Flexibilty
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    <br>$</span>23.47</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Visit of wild elephants.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="tour-details-package5.php">Wild Safari in Lahugala National Park
                                                    <br><br></a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>75.00</p>
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
                                                <option value="Half-Day wild safari in Kumana National Park">Half-Day wild safari in Kumana National Park</option>
                                                <option value="Full-Day wild safari in Kumana National Park">Full-Day wild safari in Kumana National Park</option>
                                                <option value="Mangrove wathing in Pottuvil Lagoon - Lagoon eco tour">Mangrove wathing in Pottuvil Lagoon - Lagoon eco tour</option>
                                                <option value="Half-Day wild safari in yala National">Half-Day wild safari in yala National </option>
                                                <option value="Full-Day wild safari in yala National">Full-Day wild safari in yala National </option>
                                                <option value="arugambay to yala : wild safari + Drop of flexibilty">arugambay to yala : wild safari + Drop of flexibilty </option>
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
                                            <input type="text" class="form-control" id="no_adults" placeholder="Number of Adults" name="no_adults" onchange="calculate_adult_amount(this.value)">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_kids" placeholder="Number of Kids" name="no_kids" onchange="calculate_kid_amount(this.value)">
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
                                    <div class="booking-extra mb-15 wow fadeInUp">
                                        <h6 class="mb-10">Price Info</h6>
                                        <div class="extra">
                                            <i class="fas fa-check-circle"></i>Adult<span><span class="currency" id="totalAmount_adult"></span>
                                            </span> <input type="hidden" id="totalAmountadult" name="adult_value">
                                        </div>
                                        <div class="extra">
                                            <i class="fas fa-check-circle"></i>Kids <span><span class="currency" id="totalAmount_kids"></span></span> 
                                            <input type="hidden" id="totalAmountkids" name="kids_value">
                                        </div>
                                    </div>
                                    <div class="booking-total mb-20">
                                        <div class="total">
                                            <label>Total</label>
                                            <span class="price"><span class="currency" id="totalAmount"></span></span> 
                                            <input type="hidden" id="totalAmountText" name="total">
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

    <script>
        var total1 = 0;
        var total2 = 0;
        var nonselected = "a";

        function calculate_adult_amount(value1) {

            if (value1 == "") {
                value1 = 0;
            }

            value1 = parseInt(value1)
            var unitprice = 0;

            switch (value1) {
                case 0:
                    unitprice = 0;
                    break;
                case 1:
                    unitprice = 193.55;
                    break;
                case 2:
                    unitprice = 112.90;
                    break;
                case 3:
                    unitprice = 96.77;
                    break;
                case 4:
                    unitprice = 90.32;
                    break;
                case 5:
                    unitprice = 80.65;
                    break;
                case 6:
                    unitprice = 74.19;
                    break;
                case 7:
                case 8:
                case 9:
                case 10:
                    unitprice = 64.52;
                    break;
                default:
                    nonselected = "more";
                    unitprice = 0;
            }
            if (nonselected == "more") {
                total1 = unitprice * parseInt(value1); // float + integerr
                document.getElementById('totalAmount_adult').innerText = "Not Allowed More than 10";
                updateTotalAmount();
            } else {
                total1 = unitprice * parseInt(value1);
                document.getElementById('totalAmount_adult').innerText = '$' + total1.toFixed(2);
                document.getElementById('totalAmountadult').value = '$' + total1.toFixed(2);
                updateTotalAmount();
            }
            
        }

        function calculate_kid_amount(value2) {

            if (value2 == "") {
                value2 = 0;
            }

            value2 = parseInt(value2);
            var unitprice = 0;

            switch (value2) {
                case 0:
                    unitprice = 0;
                    break;
                case 1:
                    unitprice = 77.42;
                    break;
                case 2:
                    unitprice = 45.16;
                    break;
                case 3:
                    unitprice = 38.71;
                    break;
                case 4:
                    unitprice = 36.13;
                    break;
                case 5:
                    unitprice = 32.26;
                    break;
                case 6:
                    unitprice = 29.68;
                    break;
                case 7:
                    unitprice = 25.81;
                    break;
                case 8:
                case 9:
                case 10:
                    unitprice = 25.81;
                    break;
                default:
                    nonselected = "more";
                    unitprice = 0;
            }

            if (nonselected == "more") {
                total2 = unitprice * parseInt(value2);
                document.getElementById('totalAmount_kids').innerText = "Not Allowed More than 10";
                updateTotalAmount();
            } else {
                total2 = unitprice * parseInt(value2);
                document.getElementById('totalAmount_kids').innerText = '$' + total2.toFixed(2);
                document.getElementById('totalAmountkids').value = '$' + total2.toFixed(2);
                updateTotalAmount();
            }
            
        }

        function updateTotalAmount() {
            var totalAmount = total1 + total2;
            document.getElementById('totalAmount').innerText = '$' + totalAmount.toFixed(2);
            document.getElementById('totalAmountText').value = '$' + totalAmount.toFixed(2);
        }
    </script>

</body>

</html>