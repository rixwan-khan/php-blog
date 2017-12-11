<?php

include("includes/config.php");
include("includes/db.php");

$insert_query = "SELECT * FROM category";
$result=$db->query($insert_query);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Blog - CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>

    <header>
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
          <?php if(isset($_GET['category'])){?>
            <a class="nav-link" href="index.php">Home</a>
            <?php }else{?>
            <a class="nav-link active" href="index.php">Home</a>
            <?php } ?>

            <?php if($result->num_rows > 0) { 
              while ($row=$result->fetch_assoc()) {
              if(isset($_GET['category']) && $row['id'] ==$_GET['category']){ ?>
        <a class="nav-link active" href="index.php?category=<?php echo $row['id']?>"><?php echo $row['type'];?>
        </a>
            <?php }else echo "<a class='nav-link' href='index.php?category=$row[id]'>$row[type]
            </a>";
            } } ?>
          </nav>
        </div>
      </div>

      
    </header>