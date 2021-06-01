<?php include"partials/_dbconnect.php"?>
<?php
session_start();
 

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum">Home <span class="sr-only"></span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>';
    
    
    
    echo'
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

      $sql = "SELECT category_name, category_ID FROM `categories` LIMIT 4";
      $result = mysqli_query($conn, $sql); 
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threads.php?catid='. $row['category_ID']. '">' . $row['category_name']. '</a>'; 
      }
        
      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact.php" >Contact</a>
    </li>
  </ul>
  <div class="row mx-2">';
  //fro slicing the header section
  if(isset($_SESSION['useremail'])){
    echo '<li class="nav-item">
      <a class="nav-link" href="#" style="position:absolute;right:10px;">Welcome '.$_SESSION['useremail'].'</a>
    </li>
    <from class="d-flex" style="display:inline-block">
    <a href="partials/_logout.php" class="btn btn-outline-success ml-2 mr-5 d-flex">Logout</a>
    <form class="form-inline ml-10 my-2 my-lg-0 d-flex" method="get" action="search.php">
    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm- d-flex" type="submit">Search</button>
     
      </form>
      </form>';
    }
    else{ 
      echo '<li style="display:inline-block">
      <button class="btn btn-outline-success ml-2" style="display:inline" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success ml-2" style="display:inline" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
        </li>';
       }
    
  
  

  echo '</div>
      </div>
      </nav>'; 

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>';
}
if(isset($_GET['loggedoout']) && $_GET['loggedoout']=="true"){
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success!</strong> You have been loggged out succesfullly
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';

}
?>