	<aside class="aside col-2 float-<?= $_CONFIG->get('aside_pos'); ?>">
		<div class="imgAside"></div>
		<ul class="navAdmin">
			<li><a href="/" class="linkNavAdmin"><i class="fa fa-tachometer iconAside"></i><?= W_PANEL; ?></a></li>
			<li><a href="/pages" class="linkNavAdmin"><i class="fa fa-file iconAside"></i><?= W_PAGES; ?></a></li>
			<li><a href="/users" class="linkNavAdmin"><i class="fa fa-users iconAside"></i><?= W_USERS; ?></a></li>
			<li><a href="/addons" class="linkNavAdmin"><i class="fa fa-puzzle-piece iconAside"></i><?= W_PLUGINS; ?></a></li>
			<li><a href="/settings" class="linkNavAdmin"><i class="fa fa-cogs iconAside"></i><?= W_SETTINGS; ?></a></li>
		</ul>
	</aside>