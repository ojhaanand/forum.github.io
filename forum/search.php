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


    <!--search reesults -->
    <div class="search my-3">
        <h1 class="text-center">search results for <?php echo $_GET['search']?></h1>
        <?php
    $noresult=true;
    $query=$_GET["search"];
    $sql ="SELECT * FROM thread WHERE MATCH(thread_title,thread_desc) against ('$query')";
    $result =mysqli_query($conn, $sql);
    
    while($row =mysqli_fetch_assoc($result)){     
    
        $title= $row['thread_title'];
        $desc =$row['thread_desc'];
        $id= $row['thread_id'];  
        $url="thread.php?threadid=". $id;
        $noresult=false;           
       echo  '<div class="results text-center">
        <h3><a href="'. $url .'" class="text-dark">'. $title .'</a></h3>
        <p>'. $desc .'</p>
      </div>';
    }
    
    if($noresult){
      echo  '<div class="jumbotron jumbotron-fluid text-center">
            <h1>NO Results found</h1>
            <p>Suggestions: <ul>
            <li>Make sure you have spelled correctly</li>
            <li>Try different key word</li>
            <li>Make sure you have good internet connection</li>
            </p>
            </div>';
    }
         
    ?>

    </div>
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