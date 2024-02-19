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
                        <img src="assets/images/Day Trip to Ella/Tea plants found in ella.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Railway track cave.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Group photo at ella.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Interesting games in flying ravana.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/hilltop in ella.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Traveling boy.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Traveling by cable in Flying Ravana.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/A family traveling on a hilltop.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/flying ravana safety belt system.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Sri Lankan corn food.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Sunlight on Mount Ella.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Ella/Safety procedures to be done first to go in flying ravana.jpg" alt="Place Image" height="630px">
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
                                <h3 class="title">Day Trip to Ella</h3>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="tour-widget-info">
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-box-usd"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>From</span>$130.00</h4>
                                    </div>
                                </div>
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>Durations</span>1 days</h4>
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
                            <p>Uncover Ella’s allure: Hike to Little Adams Peak, thrill at Ravana Hills, snap photos at Ravana Falls, marvel at Nine Arch and sip tea amidst lush plantations. Ella’s magic on this journey awaits!</p>
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
                                    <img src="assets/images/Experiential/Railway and train in Ella.jpg" class="mb-20 w-100" alt="place image" width="470px" height="365px">
                                </div>
                            </div>
                            <h4>Included</h4>
                            <div class="col-lg-5 mt-5">
                                <ul class="check-list">
                                    <li><i class="fas fa-badge-check"></i>Hotel Pickup and Drop-off.</li>
                                    <li><i class="fas fa-badge-check"></i>All fares and taxes</li>
                                    <li><i class="fas fa-badge-check"></i>Full transport</li>
                                    <li><i class="fas fa-badge-check"></i>Tour gears</li>
                                    <li><i class="fas fa-badge-check"></i>Breakfast and Drinks</li>
                                    <li><i class="fas fa-badge-check"></i>Tour Host/greeter</li>
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
                                                <li><i class="fas fa-badge-check"></i>Sunrise hike to Little Adams Peak.</li>
                                                <li><i class="fas fa-badge-check"></i>Heart-pounding zip-lining at Ravana Hills.</li>
                                                <li><i class="fas fa-badge-check"></i>Tea factory journey through lush plantations.</li>
                                                <li><i class="fas fa-badge-check"></i>Scenic drive through winding mountain roads.</li>
                                                <li><i class="fas fa-badge-check"></i>Refreshing stop at the enchanting Ravana Waterfall.</li>
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
                                        Escape the coastal paradise of Arugambay and journey to the scenic mountains of Ella. Setting off early, we wind through picturesque, curvy roads, savoring a traditional Sri Lankan breakfast en route. As we ascend, the lush tea plantations roll out like a vibrant, green carpet, a testament to Sri Lanka's world-renowned Ceylon tea. Amid this verdant tapestry, we pause at a charming tea factory, where the secrets of tea-making unravel before your eyes. It's a journey through not just destinations but also through the fragrant, soul-soothing embrace of tea estates. <br> <br>

                                        Our first destination is the stunning "Little Adams Peak," a serene climb leading to breathtaking mountain sunrises. Atop this beautiful rock, you'll witness nature's canvas unfold in vibrant hues. <br> <br>

                                        Next, we head to the Ravana Hills for a heart-pounding zip-lining adventure. Glide between two mountains, experiencing the thrill that's bound to send goosebumps down your spine. <br> <br>

                                        We’ll also explore the architectural marvel of ‘The Nine Arch’ bridge, a mystical structure that captures the essence of Ella’s heritage. <br> <br>

                                        Our final stop is the magnificent Ravana Waterfall. Here, you can cool off under the rejuvenating cascade or capture postcard-perfect shots from the viewpoint. It's Mother Nature's masterpiece in all its glory. <br> <br>

                                        As twilight approaches, we return from our enchanting Ella adventure. Whether you wish to head back to Arugambay or have another destination in mind, we've got you covered. <br> <br>

                                        Ella beckons - embark on this unforgettable journey with us and explore its natural treasures, from tea estates to thrilling heights and cascading waters! <br> <br>
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
                                                <li><i class="fas fa-badge-check"></i>Weapons or sharp objects</li>
                                                <li><i class="fas fa-badge-check"></i>Alcohol and drugs</li>

                                                <U>Know before you go</U>
                                                <li><i class="fas fa-badge-check"></i>This tour will take place rain or shine You’ll have an easy climb in Little Adam’s peak. Not a tough one. You have to be ready for that very easy 30 minutes hike. You’ll be doing Zip-lining in Flying Ravana, which is a little adventurous and fun.</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo21" aria-expanded="false" aria-controls="flush-collapseTwo21">
                                            Not suitable for
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo21" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="check-list">
                                                <li><i class="fas fa-badge-check"></i>People over 95 years</li>
                                                <li><i class="fas fa-badge-check"></i>Children under 2 years</li>
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
                                        <img src="assets/images/Experiential/sigiriya.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="Experiential_package1.php">Day Trip to Sigiriya
                                                    <br> <br>
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>61.35</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/Experiential/Travel buddies who traveled with us on Ella.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="Experiential_package2.php">"Two Day in Highland" Tour <br> <br>
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>230.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/Experiential/Travel to Colombo Statue Temple.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="Experiential_package4.php">Colombo City Excursion with Srilankan Traditional Lunch
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>55.00</p>
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
                                                <option value="Day trip to Ella">Day trip to Ella</option>
                                                <option value="Day trip to Sigirya">Day trip to Sigirya</option>
                                                <option value="Two days in Highland">Two days in Highland</option>
                                                <option value="Colombo city excursion with Srilankan traditional lunch">Colombo city excursion with Srilankan traditional lunch</option>
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