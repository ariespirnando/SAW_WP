<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>Alternatif
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table dataTables table-striped table-bordered table-hover" width="100%">
          <thead>
            <?php  
              $col = $result_num+5;
              $wid = 100 / $col;
            ?> 
            <tr>
              <th width="2%" class="center">No</th>
              <th width="10%" class="center">Foto</th> 
              <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
              <th width="<?php echo $wid ?>%" class="center">Periode</th>
              <?php 
                foreach ($kriteria as $x) {
                  echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
                }
              ?> 
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
                    <td><?php echo $i++ ?></td>
                    <td>
                      <?php  
                          if(!empty($r['tpath']) || $r['tpath']!=""){ 
                        ?>
                        <img src="<?php echo base_url()?>assets/upload/guru/<?php echo $r['tpath']?>">
                        <?php  
                          }
                        ?>
                    </td>
                    <td><?php echo ''.$r['vNama_guru'].''; ?></td> 
                    <td><?php echo ''.$r['vTahun'].''; ?></td>   
                    <?php 
                      foreach ($kriteria as $x) {
                        $sqlNilai = "SELECT ms.vnama FROM alternativ_detail ad 
JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                        $nilai    = $this->db->query($sqlNilai)->row_array();
                        if(empty($nilai['vnama'])){
                          $nilai['vnama'] = '';
                        }
                        ?>
                          <td class="center"><?php echo $nilai['vnama']?></td> 
                        <?php
                      }
                    ?>
                    <td><a href="<?php echo base_url().'Alternatif/edit/'.$r['ialternativ']?>">Edit</a></td> 
                    <td><a href="<?php echo base_url().'Alternatif/hapus/'.$r['ialternativ']?>">Hapus</a></td> 
                  </tr>
                <?php
              }
             ?>  
          </tbody>
          <tfoot>
             <?php  
              $col = $result_num+4;
              $wid = 100 / $col;
            ?>
            <tr>
              <td colspan="<?php echo $col+1 ?>" ">
                <a href="<?php echo base_url().'Alternatif/Add'?>" class="btn-lg btn-primary"> Add Alternatif</a>
                <span class="btn-lg btn-warning" onclick="clearData()">Clear Data</span>  
              </td>  
               
            </tr> 
          </tfoot>
        </table>
        <br>
        <div class="data_normalisasi"></div>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<script type="text/javascript">
  function clearData(){
     $.confirm({

        title: 'Clear Data - Pilih Periode',
        content: '' +
        '<form action="" class="formName">' +
        '<div class="form-group">' +
        '<label></label>' +
        '<select class="periode form-control" required >'+
        <?php     
        $opt ="";
        for($per=2017;$per<2025;$per++){ 
          $nil = '"'.$per.'"';
          echo "'<option value=".$per.">'+";
          echo "'".$per."'+";
          echo "'</option>'+";

        }
        ?>
        '</select>' +
            '</div>' +
            '</form>',
            type: 'red',
            typeAnimated: true,
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        var periode = this.$content.find('.periode').val(); 
                        $.ajax({
                           url: '<?php echo base_url()?>Alternatif/cleardata/'+periode,  
                           async: false,
                           success: function(response){ 
                            window.location.href = "<?php echo base_url()?>Alternatif";
                           }
                         }); 
                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () { 
                var jc = this;
                this.$content.find('form').on('submit', function (e) { 
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click');
                });
            } 
    });
  } 
</script>
