<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Profil
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Guru
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>

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

			</div>
			<div>
        <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody>
              
            <tr>
              <th width="10%" >Nama Guru</th> 
              <th width="80%">
                <input type="text" name="vNama_guru" value="<?php echo $vNama_guru ?>" class="form-control" required> 
                <input type="hidden" name="imaster_guru" value="<?php echo $imaster_guru ?>" class="">
              </th>  
            </tr>

            <tr>
              <th width="10%" >NIK</th> 
              <th width="80%">
                <input type="text" name="vNik" value="<?php echo $vNik ?>" class="form-control" required>  
              </th>  
            </tr>

            <tr>
              <th width="10%" >Jabatan</th> 
              <th width="80%">
                <input type="text" name="vJabatan" value="<?php echo $vJabatan ?>" class="form-control" required>  
              </th>  
            </tr>

            <tr>
              <th width="10%" >Jenis Kelamin</th> 
              <th width="80%">
                <?php 
                  $jk = array(''=>'............','L'=>'Laki-laki','P'=>'Perempuan');
                ?>
                <select name="vJk" class="form-control">
                  <?php
                    foreach ($jk as $j => $v) {
                      $se = "";
                      if($j==$vJk){
                        $se =" SELECTED ";
                      }
                      ?>
                        <option <?php echo $se ?> value="<?php echo $j ?>"><?php echo $v ?></option>
                      <?php   
                    } 
                  ?>
                </select> 
              </th>  
            </tr>

            <tr>
              <th width="10%" >Alamat</th> 
              <th width="80%">
                <textarea class="form-control" name="talamat"><?php echo $talamat ?></textarea> 
                </select> 
              </th>  
            </tr>

            <tr>
              <th width="10%" >Tempat Lahir</th> 
              <th width="80%">
                <input type="text" name="vBirthday" value="<?php echo $vBirthday ?>" class="form-control" required>  
              </th>  
            </tr>

            <tr>
              <th width="10%" >Tanggal Lahir</th> 
              <th width="80%">
                <input type="date" name="dBirthday" value="<?php echo $dBirthday ?>" class="form-control" required>  
              </th>  
            </tr>
            <tr>
              <th width="10%" >Foto</th> 
              <th width="80%">
                <?php  
                  if(!empty($tpath) || $tpath!=""){ 
                ?>
                <img style="width: 50%; height: 50%" src="<?php echo base_url()?>assets/upload/guru/<?php echo $tpath?>">
                <?php  
                  }
                ?>
                <br><br>
                <input type="file" name="gambar" value="" class="form-control">  
              </th>  
            </tr>
            <tr>
              <th width="10%" >Mata Pelajaran</th> 
              <th width="80%">
                <input type="text" name="vNmapelajaran" value="<?php echo $vNmapelajaran ?>" class="form-control" required>  
              </th>  
            </tr>
             
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().''?>" class="btn-lg btn-warning">Back</a>
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