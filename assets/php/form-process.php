<?php

// $errorMSG = "";

// // NAME
// if (empty($_POST["name"])) {
//     $errorMSG = "Name is required ";
// } else {
//     $name = $_POST["name"];
// }

// // EMAIL
// if (empty($_POST["email"])) {
//     $errorMSG .= "Email is required ";
// } else {
//     $email = $_POST["email"];
// }

// // PHONE
// if (isset($_POST["phone_number"])) {
//     $phone_number = $_POST["phone_number"];
// }

// // website
// if (isset($_POST["website"])) {
//     $website = $_POST["website"];
// }

// // MESSAGE
// if (empty($_POST["message"])) {
//     $errorMSG .= "Message is required ";
// } else {
//     $message = $_POST["message"];
// }


// $EmailTo = "youname@mail.com";

// $bodySubject = "New Message Received";

// // prepare email body text
// $Body = "";
// $Body .= "Name: ";
// $Body .= $name;
// $Body .= "\n";
// $Body .= "Email: ";
// $Body .= $email;
// $Body .= "\n";
// $Body .= "Phone Number: ";
// $Body .= $phone_number;
// $Body .= "\n";
// $Body .= "Website: ";
// $Body .= $website;
// $Body .= "\n";
// $Body .= "Message: ";
// $Body .= $message;
// $Body .= "\n";

// // send email
// $success = mail($EmailTo, $bodySubject, $Body);

// // redirect to success page
// if ($success && $errorMSG == ""){
//    echo "success";
// }else{
//     if($errorMSG == ""){
//         echo "Something went wrong :(";
//     } else {
//         echo $errorMSG;
//     }
// }

?>