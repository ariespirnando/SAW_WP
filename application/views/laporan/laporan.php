<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>Laporan <?php echo $tahun ?> <a target="_blank" href="<?php echo base_url()?>Laporan/cetak2/<?php echo $tahun?>"><span class="btn-lg btn-warning">Cetak XLS (<?php echo $tahun ?>)</span></a> | <a target="_blank" href="<?php echo base_url()?>Laporan/cetak/<?php echo $tahun?>"><span class="btn-lg btn-warning">Cetak PDF (<?php echo $tahun ?>)</span></a> |
          <span class="btn-lg btn-primary" onclick="Tampil()">Tampilkan</span>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
      <div class="loadload">
  			<div>
          <i class="ace-icon fa fa-angle-double-right"></i> <b>Matrik</b><hr>
          <table class="table table-striped table-bordered table-hover" width="100%">
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
          <br>
           
           <div class="widget-box">  
              <div class="widget-body">
               <div class="widget-main no-padding">
                  <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Simple Aditive Weigthed (SAW)</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Weighted Produk</button> 
                    <button class="tablinks" onclick="openCity(event, 'Medan')">Penggabungan</button> 
                    <button class="tablinks" onclick="openCity(event, 'Jakarta')">Peringkat</button> 
                  </div>

                  <div id="London" class="tabcontent"> 
                    <?php $this->load->view('laporan/laporan_saw')?>
                  </div>

                  <div id="Paris" class="tabcontent">  
                    <?php $this->load->view('laporan/laporan_wp')?>
                  </div> 

                  <div id="Medan" class="tabcontent">  
                    <?php $this->load->view('laporan/laporan_penggabungan')?>
                  </div> 

                  <div id="Jakarta" class="tabcontent">  
                    <?php $this->load->view('laporan/laporan_peringkat')?>
                  </div> 
                </div>
              </div>
            </div>
  			</div>
      </div>
			<div class="hr hr2 hr-double"></div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>

<style>
  /* Style the tab */
  .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: yellowgreen;
  }

  /* Style the buttons inside the tab */
  .tab button {
      background-color: inherit;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      transition: 0.3s;
      font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
      background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
      background-color: #ccc;
  }

  /* Style the tab content */
  .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
  }
</style> 
<script>
  function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
  }
 
  document.getElementById("defaultOpen").click();
  <?php
  if($tampil!=1){
    ?>
      $.confirm({
                title: 'Warning',
                content: 'Data Peringkat Belum Tersedia',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    formSubmit: {
                        text: 'Ya',
                        btnClass: 'btn-blue',
                        action: function () { 
                                window.location.href = "<?php echo base_url()?>Peringkat"; 
                        }
                    }, 
                }, 
            });
    <?php
  }
  ?>
</script>


<script type="text/javascript">
function Tampil(){
  $.confirm({
        title: 'Pilih Periode',
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
        type: 'blue',
        typeAnimated: true,
        buttons: {
            formSubmit: {
                text: 'Submit',
                btnClass: 'btn-blue',
                action: function () {
                    $('.loadload').html("<hr>Waiting Progress .......................................................<hr>");
                    var periode = this.$content.find('.periode').val(); 
                    window.location.href = "<?php echo base_url()?>Laporan/lapor/"+periode;  
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

 
