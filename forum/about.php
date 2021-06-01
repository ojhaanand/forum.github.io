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
    <link rel="stylesheet" href="style.css">
    <title>Welcome to iDiscuss Forum</title>
</head>

<style>
.about{
    min-height:100vh;
    padding:20px;
    display:flex;
    align-items:center;
    justify-content:center;
    background: #FFEFBA!important;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #FFFFFF, #FFEFBA)!important;  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #FFFFFF, #FFEFBA)!important; /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
} 
.about-section{
  background: url(img/aboutus1.jpg) no-repeat left;
  background-size: 50%;
  background-color:#FFEFBA!important;
  overflow:hidden;
  padding: 150px 0;
}
.inner-section{
  width:50%;
  float:right;
  padding:50px;
  }
.inner-section h1{
  font-size:bold;
  font-weight:900;
  
  
}
.inner-section hr{
  color:bold;
}    
.text{
  font-size: 20;
  color:;
  
  margin-bottom:30px;

}

@media screen and(max-width:1200px){
  .inner-section{
    padding:80px;
  }

}

@media screen and(max-width:800px){
  .inner-section{
    padding:80px;
  }
  .about-section{
    padding:60px;
  }

}
@media screen and(max-width:414px){
  .inner-section{
     width:100%
     padding:60px;
      }
  .about-section{
    
    padding:0;
  }

}
</style>
<body>

    <?php include"partials/_header.php" ?>

    <section class="about">
        <div class="about-section">
            <div class="inner-section">
                <h1>About us</h1><hr>
                <p class="text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem eum reiciendis autem animi
                    quod, eos quas perspiciatis ad quia quaerat amet corporis maxime odio commodi blanditiis ipsam,
                    impedit consequatur hic veniam? Dolores impedit itaque eos.
                </p>
            </div>

        </div>
    </section>
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