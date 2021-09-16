/**
 * Komotto theme
 * author ThemeDron http://themedron.com
 * Commercial license
 */

'use strict';

$(function() {
    var $window = $(window);
    
    /**
    * Page events init
    */
    $window.TDPageEvents();
        
    
    /**
    * Main slideshow
    */
    $(".owl-carousel.slideshow").owlCarousel({
        loop       : true,
        center     : true,
        smartSpeed : 1000,
        items      : true,
        nav        : true,
        navText    : ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
        responsive: {
            0:{
                dots : false
            },
            992:{
                dots : true
            }
        }
    });
    
    
    /**
    * Features block
    */
    $('.owl-carousel.features').owlCarousel({
        loop            : false,
        margin          : 0,
        responsiveClass : true,
        nav             : true,
        navText         : ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
        responsive: {
            0:{
                items: 2,
                dots : false
            },
            321:{
                items: 2,
                dots : false
            },
            767:{
                items: 3
            },
            1200:{
                items: 4
            }
        }
    });
    
    
    /**
    * Banner block
    */
    $('.owl-carousel.banner-brands').owlCarousel({
        loop            : false,
        margin          : 0,
        responsiveClass : true,
        nav             : true,
        navText         : ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
        responsive: {
            0:{
                items: 2,
                dots : false
            },
            321:{
                items: 2,
                dots : false
            },
            767:{
                items: 2,
                dots : false
            },
            994:{
                items: 3,
                dots : true
            },
            1200:{
                items: 3
            }
        }
    });
    
    
    /**
    * Latest on blog
    */
    $('.owl-carousel.latest-on-blog').owlCarousel({
        loop            : false,
        margin          : 0,
        responsiveClass : true,
        nav             : true,
        navText         : ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
        responsive: {
            0:{
                items: 2,
                dots : false
            },
            321:{
                items: 2,
                dots : false
            },
            767:{
                items: 3,
                dots : false
            },
            1200:{
                items: 3,
                nav  : true,
                dots : true
            }
        }
    });
    
    
    /**
    * Block brands
    */
    $('.owl-carousel.brands').owlCarousel({
        loop            : false,
        margin          : 0,
        responsiveClass : true,
        nav             : true,
        navText         : ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
        responsive: {
            0:{
                items: 2,
                nav  : false,
                dots : false
            },
            321:{
                items: 2,
                nav  : false,
                dots : false
            },
            767:{
                items: 3,
                nav  : false,
                dots : false
            },
            1200:{
                items: 4,
                nav  : true,
                dots : true
            }
        }
    });
    
    
    /**
    * Material Buttons
    */
    $('.btn-material').ripple();
    
    
    /**
    * Timer on shop items
    */
    $('.timer').TDTimer();
    
    
    /**
    * Parallax effects
    */
    $('.parallax').TDParallax();
    $('.parallax-block').TDParallax();
    
    
    /**
    * Price range
    */
    $('.price-slider').each(function() {
        var $block   = $(this),
            $range   = $block.find('.range'),
            $amFirst = $block.find('.amoutn .first'),
            $amLast  = $block.find('.amoutn .last'),
            data     = $block.data();
        
        $range.slider({
            range: true,
            min: 0,
            max: data.priceMax,
            values: [data.priceFirst, data.priceLast],
            slide: function(event, ui) {
                $amFirst.val(data.priceCurr + ui.values[0]);
                $amLast.val(data.priceCurr + ui.values[1]);
            }
        });
        
        $amFirst.val(data.priceCurr + $range.slider("values", 0));
        $amLast.val(data.priceCurr + $range.slider("values", 1));
    });
    
    
    /**
    * Sizer range
    */
    $('.sizer').each(function() {
        var $block   = $(this),
            $range   = $block.find('.range'),
            $select  = $block.find('.selecter'),
            $selects = $select.find('li'),
            $amFirst = $block.find('.amoutn .first'),
            $amLast  = $block.find('.amoutn .last'),
            data     = $block.data();
        
        $range.slider({
            min: 1,
            max: $selects.length,
            range: "min",
            value: $select.find('.active').data().sizerId,
            slide: function(event, ui) {
                $selects.removeClass('active');
                $('[data-sizer-id=' + (ui.value) + ']').addClass('active');
            }
        });
        
        $selects.on("click", function(e) {
            var $this = $(this),
                data = $this.data().sizerId;
            $selects.removeClass('active');
            $this.addClass('active');
            $range.slider("value", data);
        })
    });
    
    
    /**
    * nav-asside
    */
    $('.nav-vrt').each(function() {
        var $this = $(this),
            $li   = $this.find('li');
        
        $li.on('click', function(e) {
            var $this = $(this);
            
            if($this.find('.sub-nav').length) {
                e.preventDefault();
                if(!$this.hasClass('active')) {
                    $li.removeClass('active')
                    $this.addClass('active')
                } else {
                    $li.removeClass('active')
                }
            }
        })
    });
    
    
    /**
    * Shop style item switcher
    */
    $('.shop-items-set').each(function() {
        var $this    = $(this),
            $pgBlock = $this.find('.pagination-block'),
            $colsBtn = $pgBlock.find('.swither .cols'),
            $rowsBtn = $pgBlock.find('.swither .rows');
        
        
        if($colsBtn.hasClass('.active')) {
            $this.removeClass('shop-items-full')
        }

        $colsBtn.on('click', function() {
            $this.removeClass('shop-items-full');
            $rowsBtn.removeClass('active');
            $colsBtn.addClass('active');
        });

        $rowsBtn.on('click', function() {
            $this.addClass('shop-items-full');
            $colsBtn.removeClass('active');
            $rowsBtn.addClass('active');
        })
        
    });
    
    
    /**
    * Mobile category
    */
    $('.mobile-category').each(function() {
        var $this = $(this),
            $btn  = $this.find('.btn-swither');
        
        $btn.on('click', function() {
            if($this.hasClass('nav-close')) {
                $this.removeClass('nav-close')
            } else {
                $this.addClass('nav-close')
            }
        })
    });
    
    
    /**
    * Fix height block
    */
    $('.fix-height').each(function() {
        var $this = $(this);
        
        $window.on('load resize', function() {
            var $parent = $this.parent().find('.get-height').height();
            $this.css({height: $parent});
        })
    });
     
    $('.item-gallery').each(function() {
        var $this = $(this),
            $image = $this.find('.image'),
            $nav   = $this.find('.image-nav');
        
        $image
            .owlCarousel({
                items : 1,
                slideSpeed : 2000,
                nav: false,
                autoplay: false,
                dots: false,
                loop: true,
                responsiveRefreshRate : 200,
                navText: ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">'],
            })
            .on('changed.owl.carousel', sync);
        
        $nav
            .on('initialized.owl.carousel', function() {
                $nav.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items : 3,
                dots: false,
                nav: true,
                smartSpeed: 200,
                slideSpeed : 500,
                slideBy: 1,
                responsiveRefreshRate : 100,
                navText: ['<span class="arrow-left icofont icofont-curved-left">', '<span class="arrow-right icofont icofont-curved-right">']
            })
            .on('changed.owl.carousel', syncNav)
            .on("click", ".owl-item", function(e){
                e.preventDefault();
                var $this = $(this),
                    num   = $this.index();
            
                $image
                    .data('owl.carousel')
                    .to(num, 300, true)
            });
        
        function syncNav(e) {
            var num = e.item.index;
            $image
                .data('owl.carousel')
                .to(num, 100, true)
        }
        
        function sync(el) {
            var cnt = el.item.count - 1,
                cur = Math.round(el.item.index - (el.item.count/2) - .5);
            
            if(cur < 0) {
                cur = cnt;
            }
            
            if(cur > cnt) {
                cur = 0;
            }
            
            $nav
                .find(".owl-item")
                .removeClass("current")
                .eq(cur)
                .addClass("current");
            $nav
                .data('owl.carousel')
                .to(cur, 100, true);
        }
    });
    
    $('.float-block').each(function() {
        var $this   = $(this);
        
        $window.on('pageEvent', function(e) {
            var $parent    = $this.parent(),
                $parPos    = $parent.offset().top,
                $prntHgt   = $parent.outerHeight(),
                $thisHgt   = $this.outerHeight(),
                $thisPos   = $this.position().top,
                $checkPos  = e.pos - $parPos,
                $height = $prntHgt - $thisHgt;
            
            if(this.check == undefined) {
                setTimeout(function() {
                    if($checkPos >= 0) {
                        if((e.pos - $parPos) >= ($parent.outerHeight() - $this.outerHeight())) {
                            $this.css({top: $parent.outerHeight() - $this.outerHeight()})
                        } else {
                            $this.css({top: $checkPos})  
                        }
                    } else {
                        $this.css({top: 0})
                    }
                }, 100)
            }
            
            if($checkPos >= 0) {
                if(e.pos >= ($height + $parPos)) {
                    $this.css({top: $height})
                } else {
                    $this.css({top: $checkPos})
                }
            } else {
                $this.css({top: 0})
            }
            
            this.check = false;
        })
    });
    
    
    /**
    * Products list checkbox
    */
    $('.product-list').each(function() {
        var $this  = $(this),
            $head  = $this.find('.list-header'),
            $chBox = $head.find('label'),
            $body  = $this.find('.list-body'),
            $item  = $body.find('.item');
        
        $chBox.on('click', function() {
            var $checkBox = $head.find('input');
            
            if(!$checkBox.prop("checked")) {
                $body.find('.checkbox input').prop( "checked", true )
            } else {
                $body.find('.checkbox input').prop( "checked", false )
            }
        });
        
        $item.each(function() {
            var $this = $(this),
                $price  = function() {
                    var $dol = $this.find('.price .prc span'),
                        $cnt = $this.find('.price .prc small');
                    return +$dol.html() + $cnt.html();
                },
                $qnt  = $this.find('.qnt'),
                $total = $this.find('.total');
            
            $qnt.each(function() {
                var $this = $(this),
                    $minus = $this.find('.minus'),
                    $input = $this.find('.input input'),
                    $plus  = $this.find('.plus');
                 
                $minus.on('click', function() {
                    if(+$input.val() - 1 >= 0) {
                        $input.val(+$input.val() - 1);
                        $total.find('span').html(($total.find('span').html() - $price()).toFixed(2))
                    }
                });
                 
                $plus.on('click', function() {
                    $input.val(+$input.val() + 1);
                    $total.find('span').html((+$total.find('span').html() + +$price()).toFixed(2))
                });
                 
                $input.on('input', function(e) {
                    $total.find('span').html((+$price() * $(this).val()).toFixed(2))
                });
            })
        })
    });
    
    
    /**
    * Delivery settings
    */
    $('#deliveryComp').selectize({
        theme: 'default',
        valueField: 'id',
        options: [
            {id: 1, title: 'Delivery 1', url: 'example.com'},
            {id: 2, title: 'Delivery 2', url: 'example.com'},
            {id: 3, title: 'Delivery 3', url: 'example.com'},
            {id: 4, title: 'Delivery 4', url: 'example.com'},
        ],
        render: {
            option: function(data, escape) {
                return '<div class="option">' +
                        '<span class="title">' + escape(data.title) + '</span>' +
                        '<span class="url">' + escape(data.url) + '</span>' +
                    '</div>';
            },
            item: function(data, escape) {
                return '<div class="item">' + escape(data.title) + '</div>';
            }
        },
        create: function(input) {
            return {
                id: 0,
                title: input,
                url: '#'
            };
        }
    });
    
    
    /**
    * Preloader 
    */
    $window.on('load', function() {
        var $preloader = $('.preloader');
        $preloader.hide()
    });
});



/**
* Google autocomplete
*/
var placeSearch, autocomplete, componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        (document.getElementById('autocomplete')),
        {types: ['geocode']});
    autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
    var place = autocomplete.getPlace();

    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}