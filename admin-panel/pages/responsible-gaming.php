<?php
    $setquerytop = mysqli_query($conn, "select * from db_responsible");
    $querytop = mysqli_fetch_array($setquerytop);
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel" style="min-height:600px;">
            <div class="x_title">
				<h2>Responsible Gaming</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link" style="cursor:pointer;"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="after_submit" style="width:337px;height:51.1167px;border:1px solid #FFF;margin-left:10px;margin-bottom:20px;"></div>
                <div style="margin-bottom:20px;"></div>
                <form action="" method="post" class="on_submit form-horizontal form-label-left">
                    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa icon-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu"></ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a data-edit="fontSize 5">
                                        <p style="font-size: 17px;">Huge</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 3">
                                        <p style="font-size: 14px;">Normal</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 1">
                                        <p style="font-size: 11px;">Small</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
                            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a>
                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a>
                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a>
                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
                        </div>
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                            </div>
                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>
                        <div class="btn-group">
                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
                        </div>
                    </div>
                    <div id="editor">
                        <?= $querytop['responsible'] ?>
                    </div>
                    <textarea name="responsible" id="responsible" style="display:none;"></textarea>
                    <br />
                    <div >
                        <input type="button" class="btn btn-primary" value="Confirm" onClick="onsubmitdata();" /> 
                        <input type="button" class="btn btn-default" value="Cancel" onClick="document.location='<?php echo BaseURL() ?>/category';" />
                    </div>
                </form>
                <script>
                    function onsubmitdata(){
                        $('#responsible').val($('#editor').html());
                        $.post("<?php echo BaseURL() ?>/form/process_responsible.php",$(".on_submit").serialize(),function(data){
                            $(".after_submit").html(data);
                        });
                    }
                </script>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>