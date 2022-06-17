<?php

session_start();

$con = new mysqli('localhost','root','','se');
$username=$_SESSION['username'];
$query="select * from repairs where username='$username' order by motor_id;";
$result=mysqli_query($con,$query);

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
<body class="antialiased bg-emerald-800">
    <div class="flex xl:w-[1280px] mx-auto  my-10 b-0 rounded-xl overflow-hidden h-screen bg-gray-50 ">
    <aside class="w-1/5 bg-gray-800 block">
        <div class="py-4 px-4 text-emerald-300 flex flex-col justify-center  space-y-10">
          <a class="text-3xl font-bold text-emerald-300 text-center uppercase" href="#">se repairs</a>
          <div class="text-2xl max-w-md font-semibold text-emerald-300 text-center capitalize">hello <?php echo $username;?></div>
          <div class="mt-5 flex flex-col space-y-5">
          <a class="w-full text-lg text-center font-semibold transition-colors duration-150 text-emerald-300 hover:text-gray-200  capitalize" href="./requestrepair.php">request repair</a>
          <a class="w-full text-lg text-center font-semibold transition-colors duration-150 text-white capitalize" href="./myrepairs.php">repair status</a>
          </div>
          <a href="./index.php" class="px-8 py-3 justify-self-end text-center text-white bg-emerald-700  rounded-full baseline hover:bg-slate-900 uppercase tracking-widest">log out</a>
        </div>
    </aside>
    <div class="flex flex-col w-4/5 bg-white">
    <div class="inline-block  w-full ">
    <div class="uppercase text-4xl text-center my-10 text-slate-900">repair status</div>
    <div class="overflow-hidden">
           <table class="min-w-full">
            <thead class="bg-white border-b">
             <tr>
               <th scope="col" class="text-md capitalize font-medium text-gray-900 px-6 py-4 text-left">
               motor id
               </th>
              <th scope="col" class="text-md capitalize font-medium text-gray-900 px-6 py-4 text-left">
              motor brand
              </th>
              <th scope="col" class="text-md capitalize font-medium text-gray-900 px-6 py-4 text-left">
              frame number
              </th>
              <th scope="col" class="text-md capitalize font-medium text-gray-900 px-6 py-4 text-left">
                date
              </th>
              <th scope="col" class="text-md capitalize font-medium text-gray-900 px-6 py-4 text-left">
                status
              </th>
            </tr>
          </thead>
          <tbody>
          <?php if ($result->num_rows > 0): ?>
           <?php while($array=mysqli_fetch_row($result)): ?>
            <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $array[0];?></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[2];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[3];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[10];?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php echo $array[9];?>
              </td>
            </tr>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php mysqli_free_result($result); ?>  
          </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
  </div>


    <script src="./assets/js/script.js"></script>
</body>
</html>