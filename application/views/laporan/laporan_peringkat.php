<i class="ace-icon fa fa-angle-double-right"></i> <b>Peringkat</b>
<hr>
<table class="table table-striped table-bordered table-hover" width="100%">
<thead> 
  <tr>
    <th width="2%" class="center">No</th>  
    <th width="40%" class="center">Nama Guru</th> 
    <th width="10%" class="center">Nilai</th>    
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

 