(function($, window, undefined) {

  $.chinjuTab = (function() {
    var tab = '',
        $tab,
        $li,
        $al = $('#archive-body').find('section'),
        $archiveList = $('#archive-list'),
        $archiveListSection = $archiveList.find('section'),
        $h1 = $archiveListSection.find('h1'),
        archiveYear = location.href.split('/')[5] || '';
    // 年月アーカイブのタブ生成
    $archiveListSection.hide();
    for (var i=-1,n=$h1.length;++i<n;) {
      tab += '<li id="t'+$h1.eq(i).text()+'">'+$h1.eq(i).text()+'</li>';
    }
    $archiveList.find('>h1').after('<ul id="tab"></ul>');
    $archiveList.find('#tab').html(tab);

    $tab = $('#tab');

    // 年月アーカイブのタブ生成
    $li = $tab.find('li');
    if (archiveYear.match(/[0-9]{4}/)) {
      $li.each(function() {
        if ($(this).text() === archiveYear) {
          var index = $li.index(this);
          $(this).addClass('active');
          $al.eq(index).show();
        }
      });
    } else {
      $tab.find('li:first-child').addClass('active');
      $al.eq(0).show();
    }

    // 年月アーカイブの順番やテキスト整形
    $al.each(function() {
      var $list = $(this).find('li'),
          year = $(this).find('h1').text();
      $(this).find('ol').html($list.get().reverse());
      $list.each(function() {
        var month = $(this).text();
        $(this).find('a,span').text(year+'年'+month+'月');
      });
    });
    $h1.remove();

    // 年月アーカイブのタブをクリックした時の挙動
    $li.on('click', function() {
      var index = $li.index(this);
      $(this).siblings().removeClass('active').end().addClass('active');
      $al.eq(index).siblings().hide().end().show();
    });
  }());

  $.chinjuMorelink = (function() {
    // more-linkを右寄せにするために.more-linkの中身を分解して.article-bodyの最後に再構成
    var $moreLink = $('p', '.article-body').find('.more-link');
    $moreLink.each(function() {
      var $this = $(this),
          url = $this.attr('href'),
          id = url.split('#more-')[1];
      if ($this.parent().text().length === 6) {
        $this.parent().remove();
      } else {
        $this.remove();
      }
      $('#post-'+id).find('.article-body').append('<p class="continue ml"><a href="'+ url +'" class="more-link">続きを読む</a></p>');
    });
  }());

  $.chinjuCategory = (function() {
    var $cat = $('#category-list').find('li');
    $cat.each(function() {
      var label = $(this).contents(),
          txt = $(label).eq(0).text() + $(label).eq(1).text();
      $(label).eq(1).remove();
      $(this).find('>a').text(txt);
    });
  }());

  $.chinjuScroll = (function() {
    $('.pagetop').find('a').on('click', function(e) {
      e.preventDefault();
      var duration = 500,
          easing = 'swing',
          href = $(this).attr("href"),
          targetPos = $(href === "#" || href === "" ? 'html' : href).offset(),
          position = href.length ? (targetPos) ? targetPos.top : 0 : 0;
      if (targetPos) {
        $('html, body').stop().animate({scrollTop: position}, duration, easing);
      }
    });
  }());

  $.chinjuUtility = (function() {
    // パーマリンクのコメントのh3を無理やり消す！
    $('#comment').find('h3').remove();

    // imgを内包しているaのborderを消す
    $('.article-body').find('img').parent().css('border', 'none');

    // サイドバーのaboutのところにページの内容をぶち込む
    //$("#about").load("/about/ .article-body p");

    // 外部、PDF、ダウンロードコンテンツへのリンクに[target=_blank]を突っ込む
    $('a[href^="http"]:not([href*="'+location.host+'"]),a[href$=".pdf"],a.download','#main .article-body, #comment article').attr('target', '_blank');
  }());
}(jQuery, window));