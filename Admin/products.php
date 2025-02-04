<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    //change category
    if($type=='status'){
        $operation=get_safe_value($con,$_GET['operation']);
        $id=get_safe_value($con,$_GET['id']);
        if($operation=='available'){
                $status='1';
        }else{
                $status='0';
        }
        $update_status="update product set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
    }
    //delete category
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from product where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products </h4>
                           <h4 class="box-title"><a href="manage_product.php">Add Products</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Manage</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['categories']; ?></td>
                                       <td><?php echo $row['product_name']; ?></td>
                                       <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['product_image']; ?>"/></td>
                                       <td><?php echo $row['mrp']; ?></td>
                                       <td><?php echo $row['product_price']; ?></td>
                                       <td><?php echo $row['product_quantity']; ?></td>
                                       <td>
                                        <?php
                                        if($row['status']==1){
                                            echo "<span class='badge badge-complete'><a href='?type=status&operation=unavailable&id=".$row['id']."'>Available</a></span>&nbsp;";                                        
                                        }else{
                                            echo "<span class='badge badge-pending'><a href='?type=status&operation=available&id=".$row['id']."'>Unavailable</a></span>&nbsp;";
                                        } 
                                        echo "<span class='badge badge-edit'><a href='manage_product.php?type=edit&id=".$row['id']."'>Edit</a></span>&nbsp;";
                                        echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
                                        ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
<?php
require('footer.php')
?>