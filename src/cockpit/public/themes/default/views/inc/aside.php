<aside class="aside col-2 float-<?= getConfig('aside_pos'); ?>">
	
	<?php $thisPage = getPage('titlePage'); ?>

	<div class="imgAside"><span id="pseudoAside">- <?= $_CONECT->upseudo; ?> -</span></div>
	<ul class="navAdmin">
		<li class="liAside"><a href="/" class="linkNavAdmin<?php if( $thisPage == 'W_PANEL' ){echo " active";} ?>"><i class="fa fa-tachometer iconAside"></i><?= W_PANEL; ?></a></li>
		<li class="liAside"><a href="/pages" class="linkNavAdmin<?php if( $thisPage == 'W_PAGES' ){echo " active";} ?>"><i class="fa fa-file iconAside"></i><?= W_PAGES; ?></a>
			<ul class="subAside">
				<a href="/pages/add" class="sub-linkNavAdmin"><i class="fa fa-plus iconAside"></i><?= W_ADD; ?></a>
			</ul>
		</li>
		<li class="liAside"><a href="/messages" class="linkNavAdmin<?php if( $thisPage == 'W_MESSAGES' ){echo " active";} ?>"><i class="fa fa-comments iconAside"></i><?= W_MESSAGES; ?></a>
			<ul class="subAside">
				<a href="/messages/new" class="sub-linkNavAdmin"><i class="fa fa-plus iconAside"></i><?= W_MESSAGES_NEW; ?></a>
				<a href="/messages/sent" class="sub-linkNavAdmin"><i class="fa fa-paper-plane iconAside"></i><?= W_MESSAGES_SENT; ?></a>
				<a href="/messages/trash" class="sub-linkNavAdmin"><i class="fa fa-trash iconAside"></i><?= W_MESSAGES_TRASH; ?></a>
			</ul>
		</li>
		<li class="liAside"><a href="/users" class="linkNavAdmin<?php if( $thisPage == 'W_USERS' ){echo " active";} ?>"><i class="fa fa-users iconAside"></i><?= W_USERS; ?></a>
			<ul class="subAside">
				<a href="/users" class="sub-linkNavAdmin"><i class="fa fa-user iconAside"></i><?= W_USERS_PROFIL; ?></a>
				<a href="/users/add" class="sub-linkNavAdmin"><i class="fa fa-plus iconAside"></i><?= W_ADD; ?></a>
				<a href="/users/role" class="sub-linkNavAdmin"><i class="fa fa-lock iconAside"></i><?= W_USERS_ROLE; ?></a>
			</ul>
		</li>
		<li class="liAside"><a href="/addons" class="linkNavAdmin<?php if( $thisPage == 'W_PLUGINS' ){echo " active";} ?>"><i class="fa fa-puzzle-piece iconAside"></i><?= W_PLUGINS; ?></a>
			<ul class="subAside">
				<a href="/addons/add" class="sub-linkNavAdmin"><i class="fa fa-plus iconAside"></i><?= W_ADD; ?></a>
			</ul>
		</li>
		<li class="liAside"><a href="/tools" class="linkNavAdmin<?php if( $thisPage == 'W_TOOLS' ){echo " active";} ?>"><i class="fa fa-wrench iconAside"></i><?= W_TOOLS; ?></a>
			<ul class="subAside">
				<a href="/tools/infos-sys" class="sub-linkNavAdmin"><i class="fa fa-info-circle iconAside"></i><?= W_TOOLS_INFOS; ?></a>
			</ul>
		</li>
		<li class="liAside"><a href="/settings" class="linkNavAdmin<?php if( $thisPage == 'W_SETTINGS' ){echo " active";} ?>"><i class="fa fa-cogs iconAside"></i><?= W_SETTINGS; ?></a>
			<ul class="subAside">
				<a href="/settings/global" class="sub-linkNavAdmin"><i class="fa fa-cog iconAside"></i><?= W_SETTINGS_GLOBAL; ?></a>
				<a href="/settings/themes" class="sub-linkNavAdmin"><i class="fa fa-paint-brush iconAside"></i><?= W_SETTINGS_THEMES; ?></a>
			</ul>
		</li>
	</ul>
</aside>