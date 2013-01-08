(function() {
// 諸々の初期設定
  var tab = '';
  var $h1 = $('h1','#archive-list section');
  var $al = $('section','#archive-body');
  var archiveYear = location.href.split('/')[5] || '';

// 年月アーカイブのDOMをタブ型のコンテンツにしやすいように整形
  $('section','#archive-list').hide();
  for (var i=-1,n=$h1.length;++i<n;) {
    tab += '<li id="t'+$($h1[i]).text()+'">'+$($h1[i]).text()+'</li>'
  }
  $('#archive-list>h1').after('<ul id="tab"></ul>');
  $('#tab','#archive-list').html(tab);

// 年月アーカイブのタブ生成
  var $li = $('li','#tab');
  if (archiveYear.match(/[0-9]{4}/)) {
    $li.each(function() {
      if ($(this).text() === archiveYear) {
        var index = $li.index(this);
        $(this).addClass('active');
        $($al[index]).show();
      }
    })
  } else {
    $('li:first-child','#tab').addClass('active');
    $($al[0]).show();
  }

// 年月アーカイブのタブをクリックした時の挙動
  $li.click(function() {
    var index = $li.index(this);
    $(this).siblings().removeClass('active').end().addClass('active');
    $($al[index]).siblings().hide().end().show();
  });

// 年月アーカイブの順番やテキスト整形
  $('section','#archive-body').each(function() {
    var year = $(this).find('h1').text();
    $(this).find('ol').html($(this).find('li').get().reverse());
    $('li',this).each(function() {
      var month = $(this).text();
      $(this).find('a,span').text(year+'年'+month+'月');
    });
  });
  $h1.remove();

// パーマリンクのコメントのh3を無理やり消す！
  $('h3', '#comment').remove();

// more-linkを右寄せにするために.more-linkの中身を分解して.article-bodyの最後に再構成
  var $moreLink = $('.more-link', '.article-body p');
  $moreLink.each(function() {
    var $this = $(this);
    var url = $this.attr('href');
    var id = $this.attr('href').split('#more-')[1];
    if ($this.parent().text().length === 6) {
      $this.parent().remove();
    } else {
      $this.remove();
    }
    $('.article-body', '#post-'+id).append('<p class="continue ml"><a href="'+ url +'" class="more-link">続きを読む</a></p>')
  });

// カテゴリの投稿件数をa要素の中にぶち込む処理
  var $cat = $('li','#category-list');
  $cat.each(function() {
    var txt = $($(this).contents()[0]).text() + $($(this).contents()[1]).text();
    $($(this).contents()[1]).remove();
    $('>a', this).text(txt);
  })

// imgを内包しているaのborderを消す
  $('img', '.article-body').parent().css('border', 'none');

// サイドバーのaboutのところにページの内容をぶち込む
  $("#about").load("/about/ .article-body p");
  /*
   $('img', '.article-body p').parent().css({marginLeft: 0, marginRight: 0});
   $($('img', '.article-body p a').parent().parent()).css({marginLeft: 0, marginRight: 0});
   */


$('.pagetop', '#content').on('click', 'a', function(e) {
  var speed = 500;
  var href= $(this).attr("href");
  var target = $(href == "#" || href == "" ? 'html' : href);
  var position = target.offset().top;
  $('html, body').animate({scrollTop: $(this.getAttribute('href')).length ? position : 0}, speed, 'swing');
  e.preventDefault();
});

// 外部、PDF、ダウンロードコンテンツへのリンクに[target=_blank]を突っ込む
$(function() {
	/*
	var $a = $('a', '#main .article-body, #comment article');
	var domain = location.hostname;
	for(var i = -1, n = $a.length, href, $this; ++i < n;) {
		$this = $($a[i]);
		href = $this.attr('href');
		if(
			$this.attr('target') !== '_blank' &&
			(domain !== href.split('/')[2] && href.match(/^http:\/\//) || href.match(/^https:\/\//)) ||
			href.match(/\.pdf$/) ||
			$this.hasClass('download')
		) {
			$this.attr('target', '_blank');
		}
	}
	*/
	$('a[href^="http"]:not([href*="'+location.host+'"]),a[href$=".pdf"],a.download','#main .article-body, #comment article').attr('target', '_blank');
});

}())