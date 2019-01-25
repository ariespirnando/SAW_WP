<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Rangking Guru <?php echo $tahun ?> <span class="btn-lg btn-primary" onclick="Tampil()">Tampilkan</span>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>

      
      <div class="loadload">
        <div class="widget-box">  
         <div class="widget-body">
           <div class="widget-main no-padding">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Peringkat</button>
                <button class="tablinks" onclick="openCity(event, 'Paris')">Kriteria</button> 
              </div>

              <div id="London" class="tabcontent">

                <div>
                  <?php 
                    if($tampil==1){
                  ?>
                  <i class="ace-icon fa fa-angle-double-right"></i>  <b>Grafik</b><hr>
                  <div class="graph_datas" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                  <hr>
                  <i class="ace-icon fa fa-angle-double-right"></i> <b>Peringkat</b><hr>
                  <table class="table table-striped table-bordered table-hover" width="100%">
                    <thead> 
                      <tr>
                        <th width="2%" class="center">No</th> 
                        <th width="10%" class="center">Foto</th>  
                        <th width="40%" class="center">Nama Guru</th> 
                        <th width="10%" class="center">Nilai</th>    
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                        $i = 1;
                        foreach ($result as $r) {
                          ?>
                            <tr>
                              <td width="2%"><?php echo $i++ ?></td> 
                              <td width="10%">
                                <?php 

                                  if(!empty($r['tpath']) || $r['tpath']!=""){ 
                                ?>
                                <img src="<?php echo base_url()?>assets/upload/guru/<?php echo $r['tpath']?>">
                                <?php  
                                  }
                                ?>

                              </td>
                              <td width="40%"><?php echo $r['vNama_guru']?></td> 
                              <td width="10%"><?php echo $r['fnilai_akhir']?></td>   
                            </tr>
                          <?php
                        }
                       ?>
                    </tbody>
                  </table>
                  <script type="text/javascript">  
                    $(function () {
                    // Create the chart
                        $('.graph_datas').highcharts({
                          chart: {
                              type: 'column'
                          },
                          title: {
                              text: 'Peringkat <?php echo $tahun ?>'
                          },
                          subtitle: {
                              text: 'Alternatif'
                          },
                          xAxis: {
                              categories: ['Alternatif']
                          },
                          yAxis: {
                            title: {
                              text: '(Nilai)'
                            }
                          },
                          legend: {
                              enabled: true
                          },
                          series:            
                                [ 
                                      <?php
                                        foreach ($result as $r) {
                                              ?>
                                              {
                                                  name: '<?php echo $r['vNama_guru']; ?>',
                                                  data: [<?php echo $r['fnilai_akhir']; ?>]
                                              },
                                              <?php 
                                        } ?>
                                       
                                ]
                          }); 
                      });

                 
                </script>  
                <hr>
                <?php }else{ ?>
                <script type="text/javascript">
                   $.confirm({
                        title: 'Warning',
                        content: 'Data Belum Tersedia',
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
                <?php } ?>
                  <br>
                </div> 
              </div>

              <div id="Paris" class="tabcontent"> 
                  <i class="ace-icon fa fa-angle-double-right"></i>  <b>Kriteria</b><hr>
                  <table class="table table-striped table-bordered table-hover" width="100%">
                    <thead> 
                      <tr>
                        <th width="2%" class="center">No</th> 
                        <th width="5%" class="center">Kode Kriteria</th> 
                        <th width="40%" class="center">Nama Kriteria</th> 
                        <th width="10%" class="center">Atribut</th> 
                        <th width="10%" class="center">Bobot</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
                        $i = 1;
                        foreach ($resultx as $r) {
                          ?>
                            <tr>
                              <td width="2%"><?php echo $i++ ?></td>
                              <td width="5%"><?php echo $r['cKode']?></td> 
                              <td width="40%"><?php echo $r['vNama_kriteria']?></td> 
                              <td width="10%"><?php echo $r['vAtribut']?></td>
                              <td width="10%"><?php echo $r['fbobot']?></td>   
                            </tr>
                          <?php
                        }
                       ?>
                    </tbody>
                  </table>
                  
              </div> 
                   
            </div> 
          </div>
        </div>
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
</script>
  
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</div>

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
                    window.location.href = "<?php echo base_url()?>Rangking/rank/"+periode;  
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