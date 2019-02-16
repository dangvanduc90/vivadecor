
<amp-sidebar id="header-sidebar" class="ampstart-sidebar px3 " layout="nodisplay">
	<div class="flex justify-start items-center ampstart-sidebar-header">
		<div role="button" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger items-start">✕</div>
	</div>
	<nav class="ampstart-sidebar-nav ampstart-nav">
		<?= $menu; ?>
	</nav>
</amp-sidebar>