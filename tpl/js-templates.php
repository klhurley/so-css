<script type="text/template" id="template-snippet-browser">
	<div class="snippet-browser-overlay">

	</div>

	<div class="snippet-browser-dialog">
		<div class="toolbar">
			<h1><?php _e('CSS Snippets', 'so-css') ?></h1>
			<span href="#" class="close">
				<span class="icon"></span>
			</span>
		</div>
		<div class="sidebar">
			<input type="text" class="snippet-search" placeholder="<?php esc_attr_e('Search Snippets', 'so-css') ?>" />
			<ul class="snippets">
			</ul>
		</div>
		<div class="main">
			<div class="snippet-view">
				<h2 class="snippet-title"></h2>
				<p class="snippet-description"></p>
				<pre class="snippet-code"></pre>
			</div>
		</div>
		<div class="buttons">
			<input type="button" class="insert-snippet button-primary" value="<?php esc_attr_e('Insert Snippet', 'so-css') ?>" />
		</div>
	</div>
</script>

<script type="text/template" id="template-spacing-field">
	<div class="spacing-field">

		<ul class="select-tabs side-tabs">
			<li class="select-tab side-tab" data-direction="all"><div class="spacing-all"></div></li>
			<li class="select-tab side-tab" data-direction="top"><div class="spacing-top"></div></li>
			<li class="select-tab side-tab" data-direction="right"><div class="spacing-right"></div></li>
			<li class="select-tab side-tab" data-direction="bottom"><div class="spacing-bottom"></div></li>
			<li class="select-tab side-tab" data-direction="left"><div class="spacing-left"></div></li>
		</ul>

		<ul class="measurements">

		</ul>

	</div>
</script>