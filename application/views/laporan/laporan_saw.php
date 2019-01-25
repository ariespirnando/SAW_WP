<i class="ace-icon fa fa-angle-double-right"></i> <b>Normalisasi R</b>
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
        </tr>
        <tr>
          <?php 
            foreach ($kriteria as $x) {
              echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot'].'])</th>';
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
                $sqlNilai = "SELECT ad.fnilai_normal_saw FROM alternativ_detail ad 
                  JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_normal_saw'])){
                  $nilai['fnilai_normal_saw'] = '';
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_normal_saw']?></td> 
                <?php
              }
            ?> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
  
</table>

<hr>
<i class="ace-icon fa fa-angle-double-right"></i> <b>Hasil Akhir SAW</b>
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
          <th rowspan="2" class="center">Hasil</th>
        </tr>
        <tr>
          <?php 
            foreach ($kriteria as $x) {
              echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot'].'])</th>';
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
                $sqlNilai = "SELECT ad.fnilai_bobot_saw FROM alternativ_detail ad 
                  JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                $nilai    = $this->db->query($sqlNilai)->row_array();
                if(empty($nilai['fnilai_bobot_saw'])){
                  $nilai['fnilai_bobot_saw'] = '';
                }
                ?>
                  <td class="center"><?php echo $nilai['fnilai_bobot_saw']?></td> 
                <?php
              }
            ?> 
            <td class="center"><?php echo $r['fnilai_akhir_saw']?></td> 
          </tr>
        <?php
      }
     ?>  
  </tbody>
  
</table>