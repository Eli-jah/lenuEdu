<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="row-fluid">

	<div class="boxed span4">
		<div class="boxed-inner hg1">
			<h3> <i class="fa fa-user-md"></i> <?php echo lang('user_status') ?></h3>
			<ul class="boxed-list">
				<li><?php echo lang('nickname') ?>： <?php echo $this->session->userdata('nickname'); ?> </li>
				<li><?php echo lang('manager_group') ?>： <?php echo $user_group; ?> </li>
				<li><?php echo lang('login_ip') ?>： <?php echo $this->session->userdata('login_ip'); ?> </li>
				<li><?php echo lang('last_activity') ?>： <?php $datestring = "%Y/%m/%d - %H:%i:%s"; echo mdate($datestring, $this->session->userdata('last_activity')) ?> </li>
				<?php if ($this->input->cookie('_remember')): ?>
					<li class="text-success"> 
						<?php printf(lang('remember_hours'), $this->mcfg->get('adminer','remember_hours')); ?> </li>
					<?php endif ?>
				</ul>
			</div>
		</div>

		<div class="boxed span4">
			<div class="boxed-inner hg1">
				<h3> <i class="fa fa-shield"></i> <?php echo lang('server_env') ?></h3>
				<ul class="boxed-list">
					<?php 
					foreach ($env as $e => $v){
						$li = $v['enable']?'<li class="text-success">':'<li class="text-error">';
						$enable = $v['enable']?" <span class='badge badge-success'> ".$v['enable']."</span>":"<span class='badge badge-important'> error </span>" ;
						printf("%s %s : %s </li>",$li, $v['title'],$enable );
					}?>
				</ul>
			</div>
		</div>

		<!-- <div class="boxed span4">
			<div class="boxed-inner hg1">
				<h3> <i class="fa fa-rss"></i> <?php echo lang('shm_active') ?></h3>
				<ul class="boxed-list">
					<?php foreach ($shm['data'] as $k=>$v) {
						if($k+1<=6){
							echo "<li> <a target='_blank' href='".$shm['url'].$v['id'].".html'> ".$v['title']." </a> </li>";
						}
					} ?>
				</ul>
			</div>
		</div>
		<iframe src="http://www.sahereman.com/servicecenter.php" width="100%" frameborder='0' style="height:1000px;overflow:hidden;"
		></iframe>		 -->
	</div>
