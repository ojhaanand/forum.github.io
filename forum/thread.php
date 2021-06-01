<?php 
include "partials/_dbconnect.php"
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
     
    <title>Welcome to iDiscuss Forum</title>
</head>

<body>

<?php include"partials/_dbconnect.php" ?>
    <?php include"partials/_header.php" ?>
    
    <?php 
    $id=$_GET['threadid'];
    $sql ="SELECT * FROM `thread` WHERE thread_id=$id";
    $result =mysqli_query($conn, $sql);

    while($row =mysqli_fetch_assoc($result)){
        $title= $row['thread_title'];
        $desc =$row['thread_desc'];
    }
    
    ?>
    <?php 
    $showalert= false;
    $method= $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $comment= $_POST['comment'];
        $sno= $_POST['sno'];
        $comment=str_replace("<", "&lt;", $comment);
        $comment=str_replace(">", "&gt;", $comment);
        $sql="INSERT INTO `comment` ( `comment_content`, `comment_by`, `thread_id`, `comment_time`) VALUES ( '$comment', '$sno', '$id', current_timestamp());";
        $result= mysqli_query($conn,$sql);
        $showalert=true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been succesfully posted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <!-- category  -->
    <div class="container my-3">
        <div class="jumbotron ">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>his is a platform to solve issues and doubts
                No Spam / Advertising / Self-promote in the forums. ...
                Do not post copyright-infringing material. ...
                Do not post “offensive” posts, links or images. ...
                Do not cross post questions. ...
                Do not PM users asking for help. ...
                Remain respectful of other members at all times.


            </p>

            <a class="btn1 btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
        
        <?php
        if(isset($_SESSION['loggedin'])){
        echo '<div class="container">
            <h1 class="py-2">Post Your Comment </h2>
                <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                 
                    <div class="form-group mt-2">
                        <label for="exampleFormControlTextarea1">Post your comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        <input type="hidden" name="sno" value="' . $_SESSION['sno'] . '">
                    </div>


                    <button type="submit" class="btn btn-success mt-2">Post</button>
                </form>

        </div>';
        }
        else{
            echo '<div class="jumbotron jumbotron-fluid mt-3">
            <div class="container">
              <h1 class="display-4">Please loggin first to begin the discussion</h1>
              
              
            </div>
          </div>';
        }
        ?>

        <div class="ques container" id="ques">
            <h3 class="text-center">Discussion</h3>
            <?php 
    $id=$_GET['threadid'];
    $sql ="SELECT * FROM `comment` where thread_id=$id";
    $result =mysqli_query($conn, $sql);
    $noresult= true;

    while($row =mysqli_fetch_assoc($result)){
        $noresult=false;
        $id= $row['comment_id'];
        $content= $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id =$row['comment_by'];
    
        $sql2="SELECT user_email FROM `users` WHERE SNO='$thread_user_id'";
        $result2=mysqli_query($conn,$sql2);
        $row2= mysqli_fetch_assoc($result2);

       echo '<div class="media">
        <img class="align-self-center mr-3 mt-2 " src="img/user.jpg" width="30px;" alt="..">
        <div class="media-body" style="float:center;">
          <p class="font-weight-bold my-0 text-bold"> <b><em>' . $row2['user_email'] . ' </b>  at ' . $comment_time . ' </p>
            ' . $content. ' 

        </div>
    </div>';
    }
    //echo var_dump($noresult);
    if($noresult){
        echo 
        '<div class="jumbotron jumbotron-fluid mt-3">
        <div class="container">
          <h1 class="display-4">No Questions Found</h1>
          <p class="lead">Be the first one to ask question...</p>
          
        </div>
      </div>';
    }
    
    ?>

            

         

        <?php include"partials/footer.php" ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
</body>

</html>