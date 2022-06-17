<?php
    $isContact = 1;
    require('phpmail/class.phpmailer.php');
    require('phpmail/class.smtp.php');
    $flag = 0;
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['content']) && $_POST['name'] != '' && $_POST['email'] != '' && $_POST['phone'] != '' && $_POST['content'] != '')
    {
//        echo '<pre>';
//        print_r($_POST);
//        exit();
        $name    = isset($_POST['name'])    && trim($_POST['name'])!=''    ? trim($_POST['name'])    : null;
        $email   = isset($_POST['email'])   && trim($_POST['email'])!=''   ? trim($_POST['email'])   : null;
        $phone   = isset($_POST['phone'])   && trim($_POST['phone'])!=''   ? trim($_POST['phone'])   : null;
        $message = isset($_POST['content']) && trim($_POST['content'])!='' ? trim($_POST['content']) : null;

        $msg = '<html><body>';
        $msg .= '<table style="border-collapse: collapse;" cellpadding="10">';
        $msg .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
        $msg .= "<tr style='background: #eee;'><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
        $msg .= "<tr style='background: #eee;'><td><strong>Phone:</strong> </td><td>" . $phone . "</td></tr>";
        $msg .= "<tr style='background: #eee; width: 15%;'><td><strong>Message:</strong> </td><td>" . $message . "</td></tr>";
        $msg .= "</table>";
        $msg .= "</body></html>";

        $subject = "Web Enquiry - Taxbee";
        $to = "helpdesk@taxbee.in";

        $mail_obj = new PHPMailer();
        $mail_obj->IsSMTP();
        $mail_obj->CharSet = 'UTF-8';
        $mail_obj->Host = "ssl://smtp.gmail.com";
        $mail_obj->SMTPAuth= true;
        $mail_obj->Port = 465; // 587 or 465
        $mail_obj->Username= 'donotreply@taxbee.in';
        $mail_obj->Password= 'ebifivsfaiteomca';
        $mail_obj->SMTPSecure = 'ssl';
        $mail_obj->isHTML(true);
        $mail_obj->FromName = 'Web Enquiry - Taxbee';
        $mail_obj->Subject = $subject;
        $mail_obj->Body = $msg;


        $mail_obj->addAddress($to);
        if($mail_obj->send())
        {
            $flag = 1;
            echo '<script>swal("","Thank you for your mail. We will respond to you shortly.", "success");</script>';
        }
        else
        {
            $flag = 2;
            $res = "Mailer Error: " . $mail_obj->ErrorInfo;
            echo '<script>swal("Oops","Something went wrong.", "error");</script>';
            return $res;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>
<body class="antialiased">
    <?php include 'header.php' ?>
    
    <div class="container mx-auto p-6 mb-3 xl:w-[1280px] ">
      <h2 class="text-2xl font-bold md:text-3xl mt-6 text-center uppercase">Get In Touch</h2>
      <h3 class="text-base tracking-wider font-bold mb-6 text-center md:text-lg uppercase text-emerald-800">Easiest way to manage your motor</h3>
    
      <div class="container xl:w-[1280px] flex flex-col  md:flex-row items-center space-y-12  space-x-8 p-8 mx-auto  bg-emerald-800 rounded-xl shadow-lg overflow-x-hidden overflow-y-visible">
     <!---contact form--->
         <div class="md:w-1/2 bg-white rounded-xl shadow-lg p-8">
           <form action="contact.php" class="flex flex-col space-y-4" method="POST">
             <div>
                 <label for="" class="text-sm">Name</label>
             </div>
             <div>
                 <input type="text" placeholder="Enter your name" class="ring-1 rimg-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-300 ">
             </div>  
             <div>
                 <label for="" class="text-sm">Email</label>
             </div>
             <div>
                 <input type="text" placeholder="Enter your email" class="ring-1 rimg-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-300 ">
             </div>  
             <div>
                 <label for="" class="text-sm">Phone number</label>
             </div>
             <div>
                 <input type="text" placeholder="Enter your phone number" class="ring-1 rimg-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-300 ">
             </div>  
             <div>
                 <label for="" class="text-sm">Message</label>
             </div>
             <div>
                 <textarea rows="5" cols="30" placeholder="Enter your message"  required class="ring-1 rimg-gray-300 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-300 mb-5"></textarea>
             </div>      
            <div class="flex justify-end">
            <input type="submit" value="Submit" class="px-8 py-3 text-white bg-emerald-700 rounded-full baseline hover:bg-slate-900 uppercase tracking-widest ">
            </form>
          </div>
      </div>
    <!---contact form--->
     <!---why taxbee--->
      <div class="md:w-1/2">
        <div class="flex flex-col items-center justify-center text-white mb-[17rem]  md:mb-2  space-y-6 ">
            <h2 class="text-3xl font-extrabold md:text-4xl mb-2  md:self-start sm:self-center  uppercase">Why Us ?</h2>
            <div class="contact-carousal text-center xl:w-[450px] xl:h-[400px] md:w-[350px]  md:h-[400px] sm:w-[360px] mr-5 pr-5">
              <div class="carousal-items">
                <img src="./assets/img/bg/icon1.png" alt="" />
                <h3 class="text-xl font-bold text-emerald-300  md:text-lg mb-2 uppercase">PROFESSIONAL STANDARDS</h3>
              </div>
              <div class="carousal-items">
                <img src="./assets/img/bg/icon2.png" alt="" />
                <h3 class="text-xl font-bold text-emerald-300  md:text-lg mb-2 uppercase">Accurate Compliance</h3>
              </div>
              <div class="carousal-items">
                <img src="./assets/img/bg/icon3.png" alt="" />
                <h3 class="text-xl font-bold text-emerald-300  md:text-lg mb-2 uppercase">100% Satisfaction Guaranteed</h3>
              </div>
              <div class="carousal-items">
                <img src="./assets/img/bg/icon4.png" alt="" />
                <h3 class="text-xl font-bold text-emerald-300  md:text-lg mb-2 uppercase">EVERY JOB IS PERSONAL</h3>
              </div>
            </div>
        </div>
      </div>
     <!---why taxbee--->
     </div>
     <!---address and need help--->
     <div class="container flex flex-col md:flex-row items-center px-6 mx-auto">
     <div class="space-y-5 flex flex-col mt-10 md:w-1/2">
     <div>
     <h2 class=" max-w-md text-lg font-semibold md:text-xl  text-center uppercase text-black mb-2">Coimbatore Branch</h2>
     <p class="max-w-lg text-center font-medium text-emerald-800 text-base md:text-lg"><i class="fa-solid fa-location-dot mr-2"></i>1G, Saisruthi Complex, No.3, Ramarkoil Street, Ramnagar, Coimbatore - 641 009</p>
     </div>
     <div>
     <h2 class=" max-w-md text-lg font-semibold md:text-xl  text-center uppercase text-black mb-2">Tirupur Branch</h2>
     <p class="max-w-lg text-center font-medium text-emerald-800 text-base md:text-lg"><i class="fa-solid fa-location-dot mr-2"></i>Room No.12, First Floor, 27, Subbu Complex, Ramnagar 1st St, Tirupur - 641 602</p>
     </div>
     </div>
     <div class="md:w-1/2 mt-7 md:mt-0 flex justify-center">
     <div class="">
     <h2 class=" max-w-md text-lg font-semibold md:text-xl  text-center uppercase text-gray-900 mb-2  ">need help</h2>
     <p class="max-w-md text-center font-medium text-emerald-800 text-base md:text-lg"><i class="fa-solid fa-envelope px-2"></i>helpdesk@taxbee.in</p>
     <p class="max-w-md text-center font-medium text-emerald-800 text-base md:text-lg"><i class="fa-solid fa-phone px-2"></i>+91 86 86 09 09 63</p>
     </div>
     </div>
     </div>
     <!---address and need help--->
    </div>

    <?php include 'footer.php' ?>
     <script src="./assets/js/script.js"></script>
</body>
</html>