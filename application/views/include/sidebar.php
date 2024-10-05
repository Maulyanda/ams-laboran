<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<div data-scrollbar="true" data-height="100%">
		<ul class="nav">
			<li class="nav-profile <?php echo $this->uri->segment(1) == "profil" ? "active" : ""; ?>">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="info">
						<b class="caret pull-right"></b>
						Hi JAWARA
						<small>JApang WArung RAkyat</small>
					</div>
				</a>
			</li>
		</ul>
		<ul class="nav">
			<li class="nav-header">Jawara</li>
			<li class="<?php echo $this->uri->segment(1) == "register" ? "active" : ""; ?> has-sub">
				<a href="<?php echo base_url(); ?>">
					<i class="fa fa-registered"></i>
					<span>Register Jawara</span>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
