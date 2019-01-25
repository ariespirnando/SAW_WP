<div class="page-content" style="">
	<div class="row" >
		<br>
		<br>
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
			<br>
			<div class="clearfix">
        	<div class="page-header pull-right"> 
				</div>
				<div class="pull-right"> </div>
			</div>
			
			<?php
			    if($this->session->userdata('message') <> ''){
			        echo '<div class="alert alert-info">
					            <button class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											'.$this->session->userdata('message').'
			        			</div>';
			    }
			?>
				
			<div>
				<div class="widget-box">  
				 <div class="widget-body">
					 <div class="widget-main no-padding">
						 <form action="<?php echo $action ?>" method="post">
							 <fieldset> 
					<h4>Sistem Pendukung Keputusan</h4>
					<br>
							 	<table class="table table-striped table-bordered " width="90%"> 
							 		<tbody> 
							 			<tr>
							 				<td width="20%">Akses</td>
							 				<td width="70%">
							 					<select class="form-control" name="akses">
							 						<option value="1">Guru</option>
							 						<option value="2">Admin</option>
							 					</select> 
							 			</tr>
							 			<tr>
							 				<td width="20%">Username</td>
							 				<td width="70%"><input class="form-control" type="text" name="user" value=""></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">Password</td>
							 				<td width="70%"><input class="form-control" type="password" name="pass" value=""></td> 
							 			</tr> 
							 		</tbody>
							 	</table>
								
								 <br><br>
								 <button type="submit" class="btn-lg btn-success">
									 Login
								 </button> 
								 <a href="<?php echo base_url().''?>" class="btn-lg btn-warning">Kembali</a>
								 <br>
							 </fieldset>
						 </form>
					 </div>
				 </div>
			 </div>
        <br>

			</div> 
		</div><!-- /.col -->

		<div class="col-xs-4">

		</div>

		<div class="col-xs-12"> 
			<br><br><br><br><br><br><br>
		</div>
 
	</div><!-- /.row -->
</div>
