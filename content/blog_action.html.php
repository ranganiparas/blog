
<div class="container h-100 my-4">
    <div class="row h-100 justify-content-center align-items-center">
<form method="post" action="blog_action.php" class="col-6">
    <div class="form-group">
      <label for="blog_title">Blog Title</label>
      <input type="text" class="form-control" id="blog_title" name="blog_title" value="<?php echo $blogData[$_GET["bid"]]['blog_title'];  ?>" aria-describedby="blogHelp" placeholder="Enter Blog Title">
      <small id="blogHelp" class="form-text text-muted">This is the blog title.</small>
    </div>
    <div class="form-group">
      <label for="blog_description">Blog Description</label>
      <textarea class="form-control" id="blog_description" name="blog_description" value="<?php echo $blogData[$_GET["bid"]]['blog_description'];  ?>" rows="3" placeholder="Enter Blog Description here"></textarea>
    </div>
    
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $blogData[$_GET["bid"]]['tags'];  ?>" aria-describedby="tagHelp" placeholder="Enter tags here">
        <small id="tagHelp" class="form-text text-muted">Enter Comma seperated Tags.</small>
    </div>
    <div class="form-group">
        <label for="bimage">Blog Display Image</label>
        <input type="file" class="form-control-file" name="bimage" id="bimage" enctype="multipart/form-data">
    </div>
    <button type="submit" value="submit" name="submit" class="btn btn-primary">Create</button>
</form>
</div>
</div>


</div>
</body>
</html>