/*
$(document).ready( function () {
    $(".blank img").css("vertical-align","text-top");
    $(".blank").after('&nbsp;');
    $('.blank').click(function(){
        window.open(this.href, '_blank');
        return false;
    });
});
*/



	/*
	(function() {
		var url = 'http://met.hanatoweb.jp/'
		var hrefs = [
			'http://met.hanatoweb.jp/',
			'http://www.qript.co.jp/',
			'//met.hanatoweb.jp',
			'//www.qript.co.jp/',
			'/archives/208',
			'#rev01'
		];
		for(var i=-1,n=hrefs.length,href;++i<n;) {
			href = hrefs[i]
			if (
				!href.match(/^\/{1}/) &&
				!href.match(/^#/) &&
				url.split('/')[2] !== href.split('/')[2] ||
				href.match(/\.pdf$/) ||
				(href.match(/^\/{2}/) && href.split('/')[2] !== url.split('/')[2])
			) {
				console.log(href)
			}
		}
	}())
	*/
	
		/*
		var siteDomain = location.href.split('/')[2];
		var $a = $('a', '#main article .article-body');
		$a.each(function(){
			var $this = $(this);
			var $href = $this.attr('href');
			var $hrefArr = $href.split('.');
			var n = $hrefArr.length;
			if((siteDomain !== $href.split('/')[2]) || $this.hasClass('download') || ($hrefArr[n-1] === 'pdf')) {
				$this.attr('target', '_blank');
			}
		})
		*/
		/*
		var $a = $('a', '#main .article-body, #comment article');
		var domain = location.href.split('/')[2];
		for(var i = -1, n = $a.length, href, $this; ++i < n;) {
			$this = $($a[i]);
			href = $this.attr('href');
			if(
				$this.attr('target') !== '_blank' &&
				!href.match(/^#/) &&
				!(href.match(/^[0-9a-zA-Z]/) && !(href.match(/^http/) || href.match(/^https/))) &&
				!href.match(/^\/{1}/) &&
				domain !== href.split('/')[2] ||
				(href.match(/^\/{2}/) && href.split('/')[2] !== domain) ||
				href.match(/\.pdf$/) ||
				$this.hasClass('download')
			) {
				$this.attr('target', '_blank').addClass('add-blank');
			}
		}
		*/
		
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
				$this.attr('target', '_blank').addClass('add-blank');
			}
		}
		/*
		$a.each(function(){
			var $this = $(this);
			var $href = $this.attr('href');
			var $hrefArr = $href.split('.');
			var n = $hrefArr.length;
			if((siteDomain !== $href.split('/')[2]) || $this.hasClass('download') || ($hrefArr[n-1] === 'pdf')) {
				$this.attr('target', '_blank');
			}
		})
		*/
		//console.log($('a[href$=pdf]'))
		
	var blank = function() {
		var domain = location.hostname;
		$('a', '#main .article-body, #comment article').click(function(){
			var href = $(this).attr('href');
			if(
				$(this).attr('target') !== '_blank' &&
				(domain !== href.split('/')[2] && href.match(/^http:\/\//) || href.match(/^https:\/\//)) ||
				href.match(/\.pdf$/) ||
				$(this).hasClass('download')
			) {
				window.open(href, '_blank');
				return false;
			}
		});
	}
	blank();