<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Kriteria - List Data
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
              <th width="5%" class="center">Kode Kriteria</th> 
              <th width="40%" class="center">Nama Kriteria</th> 
              <th width="10%" class="center">Atribut</th> 
              <th width="10%" class="center">Bobot</th>  
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
                    <td width="5%"><?php echo $r['cKode']?></td> 
                    <td width="40%"><?php echo $r['vNama_kriteria']?></td> 
                    <td width="10%"><?php echo $r['vAtribut']?></td>
                    <td width="10%"><?php echo $r['fbobot']?></td>  
                    <td width="5%"><a href="<?php echo base_url().'Kriteria/edit/'.$r['imaster_kriteria']?>">Edit</a></td> 
                    <td width="5%"><a href="<?php echo base_url().'Kriteria/hapus/'.$r['imaster_kriteria']?>">Hapus</a></td> 
             			</tr>
             		<?php
             	}
             ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6" "><a href="<?php echo base_url().'Kriteria/Add'?>" class="btn-lg btn-primary"> Add </a></td>  
            </tr>
          </tfoot>
        </table>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
