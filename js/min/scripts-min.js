$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html,body").animate({scrollTop:e.offset().top},1e3),!1}})}),function(e,n,t){function a(n,t){this.element=n,this.settings=e.extend({},i,t),this._defaults=i,this._name=s,this.init()}var i={label:"Menu",duplicate:!0,duration:200,easingOpen:"swing",easingClose:"swing",closedSymbol:"&#9658;",openedSymbol:"&#9660;",prependTo:"body",parentTag:"a",closeOnClick:!1,allowParentLinks:!1,nestedParentLinks:!0,showChildren:!1,init:function(){},open:function(){},close:function(){}},s="slicknav",l="slicknav";a.prototype.init=function(){var t=this,a=e(this.element),i=this.settings,s,o;i.duplicate?(t.mobileNav=a.clone(),t.mobileNav.removeAttr("id"),t.mobileNav.find("*").each(function(n,t){e(t).removeAttr("id")})):t.mobileNav=a,s=l+"_icon",""===i.label&&(s+=" "+l+"_no-text"),"a"==i.parentTag&&(i.parentTag='a href="#"'),t.mobileNav.attr("class",l+"_nav"),o=e('<div class="'+l+'_menu"></div>'),t.btn=e(["<"+i.parentTag+' aria-haspopup="true" tabindex="0" class="'+l+"_btn "+l+'_collapsed">','<span class="'+l+'_menutxt">'+i.label+"</span>",'<span class="'+s+'">','<span class="'+l+'_icon-bar"></span>','<span class="'+l+'_icon-bar"></span>','<span class="'+l+'_icon-bar"></span>',"</span>","</"+i.parentTag+">"].join("")),e(o).append(t.btn),e(i.prependTo).prepend(o),o.append(t.mobileNav);var r=t.mobileNav.find("li");e(r).each(function(){var n=e(this),a={};if(a.children=n.children("ul").attr("role","menu"),n.data("menu",a),a.children.length>0){var s=n.contents(),o=!1;nodes=[],e(s).each(function(){return e(this).is("ul")?!1:(nodes.push(this),void(e(this).is("a")&&(o=!0)))});var r=e("<"+i.parentTag+' role="menuitem" aria-haspopup="true" tabindex="-1" class="'+l+'_item"/>');if(i.allowParentLinks&&!i.nestedParentLinks&&o)e(nodes).wrapAll('<span class="'+l+"_parent-link "+l+'_row"/>').parent();else{var c=e(nodes).wrapAll(r).parent();c.addClass(l+"_row")}n.addClass(l+"_collapsed"),n.addClass(l+"_parent");var p=e('<span class="'+l+'_arrow">'+i.closedSymbol+"</span>");i.allowParentLinks&&!i.nestedParentLinks&&o&&(p=p.wrap(r).parent()),e(nodes).last().after(p)}else 0===n.children().length&&n.addClass(l+"_txtnode");n.children("a").attr("role","menuitem").click(function(n){i.closeOnClick&&!e(n.target).parent().closest("li").hasClass(l+"_parent")&&e(t.btn).click()}),i.closeOnClick&&i.allowParentLinks&&(n.children("a").children("a").click(function(n){e(t.btn).click()}),n.find("."+l+"_parent-link a:not(."+l+"_item)").click(function(n){e(t.btn).click()}))}),e(r).each(function(){var n=e(this).data("menu");i.showChildren||t._visibilityToggle(n.children,null,!1,null,!0)}),t._visibilityToggle(t.mobileNav,null,!1,"init",!0),t.mobileNav.attr("role","menu"),e(n).mousedown(function(){t._outlines(!1)}),e(n).keyup(function(){t._outlines(!0)}),e(t.btn).click(function(e){e.preventDefault(),t._menuToggle()}),t.mobileNav.on("click","."+l+"_item",function(n){n.preventDefault(),t._itemClick(e(this))}),e(t.btn).keydown(function(e){var n=e||event;13==n.keyCode&&(e.preventDefault(),t._menuToggle())}),t.mobileNav.on("keydown","."+l+"_item",function(n){var a=n||event;13==a.keyCode&&(n.preventDefault(),t._itemClick(e(n.target)))}),i.allowParentLinks&&i.nestedParentLinks&&e("."+l+"_item a").click(function(e){e.stopImmediatePropagation()})},a.prototype._menuToggle=function(e){var n=this,t=n.btn,a=n.mobileNav;t.hasClass(l+"_collapsed")?(t.removeClass(l+"_collapsed"),t.addClass(l+"_open")):(t.removeClass(l+"_open"),t.addClass(l+"_collapsed")),t.addClass(l+"_animating"),n._visibilityToggle(a,t.parent(),!0,t)},a.prototype._itemClick=function(e){var n=this,t=n.settings,a=e.data("menu");a||(a={},a.arrow=e.children("."+l+"_arrow"),a.ul=e.next("ul"),a.parent=e.parent(),a.parent.hasClass(l+"_parent-link")&&(a.parent=e.parent().parent(),a.ul=e.parent().next("ul")),e.data("menu",a)),a.parent.hasClass(l+"_collapsed")?(a.arrow.html(t.openedSymbol),a.parent.removeClass(l+"_collapsed"),a.parent.addClass(l+"_open"),a.parent.addClass(l+"_animating"),n._visibilityToggle(a.ul,a.parent,!0,e)):(a.arrow.html(t.closedSymbol),a.parent.addClass(l+"_collapsed"),a.parent.removeClass(l+"_open"),a.parent.addClass(l+"_animating"),n._visibilityToggle(a.ul,a.parent,!0,e))},a.prototype._visibilityToggle=function(n,t,a,i,s){var o=this,r=o.settings,c=o._getActionItems(n),p=0;a&&(p=r.duration),n.hasClass(l+"_hidden")?(n.removeClass(l+"_hidden"),n.slideDown(p,r.easingOpen,function(){e(i).removeClass(l+"_animating"),e(t).removeClass(l+"_animating"),s||r.open(i)}),n.attr("aria-hidden","false"),c.attr("tabindex","0"),o._setVisAttr(n,!1)):(n.addClass(l+"_hidden"),n.slideUp(p,this.settings.easingClose,function(){n.attr("aria-hidden","true"),c.attr("tabindex","-1"),o._setVisAttr(n,!0),n.hide(),e(i).removeClass(l+"_animating"),e(t).removeClass(l+"_animating"),s?"init"==i&&r.init():r.close(i)}))},a.prototype._setVisAttr=function(n,t){var a=this,i=n.children("li").children("ul").not("."+l+"_hidden");i.each(t?function(){var n=e(this);n.attr("aria-hidden","true");var i=a._getActionItems(n);i.attr("tabindex","-1"),a._setVisAttr(n,t)}:function(){var n=e(this);n.attr("aria-hidden","false");var i=a._getActionItems(n);i.attr("tabindex","0"),a._setVisAttr(n,t)})},a.prototype._getActionItems=function(e){var n=e.data("menu");if(!n){n={};var t=e.children("li"),a=t.find("a");n.links=a.add(t.find("."+l+"_item")),e.data("menu",n)}return n.links},a.prototype._outlines=function(n){n?e("."+l+"_item, ."+l+"_btn").css("outline",""):e("."+l+"_item, ."+l+"_btn").css("outline","none")},a.prototype.toggle=function(){var e=this;e._menuToggle()},a.prototype.open=function(){var e=this;e.btn.hasClass(l+"_collapsed")&&e._menuToggle()},a.prototype.close=function(){var e=this;e.btn.hasClass(l+"_open")&&e._menuToggle()},e.fn[s]=function(n){var t=arguments;if(void 0===n||"object"==typeof n)return this.each(function(){e.data(this,"plugin_"+s)||e.data(this,"plugin_"+s,new a(this,n))});if("string"==typeof n&&"_"!==n[0]&&"init"!==n){var i;return this.each(function(){var l=e.data(this,"plugin_"+s);l instanceof a&&"function"==typeof l[n]&&(i=l[n].apply(l,Array.prototype.slice.call(t,1)))}),void 0!==i?i:this}}}(jQuery,document,window);