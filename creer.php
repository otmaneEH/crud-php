<?php
require "header.php";
include_once "db.php";
$msg="";
$bac="";
$nameEr="entre votre nom";
$emailEr="entre votre email";

$suc="Hello";
date_default_timezone_set("Africa/Cairo");  
        $h = date('G');

        if($h>=5 && $h<=11)
        {
            $suc= "bonne matinée";
        }
        else if($h>=12 && $h<=15)
        {
            $suc= "bon après-midi ";
        }
        else
        {
            $suc= "bonne soirée
            ";
        } 
if (isset($_POST['Submit'])) {
  $name = mysqli_real_escape_string($mysqli, $_POST['name']);
  $email = mysqli_real_escape_string($mysqli, $_POST['email']);

  if (empty($name) || empty($email)) {

    if (empty($name)) {
      $nameEr = "<span style=\"color:red;\">Name is empty<span>";
    }
    if (empty($email)) {
      $emailEr = "<span style=\"color:red;\">email is empty<span>.";
    }
    if (empty($name) || empty($email)) {
      $bac = "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }
    $msg = `<div class="alert alert-warning">
      echo "$nameEr";
      echo "$emailEr";
      echo "$bac";
  </div>`;
  } else {

    $result = mysqli_query($mysqli, "INSERT INTO etudiant(name,email) VALUES('$name','$email')");
    $suc="<font color='green'>Data added successfully.";
  }
}
?>
<html>

<head>
  <title>Add Data</title>
  <style>
    body {
      padding: 0;
      margin: 0;
      justify-content: space-between;
    }

    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }

    .center {
      display: flex;
      justify-content: center;


    }
  </style>
</head>

<body>

  <section>
    <div class="container-fluid mt-4">
      <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-xl-5 col-md-5">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-12">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="img/img.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1"><?php echo "$suc";?></h4>
                  </div>

                  <form class="form" action="creer.php" method="post" name="form1">
                    <p>Add Account Panel</p>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example11" class="form-control" placeholder="entre votre nom" name="name" />
                      <label class="form-label" for="form2Example11"><?php echo "$nameEr";?></label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="emaill" class="form-control" name="email" />
                      <label class="form-label" for="emaill"><?php echo "$nameEr";?></label>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <input class="form-control btn btn-primary" type="submit" name="Submit" value="Add">

                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">


                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>















  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>