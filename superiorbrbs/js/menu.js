(function ($, window, document, undefined) { $.navigation = function(element, options) { var defaults = { responsive:true, mobileBreakpoint:768, showDuration:300, hideDuration:300, showDelayDuration:0, hideDelayDuration:0, submenuTrigger:"hover", effect:"fade", submenuIndicator:true, hideSubWhenGoOut:true, visibleSubmenusOnMobile:false, fixed:false, overlay:true, overlayColor:"rgba(0, 0, 0, 0.5)", hidden:false, offCanvasSide:"right", onInit:function() { }
      , onShowOffCanvas:function() { }
      , onHideOffCanvas:function() { }
    }
    ; var plugin = this, bigScreenFlag = Number.MAX_VALUE, smallScreenFlag = 1, clickTouchEvents ="click.nav touchstart.nav", hoverShowEvents ="mouseenter.nav", hoverHideEvents ="mouseleave.nav";
    plugin.settings = { }
    ; var $element = $(element), element = element; $(element).find(".nav-menus-wrapper").prepend("<span class='nav-menus-wrapper-close-button'>&#10005; </span>");
    if($(element).find(".nav-search").length > 0) { $(element).find(".nav-search").find("form").prepend("<span class='nav-search-close-button'>&#10005; </span>"); }
    plugin.init = function() { plugin.settings = $.extend( { }
      , defaults, options);
      if(plugin.settings.offCanvasSide == "right") { $(element).find(".nav-menus-wrapper").addClass("nav-menus-wrapper-right"); }
      if(plugin.settings.hidden) { $(element).addClass("navigation-hidden"); plugin.settings.mobileBreakpoint = 99999; }
      checkSubmenus();
      if(plugin.settings.fixed) { $(element).addClass("navigation-fixed"); }
      $(element).find(".nav-toggle").on("click touchstart", function(e) { e.stopPropagation(); e.preventDefault(); plugin.showOffcanvas();
        if(options !== undefined) { plugin.callback("onShowOffCanvas"); }
      }
      );
      $(element).find(".nav-menus-wrapper-close-button").on("click touchstart", function() { plugin.hideOffcanvas();
        if(options !== undefined) { plugin.callback("onHideOffCanvas"); }
      }
      );
      $(element).find(".nav-search-button").on("click touchstart", function(e) { e.stopPropagation(); e.preventDefault(); plugin.toggleSearch(); }
      );
      $(element).find(".nav-search-close-button").on("click touchstart", function() { plugin.toggleSearch(); }
      );
      if($(element).find(".megamenu-tabs").length > 0) { activateTabs(); }
      $(window).resize(function() { initNavigationMode(); fixSubmenuRightPosition(); }
      ); initNavigationMode();
      if(options !== undefined) { plugin.callback("onInit"); }
    }
    ;
    // check the existence of submenus/add indicators to them
    var checkSubmenus = function() { $(element).find("li").each(function() { if($(this).children(".nav-dropdown, .megamenu-panel").length > 0) { $(this).children(".nav-dropdown, .megamenu-panel").addClass("nav-submenu");
          if(plugin.settings.submenuIndicator) { $(this).children("a").append("<span class='submenu-indicator'>" + 
            "<span class='submenu-indicator-chevron'></span>" +
          "</span>"); }
        }
      }
    ); }
    ;
    // show a submenu
    plugin.showSubmenu = function(parentItem, submenuEffect) { if(windowWidth() > plugin.settings.mobileBreakpoint) { $(element).find(".nav-search").find("form").slideUp(); }
      if(submenuEffect == "fade") { $(parentItem).children(".nav-submenu")
        .stop(true, true)
        .delay(plugin.settings.showDelayDuration)
      .fadeIn(plugin.settings.showDuration); }
      else { $(parentItem).children(".nav-submenu")
        .stop(true, true)
        .delay(plugin.settings.showDelayDuration)
      .slideDown(plugin.settings.showDuration); }
    $(parentItem).addClass("nav-submenu-open"); }
    ;
    // hide a submenu
    plugin.hideSubmenu = function(parentItem, submenuEffect) { if(submenuEffect == "fade") { $(parentItem).find(".nav-submenu")
        .stop(true, true)
        .delay(plugin.settings.hideDelayDuration)
      .fadeOut(plugin.settings.hideDuration); }
      else { $(parentItem).find(".nav-submenu")
        .stop(true, true)
        .delay(plugin.settings.hideDelayDuration)
      .slideUp(plugin.settings.hideDuration); }
    $(parentItem).removeClass("nav-submenu-open").find(".nav-submenu-open").removeClass("nav-submenu-open"); }
    ;
    // show the overlay panel
    var showOverlay = function() { $("body").addClass("no-scroll");
      if(plugin.settings.overlay) { $(element).append("<div class='nav-overlay-panel'></div>");
        $(element).find(".nav-overlay-panel")
        .css("background-color", plugin.settings.overlayColor)
        .fadeIn(300)
        .on("click touchstart", function(e) { plugin.hideOffcanvas(); }
      ); }
    }
    ;
    // hide the overlay panel
    var hideOverlay = function() { $("body").removeClass("no-scroll");
      if(plugin.settings.overlay) { $(element).find(".nav-overlay-panel").fadeOut(400, function() { $(this).remove(); }
      ); }
    }
    ;
    // show offcanvas
    plugin.showOffcanvas = function() { showOverlay();
      if(plugin.settings.offCanvasSide == "left") { $(element).find(".nav-menus-wrapper").css("transition-property", "left").addClass("nav-menus-wrapper-open"); }
      else { $(element).find(".nav-menus-wrapper").css("transition-property", "right").addClass("nav-menus-wrapper-open"); }
    }
    ;
    // hide offcanvas 
    plugin.hideOffcanvas = function() { $(element).find(".nav-menus-wrapper").removeClass("nav-menus-wrapper-open")
      .on('webkitTransitionEnd moztransitionend transitionend oTransitionEnd', function() { $(element).find(".nav-menus-wrapper")
        .css("transition-property", "none")
      .off(); }
    ); hideOverlay(); }
    ;
    // toggle offcanvas
    plugin.toggleOffcanvas = function() { if(windowWidth() <= plugin.settings.mobileBreakpoint) { if($(element).find(".nav-menus-wrapper").hasClass("nav-menus-wrapper-open")) { plugin.hideOffcanvas();
          if(options !== undefined) { plugin.callback("onHideOffCanvas"); }
        }
        else { plugin.showOffcanvas();
          if(options !== undefined) { plugin.callback("onShowOffCanvas"); }
        }
      }
    }
    ;
    // show/hide the search form
    plugin.toggleSearch = function() { if($(element).find(".nav-search").find("form").css("display") == "none") { $(element).find(".nav-search").find("form").slideDown(); $(element).find(".nav-submenu").fadeOut(200); }
      else { $(element).find(".nav-search").find("form").slideUp(); }
    }
    ;
    // set the navigation mode and others configs
    var initNavigationMode = function() { if(plugin.settings.responsive) { if(windowWidth() <= plugin.settings.mobileBreakpoint && bigScreenFlag > plugin.settings.mobileBreakpoint) { $(element).addClass("navigation-portrait").removeClass("navigation-landscape"); portraitMode(); }
        if(windowWidth() > plugin.settings.mobileBreakpoint && smallScreenFlag <= plugin.settings.mobileBreakpoint) { $(element).addClass("navigation-landscape").removeClass("navigation-portrait"); landscapeMode(); hideOverlay(); plugin.hideOffcanvas(); }
      bigScreenFlag = windowWidth(); smallScreenFlag = windowWidth(); }
      else { landscapeMode(); }
    }
    ;
    // hide submenus/form when click/touch outside
    var goOut = function() { $("body").on("click.body touchstart.body", function(e) { if($(e.target).closest(".navigation").length === 0) { $(element).find(".nav-submenu").fadeOut(); $(element).find(".nav-submenu-open").removeClass("nav-submenu-open"); $(element).find(".nav-search").find("form").slideUp(); }
      }
    ); }
    ;
    // return the window's width
    var windowWidth = function() { return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth; }
    ;
    // unbind events
    var unbindEvents = function() { $(element).find(".nav-menu").find("li, a")
      .off(clickTouchEvents)
      .off(hoverShowEvents)
    .off(hoverHideEvents); }
    ;
    // fix submenu right position
    var fixSubmenuRightPosition = function() { if(windowWidth() > plugin.settings.mobileBreakpoint) { var navWidth = $(element).outerWidth(true);
        $(element).find(".nav-menu").children("li").children(".nav-submenu").each(function() { if($(this).parent().position().left + $(this).outerWidth() > navWidth) { $(this).css("right", 0); }
          else { $(this).css("right", "auto"); }
        }
      ); }
    }
    ;
    // activate the tabs
    var activateTabs = function() { function initTabs(tabs) { var navs = $(tabs).children(".megamenu-tabs-nav").children("li"); var panes = $(tabs).children(".megamenu-tabs-pane");
        $(navs).on("click.tabs touchstart.tabs", function(e) { e.stopPropagation(); e.preventDefault(); $(navs).removeClass("active"); $(this).addClass("active"); $(panes).hide(0).removeClass("active"); $(panes[$(this).index()]).show(0).addClass("active"); }
      ); }
      if($(element).find(".megamenu-tabs").length > 0) { var navigationTabs = $(element).find(".megamenu-tabs"); for(var i = 0; i < navigationTabs.length;
        i++) { initTabs(navigationTabs[i]); }
      }
    }
    ;
    // set the landscape mode
    var landscapeMode = function() { unbindEvents(); $(element).find(".nav-submenu").hide(0);
      if(navigator.userAgent.match(/Mobi/i) || navigator.maxTouchPoints > 0 || plugin.settings.submenuTrigger == "click") { $(element).find(".nav-menu, .nav-dropdown").children("li").children("a").on(clickTouchEvents, function(e) { plugin.hideSubmenu($(this).parent("li").siblings("li"), plugin.settings.effect); $(this).closest(".nav-menu").siblings(".nav-menu").find(".nav-submenu").fadeOut(plugin.settings.hideDuration);
          if($(this).siblings(".nav-submenu").length > 0) { e.stopPropagation(); e.preventDefault();
            if($(this).siblings(".nav-submenu").css("display") == "none") { plugin.showSubmenu($(this).parent("li"), plugin.settings.effect); fixSubmenuRightPosition(); return false; }
            else { plugin.hideSubmenu($(this).parent("li"), plugin.settings.effect); }
            if($(this).attr("target") == "_blank" || $(this).attr("target") == "blank") { window.open($(this).attr("href")); }
            else { if($(this).attr("href") == "#" || $(this).attr("href") == "") { return false; }
              else { window.location.href = $(this).attr("href"); }
            }
          }
        }
      ); }
      else { $(element).find(".nav-menu").find("li").on(hoverShowEvents, function() { plugin.showSubmenu(this, plugin.settings.effect); fixSubmenuRightPosition(); }
        ).on(hoverHideEvents, function() { plugin.hideSubmenu(this, plugin.settings.effect); }
      ); }
      if(plugin.settings.hideSubWhenGoOut) { goOut(); }
    }
    ;
    // set the portrait mode
    var portraitMode = function() { unbindEvents(); $(element).find(".nav-submenu").hide(0);
      if(plugin.settings.visibleSubmenusOnMobile) { $(element).find(".nav-submenu").show(0); }
      else { $(element).find(".nav-submenu").hide(0); $(element).find(".submenu-indicator").removeClass("submenu-indicator-up");
        if(plugin.settings.submenuIndicator) { $(element).find(".submenu-indicator").on(clickTouchEvents, function(e) { e.stopPropagation(); e.preventDefault(); plugin.hideSubmenu($(this).parent("a").parent("li").siblings("li"), "slide"); plugin.hideSubmenu($(this).closest(".nav-menu").siblings(".nav-menu").children("li"), "slide");
            if($(this).parent("a").siblings(".nav-submenu").css("display") == "none") { $(this).addClass("submenu-indicator-up"); $(this).parent("a").parent("li").siblings("li").find(".submenu-indicator").removeClass("submenu-indicator-up"); $(this).closest(".nav-menu").siblings(".nav-menu").find(".submenu-indicator").removeClass("submenu-indicator-up"); plugin.showSubmenu($(this).parent("a").parent("li"), "slide"); return false; }
            else { $(this).parent("a").parent("li").find(".submenu-indicator").removeClass("submenu-indicator-up"); plugin.hideSubmenu($(this).parent("a").parent("li"), "slide"); }
          }
        ); }
        else { landscapeMode(); }
      }
    }
    ;
    plugin.callback = function(func) { if (options[func] !== undefined) { options[func].call(element); }
    }
  ; plugin.init(); }
  ;
  $.fn.navigation = function(options) { return this.each(function() { if (undefined === $(this).data('navigation')) { var plugin = new $.navigation(this, options); $(this).data('navigation', plugin); }
    }
  ); }
; }
)(jQuery, window, document);