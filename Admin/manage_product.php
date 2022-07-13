<?php
require('top.php');
$product_name='';
$categories_id='';
$mrp='';
$product_price='';
$product_quantity='';
$product_image='';
$product_short_desc='';
$product_desc='';
$meta_title='';
$meta_desc='';
$meta_keyword='';
$msg='';

$image_required='';
//add category
if(isset($_GET['id']) && $_GET['id']!=''){
   $image_required='';
   $id=get_safe_value($con,$_GET['id']);
   $res=mysqli_query($con,"select * from product where id='$id'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $row=mysqli_fetch_assoc($res);
      $categories_id=$row['categories_id'];
      $product_name=$row['product_name'];
      $mrp=$row['mrp'];
      $product_price=$row['product_price'];
      $product_quantity=$row['product_quantity'];
      $product_short_desc=$row['product_short_desc'];
      $product_desc=$row['product_desc'];
      $meta_title=$row['meta_title'];
      $meta_desc=$row['meta_desc'];

   }else{
      header('location:products.php');
      die();
   }
}

//edit category

if(isset($_POST['submit'])){
   $categories_id=get_safe_value($con,$_POST['categories_id']);
   $product_name=get_safe_value($con,$_POST['product_name']);
   $mrp=get_safe_value($con,$_POST['mrp']);
   $product_price=get_safe_value($con,$_POST['product_price']);
   $product_quantity=get_safe_value($con,$_POST['product_quantity']);
   $product_short_desc=get_safe_value($con,$_POST['product_short_desc']);
   $product_desc=get_safe_value($con,$_POST['product_desc']);
   $meta_title=get_safe_value($con,$_POST['meta_title']);
   $meta_desc=get_safe_value($con,$_POST['meta_desc']);
   $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

   $res=mysqli_query($con,"select * from product where product_name='$product_name	'");
   $check=mysqli_num_rows($res);
   if($check>0){
      if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=$row=mysqli_fetch_assoc($res);
         if($id==$getData['id']){
            
         }else{
            $msg="Product Already Exists";
         }
      }else{
         $msg="Product Already Exists";
      }
   }



		// if($_FILES['product_image']['type']!='product_image/png' && $_FILES['product_image']['type']!='product_image/jpg' && $_FILES['product_image']['type']!='product_image/jpeg'){
		// 	$msg="Please Select Only png, jpg, and jpeg Image Format";
      // }


   if($msg==''){
      if(isset($_GET['id']) && $_GET['id']!=''){
         if($_FILES['product_image']['name'] !=''){
            $product_image=rand(111111111,999999999).'_'.$_FILES['product_image']['name'];
            move_uploaded_file($_FILES['product_image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$product_image);
            $update_sql="update product set categories_id='$categories_id', product_name='$product_name', mrp='$mrp', product_price='$product_price', product_quantity='$product_quantity', product_short_desc='$product_short_desc',
            product_desc='$product_desc', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword',product_image='$product_image' where id='$id'";
         }else{
            $update_sql="update product set categories_id='$categories_id', product_name='$product_name', mrp='$mrp', product_price='$product_price', product_quantity='$product_quantity', product_short_desc='$product_short_desc',
            product_desc='$product_desc', meta_title='$meta_title', meta_desc='$meta_desc', meta_keyword='$meta_keyword' where id='$id'";
         }
         mysqli_query($con,$update_sql);
      }else{
         $product_image=rand(111111111,999999999).'_'.$_FILES['product_image']['name'];
         move_uploaded_file($_FILES['product_image']['tmp_name'],'../media/products/'.$product_image);
         mysqli_query($con,"insert into product(categories_id,product_name,mrp,product_price,product_quantity,product_short_desc,product_desc,meta_title,meta_desc,meta_keyword,status,product_image) 
         values('$categories_id', '$product_name', '$mrp', '$product_price', '$product_quantity', '$product_short_desc', '$product_desc', '$meta_title', '$meta_desc', '$meta_keyword', 1,'$product_image')");
      }
      header('location:products.php');
      die();
   }
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                           <div class="card-body card-block">
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Categories</label>
                                 <select class="form-control" name="categories_id">
                                    <option>Select Category</option>
                                    <?php
                                    $res=mysqli_query($con,"select id, categories from categories order by categories asc");
                                    while($row=mysqli_fetch_assoc($res)){
                                       if($row ['id']==$categories_id){
                                          echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                       }else{
                                          echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                       }
                                    }
                                    ?>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Name</label>
                                 <input type="text" name="product_name" placeholder="Enter a new Product Name" class="form-control" required value="<?php echo $product_name;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">MRP</label>
                                 <input type="text" name="mrp" placeholder="Enter Product MRP" class="form-control" required value="<?php echo $mrp;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Price</label>
                                 <input type="text" name="product_price" placeholder="Enter Product Price" class="form-control" required value="<?php echo $product_price;?>">
                              </div>
                              
                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Quantity</label>
                                 <input type="text" name="product_quantity" placeholder="Enter a Product Quantity" class="form-control" required value="<?php echo $product_quantity;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Image</label>
                                 <input type="file" name="product_image" class="form-control"  <?php echo $image_required?>>
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Short Description</label>
                                 <input type="text" name="product_short_desc" placeholder="Enter Product Short Description" class="form-control" required value="<?php echo $product_short_desc;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Description</label>
                                 <input type="text" name="product_desc" placeholder="Enter Product Description" class="form-control" required value="<?php echo $product_desc;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Meta Title</label>
                                 <input type="text" name="meta_title" placeholder="Enter Meta Title" class="form-control" value="<?php echo $meta_title;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Meta Description</label>
                                 <input type="text" name="meta_desc" placeholder="Enter Product Description" class="form-control" value="<?php echo $meta_desc;?>">
                              </div>

                              <div class="form-group">
                                 <label for="categories" class=" form-control-label">Product Keyword</label>
                                 <input type="text" name="meta_keyword" placeholder="Enter Product Keyword" class="form-control" value="<?php echo $meta_keyword;?>">
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