<?php get_header(); ?>
<div id="content">
	<div id="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID() ?>" class="post">
			<header>
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
				<div class="author"><a href="/archives/author/<?php the_author_meta('user_login'); ?>"><?php echo get_avatar( get_the_author_meta('email'), 48 ); ?></a></div>
				<div class="meta">
					<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y-n-j (D)'); ?></time>
					<ul class="category">
						<li><?php the_category(', '); ?></li>
					</ul>
					<ul class="tag">
						<?php the_tags('<li>', '</li><li>', '</li>'); ?>
					</ul>
				</div>
			</header>
			<div class="article-body">
				<?php the_content('続きを読む'); ?>
			</div>
		</article>
		<?php endwhile; else: ?>
		<div>
			<p>記事はありませんでした。</p>
		</div>
		<?php endif; ?>
		
		<?php kriesi_pagination(); ?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>