<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Alternatif 
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
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
        <form method="post" action="<?php echo $action ?>">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody> 
            
            <tr>
              <th width="10%" class="">Periode</th> 
              <th width="80%" colspan="2">
                <?php  
                  if($vTahun!=""){
                    ?>
                      <input type="text" class="form-control" name="vTahun" value="<?php echo $vTahun ?>" readonly required>
                    <?php
                  }else{
                    ?>
                    <select class="form-control" name="vTahun"> 
                      <?php 
                        for($per=2017;$per<2025;$per++){
                          $sld = "";
                          if($per==$vTahun){
                            $sld = " SELECTED ";
                          }
                          echo "<option ".$sld." value='".$per."'>".$per."</option>";
                        }
                      ?>
                    </select> 
                  <?php } ?>
              </th>  
            </tr>
            <tr>
              <th width="10%" class="">Nama Guru</th> 
              <th width="40%">
                <?php 
                  $rdn ="";
                  if($vNama_guru!=""){
                    $rdn = "disabled";
                  }
                ?>
                <input <?php echo $rdn ?> type="text" name="vNama_guru" value="<?php echo $vNama_guru ?>" class="form-control vNama_guru" required>
                <input type="hidden" name="imaster_guru" value="<?php echo $imaster_guru ?>" class="form-control imaster_guru" required>
                <input type="hidden" name="ialternativ" value="<?php echo $ialternativ ?>" class="">
              </th>  
              <th width="40" rowspan="2" class="center">
                <div class="tampilGambarnya">
                  <?php  
                  if(!empty($tpath) || $tpath!=""){ 
                  ?>
                  <img style="width: 50%; height: 50%" src="<?php echo base_url()?>assets/upload/guru/<?php echo $tpath?>">
                  <?php  
                    }
                  ?>
                </div>
              </th>
            </tr>

            <tr bgcolor=""><th></th></tr>

            <?php 
              foreach ($kriteria as $x) {  

                  $sqlNilai = "SELECT ad.imaster_subkriteria FROM alternativ_detail ad where ad.ialternativ = '".$ialternativ."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                  $nilai    = $this->db->query($sqlNilai)->row_array();
                  if(empty($nilai['imaster_subkriteria'])){
                    $nilai['imaster_subkriteria'] = "";
                  }

                ?>
                  <tr>
                    <th width="10%" class=""><?php echo $x['vNama_kriteria'] ?></th> 
                    <th width="80%" colspan="2">
                      <select required name="fnilai_awal[<?php echo $x['imaster_kriteria'] ?>]" class="form-control angka2">
                        <?php 
                          $sql = "SELECT * FROM master_subkriteria mkn WHERE mkn.imaster_kriteria = '".$x['imaster_kriteria']."'";
                          $op = $this->db->query($sql)->result_array();
                          echo '<option value="">----------------------------</option>';
                          foreach ($op as $op) {
                            $sel = "  ";
                            if($op['imaster_subkriteria']==$nilai['imaster_subkriteria']){
                              $sel = " SELECTED ";
                            }
                            echo '<option '.$sel.' value="'.$op['imaster_subkriteria'].','.$op['fnilai'].'">'.$op['vnama'].'</option>';
                          }
                        ?>
                        
                      </select> 
                    </th>  
                  </tr>
                <?php
              }
            ?> 
             
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Alternatif'?>" class="btn-lg btn-warning">Back</a>
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

  $('.vNama_guru').keyup(function(e) {  
    var config = {
        source: function(request, response) {
            $.getJSON("<?php echo base_url() ?>Alternatif/guru", { term: $('.vNama_guru').val()}, 
                      response);
        },                     
        select: function(event, ui){
            $('.imaster_guru').val(ui.item.id);
            $('.vNama_guru').val(ui.item.value);   
            getImage(ui.item.id);
            return false;                           
        },
        minLength: 2,
        autoFocus: true,
        };  
        $('.vNama_guru').autocomplete(config);   
        $(this).keypress(function(e){
        if(e.which != 13 ) {
              if(e.which != 9 ) {
               $('.imaster_guru').val('');
              }
          }           
        });
        $(this).blur(function(){
            if($('.imaster_guru').val() == '') {
                $(this).val('');
            }           
        });  
  });

  function getImage(id){
     var q = id;
     $.ajax({
       url: '<?php echo base_url()?>Alternatif/fotoguru',
       type: 'post',
       data: "q="+q, 
       success: function(response){
          $('.tampilGambarnya').html(response); 
       }
     });
  }
</script>