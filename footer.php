	<div class="pagetop"><a href="#page">ページの上部へ戻る</a></div>
</div>
<footer id="footer">
	<p>
		<small>Copyright &copy; SAITEI no CHINJUU!!! All Rights Reserved.</small>
	</p>
</footer>
<?php wp_footer() ?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/wp-content/themes/saiteiNoChinju/js/jquery.js"><\/script>')</script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/chinju.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/sh/scripts/shCore.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/sh/scripts/shBrushXml.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/sh/scripts/shBrushCss.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/sh/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/sh/scripts/shBrushPlain.js"></script>
<script type="text/javascript">
	SyntaxHighlighter.all();
</script>
<?php if(is_single()) : ?>
<script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/comment-reply.js"></script>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php endif; ?>
</body>
</html>