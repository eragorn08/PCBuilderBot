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
        $delete_sql="delete from contact_us where id='$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Us</h4>
                           <h4 class="box-title"><a href="manage_categories.php">Add Categories</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                       <th>Mobile</th>
                                       <th>Comment</th>
                                       <th>Date</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)) {?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?></td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td><?php echo $row['mobile_num']; ?></td>
                                       <td><?php echo $row['comment']; ?></td>
                                       <td><?php echo $row['added_on']; ?></td>
                                       <td>
                                        <?php
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