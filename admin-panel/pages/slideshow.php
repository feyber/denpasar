<?php
$actions = "";

$namedata = $menu;

if(isset($_GET['actions'])){
    $actions = $_GET['actions'];
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>Slideshow</h3>
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
					echo '<h2>Slideshow</h2>';
				}
				else{
					if($actions=="add"){
						echo '<h2>Add Slideshow</h2>';
					}
					elseif($actions=="edit"){
						echo '<h2>Edit Slideshow</h2>';
					}
					elseif($actions=="view"){
						echo '<h2>View Slideshow</h2>';
					}
					elseif($actions=="delete"){
						echo '<h2>Delete Slideshow</h2>';
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
                                <th>Title</th>
                                <th width="20%">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = "";
                            $setquerytop=mysqli_query($conn, "select * from e_slideshow order by id desc");
                            while($querytop=mysqli_fetch_array($setquerytop)){
                                $x++;
                                echo "
                                    <tr>
                                        <th scope='row'>$x</th>
										";
										if(!empty($querytop['pict'])){
											$files_pict="<a href='".BaseURL()."/files/slideshow/".$querytop['pict']."' target='_blank'><img src='".BaseURL()."/files/slideshow/".$querytop['pict']."' class='avatar' alt='Avatar'></a>";
										}
										else{
											$files_pict="<img src='".BaseURL()."/images/no-image.png' class='avatar' alt='Avatar'>";
										}
										echo "
										<td>$files_pict</td>
                                        <td>".$querytop['title']."</td>
                                        <td>
                                            <a href='".BaseURL()."/$namedata/view/".$querytop['id']."' class='btn btn-primary btn-xs'><i class='fa fa-folder'></i> View </a>
                                            <a href='".BaseURL()."/$namedata/edit/".$querytop['id']."' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a>
											<a href='".BaseURL()."/$namedata/delete/".$querytop['id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Delete </a>
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
				}
				?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>