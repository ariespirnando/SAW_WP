<i class="ace-icon fa fa-angle-double-right"></i> <b>Perbaikan Bobot Kriteria</b>
<hr>
<table class="table table-striped table-bordered table-hover" width="100%">
  <thead>     
    <thead> 
        <tr>
          <th width="2%"  class="center">No</th> 
          <th width="20%"  class="center">Kriteria</th>
          <th width="20%"  class="center">Bobot Awal</th>
          <th width="20%"  class="center">Perbaikan Bobot</th>           
        </tr>
    </thead>
    <tbody>
    	 <?php 
    	 	$i = 1;
            foreach ($kriteria as $x) {
            	echo '<tr>';
            	echo '<td>'.$i++.'</td>';
            	echo '<td>'.$x['vNama_kriteria'].'</td>';
            	echo '<td>'.$x['fbobot'].'</td>';
            	echo '<td>'.$x['fbobot_preferensi'].'</td>'; 
            	echo '</tr>';
            }
          ?> 
    </tbody>
</table>
<hr>
<i class="ace-icon fa fa-angle-double-right"></i> <b>Vektor S</b>
<hr>
<table class="table table-striped table-bordered table-hover" width="100%">
  <thead>
    <?php  
      $col = $result_num+4;
      $wid = 100 / $col;
    ?> 
    <thead>
        <?php  
          $col = $result_num+4;
          $wid = 100 / $col;
        ?> 
        <tr>
          <th width="2%" rowspan="2" class="center">No</th> 
          <th width="<?php echo $wid ?>%" rowspan="2" class="center">Alternatif</th>
          <th colspan="<?php echo $result_num ?>" style="text-align: center;vertical-align: middle;">Kriteria</th>
          <th rowspan="2" class="center">Vektor S</th>
        </tr>
        <tr>
          <?php 
            foreach ($kriteria as $x) {
              echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot_preferensi'].'])</th>';
            }
          ?>  
        </tr>
      </thead> 
  </thead> 
  <tbody>
    <?php
      $i = 1;
      foreach ($result as $r) {
        ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo ''.$r['vNama_guru'].''; ?></td>   
            <?php 
              foreach ($kriteria as $x) {
                $sqlNilai = "SELECT ad.fnilai_s_wp FROM alternativ_detail ad 
                  JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_s_wp'])){
                  $nilai['fnilai_s_wp'] = '';
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_s_wp']?></td> 
                <?php
              }
            ?> 
            <td class="center"><?php echo $r['fnilai_akhir_s_wp']?></td> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
  
</table>

<hr>
<i class="ace-icon fa fa-angle-double-right"></i> <b>Preferensi & Hasil Akhir</b>
<hr>
<table class="table table-striped table-bordered table-hover" width="100%">
  <thead>
    <?php  
      $col = $result_num+4;
      $wid = 100 / $col;
    ?> 
    <thead>
        <?php  
          $col = $result_num+4;
          $wid = 100 / $col;
        ?> 
        <tr>
          <th width="2%" rowspan="2" class="center">No</th> 
          <th width="<?php echo $wid ?>%" rowspan="2" class="center">Alternatif</th>
          <th colspan="<?php echo $result_num ?>" style="text-align: center;vertical-align: middle;">Kriteria</th>
          <th rowspan="2" class="center">Vektor S</th>
          <th rowspan="2" class="center">PrefrensiS</th>
        </tr>
        <tr>
          <?php 
            foreach ($kriteria as $x) {
              echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot_preferensi'].'])</th>';
            }
          ?>  
        </tr>
      </thead> 
  </thead> 
  <tbody>
    <?php
      $i = 1;
      foreach ($result as $r) {
        ?>
          <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo ''.$r['vNama_guru'].''; ?></td>   
            <?php 
              foreach ($kriteria as $x) {
                $sqlNilai = "SELECT ad.fnilai_s_wp FROM alternativ_detail ad 
                  JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_s_wp'])){
                  $nilai['fnilai_s_wp'] = '';
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_s_wp']?></td> 
                <?php
              }
            ?> 
            <td class="center"><?php echo $r['fnilai_akhir_s_wp']?></td> 
            <td class="center"><?php echo $r['fnilai_akhir_wp']?></td> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
  
</table>