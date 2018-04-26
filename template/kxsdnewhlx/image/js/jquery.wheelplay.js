jQuery.wheelplay = function (opt) {
 
    var _st = null;
 
    var _container = jQuery(opt.container);
    if (_container.size() == 0) return;
 
    var _total = _container.find('ul li').size();
    if (_total == 0) return;
 
    var _pagebox = jQuery(opt.pagebox);
    if (_pagebox.size() == 0) return;
 
    var _w = (typeof(opt.w) != 'undefined' ? opt.w : 140);
    var _t = (typeof(opt.t) != 'undefined' ? opt.t : 8000);
 
    var _pageid = 1;
    var _pagenum = 0;
    var _pages = 0;
 
    var stop = function () {
        if (_st) clearInterval(_st);
    }
 
    var start = function () {
        stop();
        _st = setInterval(function () {
            _pageid++;
            play();
        }, _t);
    }
    jQuery(opt.container).hover(function () {
        stop();
    }, function () {
        start();
    })
    var play = function () {
        if (_pageid > _pages) _pageid = 1;
        _pagebox.find('a').removeClass('on');
        _pagebox.find('a[rel=' + _pageid + ']').addClass('on');
        _container.find('ul li').hide();
        _container.find('ul li').slice((_pageid - 1) * _pagenum, _pageid * _pagenum).each(function () {
            jQuery(this).fadeIn();
        });
 
        start();
    }
 
    var init = function () {
        stop();
        var _parentwidth = _container.width();
        _pagenum = parseInt(_parentwidth / _w);
        _pages = Math.ceil(_total / _pagenum);
        if (_pages == 0) _pages++;
 
        var _html = '';
        for (i = 1; i <= _pages; i++) {
            _html += '<a href="javascript:;" rel="' + i + '">' + i + '</a> '
        }
 
        _pagebox.html(_html).find('a').mouseenter(function () {
            var _pid = parseInt(jQuery(this).attr('rel'));
            if (_pageid != _pid) {
                stop();
                _pageid = _pid;
                play();
            }
 
            return false;
        });
 
        play();
    }
 
    init();
}