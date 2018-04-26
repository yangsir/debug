!function(a) {
    "use strict";
    a.fn.SuiNav = function(b) {
        var c = this
          , d = !1
          , e = {
            toggleName: ".MenuToggle",
            direction: "left",
            trigger: "click",
            openingSpeed: 400,
            closingSpeed: 400,
            closingCascade: !0,
            destroy: !0
        };
        if (!a(c).hasClass("ren_cnav")) {
            if (a(this).find(".ren_cnav").length < 1)
                return;
            c = a(this).find(".ren_cnav")[0]
        }
        e = a.extend({}, e, b);
        var f = function() {
            a(c).hasClass("horizontal") ? a(c).find("li").hover(function() {
                a(this).children("ul").stop().show(e.openingSpeed)
            }, function() {
                a(this).children("ul").stop().hide(e.closingSpeed)
            }) : "click" == e.trigger ? a(c).find("li").click() : "hover" == e.trigger && a(c).find("li").hover(function() {
                a(this).children("ul").slideDown(e.openingSpeed)
            }, function() {
                e.closingCascade ? a(this).find("ul").slideUp(e.closingSpeed) : a(this).children("ul").slideUp(e.closingSpeed)
            }),
            a(window).resize(i)
        }
          , g = function() {
            d || (a(document.body).append('<div class="ren_cnav slide_nav"></div>'),
            a(document.body).append('<div class="ren_cnav ren_cnav_mask"></div>'),
            a(".slide_nav").html(a(c).html()),
            a(".slide_nav").find("li").click(),
            a(".ren_cnav_mask").click(function() {
                h()
            }),
            setTimeout(function() {
                a(".slide_nav").toggleClass("active"),
                a(".ren_cnav_mask").toggleClass("active")
            }, 20))
        }
          , h = function() {
            d || (d = !0,
            a(".slide_nav").find("li").unbind(),
            a(".slide_nav").removeClass("active"),
            a(".ren_cnav_mask").removeClass("active"),
            setTimeout(function() {
                a(".slide_nav").remove(),
                a(".ren_cnav_mask").remove(),
                d = !1
            }, 600))
        }
          , i = function() {}
          , j = function() {
            a("." + e.toggleName).unbind()
        }
        ;
        return i(),
        f(),
        {
            show: g,
            hide: h,
            toggle: function() {
                a(".slide_nav").length > 0 ? h() : g()
            },
            destroy: j
        }
    }
}($);
