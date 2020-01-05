<?php
require 'db_query/InsertQuery.php'; 
$firstnameErr = ""; $lastnameErr = ""; $emailErr =""; $usernameErr = "";

function sanitizeInputs($value) {
    $value = trim($value);
    $value = htmlentities($value);
    $value = htmlspecialchars($value);
    $value = stripslashes($value);

    return $value;
}

$title = "";
$firstname = "";
$lastname = "";
$email = "";
$username = "";
$password = "";

if (isset($_POST['btnsubmit'])) {
//    $firstname = sanitizeInputs($_POST['firstname']);
//    $lastname = sanitizeInputs($_POST['lastname']);
//    $email = sanitizeInputs($_POST['email']);
//    $username = sanitizeInputs($_POST['username']);
//    $pword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($firstname)){
        $firstnameErr = "First Name is empty";
    }
//   elseif (strlen($firstname) < 2){
//  $firstnameErr = "First Name should not be less than two characters";
// }
  if (empty($lastname)){
    $lastnameErr = "Last Name is empty";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = "Invalid Email address";
  }

  if (empty($username)){
    $usernameErr = "Username is empty";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login</title>
</head>

<body style="background-image:url('img/md.jpg'); background-size:cover;background-repeat:no-repeat;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="index.html">Electronic Medical Records </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.html">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OurCompany.html">Our Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FAQ.html">FAQ</a>
                </li>


            </ul>
            <?php
	if (!isset($_POST['btnsubmit']) or (isset($_POST['btnsubmit']) and (!empty($firstnameErr) or !empty($lastnameErr) or !empty($emailErr) or !empty($usernameErr)))) {
	?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <h5><b>Stay informed on the latest medical news</b></h5>
                        <p>Read unlimited articles, expert perspectives, announcements, conference news and practice guidelines across specialties.</p>
                    </div>
                    <div>
                        <h5><b>Find accurate answers at the point-of-care</b></h5>
                        <p>Access the latest evidence-based diagnosis and treatment information, and search over 10,000 drugs, diseases, and procedures.</p>
                    </div>
                    <div>
                        <h5><b>Easily meet continuing education requirements</b></h5>
                        <p>Take free accredited courses to fulfill professional development and licensure requirements across 1,000+ clinical topics.</p>
                    </div>


                </div>
                <div class="col-md-9" align="center">
                    <div class="">
                        <div class="">
                            <h2 class="text-center">Sign Up</h2>
                        </div>
                        <div class="">
                            <form method="post" action="">
                                <div class="">
                                    <label><b>Title:</b></label><br>
                                    <select class="ml-4">
                                        <option>--Select--</option>
                                        <option>--Dr.--</option>
                                        <option>--Nurse--</option>
                                        <option>--Laboratory Scientist--</option>
                                    </select>
                                </div><br>
                                <div class="">
                                    <label><b>First Name :</b></label><br>
                                    <input type="text" name="Rfirstname" required><br>
                                </div><br>
                                <div class="">
                                    <label><b>Last Name :</b></label><br>
                                    <input type="text" name="Rlastname" required><br>
                                </div><br>
                                <div class="">
                                    <label class="ml-4"><b>Email :</b></label><br>
                                    <input type="email" name="Remail" required><br>
                                </div><br>
                                <div class="">
                                    <label><b>Username :</b></label><br>
                                    <input type="text" name="Runame" required><br>
                                </div><br>
                                <div class="">
                                    <label><b>Password :</b></label><br>
                                    <input type="password" name="Rpword" required><br>
                                </div><br>
                                <!-- <div class="mb-3" class="ml-0">
                                    <label class="mr-auto"><b>Confirm Password :</b></label>
                                    <input type="password" class="ml-0" name="">
                                </div> -->
                                <div>
                                    <input type="checkbox" required> <label>I agree to the<a href="" style="color:blue"> Terms of Use </a> and <a href="" style="color:blue"> Privacy Policy</a>.</label>
                                </div>
                                <div align="center" class="mt-3 mb-3">
                                    <button class="btn-lg" style="background-color:#9FBBD0" name="btnsubmit">Submit</button>
                                </div>
                            </form>
                            <?php
}
else {
	?>
                            <div>
                                <h2>Acknowledgement Receipt</h2>
                                <div>Title: <?=$_POST['title']?></div>
                                <div>First Name: <?=$_POST['firstname']?></div>
                                <div>Last Name: <?=$_POST['lastname']?></div>
                                <div>Email: <?=$_POST['email']?></div>

                            </div>
                            <?php
}
 
?>
                            <div>Already have an account? Click <a href="Login.html" style="color:blue">here</a> to login </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
