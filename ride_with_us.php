<?php
include "assets/php/connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpEmail/PHPMailer/src/Exception.php';
require 'phpEmail/PHPMailer/src/PHPMailer.php';
require 'phpEmail/PHPMailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    // Retrieve form data
    $name = $_POST['name'];
    $whatsapp_no = $_POST['whatsapp_no'];
    $email = $_POST['email'];
    $no_adults = $_POST['no_adults'];
    $no_kids = $_POST['no_kids'];
    $date = $_POST['date'];
    $d_location = $_POST['d_location'];
    $destination = $_POST['destination'];
    $message = $_POST['message'];

    if (empty($name) || empty($whatsapp_no) || empty($email) || empty($no_adults) || empty($date) || empty($d_location) || empty($destination) || empty($message)) {
        echo "<script>alert('Please fill in all required fields.')</script>";
    } else {
        $sql = "INSERT INTO `ride_with_us` (`name`, `whatsapp_no`, `email`, `no_adults`, `no_kids`, `date`, `d_location`, `destination`, `message`) 
                VALUES ('$name', '$whatsapp_no', '$email', '$no_adults', '$no_kids', '$date', '$d_location', '$destination', '$message')";
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
                $Mail->addAddress($_POST['email']); // or $email
                $Mail->addAddress($author_email);
                $Mail->isHTML(true);
                $Mail->Subject = 'Welcome to Arugambay Agenda';
                $Mail->Body = 'We received your booking successfully.' .
                    '<br><br>' .
                    'Full Name: ' . $name . '<br>' .
                    'WhatsApp Number: ' . $whatsapp_no . '<br>' .
                    'Email: ' . $email . '<br>' .
                    'Number of Adults: ' . $no_adults . '<br>' .
                    'Number of Kids: ' . $no_kids . '<br>' .
                    'Date: ' . $date . '<br>' .
                    'Departure Location: ' . $d_location . '<br>' .
                    'Destination: ' . $destination . '<br>' .
                    'Message: ' . $message;
                $Mail->send();
    
                echo "<script>alert('Email sent successfully')</script>";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$Mail->ErrorInfo}";
            }
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
}
?>

<?php include('Header/header.php') ?>
<!--====== Start Breadcrumb Section ======-->
<section class="page-banner overlay pt-170 pb-170 bg_cover" style="background-image: url(assets/images/bg/Happy\ water\ journey.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="page-banner-content text-center text-white">
                    <h1 class="page-title">RIDE WITH US</h1>
                    <ul class="breadcrumb-link text-white">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Ride with us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Breadcrumb Section ======-->

<!--====== Start Contact Section ======-->
<section class="contact-section pb-100 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-title text-center mb-50 wow fadeInDown">
                    <h2>RIDE WITH US</h2>
                    <p>Island-Wide Transfers & Taxi Services – Arugambay Agenda: “Ride with Us”
                        Wherever you are, wherever you want to go, count on Arugambay Agenda for safe and reliable taxi services. We’ve got you covered island-wide.
                        Your journey, your way. Book your ride today!</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-area contact-form wow fadeInUp">
                    <form id="" class="contactForm" action="" name="contactForm" method="post">
                        <!-- contactForm this important for validation  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form_group form-group">
                                    <input type="text" placeholder="Full Name" class="form_control" name="name" id="name" required data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group form-group">
                                    <input type="email" placeholder="Email Address" class="form_control" name="email" id="email" required data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form_group form-group">
                                    <input type="text" placeholder="WhatsApp Number" class="form_control" id="whatsapp_no" name="whatsapp_no" required data-error="Please enter your WhatsApp number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="form_group form-group">
                                    <input type="text" placeholder="Number of Adults" class="form_control" name="no_adults" id="no_adults" required data-error="Please fill the field">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form_group form-group">
                                    <input type="text" placeholder="Number of Kids" class="form_control" name="no_kids" id="no_kids" required data-error="Please fill the field">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form_group form-group">
                                <div class="bk-item">
                                    <input type="text" placeholder="Select Date" class=" form_control datepicker" name="date">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group form-group">
                                    <input type="text" placeholder="Departure Location" class="form_control" id="d_location" name="d_location" required data-error="Please enter your website">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group form-group">
                                    <input type="text" placeholder="Destination" class="form_control" id="destination" name="destination" required data-error="Please enter your website">
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
                                    <button type="submit" class="main-btn primary-btn" id="submit" name="submit">Send Us Message<i class="fas fa-paper-plane"></i></button>
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

<!--====== Start Footer ======-->
<?php include('Footer/footer.php') ?>
<!-- For Contact Form -->
<script src="assets/vendor/form-validation/jquery.ajaxchimp.min.js"></script>
<script src="assets/vendor/form-validation/form-validator.min.js"></script>
<script src="assets/vendor/form-validation/contact-form-script.js"></script>
</body>

</html>