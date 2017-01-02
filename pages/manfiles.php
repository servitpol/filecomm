<?php
$iduser = $_SESSION['iduser'];
if($iduser == NULL) {
echo '<script>document.location="../index.php"</script>';
exit;
}
include_once('core/connect.php');
include_once('core/function.php');
?>
<script src="js/wysiwyg.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						
<div class="content">

<div class="butfile col-lg-12">
	<div id="myModalEdit" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
				<h2 class="modal-title">Update</h2>
				</div>
				<div class="modal-body">
				
				<form method="POST" id="myModalForm">

				<div class="input-group">
				<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" id="updtitle" name="updtitle" class="form-control" placeholder="title" autofocus />
				</div>

				<textarea name="upddescr" style="width: 500%;"></textarea>
				<button type="submit" id="updfile" name="updfile" class="btn btn-default">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal">Upload file</button>
	<div id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"><button class="close" type="button" data-dismiss="modal">×</button>
				<h2 class="modal-title">Add file</h2>
				</div>
				<div class="modal-body">
				Файлы можно загружать размером до 200 Mb.</br>
				Ограничения по типам файлов: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip
				<form method="POST" enctype="multipart/form-data">
				<div class="file form-group">
				<input type="hidden" name="MAX_FILE_SIZE" value="200000000">
				<input type="file" name="fn" required /> 
				</div>

				<div class="input-group">
				<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
				<input type="text" id="titlef" name="titlef" class="form-control" placeholder="title" autofocus />
				</div>

				<textarea name="descriptf" style="width: 500%;" >Description</textarea>
				<button class="modsumbit btn btn-default" type="submit" name="upfile">Submit</button>
				</div>
				</form>
			</div>
		</div>
	</div>

</div>
<div class="col-lg-12">
	<table id="users-data" class="display">
		<thead>
		<tr>
		<th>#</th>
		<th>Title</th>
		<th>Extention</th>
		<th>Size</th>
		<th>Upload time</th>
		<th>Downloaded</th>
		<th>Description</th>
		<th>Actions</th>
		
		</tr>
		</thead>
	</table>
	</div>
<script src="js/descr.js" type="text/javascript"></script>
<?php include_once('includes/upload.php'); ?>

</div>