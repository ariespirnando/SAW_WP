<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>My Peringkat
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <table class="table dataTables table-striped table-bordered table-hover" width="100%">
          <thead>
            <?php  
              $col = $result_num+4;
              $wid = 100 / $col;
            ?> 
            <tr>
              <th width="2%" class="center">No</th> 
              <th width="<?php echo $wid ?>%" class="center">Alternatif</th>
              <th width="<?php echo $wid ?>%" class="center">Periode</th>
              <th width="5%" class="center">Peringkat</th> 
              <?php 
                foreach ($kriteria as $x) {
                  echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
                }
              ?>  
            </tr>
          </thead> 
          <tbody>
            <?php
            if($tampil==1){
              $i = 1;
              foreach ($result as $r) {
                if(!empty($r['iPeringkat']) && $r['iPeringkat']<>0){
                ?>
                  <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo ''.$r['vNama_guru'].''; ?></td> 
                    <td><?php echo ''.$r['vTahun'].''; ?></td>  
                    <td bgcolor="#FFFF00" ><?php echo ''.$r['iPeringkat'].''; ?></td>   
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
                  </tr>
                <?php
               }
              }
            }
             ?>  
          </tbody> 
        </table>
        <br>
        <div class="data_normalisasi"></div>
			</div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<?php 
if($tampil==0){
  ?>
     <script type="text/javascript">
         $.confirm({
              title: 'Warning',
              content: 'Anda Belum Menjadi Alternatif</b>',
              type: 'red',
              typeAnimated: true,
              buttons: {
                  formSubmit: {
                      text: 'Ya',
                      btnClass: 'btn-blue',
                      action: function () { 
                              window.location.href = "<?php echo base_url()?>"; 
                      }
                  }, 
              }, 
          });
      </script> 
  <?php
}
?>
