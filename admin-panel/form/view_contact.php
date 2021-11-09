<?php
    $iddata = $_GET['iddata'];
    $setquerytop = mysqli_query($conn, "select * from db_contact where id='".$iddata."'");
    $querytop = mysqli_fetch_array($setquerytop);

    $update = mysqli_query($conn, "update db_contact set status='1' where id='".$iddata."'")
?>

<div style="width:40%;margin:0 auto;">
    <p>Name : <strong><?= $querytop['name'] ?></strong></p>
    <p>Email : <strong><?= $querytop['email'] ?></strong></p>
    <p>Subject : <strong><?= $querytop['subject'] ?></strong></p>
    <p>Message :</p>
    <p><strong><?= $querytop['message'] ?></strong></p>
    <br />
    <a class="btn btn-warning" href="<?php echo BaseURL() ?>/contact"><i class="fa fa-arrow-left m-right-xs"></i> Back</a>
</div>