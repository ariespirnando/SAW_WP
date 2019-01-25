<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        <div class="page-header">
					<h1>
						Master
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							Sub Kriteria (SAW) - Add Data
						</small>
					</h1>
				</div>
				<div class="pull-right"></div>
			</div>
			<div>
        <form method="post" action="<?php echo $action ?>">
        <table class="table table-striped table-bordered table-hover" width="90%">
          <tbody> 
            <tr>
              <th width="10%" class="center">Nama Kriteria</th> 
              <th width="80%">
                <input type="text" name="vNama_kriteria" value="<?php echo $vNama_kriteria ?>" class="vNama_kriteria form-control" required>
                <input type="hidden" name="imaster_kriteria" value="<?php echo $imaster_kriteria ?>" class="imaster_kriteria">
                <input type="hidden" name="imaster_subkriteria" value="<?php echo $imaster_subkriteria ?>" class="">
                
              </th>  
            </tr>

            <tr>
              <th width="10%" class="center">Nama Sub Kriteria</th> 
              <th width="80%">
                <input type="text" name="vnama" value="<?php echo $vnama ?>" class="form-control" required> 
              </th>  
            </tr>

            <tr>
              <th width="10%" class="center">Nilai</th> 
              <th width="80%">
                <input type="text" name="fnilai" value="<?php echo $fnilai ?>" class="angka2 form-control" required> 
              </th>  
            </tr>

             
           
            <tr>
              <th colspan="2">
                <button type="submit" class="btn-lg btn-primary"><?php echo $btn ?></button>
                <a href="<?php echo base_url().'Subkriteria'?>" class="btn-lg btn-warning">Back</a>
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

  $('.vNama_kriteria').keyup(function(e) {  
    var config = {
        source: function(request, response) {
            $.getJSON("<?php echo base_url() ?>Subkriteria/kriteria", { term: $('.vNama_kriteria').val()}, 
                      response);
        },                     
        select: function(event, ui){
            $('.imaster_kriteria').val(ui.item.id);
            $('.vNama_kriteria').val(ui.item.value);  
            return false;                           
        },
        minLength: 2,
        autoFocus: true,
        };  
        $('.vNama_kriteria').autocomplete(config);   
        $(this).keypress(function(e){
        if(e.which != 13 ) {
              if(e.which != 9 ) {
               $('.imaster_kriteria').val('');
              }
          }           
        });
        $(this).blur(function(){
            if($('.imaster_kriteria').val() == '') {
                $(this).val('');
            }           
        });  
  });
</script>