<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Kriteria - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <form method="post" action="<?php echo $action ?>">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody>
            <tr>
              <th width="10%" class="center">Kode Kriteria</th> 
              <th width="80%"> 
                <input type="hidden" name="cKode" value="<?php echo $cKode ?>">
                <?php 
                  if($cKode!=""){
                    echo $cKode;
                  }else{
                    echo 'Auto Generated !!';
                  }
                ?>
              </th>  
            </tr>
            <tr>
              <th width="10%" class="center">Nama Kriteria</th> 
              <th width="80%">
                <input type="text" name="vNama_kriteria" value="<?php echo $vNama_kriteria ?>" class="form-control" required>
                <input type="hidden" name="imaster_kriteria" value="<?php echo $imaster_kriteria ?>" class="">
              </th>  
            </tr>
            <tr>
              <th width="10%" class="center">Atribut</th> 
              <th width="80%"> 
                <?php 
                  $atribut = array('Benefit','Cost');
                ?>
                <select name="vAtribut" class="form-control vAtribut" required=""> 
                  <?php
                    foreach ($atribut as $val) {
                      $sel = '';
                      if($val==$vAtribut){
                        $sel = ' selected ';
                      }
                      echo '<option '.$sel.' value="'.$val.'">'.$val.'</option>';
                    }
                  ?> 
                </select>
              </th>  
            </tr>

            <tr>
              <th width="10%" class="center">Bobot</th> 
              <th width="80%">
                <input type="text" name="fbobot" value="<?php echo $fbobot ?>" class="angka2 form-control" required> 
              </th>  
            </tr>

            
           
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Kriteria'?>" class="btn-lg btn-warning">Back</a>
              </th>  
            </tr>
          </tbody>
        </table>
        </form>
        <br>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
 

<script type="text/javascript"> 
  $(".angka2").keyup(function(){
    this.value = this.value.replace(/[^0-9\.]/g,"");
  })
</script>