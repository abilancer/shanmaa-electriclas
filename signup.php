<?php

$con = new mysqli('localhost','root','','se');


$nm = $em = $pw = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$em=$_REQUEST['email'];
$pw=$_REQUEST['password'];
$nm=$_REQUEST['name'];


        $sql = "INSERT INTO user_form (email,name,password) values('$em','$nm','$pw');";

            if ($con->query($sql) === TRUE) 
            {
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('Registered Succesfully');
                window.location.href='login.php';
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
    <title>Sign Up</title>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="antialiased bg-white">
    <div class="min-h-screen pt-12 md:pt-15 pb-6 px-2 md:px-0 text-center">

    <main class="bg-gray-800 max-w-lg mx-auto p-8 md:p-12 my-10 rounded-3xl shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl text-center text-emerald-300">Welcome to Shanmaa Electricals</h3>
            <p class="text-white text-lg text-center tracking-wide pt-2">Create account</p>
        </section>

        <section class="mt-10">
        <form class="flex flex-col" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="mb-6  rounded bg-gray-800">
                    <label class="block text-emerald-300 text-lg text-left font-bold mb-2 ml-6" for="name">Username</label>
                    <input type="text" name="name" id="name" placeholder="Enter username" required class="bg-white rounded-3xl w-full text-gray-800 focus:outline-none border-b-4 border-gray-200 focus:border-emerald-800 transition duration-500 px-6 py-2">
                </div>
                <div class="mb-6 rounded bg-gray-800">
                    <label class="block  text-emerald-300 text-lg text-left font-bold mb-2 ml-6" for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" required class="bg-white rounded-3xl w-full text-gray-800 focus:outline-none border-b-4 border-gray-200 focus:border-emerald-800 transition duration-500 px-6 py-2">
                </div>
                <div class="mb-6 rounded bg-gray-800">
                    <label class="block bg-gray-800 text-emerald-300 text-left text-lg font-bold mb-2 ml-6" for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" required class="bg-white rounded-3xl w-full text-gray-800 focus:outline-none border-b-4 border-gray-200 focus:border-emerald-800 transition duration-500 px-6 py-2">
                </div>
                <input type="submit" name="submit" value="Sign Up"  class="bg-emerald-600  hover:bg-emerald-800 tracking-wider text-white font-bold py-2 rounded-3xl mt-2 shadow-lg hover:shadow-xl inline-block uppercase transition duration-200"/>
            </form>
        </section>
        <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">Already have an account? <a href="./login.php" class="font-bold hover:underline text-emerald-400 hover:text-emerald-600">Login</a>.</p>
    </div>
    </main>

  

    </div>
     <script src="./assets/js/script.js"></script>
</div>
</html>