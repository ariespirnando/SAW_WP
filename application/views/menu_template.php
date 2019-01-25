<ul class="nav nav-list">
	
	<?php if($this->session->userdata('loggedin')==1){ ?>
	<li class="
	<?php 
		if($menu=='Home'){
			echo 'active';
		}
	?> ">
		<a href="<?php echo base_url()?>">
			<i class="menu-icon fa fa-home"></i>
			<span class="menu-text"> Home </span>
		</a>

		<b class="arrow"></b>
	</li>	

	<li class="
	<?php 
		if($menu=='Alternatif'){
			echo 'active';
		}
	?> ">
		<a href="<?php echo base_url()?>Alternatif">
			<i class="menu-icon fa fa-bars "></i>
			<span class="menu-text"> Alternatif </span>
		</a>

		<b class="arrow"></b>
	</li>	

	<li class="
	<?php 
		if($menu=='Peringkat'){
			echo 'active';
		}
	?> ">
		<a href="<?php echo base_url()?>Peringkat">
			<i class="menu-icon fa fa-trophy "></i>
			<span class="menu-text"> Peringkat </span>
		</a>

		<b class="arrow"></b>
	</li>	
	
	<li class="
	<?php 
		if($menu=='Laporan'){
			echo 'active';
		}
	?> ">
		<a href="<?php echo base_url()?>Laporan">
			<i class="menu-icon fa fa-list"></i>
			<span class="menu-text"> Laporan </span>
		</a>

		<b class="arrow"></b>
	</li>	
	<li class="
	<?php 
		if($menu=='Guru' || $menu=='Kriteria' || $menu=='Subkriteria'){
			echo 'active';
		}
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-archive "></i>
			<span class="menu-text"> Master </span> 
			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url()?>Kriteria">
					<i class="menu-icon fa fa-caret-right"></i>
					Kriteria
				</a> 
				<b class="arrow"></b>
			</li> 
			<li class="">
				<a href="<?php echo base_url()?>Subkriteria">
					<i class="menu-icon fa fa-caret-right"></i>
					Sub Kriteria
				</a> 
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url()?>Guru">
					<i class="menu-icon fa fa-caret-right"></i>
					Guru
				</a>
				<b class="arrow"></b>
			</li> 
		</ul>
	</li>

	<li class="
	<?php 
		if($menu=='Profil' || $menu=='Profil' || $menu=='Daftar'){
			echo 'active';
		}
	?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-key "></i>
			<span class="menu-text"> Pengaturan </span> 
			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="<?php echo base_url()?>Profil">
					<i class="menu-icon fa fa-caret-right"></i>
					Profil
				</a> 
				<b class="arrow"></b>
			</li> 
			<li class="">
				<a href="<?php echo base_url()?>Profil/password">
					<i class="menu-icon fa fa-caret-right"></i>
					Update Password
				</a> 
				<b class="arrow"></b>
			</li>
			<li class="">
				<a href="<?php echo base_url()?>Daftar">
					<i class="menu-icon fa fa-caret-right"></i>
					Add User Admin
				</a>
				<b class="arrow"></b>
			</li> 
		</ul>
	</li>

	 
	<?php } ?>
		<?php if($this->session->userdata('loggedin')==1){ ?> 
				<li class="">
					<a href="<?php echo base_url()?>Login/logout">
						<i class="menu-icon  fa fa-sign-out "></i>
						<span class="menu-text"> Logout </span>
					</a>

					<b class="arrow"></b>
				</li>
		<?php }else if($this->session->userdata('loggedin')==2){
				?>
				<li class="
				<?php 
					if($menu=='Home'){
						echo 'active';
					}
				?> ">
					<a href="<?php echo base_url()?>">
						<i class="menu-icon fa fa-home"></i>
						<span class="menu-text"> Home </span>
					</a>

					<b class="arrow"></b>
				</li>	
				<li class="<?php 
					if($menu=='Rangking'){
						echo 'active';
					}
				?>
				">
					<a href="<?php echo base_url()?>Rangking">
						<i class="menu-icon  fa fa-trophy "></i>
						<span class="menu-text"> Rangking Guru </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="<?php 
					if($menu=='Myperingkat'){
						echo 'active';
					}
				?>
				">
					<a href="<?php echo base_url()?>Myperingkat">
						<i class="menu-icon  fa fa-bars "></i>
						<span class="menu-text"> Peringkat Saya </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="
					<?php 
						if($menu=='Profil' || $menu=='Profil' || $menu=='Daftar'){
							echo 'active';
						}
					?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-key "></i>
							<span class="menu-text"> Pengaturan </span> 
							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu"> 
							<li class="">
								<a href="<?php echo base_url()?>Profil/profil2">
									<i class="menu-icon fa fa-caret-right"></i>
									Profil
								</a> 
								<b class="arrow"></b>
							</li> 
							<li class="">
								<a href="<?php echo base_url()?>Profil/password2">
									<i class="menu-icon fa fa-caret-right"></i>
									Update Password
								</a> 
								<b class="arrow"></b>
							</li> 
						</ul>
					</li>
					<li class="">
					<a href="<?php echo base_url()?>Login/logout">
						<i class="menu-icon  fa fa-sign-out "></i>
						<span class="menu-text"> Logout </span>
					</a>

					<b class="arrow"></b>
				</li>
				<?php
			  }else{?>
			  	<li class="
				<?php 
					if($menu=='Home'){
						echo 'active';
					}
				?> ">
					<a href="<?php echo base_url()?>">
						<i class="menu-icon fa fa-home"></i>
						<span class="menu-text"> Home </span>
					</a>

					<b class="arrow"></b>
				</li>	
				<li class="<?php 
					if($menu=='Rangking'){
						echo 'active';
					}
				?>
				">
					<a href="<?php echo base_url()?>Rangking">
						<i class="menu-icon  fa fa-trophy "></i>
						<span class="menu-text"> Rangking Guru </span>
					</a>

					<b class="arrow"></b>
				</li>
				<li class="<?php 
					if($menu=='Login'){
						echo 'active';
					}
				?>
				">
					<a href="<?php echo base_url()?>Login">
						<i class="menu-icon  fa fa-sign-in "></i>
						<span class="menu-text"> Login </span>
					</a>

					<b class="arrow"></b>
				</li>
		<?php } ?> 
</ul><!-- /.nav-list -->