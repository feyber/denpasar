<?php
$actions = "";

$namedata = $menu;

if(isset($_GET['actions'])){
    $actions = $_GET['actions'];
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>User Admin</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group" style="margin-bottom:25px;">&nbsp;</div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
            	<?php
                if(!$actions){
					echo '<h2>User Admin</h2>';
				}
				else{
					if($actions=="add"){
						echo '<h2>Add User Admin</h2>';
					}
					elseif($actions=="edit"){
						echo '<h2>Edit User Admin</h2>';
					}
					elseif($actions=="view"){
						echo '<h2>View User Admin</h2>';
					}
					elseif($actions=="delete"){
						echo '<h2>Delete User Admin</h2>';
					}
					elseif($actions=="reset"){
						echo '<h2>Reset Password User Admin</h2>';
					}
				}
				?>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link" style="cursor:pointer;"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
            	<?php
                if(!$actions){
					?>
                    <a href="<?php echo BaseURL() ?>/<?php echo $namedata ?>/add" class="btn btn-info btn-xs"><i class="fa fa-plus"></i> Add Data</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Picture</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = "";
                            $setuseradmin=mysqli_query($conn, "select * from db_useradmin order by id desc");
                            while($useradmin=mysqli_fetch_array($setuseradmin)){
                                $x++;

                                if($useradmin['role'] == 1) {
                                    $role = "Super Admin (All Access)";
                                }
                                else {
                                    $role = "Editor (Only Results)";
                                }
                                echo "
                                    <tr>
                                        <th scope='row'>$x</th>
										";
										if(!empty($useradmin['photo'])){
											$files_pict="<img src='".BaseURL()."/files/pict/".$useradmin['photo']."' class='avatar' alt='Avatar'>";
										}
										else{
											$files_pict="<img src='".BaseURL()."/images/no-image.png' class='avatar' alt='Avatar'>";
										}
										echo "
										<td>$files_pict</td>
                                        <td>".$role."</td>
                                        <td>".$useradmin['name']."</td>
                                        <td>".$useradmin['username']."</td>
                                        <td>
                                            <a href='".BaseURL()."/$namedata/reset/".$useradmin['id']."' class='btn btn-warning btn-xs'><i class='fa fa-key'></i> Reset </a>
                                            <a href='".BaseURL()."/$namedata/view/".$useradmin['id']."' class='btn btn-primary btn-xs'><i class='fa fa-folder'></i> View </a>
                                            <a href='".BaseURL()."/$namedata/edit/".$useradmin['id']."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a>
											<a href='".BaseURL()."/$namedata/delete/".$useradmin['id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Delete </a>
                                        </td>
                                    </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
					<?php
				}
				else{
					if($actions=="add"){
						include "form/add_$namedata.php";
					}
					elseif($actions=="edit"){
						include "form/edit_$namedata.php";
					}
					elseif($actions=="view"){
						include "form/view_$namedata.php";
					}
					elseif($actions=="delete"){
						include "form/delete_$namedata.php";
					}
					elseif($actions=="reset"){
						include "form/reset_$namedata.php";
					}
				}
				?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>