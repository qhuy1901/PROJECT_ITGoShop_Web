/**
* ThemeDron timer plugin
* author ThemeDron http://themedron.com
* vers. 0.0.1
*/
$.fn.TDTimer = function(options) {
    function Timer(elem, options) {
        var that     = this,
            defaults = {
                timerRemove: true,
            };
        
        that.elem    = $(elem);
        that.options = $.extend(true, defaults, that.options, that.elem.data());
        var params   = that.options.timerDate.split(','),
            setData  = new Date(+params[0],
                                +params[1] - 1, 
                                +params[2], 
                                +params[3], 
                                +params[4], 
                                +params[5]);
        that.init(setData);
    }
    
    Timer.prototype.сreateView = function(result) {
        var that  = this,
            dBody = that.elem.find('.tdtimer-d').text(result.d),
            hBody = that.elem.find('.tdtimer-h').text(result.h),
            mBody = that.elem.find('.tdtimer-m').text(result.m),
            sBody = that.elem.find('.tdtimer-s').text(result.s);
        
        that.elem.addClass('tdtimer-init')
    }
    
    Timer.prototype.init = function(setData) {
        var that = this,
            init = setInterval($.proxy(function() {
            var date   = Math.floor((setData - (new Date())) / 1000),
                hourse = Math.floor(date / 60 / 60),
                d      = Math.floor((date / 60 / 60) / 24),
                h      = Math.floor((date - d * 24 * 60 * 60) / 60 / 60 ),
                m      = Math.floor((date - hourse * 60 * 60) / 60),
                s      = Math.floor(date - hourse * 60 * 60 - m * 60);
            
            that.сreateView(dateObj(d, h, m, s));
        }, that), 1000);
        
        function setNum(result) {
            if(result < 10) {
                result = '0' + result
            }
            
            return result;
        }
        
        function dateObj(d, h, m, s) {
            if(+d >= 0) {
                return {
                    d: setNum(d),
                    h: setNum(h),
                    m: setNum(m),
                    s: setNum(s)
                }
            } else {
                clearInterval(init);
                that.elem.removeClass('init')
                return false;
            }
        } 
    }

    this.each(function () {
        $.data(this, 'TDTimer', new Timer(this, options));
    });
}