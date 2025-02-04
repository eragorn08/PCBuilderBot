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
        $update_status="update categories set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
    }
    //delete category
    if($type=='delete'){
        $id=get_safe_value($con,$_GET['id']);
        $delete_sql="delete from categories where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="select * from categories";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Categories </h4>
                           <h4 class="box-title"><a href="manage_categories.php">Add Categories</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Categories</th>
                                       <th>Manage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                                       <td>
                                        <?php
                                        if($row['status']==1){
                                            echo "<span class='badge badge-complete'><a href='?type=status&operation=unavailable&id=".$row['id']."'>Available</a></span>&nbsp;";                                        
                                        }else{
                                            echo "<span class='badge badge-pending'><a href='?type=status&operation=available&id=".$row['id']."'>Unavailable</a></span>&nbsp;";
                                        } 
                                        echo "<span class='badge badge-edit'><a href='manage_categories.php?type=edit&id=".$row['id']."'>Edit</a></span>&nbsp;";
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