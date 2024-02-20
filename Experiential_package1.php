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
                        <img src="assets/images/Day Trip to Sigiriya/Our travel buddies.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/Beautiful peacock dance.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/External appearance of Sigiriya.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/Sigiriya Monkey Adventures.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/Sigiriya corn food.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/The monkey games of Sigia.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/Sunlight on the summit of Sigiriya.jpg" alt="Place Image" height="630px">
                    </div>
                </div>

                <div class="place-slider-item">
                    <div class="place-img">
                        <img src="assets/images/Day Trip to Sigiriya/Group photo with our travel friends.jpg" alt="Place Image" height="630px">
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
                                <h3 class="title">Day Trip to Sigiriya</h3>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="tour-widget-info">
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-box-usd"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>From</span>$61.35</h4>
                                    </div>
                                </div>
                                <div class="info-box mb-20">
                                    <div class="icon">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                    <div class="info">
                                        <h4><span>Durations</span>1 day</h4>
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

                <div class="row flex-column-reverse flex-xl-row">
                    <div class="col-xl-8  ">
                        <!--=== Place Content Wrap ===-->
                        <div class="place-content-wrap pt-45 wow fadeInUp">
                            <h3 class="title">Explore Tour Package</h3>
                            <p>Discover Sigiriya’s ancient splendor on Arugambay Agenda’s Day Tour. Witness the iconic Lion Rock, delve into its captivating history, and make unforgettable memories.</p>
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
                                <div class="col-lg-7 ">
                                    <img src="assets/images/Experiential/Trip to Sigiriya.jpg" class="mb-20 w-100" alt="place image" width="470px" height="365px">
                                </div>
                            </div>
                            <h4>Included</h4>
                            <div class="col-lg-5 mt-5">
                                <ul class="check-list">
                                    <li><i class="fas fa-badge-check"></i>Hotel Pickup and Drop-off.</li>
                                    <li><i class="fas fa-badge-check"></i>Full Transport</li>
                                    <li><i class="fas fa-badge-check"></i>Entry Tickets</li>
                                    <li><i class="fas fa-badge-check"></i>Lunch</li>
                                    <li><i class="fas fa-badge-check"></i>Water</li>
                                    <li><i class="fas fa-badge-check"></i>Tour Gears.</li>
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
                                                <li><i class="fas fa-badge-check"></i>Historical Perspective: Gain a deeper understanding of Sigiriya’s history.</li>
                                                <li><i class="fas fa-badge-check"></i>Pidurangala View: Epic Sigiriya views from Pidurangala.</li>
                                                <li><i class="fas fa-badge-check"></i>Cultural Immersion: Immerse in local culture.</li>
                                                <li><i class="fas fa-badge-check"></i>Flexible Itinerary: Tour at your pace.</li>
                                                <li><i class="fas fa-badge-check"></i>Efficient Transport: Smooth rides to Sigiriya.</li>
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
                                        From the shores of Arugambay to the iconic marvel of Sigiriya, a UNESCO World Heritage Site, on our specially curated Day Tour to Sigiriya. We depart from Arugambay at a pleasant time, ensuring you experience every moment of this memorable excursion. <br> <br>

                                        Our first stop is the breathtaking Pidurangala Rock, situated adjacent to the legendary Sigiriya Lion Rock. From this vantage point, you'll witness the enchanting beauty of the Sigiriya Rock in all its glory. Marvel at the ancient engineering marvel that continues to amaze travelers from across the globe. <br> <br>

                                        Next, we ascend Sigiriya Lion Rock itself, a testament to the architectural and artistic brilliance of the ancient Sri Lankan kingdom. As you climb to the top, our experienced guides will narrate the captivating story of the Sigiriya Kingdom, revealing its rich history and secrets. <br> <br>

                                        The Day Tour to Sigiriya promises an unforgettable adventure filled with history, culture, and natural beauty. Join Arugambay Agenda, your trusted travel partner, and let us guide you through this mesmerizing journey into the heart of Sri Lanka's past. Book your tour today and embark on an experience like no other! <br><br>
                                    </div>
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
                                            <U>What to bring</U>
                                            <li><i class="fas fa-badge-check"></i>Biodegradable sunscreen</li>
                                            <li><i class="fas fa-badge-check"></i>Comfortable shoes</li>

                                            <U>Not Allowed</U>
                                            <li><i class="fas fa-badge-check"></i>Skirts</li>

                                            <U>Know before you go</U>
                                            <li><i class="fas fa-badge-check"></i>This tour will take place rain or shine.</li>
                                            <li><i class="fas fa-badge-check"></i>You will climb 600FT to reach the peak of the Rock.</li>
                                            <li><i class="fas fa-badge-check"></i>There’s no Elevator.</li>
                                            <li><i class="fas fa-badge-check"></i>The vehicle (Car/Van/Bus) will come to your hostel/any pickup location for pickup to start our journey to Sigiriya.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo2" aria-expanded="false" aria-controls="flush-collapseTwo2">
                                        Not suitable for
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo2" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="check-list">
                                            <U>Not Allowed</U>
                                            <li><i class="fas fa-badge-check"></i>People over 95 years.</li>
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
                                        <img src="assets/images/Experiential/Travel buddies who traveled with us on Ella.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="Experiential_package2.php">"Two Day in Highland" Tour
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>230.00</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-60 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/Experiential/Railway and train in Ella.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="Experiential_package3.php">Day Trip to Ella <br> <br>
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>130.00</p>
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

                    <div class="col-xl-4 col-lg-6">
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
                                            <select class="bk-item" id="select_option" name="activity">
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
                                            <input type="text" class="form-control" id="no_adults" placeholder="Number of Adults" name="no_adults" onchange="calculate_adult_amount(this.value)">
                                        </div>
                                    </div>
                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_kids" placeholder="Number of Kids" name="no_kids" onchange="calculate_kid_amount(this.value)" >
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
                                                <i class="fas fa-check-circle"></i>Adult<span><span class="currency" id="totalAmount_adult"></span></span>
                                            </div>
                                            <div class="extra">
                                                <i class="fas fa-check-circle"></i>Kids <span><span class="currency" id="totalAmount_kids"></span></span>
                                            </div>
                                        </div>
                                        <div class="booking-total mb-20">
                                            <div class="total">
                                                <label>Total</label>
                                                <span class="price"><span class="currency" id="totalAmount"></span></span>
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
        
        if(value1 == ""){
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
        if(nonselected == "more"){
             total1 = unitprice * parseInt(value1); // float + integerr
             document.getElementById('totalAmount_adult').innerText = "Not Allowed More than 10";
            updateTotalAmount();
        }
        else{
            total1 = unitprice * parseInt(value1);
        document.getElementById('totalAmount_adult').innerText = '$' + total1.toFixed(2);
        updateTotalAmount();
        }
       
    }

    function calculate_kid_amount(value2) {
        
        if(value2 == ""){
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

        if(nonselected == "more" ){
            total2 = unitprice * parseInt(value2);
            document.getElementById('totalAmount_kids').innerText = "Not Allowed More than 10";
            updateTotalAmount();
        }
        else{
            total2 = unitprice * parseInt(value2);
            document.getElementById('totalAmount_kids').innerText = '$' + total2.toFixed(2);
            updateTotalAmount();        
        }
       
    }

    function updateTotalAmount() {
        var totalAmount = total1 + total2;
        document.getElementById('totalAmount').innerText = '$' + totalAmount.toFixed(2);
    }
</script>


</body>
</html>