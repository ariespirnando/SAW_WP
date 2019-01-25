<html>
    <head>
        <style> 
            @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            footer {
                position: fixed; 
                bottom: -60px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 35px;
            }
        </style>
    </head>
    <body> 
         
        <main> 
                <b>LAPORAN "Sistem Pendukung Keputusan Beasiswa Kuliah Guru PERIODE <?php echo $tahun?>"</b><br><hr>
                <i class="ace-icon fa fa-angle-double-right"></i> <b>Matrik</b><hr>
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
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
                          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'</th>';
                        }
                      ?>  
                    </tr>
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
                                $sqlNilai = "SELECT ad.fnilai_awal FROM alternativ_detail ad 
                                  JOIN master_subkriteria ms on ms.imaster_subkriteria = ad.imaster_subkriteria where ad.ialternativ = '".$r['ialternativ']."' and ad.imaster_kriteria ='".$x['imaster_kriteria']."'";
                                $nilai    = $this->db->query($sqlNilai)->row_array();
                                if(empty($nilai['fnilai_awal'])){
                                  $nilai['fnilai_awal'] = '';
                                }
                                ?>
                                  <td class="center"><?php echo $nilai['fnilai_awal']?></td> 
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
                <i class="ace-icon fa fa-angle-double-right"></i> <b>Simple Additive Weighted</b><hr>

                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>
                    <?php  
                      $col = $result_num+2;
                      $wid = 100 / $col;
                    ?> 
                    <tr>
                      <th colspan="<?php echo $col ?>" style="text-align: left;vertical-align: middle;"><b>Normalisasi R</b></th>
                    </tr>
                    <tr>
                      <th width="2%" rowspan="2" class="center">No</th> 
                      <th width="<?php echo $wid ?>%" rowspan="2" class="center">Alternatif</th>
                      <th colspan="<?php echo $result_num ?>" style="text-align: center;vertical-align: middle;">Kriteria</th>
                    </tr>
                    <tr>
                      <?php 
                        foreach ($kriteria as $x) {
                          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].')</th>';
                        }
                      ?>  
                    </tr>
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
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>
                    <?php  
                      $col = $result_num+3;
                      $wid = 100 / $col;
                    ?> 
                    <tr>
                      <th colspan="<?php echo $col ?>" style="text-align: left;vertical-align: middle;"><b>Hasil Akhir SAW</b></th>
                    </tr>
                    <tr>
                      <th width="2%" rowspan="2" class="center">No</th> 
                      <th width="<?php echo $wid ?>%" rowspan="2" class="center">Alternatif</th>
                      <th colspan="<?php echo $result_num ?>" width="40%" widstyle="text-align: center;vertical-align: middle;">Kriteria</th>
                      <th rowspan="2" width="12%" widclass="center">Hasil</th>
                    </tr>
                    <tr>
                      <?php 
                        foreach ($kriteria as $x) {
                          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot'].'])</th>';
                        }
                      ?>  
                    </tr>
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
                <hr>
                <i class="ace-icon fa fa-angle-double-right"></i> <b>Weighted Produk</b><hr>  
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>     
                    <thead> 
                        <tr>
                          <th colspan="4" style="text-align: left;vertical-align: middle;"><b>Perbaikan Bobot Kriteria</b></th>
                        </tr>
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
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>
                    <?php  
                      $col = $result_num+3;
                      $wid = 100 / $col;
                    ?> 
                    <tr>
                      <th colspan="<?php echo $col ?>" style="text-align: left;vertical-align: middle;"><b>Vektor S</b></th>
                    </tr>
                    <tr>
                      <th width="2%" rowspan="2" class="center">No</th> 
                      <th width="20%" rowspan="2" class="center">Alternatif</th>
                      <th colspan="<?php echo $result_num ?>" width="60%" widstyle="text-align: center;vertical-align: middle;">Kriteria</th>
                      <th rowspan="2" width="12%" widclass="center">Vektor S</th>
                    </tr>
                    <tr>
                      <?php 
                        foreach ($kriteria as $x) {
                          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot_preferensi'].'])</th>';
                        }
                      ?>  
                    </tr>
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
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1" width="100%">
                  <thead>
                    <?php  
                      $col = $result_num+3;
                      $wid = 100 / $col;
                    ?> 
                    <tr>
                      <th colspan="<?php echo $col ?>" style="text-align: left;vertical-align: middle;"><b>Preferensi & Hasil Akhir</b></th>
                    </tr>
                    <tr>
                      <th width="2%" rowspan="2" class="center">No</th> 
                      <th width="20%" rowspan="2" class="center">Alternatif</th>
                      <th colspan="<?php echo $result_num ?>" width="60%" widstyle="text-align: center;vertical-align: middle;">Kriteria</th> 
                      <th rowspan="2" width="12%" widclass="center">Hasil Akhir</th>
                    </tr>
                    <tr>
                      <?php 
                        foreach ($kriteria as $x) {
                          echo '<th width="<?php echo $wid ?>%" class="center">'.$x['vNama_kriteria'].'<br>('.$x['vAtribut'].' ['.$x['fbobot_preferensi'].'])</th>';
                        }
                      ?>  
                    </tr>
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
                            <td class="center"><?php echo $r['fnilai_akhir_wp']?></td>
                          </tr>

                        <?php
                      }
                     ?>  
                  </tbody> 
                </table>
                <hr>

                <i class="ace-icon fa fa-angle-double-right"></i> <b>Pengabungan Algoritma</b>
                <hr>
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1"  width="100%">
                  <thead> 
                      <tr>
                        <th width="5%" class="center">No</th>  
                        <th width="50%" class="center">Nama Guru</th> 
                        <th width="15%" class="center">Nilai (SAW)</th> 
                        <th width="15%" class="center">Nilai (WP)</th>   
                        <th width="15%" class="center">Nilai Akhir</th>  
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                        $i = 1;
                        foreach ($result as $r) {
                          ?>
                            <tr>
                              <td width="5%"><?php echo $i++ ?></td> 
                              <td width="50%"><?php echo $r['vNama_guru']?></td> 
                              <td width="15%"><?php echo $r['fnilai_akhir_saw']?></td> 
                              <td width="15%"><?php echo $r['fnilai_akhir_wp']?></td> 
                              <td width="15%"><?php echo $r['fnilai_akhir']?></td>   
                            </tr>
                          <?php
                        }
                       ?>
                    </tbody> 
                </table>
                <hr>
                <i class="ace-icon fa fa-angle-double-right"></i> <b>Peringkat</b>
                <hr>
                <table style="page-break-inside:avoid;width: 100%; padding: 0px; border-collapse: collapse;" border="1"  width="100%">
                <thead> 
                  <tr>
                    <th width="5%" class="center">No</th>  
                    <th width="70%" class="center">Nama Guru</th> 
                    <th width="25%" class="center">Nilai</th>    
                  </tr>
                </thead>
                <tbody>
                   <?php
                    $i = 1;
                    foreach ($resultx as $r) {
                      ?>
                        <tr>
                          <td width="2%"><?php echo $i++ ?></td> 
                          <td width="40%"><?php echo $r['vNama_guru']?></td> 
                          <td width="10%"><?php echo $r['fnilai_akhir']?></td>   
                        </tr>
                      <?php
                    }
                   ?>
                </tbody>
                </table>  
        </main>
    </body>
</html>