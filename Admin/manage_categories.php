<?php
require('top.php');
$categories='';
$msg='';
//add category
if(isset($_GET['id']) && $_GET['id']!=''){
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"select * from categories where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories=$row['categories'];
   }else{
      header('location:categories.php');
      die();
   }
}

//edit category
if(isset($_POST['submit'])){
   $categories=get_safe_value($con,$_POST['categories']);
   $res=mysqli_query($con,"select * from categories where categories='$categories'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=$row=mysqli_fetch_assoc($res);
         if($id==$getData['id']){
            
         }else{
            $msg="Category Already Exists";
         }
      }else{
         $msg="Category Already Exists";
      }
   }

   

   if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
         mysqli_query($con,"update categories set categories='$categories' where id='$id'");
      }else{
         mysqli_query($con,"insert into categories(categories,status) values('$categories','1')");
   
      }
      header('location:categories.php');
      die();
   }
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
                           <div class="card-body card-block">
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Categories</label>
                                 <input type="text" name="categories" placeholder="Enter a new Category" class="form-control" required value="<?php echo $categories?>">
                              </div>
                                 <button id="submit-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="submit-button-category">Submit</span>
                                 </button>
                                 <div class="field_error"><?php echo $msg; ?></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
require('footer.php')
?>