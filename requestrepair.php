<?php

session_start();

$con = new mysqli('localhost','root','','se');

$brand=$frame=$hp=$motor_type=$mobile=$address=$problem="";

$username=$_SESSION['username'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

$brand=$_REQUEST['brand'];
$frame=$_REQUEST['frame'];
$hp=$_REQUEST['hp'];
$motor_type=$_REQUEST['motor_type'];
$mobile=$_REQUEST['mobile'];
$address=$_REQUEST['address'];
$problem=$_REQUEST['problem'];

        $sql = "INSERT INTO repairs(username,brand,frame,hp,type,mobile,address,problem) values('$username','$brand','$frame','$hp','$motor_type','$mobile','$address','$problem');";

            if ($con->query($sql) === TRUE) 
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('request submitted succesfully');
                window.location.href='requestrepair.php';
                </script>");
            }
             else {
                echo "Error: " . $sql . "<br>" . $conn->error;
             }
}
    $con->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Repair</title>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="antialiased bg-white">
  <div class="flex xl:w-[1280px] mx-auto my-10 b-0 rounded-xl overflow-hidden h-full ">
    <aside class="w-1/5 bg-gray-800 block">
        <div class="py-4 px-4 text-emerald-300 flex flex-col justify-center space-y-10">
          <a class="text-3xl font-bold text-emerald-300 text-center uppercase" href="#">se repairs</a>
          <div class="text-2xl max-w-md font-semibold text-emerald-300 text-center capitalize">hello <?php echo $username;?></div>
          <div class="mt-5 flex flex-col space-y-5">
          <a class="w-full text-lg text-center font-semibold text-white  capitalize" href="./requestrepair.php">request repair</a>
          <a class="w-full text-lg text-center font-semibold transition-colors duration-150 text-emerald-300 hover:text-gray-200 capitalize" href="./myrepairs.php">repair status</a>
          </div>
          <a href="./index.php" class="px-8 py-3 justify-self-end text-center text-white bg-emerald-700  rounded-full baseline hover:bg-slate-900 uppercase tracking-widest">log out</a>
        </div>
    </aside>
    <div class="w-4/5 py-10  flex flex-col justify-center content-center bg-emerald-700">
    <div class="uppercase text-4xl text-white text-center my-5">request repair</div>
     <div class="w-3/5 self-center  bg-white rounded-xl shadow-lg p-8">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="flex flex-col space-y-4" id="requestform">
             <div>
                 <label for="brand" class="text-sm">Motor Brand Name</label>
                 <input type="text" id="brand" name="brand" placeholder="Enter your motor brand name" class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800  ">
             </div>  
             <div>
                 <label for="frame" class="text-sm">Motor Frame Number</label>
                 <input type="text" id="frame" name="frame" placeholder="Enter your motor frame number" class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 ">
             </div>  
             <div>
                 <label for="hp" class="text-sm">Motor HP</label>
                 <input type="text" id="hp" name="hp" placeholder="Enter your motor hp" class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 ">
             </div>  
             <div>
                 <label for="motor_type" class="text-sm">Motor Type</label>
                 <input type="text" id="motor_type" name="motor_type" placeholder="Eg:pump motor,dc motor.." class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 ">
             </div> 
             <div>
                 <label for="mobile" class="text-sm">Mobile Number</label>
                 <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 ">
             </div>  
             <div>
                 <label for="address" class="text-sm">Address</label>
                 <input type="text" id="address" name="address" placeholder="Enter your address for pick up" class="ring-1 mt-2 ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 ">
             </div>  
             <div>
                 <label for="problem" class="text-sm">Problem</label>
                 <input type="text" id="problem" name="problem" placeholder="Enter your motor problem" class="ring-1 mt-2  ring-gray-800 w-full rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-emerald-800 mb-5">
             </div>   
             <div class="flex justify-end">
                <input type="submit" value="submit" class="px-8 py-3 text-emerald-300 bg-gray-800 cursor-pointer  rounded-full baseline hover:bg-slate-900 uppercase tracking-widest ">
             </div>    
        </form>
    </div>
    </div>
 </div>


    <script src="./assets/js/script.js"></script>
</body>
</html>