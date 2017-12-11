
<?php include("includes/header.php"); 

if(isset($_GET['post'])){
  $post_id = mysqli_real_escape_string($db, $_GET['post']);
  $select_query = "SELECT * FROM post where id='$post_id'";
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
            <h2 class="blog-post-title"><?php echo $row['title']?></h2>
            <p class="blog-post-meta"><?php echo $row['date']?> <a href="#"><?php echo $row['author']?></a></p>
            
              <?php echo $row['body']; ?>
              <!-- 
              <?php $content= $row['body'];

                 echo substr($content, 0,499)
               ?>
                -->
          
          </div><!-- /.blog-post -->
          
          
        <?php }  } ?>
    
          <!-- <blockquote> 2 Comments</blockquote> -->
          <br>
          <div class="comment-area">
            <form>
              <div class="form-group">
                <label for="emailAddress">Email address</label>
                <input type="email" class="form-control" id="emailAddress" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="commentArea">Comment</label>
                <textarea type="text" class="form-control" cols="4" rows="6" id="commentArea">
                </textarea>
              </div>
             
              <button type="submit" class="btn btn-primary">Post Comment</button>
           </form>

           <br>
           <br>
           <br>
           <hr>
               <div class="post-comment">
                    <div class="comment-head">
                    <a href="#">Riz Khan</a>
                    <img src="http://via.placeholder.com/60x50" alt="user" style="float: left">
                    </div>
                 Good post, it my first comment
               </div>
               <div class="post-comment">
                    <div class="comment-head">
                    <a href="#">Danayal</a><button class="btn btn-info btn-sm">Admin </button>
                    <img src="http://via.placeholder.com/60x50" alt="user" style="float: left">
                    </div>
                 Good post, it my first comment
               </div>
              
          </div>    
      </div><!-- /.blog-main -->
        
        
      <?php include("includes/sidebar.php"); ?>

      <?php include("includes/footer.php"); ?>

      </div><!-- /.row -->

    </main><!-- /.container -->

 

  
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

