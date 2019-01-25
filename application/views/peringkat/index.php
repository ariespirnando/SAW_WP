<div class="page-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="clearfix">
        		<div class="page-header">
					<h1>
						Peringkat <span class="btn-lg btn-primary" onclick="Tampil()">Tampilkan</span>
					</h1>
				</div>
				<div class="pull-right"></div>  
			</div>
            <div class="loadload">   
                <hr>Waiting Progress .......................................................<hr>
            </div>
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</div>


<script type="text/javascript">
$('.loadload').hide();
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
                    $('.loadload').hide();
                    var periode = this.$content.find('.periode').val(); 
				    window.location.href = "<?php echo base_url()?>Peringkat/rank/"+periode;  
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