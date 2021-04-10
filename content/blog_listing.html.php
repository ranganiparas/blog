<div class="container">
    <h2>All Blogs</h2>
    <!-- <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p> -->
    <div class="panel-group" id="accordion">
        <?php 
          foreach($allBlogs as $bID => $bData) {?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title bg-secondary">
                <div class = "row"> 
                  <div class = "col-3">
                  <a data-toggle="collapse" class="m-1 text-dark" data-parent="#accordion" href="#collapse<?php echo $bID; ?>"><?php echo $bData['blog_title']; ?></a>
                  </div>
                  <div class = "col-6"></div>
                      <a href = "blog_action.php?bid=<?php echo $bID;?>" class = "btn btn-info btn-sm mx-1">Edit <i class="fas fa-edit"></i></a>
                      <a class = "btn btn-danger mx-1 btn-sm dlt" >Delete <i class="fas fa-trash"></i></a>
                </div>
                
              </h4>
            </div>
            <div id="collapse<?php echo $bID; ?>" class="panel-collapse collapse in">
              <div class="panel-body">
                  <div class = "row">
                      <div class = "col-4">
                          <div class = "show_image"></div>
                      </div>
                      <div class = "col-8">
                          <div class = "show_desc">
                              <?php echo $bData['blog_description']; ?>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      <?php }?>
    </div> 
</div>
<script>
  var bid = <?php echo $bid?>;
  </script>
<script>
$( document ).ready(function() {
  $("dlt").click(function(){
  $.ajax({
    url: "blog_action.php",
    data:{'action':'delete', 'bid' = 'bid'},
    success: function(result){
    $("#div1").html(result);
  }});
});
});

</script>

</div>
</body>
</html>