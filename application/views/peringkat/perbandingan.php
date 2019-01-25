<div class="col-xs-6">
  <i class="ace-icon fa fa-angle-double-right"></i>  <b>Nilai SAW</b><hr>
  <table class="table table-striped table-bordered table-hover" width="100%">
    <thead> 
      <tr bgcolor="yellowgreen">
        <th width="2%" class="center">No</th>  
        <th width="40%" class="center">Nama Guru</th> 
        <th width="10%" class="center">Nilai (SAW)</th>  
      </tr>
    </thead>
    <tbody>
       <?php
        $i = 1;
        foreach ($result_saw as $r) {
          ?>
            <tr>
              <td width="2%"><?php echo $i++ ?></td> 
              <td width="40%"><?php echo $r['vNama_guru']?></td> 
              <td width="10%"><?php echo $r['fnilai_akhir_saw']?></td>   
            </tr>
          <?php
        }
       ?>
    </tbody>
  </table>
  <br>
</div>
<div class="col-xs-6">
  <i class="ace-icon fa fa-angle-double-right"></i>  <b>Nilai WP</b><hr>
  <table class="table table-striped table-bordered table-hover" width="100%">
    <thead> 
      <tr>
        <th width="2%" class="center">No</th>  
        <th width="40%" class="center">Nama Guru</th>  
        <th width="10%" class="center">Nilai (WP)</th>    
      </tr>
    </thead>
    <tbody>
       <?php
        $i = 1;
        foreach ($result_wp as $r) {
          ?>
            <tr>
              <td width="2%"><?php echo $i++ ?></td> 
              <td width="40%"><?php echo $r['vNama_guru']?></td>  
              <td width="10%"><?php echo $r['fnilai_akhir_wp']?></td>  
            </tr>
          <?php
        }
       ?>
    </tbody>
  </table>
  <br>
</div>
<hr>
<br> 
<br><hr>
<i class="ace-icon fa fa-angle-double-right"></i>  <b>Penjumlahan Nilai</b><hr>
<table class="table table-striped table-bordered table-hover" width="100%">
  <thead> 
    <tr>
      <th width="2%" class="center">No</th>  
      <th width="40%" class="center">Nama Guru</th>   
      <th width="10%" class="center">Nilai Akhir</th>  
    </tr>
  </thead>
  <tbody>
     <?php
      $i = 1;
      foreach ($result as $r) {
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
<br>
<script type="text/javascript">  
    $(function () {
    // Create the chart
        $('.graph_data').highcharts({
          chart: {
              type: 'column'
          },
          title: {
              text: 'Perbandingan Waktu'
          },
          subtitle: {
              text: 'Time execution'
          },
          xAxis: {
              categories: ['Metode']
          },
          yAxis: {
            title: {
              text: '(ms)'
            }
          },
          legend: {
              enabled: true
          },
          series:            
                [ 
                      {
                          name: 'SAW',
                          data: [<?php echo $time_saw ?>]
                      },
                      {
                          name: 'WP',
                          data: [<?php echo $time_wp ?>]
                      },
                       
                ]
          }); 
      });

 
</script> 
<hr>
<i class="ace-icon fa fa-angle-double-right"></i>  <b>Perbandingan Waktu</b><hr>
<div class="graph_data" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 