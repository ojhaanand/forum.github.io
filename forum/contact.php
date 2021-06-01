<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    


    <title>Welcome to iDiscuss Forum</title>
  </head>
  <style>
  .form{
    margin-left:80px;
    width:50%;
  }
  .contact{
    min-height: 100vh;
    background: #FC466B!important;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #3F5EFB, #FC466B);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #3F5EFB, #FC466B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
    
}

  </style>
  <body>
  
  <?php include"partials/_dbconnect.php" ?>
  <?php error_reporting (E_ALL ^ E_NOTICE); ?>

    <?php include"partials/_header.php" ?>
    <?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sub=$_POST['subject'];
    $msg=$_POST['message'];

    $sql="INSERT INTO `contact` (`sno`, `name`, `email`, `subject`, `message`, `dt`) 
        VALUES (NULL, '$name', '$email', '$sub', '$msg', current_timestamp());";
    $result=mysqli_query($conn,$sql); 
    if($result){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your problem has been successfully posted and will be solved soon.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  else{
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Failed!</strong> Sorry unable to post right now!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }   
       
   ?>
    <?php 
    session_start();
    if(isset($_SESSION['useremail'])){
        echo '<section class="contact mt-0">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
    
        <div class="row">
    
            <!--Grid column-->
            <div class="form col-md-6 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" action="contact.php" method="POST">
    
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="email" id="email" name="email" class="form-control">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
                        <!--Grid column-->
    
                    </div>
                    <!--Grid row-->
    
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
    
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-12">
    
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>
    
                        </div>
                    </div>
                    <!--Grid row-->
    
                </form>
    
                <div class="text-center text-md-left">
                    <a class="send btn btn-primary" onclick="document.getElementById("contact-form").submit();">Send</a>
                </div>
                <div class="status"></div>
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Sahibganj, INDIA</p>
                    </li>
    
                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>7635016477</p>
                    </li>
    
                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>ojhaanand87@gmail.com</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
    
        </div>
    
    </section>';
    }
    else{
echo '<button class="btn-contact btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">See the message</button>

<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Message from the admin</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <p>Please login first to contact the admin for solving issues.</p>
  </div>
</div>';

    }
    ?>
   
    <!--Section: Contact v.2-->

<!--Section: Contact v.2-->
    
    <?php include"partials/footer.php" ?>
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
    <script>
        var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
      trigger: 'focus' 
     });
    </script>
  
  </body>
</html>