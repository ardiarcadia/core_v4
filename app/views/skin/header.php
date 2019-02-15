<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse_navbar" aria-expanded="false">
				<i class="fa fa-user-circle"></i>
			</button>
			<b><a class="navbar-brand" href="<?=base_url();?>"><?=$this->l_skin->apps_config('title');?></a></b>
		</div>
		
		<div class="collapse navbar-collapse" id="collapse_navbar">
			<ul class="nav navbar-nav navbar-right user-profil">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i>&nbsp;&nbsp;<?=$this->m_auth->get_session('name');?>&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
					<ul class="dropdown-menu">
						<!-- <li><a href="#"><i class="fa fa-bell"></i>&nbsp;&nbsp;Pemberitahuan</a></li> -->
						<li><a href="<?=site_url('profil');?>"><i class="fa fa-user-cog"></i>&nbsp;&nbsp;Pengaturan Akun</a></li>
						<li><a href="#"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;Bantuan</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?=site_url('logout');?>"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<a href="javascript:;" class="toggle front" id="sidenav-toggle">
    <i class="fa fa-bars"></i>
</a>