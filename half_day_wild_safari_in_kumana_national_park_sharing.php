<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpEmail/PHPMailer/src/Exception.php';
require 'phpEmail/PHPMailer/src/PHPMailer.php';
require 'phpEmail/PHPMailer/src/SMTP.php';
include "assets/php/connection.php";


if (isset($_POST["submit"])) {

    $errors = array();

    // Validate Fullname
    if (empty($_POST['fullname'])) {
        $errors[] = "Fullname is required";
    } else {
        $fullname = $_POST['fullname'];
    }

    // Validate Email
    if (empty($_POST['email_for_form'])) {
        $errors[] = "Email is required";
    } elseif (!filter_var($_POST['email_for_form'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $email = $_POST['email_for_form'];
    }

    // Validate WhatsApp Number
    if (empty($_POST['whatsapp_no'])) {
        $errors[] = "WhatsApp number is required";
    } elseif (!preg_match("/^\+[0-9]{1,3}[0-9]{9}$/", $_POST['whatsapp_no'])) {
        $errors[] = "Invalid WhatsApp number format";
    } else {
        $whatsapp_no = $_POST['whatsapp_no'];
    }


    if (empty($_POST['activity'])) {
        $errors[] = "activity is required";
    } else {
        $activity = $_POST['activity'];
    }

    if (empty($_POST['date'])) {
        $errors[] = "date is required";
    } else {
        $date = $_POST['date'];
    }

    if (empty($_POST['time'])) {
        $errors[] = "time is required";
    } else {
        $time = $_POST['time'];
    }

    if (empty($_POST['no_adults'])) {
        $no_adults = 0;
    } else {
        $no_adults = $_POST['no_adults'];
    }

    if (empty($_POST['departurelocation'])) {
        $errors[] = "Departurelocation is required";
    } else {
        $departurelocation = $_POST['departurelocation'];
    }

    if (empty($_POST['needassist'])) {
        $needassist = "Nothing";
    } else {
        $needassist = $_POST['needassist'];
    }

    //no need validation
    $no_kids = null;
    $price_of_adults = $_POST['adult_value'];
    $price_of_child = $_POST['kids_value'];
    $price_of_total = $_POST['total'];

    if (empty($errors)) {
        $sql = "INSERT INTO `booking` (`o_id`, `full_name`, `e_mail`, `whatsapp_no`, `activity`, `date`, `time`, `no_adults`, `no_kids`, `departure_location`, `need_assist`, `price_of_adults`, `price_of_child`, `total_amount`) VALUES (NULL, '$fullname', '$email', '$whatsapp_no', '$activity', '$date', '$time', '$no_adults', '$no_kids', '$departurelocation', '$needassist', '$price_of_adults', '$price_of_child', '$price_of_total')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $author_email = 'afshan.marazin@gmail.com'; // author mail address
            try {
                $Mail = new PHPMailer(true);
                $Mail->isSMTP();
                $Mail->Host = 'smtp.gmail.com';
                $Mail->SMTPAuth = true;
                $Mail->Username = 'arugambayagenda@gmail.com';
                $Mail->Password = 'epnt abvu suoq qxqh';
                $Mail->SMTPSecure = 'ssl';
                $Mail->Port = 465;


                $Mail->setFrom('arugambayagenda@gmail.com');
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
                    'Number of Pax: ' . $no_adults . '<br>' .
                    'Departure Location: ' . $departurelocation . '<br>' .
                    'Need Assistance: ' . $needassist . '<br>' .
                    'Total Amount: ' . $price_of_total;
                $Mail->send();

                $_SESSION['message'] = "Data Added successfully";
            } catch (Exception $e) {
                $_SESSION['message'] = "Data Not Added";
                // echo "Email could not be sent. Mailer Error: {$Mail->ErrorInfo}";
            }
        } else {
            $_SESSION['message'] = "Data Not Added";
            // echo "Failed: " . mysqli_error($conn);

        }
    } else {
        $_SESSION['message'] = "Data Not Added";
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<body>

    <!-- <style>
        span.next,
        span.prev {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 14px;
            color: #0097b2;
            font-size: 24px;
            font-weight: bold;
            transition: 0.5s;
            border-radius: 3px;
            user-select: none;
            cursor: pointer;
            z-index: 1;
            background-color: #eee;
            opacity: 0.8;
        }

        span.next {
            right: 20px;
        }

        span.prev {
            left: 20px;
        }

        span.next:hover,
        span.prev:hover {
            background-color: #0097b2;
            opacity: 0.8;
            color: #F7921E;
        }

        @keyframes next1 {
            from {
                left: 0%
            }

            to {
                left: -100%;
            }
        }

        @keyframes next2 {
            from {
                left: 100%
            }

            to {
                left: 0%;
            }
        }

        @keyframes prev1 {
            from {
                left: 0%
            }

            to {
                left: 100%;
            }
        }

        @keyframes prev2 {
            from {
                left: -100%
            }

            to {
                left: 0%;
            }
        }

        @media screen and (max-width: 768px) {

            span.next,
            span.prev {
                padding: 6px;
                font-size: 16px;
            }
        }

        @media screen and (max-width: 480px) {

            span.next,
            span.prev {
                padding: 4px;
                font-size: 14px;
            }
        }
    </style> -->

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
        <!-- <div class="buttons">
            <span class="prev" onclick="prevSlide()">&#10094;</span>
            <span class="next" onclick="nextSlide()">&#10095;</span>
        </div> -->


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

                        <!-- form booking -->
                        <div class="col-xl-8 col-lg-10 justify-content-center d-xxl-none d-xl-none">
                            <!--=== Sidebar Widget Area ===-->
                            <div class="sidebar-widget-area pt-10 pl-lg-30">
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
                                            <div class="bk-item">
                                                <select class="" id="select_option" name="activity">
                                                    <option value="">Select an option</option>
                                                    <option value="Half-Day wild safari in Kumana National Park (Sharing)">Half-Day wild safari in Kumana National Park (Sharing)</option>
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
                                                    <option value="05.00 A.M">05.00 A.M </option>
                                                    <option value="01.00 P.M">01.00 P.M</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="booking-item mb-20">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="no_adults" placeholder="Number of Pax" name="no_adults" onchange="calculate_no_pax1(this.value)">
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
                                            <div>
                                                </span> <input type="hidden" id="totalAmountadult1" name="adult_value">
                                            </div>
                                            <div>
                                                <input type="hidden" id="totalAmountkids1" name="kids_value">
                                            </div>
                                        </div>
                                        <div class="booking-total mb-20">
                                            <div class="total">
                                                <label>Total</label>
                                                <span class="price"><span class="currency" id="totalAmount1"></span></span>
                                                <input type="hidden" id="totalAmountText1" name="total">
                                            </div>
                                        </div>

                                        <div class="booking-date-time mb-20 col-lg-6 col-md-5 col-xl-12">
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
                                        <li><span><i class="far fa-globe"></i>Language<span>English</span></span></li>
                                    </ul>
                                </div>

                                <!-- more details -->
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
                                            <h4 class="title"><a href="full_day_wild_safari_in_kumana_national_park_private.php
">Full-Day Wild Safari in Kumana National park (Private)
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
                                            <h4 class="title"><a href="half_day_wild_safari_in_yala_national_park.php">Half Day Wild Safari in Yala National park <br><br>
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
                                            <h4 class="title"><a href="full_day_wild_safari_in_yala_national_park.php">Full-Day Wild Safari in Kumana National park (Private)
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
                                            <h4 class="title"><a href="mangrove_watching_in_pottuvil.php">Full-Day Wild Safari in Yala National Park
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
                                            <h4 class="title"><a href="arugambay_to_yala_wild_safari+Drop_off_flexibility.php">Mangrove Watching in Pottuvil Lagoon (Lagoon Eco Tour)
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
                                            <h4 class="title"><a href="wild_safari_in_lahugala_national_park.php">Arugambay to Yala: Wild Safari + Drop-off Flexibilty
                                                </a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    <br>$</span>23.47</p>
                                        </div>
                                    </div>
                                </div>

                                <!--=== Single Place Item ===-->
                                <div class="single-place-item mb-40 wow fadeInUp">
                                    <div class="place-img">
                                        <img src="assets/images/wildlife&eco/Visit of wild elephants.jpg" alt="Place Image" height="280px">
                                    </div>
                                    <div class="place-content">
                                        <div class="info">
                                            <h4 class="title"><a href="half_day_wild_safari_in_kumana_national_park_private.php">Wild Safari in Lahugala National Park
                                                    <br><br></a></h4>
                                            <p class="price"><i class="fas fa-usd-circle"></i>From <span class="currency">
                                                    $</span>75.00</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>


                    <!-- booking -->
                    <div class="col-xl-4 col-lg-10 justify-content-center d-none d-sm-none d-lg-none d-md-none d-xl-block d-xxl-block">
                        <!--=== Sidebar Widget Area ===-->
                        <div class="sidebar-widget-area pt-10 pl-lg-30">
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
                                        <div class="bk-item">
                                            <select class="" id="select_option" name="activity">
                                                <option value="">Select an option</option>
                                                <option value="Half-Day wild safari in Kumana National Park (Sharing)">Half-Day wild safari in Kumana National Park (Sharing)</option>
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
                                                <option value="05.00 A.M">05.00 A.M </option>
                                                <option value="01.00 P.M">01.00 P.M</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="booking-item mb-20">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="no_adults" placeholder="Number of Pax" name="no_adults" onchange="calculate_no_pax2(this.value)">
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
                                        <div>
                                            </span> <input type="hidden" id="totalAmountadult2" name="adult_value">
                                        </div>
                                        <div>
                                            <input type="hidden" id="totalAmountkids2" name="kids_value">
                                        </div>
                                    </div>
                                    <div class="booking-total mb-20">
                                        <div class="total">
                                            <label>Total</label>
                                            <span class="price"><span class="currency" id="totalAmount2"></span></span>
                                            <input type="hidden" id="totalAmountText2" name="total">
                                        </div>
                                    </div>

                                    <div class="booking-date-time mb-20 col-lg-6 col-md-5 col-xl-12">
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
                                    <li><span><i class="far fa-globe"></i>Language<span>English</span></span></li>
                                </ul>
                            </div>

                            <!-- more details -->
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
    <!-- <a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a> -->
    <a href="https://wa.me/message/L2MV5OGPQV2RH1" class="back-to-top"><i class="fab fa-whatsapp"></i></a>

    <script>
    let unitPrice1 = 40;

    function calculate_no_pax1(value1) {
        if (value1 == "") {
            value1 = 0;
        }
        value1 = parseInt(value1);

        updateTotalAmount1(value1);
    }

    function updateTotalAmount1(value1) {
        var totalAmountElement = document.getElementById('totalAmount1');
        var totalAmountHiddenInput = document.getElementById('totalAmountText1');
        var adultValueHiddenInput = document.getElementById('totalAmountadult1');
        var kidsValueHiddenInput = document.getElementById('totalAmountkids1');

        if (value1 >= 4) {
            var totalAmount = value1 * unitPrice1;
            totalAmountElement.style.color = "black";
            totalAmountElement.innerText = '$' + totalAmount.toFixed(2);
            totalAmountHiddenInput.value = '$' + totalAmount.toFixed(2);
            adultValueHiddenInput.value = 0;
            kidsValueHiddenInput.value = 0;
        } else {
            totalAmountElement.style.color = "red";
            totalAmountElement.innerText = 'Required Minimum 4 Pax';
        }
    }
</script>

<script>
    let unitPrice2 = 40;

    function calculate_no_pax2(value2) {
        if (value2 == "") {
            value2 = 0;
        }
        value2 = parseInt(value2);

        updateTotalAmount2(value2);
    }

    function updateTotalAmount2(value2) {
        var totalAmountElement = document.getElementById('totalAmount2');
        var totalAmountHiddenInput = document.getElementById('totalAmountText2');
        var adultValueHiddenInput = document.getElementById('totalAmountadult2');
        var kidsValueHiddenInput = document.getElementById('totalAmountkids2');

        if (value2 >= 4) {
            var totalAmount = value2 * unitPrice2;
            totalAmountElement.style.color = "black";
            totalAmountElement.innerText = '$' + totalAmount.toFixed(2);
            totalAmountHiddenInput.value = '$' + totalAmount.toFixed(2);
            adultValueHiddenInput.value = 0;
            kidsValueHiddenInput.value = 0;
        } else {
            totalAmountElement.style.color = "red";
            totalAmountElement.innerText = 'Required Minimum 4 Pax';
        }
    }
</script>







    <?php
    session_start(); // Start the session
    if (isset($_SESSION['message'])) {
        echo "<script> 
            Swal.fire({
                title: '" . ($_SESSION['message'] == 'Data Added successfully' ? 'Success' : 'Error') . "',
                text: '" . ($_SESSION['message'] == 'Data Added successfully' ? 'Your booking has been taken successfully.' : 'Your booking could not be added. Please try again later.') . "',
                icon: '" . ($_SESSION['message'] == 'Data Added successfully' ? 'success' : 'error') . "',
                confirmButtonText: 'OK'
            });
          </script>";
        unset($_SESSION['message']); // Remove the message from session after displaying
    }
    ?>

    <!-- <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.place-slider-item');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
            currentIndex = index;
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        // Show the first slide initially
        showSlide(0);
    </script> -->
</body>

</html>