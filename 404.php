<?php get_header(); ?>
<div id="content">
	<div id="page-not-found">
		<section>
			<h1>404 not found・・・</h1>
			<p>お探しのページは見つかりませんでした。<br />キーワードもしくはタグ一覧から検索してみてください。</p>
			<section id="search">
				<h1>Search</h1>
				<?php get_search_form(); ?>
			</section>
			<section id="tag-list">
				<h1>Tag</h1>
				<?php wp_tag_cloud('format=list&smallest=14&largest=14&unit=px' ); ?>
			</section>
		</section>
	</div>
<?php get_footer(); ?>