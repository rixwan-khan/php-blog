
<?php include("includes/header.php"); 

if(isset($_GET['category'])){
  $catt = mysqli_real_escape_string($db, $_GET['category']);
  $select_query = "SELECT * FROM post where category='$catt'";
}else{
$select_query = "SELECT * FROM post";
}
$post_result =$db->query($select_query);


?>


    <main role="main" class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">
        <div class="blog-header">
        <div class="container">
          <h1 class="blog-title">Web Designing & Development</h1>
          <p class="lead blog-description">Learning form scratch..</p>
        </div>
      </div>
       <?php 
            if($post_result->num_rows >0){
            while($row=$post_result->fetch_assoc()){
          ?>
          
          <div class="blog-post" style="background-color: #f5f5f5; padding-left: 20px;">
            <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id']?>"><?php echo $row['title']?></a></h2>
            <p class="blog-post-meta"><?php echo $row['date']?> <a href="#"><?php echo $row['author']?></a></p>
            
              <!-- <?php echo $row['body']; ?> -->
              
              <?php $content= $row['body'];

                 echo substr($content, 0,499)
               ?>
               
               
            <a href="single.php?post=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Read more...</a>
          
          </div><!-- /.blog-post -->
          
          
        <?php }  } ?>
        </div><!-- /.blog-main -->

     
          
      <?php include("includes/sidebar.php"); ?>

      <?php include("includes/footer.php"); ?>

    </div><!-- /.row -->

    </main><!-- /.container -->
  

  
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

