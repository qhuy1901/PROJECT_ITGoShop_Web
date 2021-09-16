/**
 * ThemeDron page events plugin
 * author ThemeDron http://themedron.com
 * GitHub: https://github.com/ThemeDron/PageEvents
 * page events plugin vers. 0.0.1
 */
$.fn.TDPageEvents = function(options) {
    function Page() {
        var $wnd = $(window);
        
        this.result = {
            pos: $wnd.scrollTop(),
            scroll: false,
            height: $wnd.outerHeight(),
            width: $wnd.outerWidth(),
            resize: false
        };
        
        $wnd.on('load', $.proxy(function(e) {
            this.createEvent()
        }, this));
        
        this.scrollData();
        this.resizeData();
    }
    
    Page.prototype.resizeData = function() {
        var $wnd = $(window);
        $wnd.on('resize', $.proxy(function(e) {
            var $this  = $(this),
                height = $wnd.outerHeight(),
                width  = $wnd.outerWidth();
            
            clearTimeout($.data(this, "scroll"));
            $.data(this, "scroll", setTimeout(function() {
                this.createEvent('resize', {
                    height: height,
                    width: width,
                    resize: false
                })
            }.bind(this), 500));
            
            this.createEvent('resize', {
                height: height,
                width: width,
                resize: true
            })
            
        }, this));
    }
    
    Page.prototype.scrollData = function() {
        var $wnd = $(window);
        
        $wnd.on('scroll', $.proxy(function(e) {
            var $this  = $(this),
                scroll = $wnd.scrollTop();
            
            clearTimeout($.data(this, "scroll"));
            $.data(this, "scroll", setTimeout(function() {
                this.createEvent('scroll', {
                    pos: scroll,
                    scroll: false,
                })
            }.bind(this), 150));
            
            this.createEvent('scroll', {
                pos: scroll,
                scroll: true,
            })
        }, this));
    }
    
    Page.prototype.createEvent = function(e, result) {
        $(window).trigger({
            type: 'pageEvent',
            pos: e == 'scroll' ? result.pos : this.result.pos,
            scroll: e == 'scroll' ? result.scroll : this.result.scroll,
            height: e == 'resize' ? result.height : this.result.height,
            width: e == 'resize' ? result.width : this.result.width,
            resize: e == 'resize' ? result.resize : this.result.resize
        });
    }
    
    this.each(function () {
        $.data(this, 'TDPageEvents', new Page(this, options));
    });
};