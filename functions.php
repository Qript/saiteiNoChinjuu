<?php

add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
$myavatar = get_bloginfo('template_directory') . '/img/img_default-avatar.png';
$avatar_defaults[$myavatar] = '最低の珍獣';
return $avatar_defaults;
}

/* pagenation */
function kriesi_pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}
	if(1 != $pages)
	{
		echo "<div class='pagenation'>\n<ol>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' title='最初のページ'>&laquo;</a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' title='前のページ'>&lt;</a></li>";
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
			}
		}
		if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' title='次のページ'>&gt;</a></li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."' title='最後のページ'>&raquo;</a></li>";
		echo "</ol>\n</div>\n";
	}
}


// comment
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<div class="gravator"><?php echo get_avatar($comment,$size='48',$default='' ); ?></div>
				<div class="comment-body">
					<div class="name"><?php printf(__('%s'), get_comment_author_link()) ?></div>
					<div class="comment-content">
						<?php comment_text() ?>
					</div>
				</div>
				<div class="meta"><?php edit_comment_link(__('(Edit)'),'  ','　') ?><time datetime="<?php comment_date('Y-m-d')?>"><?php printf(__('%1$s at %2$s'), get_comment_date('Y-n-j (D)'),  get_comment_time()) ?></time></div>
				<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
			</article>
<?php
}

// social button
function socialButton()
{ ?>
	<ul >
		<li class="hatebuButton"><a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>
		<li class="tweetButton"><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="SAITEInoCHINJU" data-count="horizontal" data-lang="ja">ツイート</a></li>
		<li class="likeButton"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div></li>
		<li class="plusoneButton"><div class="g-plusone" data-size="medium"></div></li>
	</ul>
<?php }
?>