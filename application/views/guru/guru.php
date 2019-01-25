<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Guru - List Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
         <table class="dataTables table table-striped table-bordered table-hover" width="100%">
          <thead> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="10%" class="center">Foto</th> 
              <th width="5%" class="center">NIK</th> 
              <th width="68%" class="center">Nama Guru</th>   
              <th width="5%" class="center">Jenis Kelamin</th> 
              <th width="10%" class="center">Mata Pelajaran</th> 
              <th width="5%" class="center">Edit</th> 
              <th width="5%" class="center">Hapus</th>  
            </tr>
          </thead>
          <tbody>
             <?php
              $i = 1;
             	foreach ($result as $r) { 
             		?>
           			<tr>
           				<td width="2%"><?php echo $i++ ?></td> 
                  <td width="10%"> 
                    <?php 

                      if(!empty($r['tpath']) || $r['tpath']!=""){ 
                    ?>
                    <img src="<?php echo base_url()?>assets/upload/guru/<?php echo $r['tpath']?>">
                    <?php  
                      }
                    ?>

                  </td>
                  <td width="5%"><?php echo $r['vNik']?></td>
                  <td width="88%"><?php echo $r['vNama_guru']?></td> 
                  <td width="5%"><?php echo $r['vJk']?></td>
                  <td width="10%"><?php echo $r['vNmapelajaran']?></td>
                  <td width="5%"><a href="<?php echo base_url().'Guru/edit/'.$r['imaster_guru']?>">Edit</a></td> 
                  <td width="5%"><a href="<?php echo base_url().'Guru/hapus/'.$r['imaster_guru']?>">Hapus</a></td> 
           			</tr>
             		<?php 
              }
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4"><a href="<?php echo base_url().'Guru/Add'?>" class="btn-lg btn-primary"> Add </a></td>  
            </tr>
          </tfoot>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
