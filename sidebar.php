
	<div id="sidebar">
		<section id="about">
			<p>SAITEI no CHINJUU＝最低の珍獣とは、kazuhito_shibaの通り名である…</p>
		</section>
		<section id="author-list">
			<h1>Author</h1>
			<ul>
				<li><a href="/archives/author/<?php the_author_meta('user_login',1); ?>"><?php echo get_avatar( get_the_author_meta('user_email',1), $size = '48' ); ?></a></li>
				<li><a href="/archives/author/<?php the_author_meta('user_login',5); ?>"><?php echo get_avatar( get_the_author_meta('user_email',5), $size = '48' ); ?></a></li>
				<li><a href="/archives/author/<?php the_author_meta('user_login',2); ?>"><?php echo get_avatar( get_the_author_meta('user_email',2), $size = '48' ); ?></a></li>
				<li><a href="/archives/author/<?php the_author_meta('user_login',7); ?>"><?php echo get_avatar( get_the_author_meta('user_email',7), $size = '48' ); ?></a></li>
				<li><a href="/archives/author/<?php the_author_meta('user_login',8); ?>"><?php echo get_avatar( get_the_author_meta('user_email',8), $size = '48' ); ?></a></li>
			</ul>
		</section>
		<section id="search">
			<h1>Search</h1>
			<?php get_search_form(); ?>
		</section>
		<section id="archive-list">
			<h1>Archive</h1>
			<div id="archive-body">
				<?php monthchunks("descending","numeric"); ?>
			</div>
		</section>
		<section id="category-list">
			<h1>Category</h1>
			<ul>
				<?php wp_list_categories('orderby=order&show_count=1&title_li='); ?> 
			</ul>
		</section>
		<!--
		<section id="tag-list">
			<h1>Tag</h1>
			<?php //wp_tag_cloud('format=list&smallest=14&largest=14&unit=px' ); ?>
		</section>
		-->
		<section id="link-list">
			<h1>Link</h1>
			<ul>
				<?php wp_list_bookmarks('categorize=0&category_before=&category_after=&title_li=0'); ?>
			</ul>
		</section>
	</div>