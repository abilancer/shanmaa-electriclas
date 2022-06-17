<?php

$con = new mysqli('localhost','root','','se');

$name = $pass = "";

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

$name=$_REQUEST['name'];
$pass=$_REQUEST['password'];
$_SESSION['username'] = $name;


        if($name=='admin' and $pass=='admin'){
            header("location:adminpage.php");
        }else{
           $sql = "select name,password from user_form where name='$name' and password='$pass';";
           $c=mysqli_query($con,$sql);
              if (mysqli_num_rows($c)>0) 
              {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Logged in Succesfully');
                window.location.href='requestrepair.php';
                </script>");

              }
                else {
                 echo "invalid user name or password";
              }
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
    <title>Login</title>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="antialiased bg-white">
    <div class="min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0 text-center">

    <main class="bg-gray-800 max-w-lg mx-auto p-8 md:p-12 my-10 rounded-3xl shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl text-center text-emerald-300">Welcome to Shanmaa Electricals</h3>
            <p class="text-white text-center tracking-wide text-lg pt-2">Sign in to your account.</p>
        </section>

        <section class="mt-10 ">
            <form class="flex flex-col " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-6 pt-3 rounded bg-gray-800 ">
                    <label class="block text-emerald-300  text-lg font-bold text-left mb-2 ml-6" for="name">User Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your username" required=" " class="bg-white rounded-3xl w-full text-gray-800 focus:outline-none border-b-4 focus:border-emerald-800 border-gray-200 transition duration-500 px-6 py-2">
                </div>
                <div class="mb-10  rounded bg-gray-800">
                    <label class="block text-emerald-300 text-lg text-left font-bold mb-2 ml-6" for="password">Password</label>
                    <input type="password" id="password" placeholder="Enter your password" name="password" required class="bg-white rounded-3xl w-full text-gray-800 focus:outline-none border-b-4 focus:border-emerald-800 border-gray-200 transition duration-500 px-6 py-2">
                </div>
                <input type="submit" value="Login" name="submit" class="bg-emerald-600  hover:bg-emerald-800 tracking-wider text-white font-bold py-2 rounded-3xl shadow-lg hover:shadow-xl inline-block uppercase transition duration-200 ">
            </form>
        </section>
        <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">Don't have an account? <a href="./signup.php" class="font-bold hover:underline text-emerald-400 hover:text-emerald-600">Sign up</a>.</p>
    </div>
    </main>

  

    </div>
     <script src="./assets/js/script.js"></script>
</div>
</html>