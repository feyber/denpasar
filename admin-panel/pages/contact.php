<?php
$actions = "";
$namedata = $menu;

if(isset($_GET['actions'])){
    $actions = $_GET['actions'];
}
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
            	<?php
                if(!$actions){
					echo '<h2>Contact Message</h2>';
				}
				else{
					if($actions=="view"){
						echo '<h2>View Contact Message</h2>';
					}
					elseif($actions=="delete"){
						echo '<h2>Delete Contact Message</h2>';
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
                    <table class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Tanggal</th>
                                <th width="20%">Pengaturan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = "";
                            $setquerytop = mysqli_query($conn, "select * from db_contact order by id desc");
                            while($querytop = mysqli_fetch_array($setquerytop)){

                                $x++;
                                echo "
                                    <tr>
                                        <th scope='row'>$x</th>
										<td>".$querytop['name']."</td>
                                        <td>".$querytop['email']."</td>
                                        <td>".$querytop['subject']."</td>
                                        <td>".convertdate($querytop['date_insert'])."</td>
                                        <td>
                                            <a href='".BaseURL()."/$namedata/view/".$querytop['id']."' class='btn btn-info btn-xs'><i class='fa fa-eye'></i> View </a>
											<a href='".BaseURL()."/$namedata/delete/".$querytop['id']."' class='btn btn-danger btn-xs'><i class='fa fa-trash-o'></i> Hapus </a>
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
					if($actions=="view"){
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