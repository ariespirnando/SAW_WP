<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        	<div class="page-header">
					<h1>
						Profil  
					</h1>
					
				</div>
				<div class="pull-right"></div>
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
						 <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
							 <fieldset>
							 	<table class="table table-striped table-bordered table-hover" width="90%"> 
							 		<tbody>
							 			<tr>
							 				<td width="20%">Nama Lengkap</td>
							 				<td width="70%"><input class="form-control" type="text" name="nama_user" value="<?php echo $row['nama_user'] ?>">
							 					<input class="form-control" type="hidden" name="id_user" value="<?php echo $row['id_user'] ?>"></td> 
							 			</tr> 
							 			<tr>
							 				<td width="20%">Alamat</td>
							 				<td width="70%"><input class="form-control" type="text" name="alamat" value="<?php echo $row['alamat'] ?>"></td> 
							 			</tr>
							 			<tr>
							 				<td width="20%">HP</td>
							 				<td width="70%"><input class="form-control" type="text" name="telpon" value="<?php echo $row['telpon'] ?>"></td> 
							 			</tr> 

							 			<tr>
							              <th width="10%" >Foto</th> 
							              <th width="70%">
							              	<?php  
					                          if(!empty($row['tpath']) || $row['tpath']!=""){ 
					                        ?>
					                        <img style="width: 50%; height: 50%" src="<?php echo base_url()?>assets/upload/admin/<?php echo $row['tpath']?>">
					                        <?php  
					                          }
					                        ?>
					                        <br><br>
							                <input type="file" name="gambar" value="" class="form-control" > 
							              </th>  
							            </tr>
							 		</tbody>
							 	</table>
								
								 <br>
								 <button type="submit" class="btn-lg btn-success">
									 Ubah
								 </button> 
								 <a href="<?php echo base_url().''?>" class="btn-lg btn-warning">Back</a>
								 <br>
							 </fieldset>
						 </form>
					 </div>
				 </div>
			 </div>
        <br>

			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
