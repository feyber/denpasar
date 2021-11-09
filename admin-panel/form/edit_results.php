<?php
    $iddata = $_GET['iddata'];
    $setquerytop = mysqli_query($conn, "select * from db_winningresults where id='$iddata'");
    $querytop = mysqli_fetch_array($setquerytop);
?>

<div class="container-form">
    <div class="after_submit col-md-12" style="height:51.1167px;border:1px solid #FFF;margin-bottom:20px;"></div>
    <div style="margin-bottom:20px;"></div>
    <form action="" method="post" class="on_submit form-horizontal form-label-left row">
        <input type="hidden" name="iddata" value="<?= $iddata ?>">
        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
            <label for="1st-prize">1st PRIZE <span class="text-danger">*</span> :</label>
            <input type="text" id="1st-prize" class="form-control" name="Prize1st" required="required" placeholder="Masukan Hanya Angka, Contoh : 1234" maxlength="4" value="<?= $querytop['1stPrize'] ?>">
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label for="2nd-prize">2nd PRIZE <span class="text-danger">*</span> :</label>
            <input type="text" id="2nd-prize" class="form-control" name="Prize2nd" required="required" placeholder="Masukan Hanya Angka, Contoh : 1234" maxlength="4" value="<?= $querytop['2ndPrize'] ?>">
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label for="3rd-prize">3rd PRIZE <span class="text-danger">*</span> :</label>
            <input type="text" id="3rd-prize" class="form-control" name="Prize3rd" required="required" placeholder="Masukan Hanya Angka, Contoh : 1234" maxlength="4" value="<?= $querytop['3rdPrize'] ?>">
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label for="starter">Starter <span class="text-danger">*</span> :</label>
            <input type="text" id="starter" class="form-control" name="starter" required="required" placeholder="Masukan Hanya Angka, Contoh : 1234" maxlength="4" value="<?= $querytop['starter'] ?>">
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
            <label for="consolation">Consolation <span class="text-danger">*</span> :</label>
            <input type="text" id="consolation" class="form-control" name="consolation" required="required" placeholder="Masukan Hanya Angka, Contoh : 1234" maxlength="4" value="<?= $querytop['consolation'] ?>">
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback mt-20">
            <input type="button" class="btn btn-primary" value="Simpan" onClick="onsubmitdata();" /> 
            <input type="button" class="btn btn-default" value="Batal" onClick="document.location='<?php echo BaseURL() ?>/results';" />
        </div>
    </form>
</div>
<script>
    function onsubmitdata(){
        $.post("<?php echo BaseURL() ?>/form/process_edit_results.php",$(".on_submit").serialize(),function(data){
            $(".after_submit").html(data);
        });
    }
</script>