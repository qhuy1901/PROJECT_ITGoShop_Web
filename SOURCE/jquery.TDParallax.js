/**
 * ThemeDron parallax plugin
 * author ThemeDron http://themedron.com
 * GitHub: https://github.com/ThemeDron/DronParallax
 * parallax plugin vers. 0.0.1
 */
$.fn.TDParallax = function(options) {
    function Parallax(elem, options) {
        var that     = this;
        
        var defaults = {
            parallaxImage : false,
            defaultPos    : 0,
            speedDirection: 0,
            parallaxBlock : false
        }
        
        that.elem    = $(elem);
        that.options = $.extend(true, defaults, that.options, that.elem.data());
        
        that.status();
        
        if(that.options.parallaxImage) {
            that.elem.css({
                backgroundImage: 'url(' + that.options.parallaxImage + ')'
            });
        }
        
        $(window).on('scroll resize', $.proxy(function() {
            that.status();
        }))
    }
    
    Parallax.prototype.status = function() {
        var that    = this,
            checked = false,
            pos     = {
                winPos: $(window).scrollTop(),
                winHgt: $(window).outerHeight(),
                elemPos: that.elem.offset().top,
                elemHgt: that.elem.outerHeight(),
            };
        
        if((pos.elemPos - pos.winHgt - 100) - pos.winPos < 0) {
            if((pos.elemPos + pos.elemHgt + 100) - pos.winPos > 0) {
                checked = pos;
            } else {
                checked = false;
            }
        }
        
        that.create(checked)
    }
    
    Parallax.prototype.create = function(obj) {
        var that = this;
        
        if(obj) {
            var pos = obj.winPos - obj.elemPos - that.options.defaultPos;
            
            if(!that.options.parallaxBlock) {
                that.elem.css({
                    backgroundPositionY: pos * that.options.speedDirection,
                });
            } else {
                that.elem.css({
                    top: pos * that.options.speedDirection,
                });
            }
        }
    }

    this.each(function () {
        $.data(this, 'TDParallax', new Parallax(this, options));
    });
};