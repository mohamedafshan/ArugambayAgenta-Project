
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
    } elseif (!preg_match("/^[0-9]{10}$/", $_POST['whatsapp_no'])) {
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

    if (empty($_POST['no_kids'])) {
        $no_kids = 0;
    } else {
        $no_kids = $_POST['no_kids'];
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
    $price_of_adults = $_POST['adult_value'];
    $price_of_child = $_POST['kids_value'];
    $price_of_total = $_POST['total'];

    if (empty($errors)) {
        $sql = "INSERT INTO `booking` (`o_id`, `full_name`, `e_mail`, `whatsapp_no`, `activity`, `date`, `time`, `no_adults`, `no_kids`, `departure_location`, `need_assist`, `price_of_adults`, `price_of_child`, `total_amount`) VALUES (NULL, '$fullname', '$email', '$whatsapp_no', '$activity', '$date', '$time', '$no_adults', '$no_kids', '$departurelocation', '$needassist', '$price_of_adults', '$price_of_child', '$price_of_total')";
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
                    'Need Assistance: ' . $needassist . '<br>' .
                    'Total Price of Adults: ' . $price_of_adults . '<br>' .
                    'Total Price of Child: ' . $price_of_child . '<br>' .
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
    }else{
        $_SESSION['message'] = "Data Not Added";
    }
} 
?>