

/*

may we text message you function

*/
$("#cell_phone, #home_phone").focus(function(){
		$("#text_message").html('May we text message you?'),
		$("#text_message_box").html('<select style="float:left;" class="form-control half_size" name="text_message_yes"><option value="Yes">Yes</option><option value="No">No</option></select><img src="http://www.erieit.edu/assets/images/help.png" id="help_button" style="float:left; margin-left:10px;"/> '),
		//$("#text_message").css({'height' : '40px'});
		$("#help_button").css({'cursor' : 'pointer'});
		$("#help_button").click(function(){
			alert("Standard text message rates apply. Please contact your carrier for more details.");
		});
});

/*

may we text message you function END

*/

/*

submit form handler

*/

$("#submit_application").click(function(e){
	e.preventDefault();
	
	var valid = false;
	valid = $('input[name=first_name]').val() == '' ? false : true;
	valid = $('input[name=last_name]').val() == '' ? false : true;
	
	var formSubmitted = $(this).attr('data-form');
		
	if(valid){
		$('.error').html('');
		$.post( "http://www.erieit.edu/assets/includes/mailer.php", $( "#final" ).serialize() )
			.done(function(data) {
				switch(formSubmitted){
					case 'side_form':
						track_side_form();
						break;
					case 'req_info_form':
						track_req_info();
						break;
					case 'schedule_tour_form':
						track_sched_tour();
						break;
				}
				$("#final").html(data)
			});
		$("#final").html('<img src="http://www.erieit.edu/assets/images/loading.gif" /> Sending ...');
		
	} else {
		$('.error').html('You must enter a first and last name');
	}
	
})
/*

submit form handler END

*/

/*

GA Form Trackers

*/
	function track_req_info(){
	  _gaq.push(['_trackPageview', '/request_more_information_submitted.php']);
	  }
  
  function track_side_form(){
	  _gaq.push(['_trackPageview', '/side_form_submitted.php']);
	  console.log('side form worked');
  }
  
  function track_apply_online(){
	  _gaq.push(['_trackPageview', '/apply_online_submitted.php']);
  }
  
  function track_sched_tour(){
	  _gaq.push(['_trackPageview', '/schedule_tour_submitted.php']);
  }
 function track_phone_call(){
	  _gaq.push(['_trackEvent', 'Contact Interaction', 'Phone Call Made' ]);
	  	  
	  //FB conversion pixel
		
		var fb_param = {};
		fb_param.pixel_id = "6014244798975";
		fb_param.value = "0.00";
		fb_param.currency = "USD";
		(function(){
		  var fpw = document.createElement("script");
		  fpw.async = true;
		  fpw.src = "//connect.facebook.net/en_US/fp.js";
		  var ref = document.getElementsByTagName("script")[0];
		  ref.parentNode.insertBefore(fpw, ref);
		})();
		$( "body" ).prepend( "<img height='1' width='1' alt='' style='display:none' src='https://www.facebook.com/offsite_event.php?id=6014244798975&amp;value=0&amp;currency=USD' />" );
		
		location.href='tel:8148689900';

	    }
		
function track_directions(){
	  _gaq.push(['_trackEvent', 'Contact Interaction', 'Directions Accessed' ]);
	  location.href='https://www.google.com/maps?saddr=My+Location&daddr=940+Millcreek+Mall,+Erie,+PA+16565';
 }
		
		
/*

GA Form Trackers END

*/


/*

sticky JS - keeps side form in view when scrolling

*/

// Cache selectors outside callback for performance. 
   var $window = $(window);
   
   //check if side form exists
   if($('.side_form').length){
	   
	   //get offset top for sticky element and footer
	   var $stickyEl = $('.side_form');
	   var elTop = $stickyEl.offset().top;
	   var footerTop = $('footer').offset().top;
	   	   
	   //get element bottom
	   var elBottom = $stickyEl.height();
	   
	   //set the form position on window load and build the position function
	   function get_side_form_position(footerTop, elBottom){
		    var footerTopPosition = footerTop - $window.scrollTop();
			if ($window.scrollTop() > elTop && footerTopPosition > elBottom){
				 $stickyEl.removeClass('sticky_bottom').addClass('sticky');
			} else if (footerTopPosition < elBottom){
				 $stickyEl.removeClass('sticky').addClass('sticky_bottom');
			} else {
				 $stickyEl.removeClass('sticky');
			}
	   }//end function
	   
	  
	  
	   
	   //start the scroll function
	   $window.scroll(function() {
		 	get_side_form_position(footerTop, elBottom);
   		});//end function
	   
   }//end if
   
   /*
   
   Sticky moble nav bar
   
   */
   
	   	var $mobileNav = $('.mobile_nav'),
			mobileNavTop = $mobileNav.offset().top,
			navBar = $('.navbar-collapse');
	   	
		function stickyMobileNav(el, elTop, dropDown){
		   if ($window.scrollTop() > elTop){
			   el.addClass( 'fixed_mobile_nav');
			   dropDown.addClass('fixed_drop_down');
		   } else {
			   el.removeClass( 'fixed_mobile_nav');
			   dropDown.removeClass('fixed_drop_down');
		   }
	   	}
		
		//start the scroll function
	   $window.bind('touchmove', function(e) {
		   
			if ($(window).width() < 520){
				stickyMobileNav($mobileNav, mobileNavTop, navBar);
				console.log('window top '+$window.scrollTop());
			}
			
   		});//end function
		
	      
 /*

sticky JS - keeps side form in view when scrolling END

*/


/*
 Fix long program names on page
*/
var hone = document.querySelectorAll('h1');

var longProgramNames = [
	'Industrial Maintenance &amp; Mechatronics', 
	'Network and Database Professional' , 
	'Biomedical Equipment Technology', 
	'Electronics Engineering Technology'
	]

$(hone).each(function (i, element){
	for(var p = 0; p < longProgramNames.length; p++){
		if(element.innerHTML === longProgramNames[p]){ 
			$(element).attr('style', 'font-size:40px;'); 
		} 
	}
})

/*

drop down fix ???

*/
	
$(document).ready(function() {
	
	$(window).width() > 752 ? $( ".dropdown-toggle" ).attr( "data-toggle", "#" ) : $( ".dropdown-toggle" ).attr( "data-toggle", "dropdown" );

	$(window).resize(function() {
		$(window).width() > 752 ? $( ".dropdown-toggle" ).attr( "data-toggle", "#" ) : $( ".dropdown-toggle" ).attr( "data-toggle", "dropdown" );
	});
/*

drop down fix ???

*/
	
	
	/*
	
	date pickers
	
	*/
	$(function() {
		$( "#main_date" ).datepicker();
		$( "#alt_date" ).datepicker();
	});
	 /*
	
	date pickers END
	
	*/

	/*
	
	slider_image_replacement
	
	*/
	
	$('.carousel .carousel-inner .item').each(function() {
		
		//declare variables
		var element = $(this).children('img'),
			src = element.attr('src'),
			newSrc,
			programIconClass = $('.program_icon').attr('class'),
			newProgramIconClass;
			
	
	   if ( $(window).width() < 768) {
		newSrc = src.replace('full', 'mobile');
		newProgramIconClass = programIconClass.replace('wow', 'not_animated');
	   }
	   else if ($(window).width() > 768) {
		newSrc = src.replace('mobile', 'full');
		
	   }
	   
	   element.attr('src', newSrc);
	  
	});
	
	$('.program_icon').each(function() {
		
		//declare variables
		var element = $(this),
			eClass = element.attr('class'),
			newClass;
			
	   if ( $(window).width() < 768) {
		newClass = eClass.replace('fadeInDown', 'fadeInLeft');
	   }
	   
	   element.attr('class', newClass);
	  
	});
	
	
	
	
	
	
	
	/*
	
	slider_image_replacement
	
	*/

	
	
	
	
	


});/* end document ready */



//Modernizr
/* Modernizr 2.7.1 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-input-inputtypes-shiv-cssclasses-load
 */
;window.Modernizr=function(a,b,c){function v(a){j.cssText=a}function w(a,b){return v(prefixes.join(a+";")+(b||""))}function x(a,b){return typeof a===b}function y(a,b){return!!~(""+a).indexOf(b)}function z(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:x(f,"function")?f.bind(d||b):f}return!1}function A(){e.input=function(c){for(var d=0,e=c.length;d<e;d++)p[c[d]]=c[d]in k;return p.list&&(p.list=!!b.createElement("datalist")&&!!a.HTMLDataListElement),p}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" ")),e.inputtypes=function(a){for(var d=0,e,f,h,i=a.length;d<i;d++)k.setAttribute("type",f=a[d]),e=k.type!=="text",e&&(k.value=l,k.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(f)&&k.style.WebkitAppearance!==c?(g.appendChild(k),h=b.defaultView,e=h.getComputedStyle&&h.getComputedStyle(k,null).WebkitAppearance!=="textfield"&&k.offsetHeight!==0,g.removeChild(k)):/^(search|tel)$/.test(f)||(/^(url|email)$/.test(f)?e=k.checkValidity&&k.checkValidity()===!1:e=k.value!=l)),o[a[d]]=!!e;return o}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var d="2.7.1",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k=b.createElement("input"),l=":)",m={}.toString,n={},o={},p={},q=[],r=q.slice,s,t={}.hasOwnProperty,u;!x(t,"undefined")&&!x(t.call,"undefined")?u=function(a,b){return t.call(a,b)}:u=function(a,b){return b in a&&x(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=r.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(r.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(r.call(arguments)))};return e});for(var B in n)u(n,B)&&(s=B.toLowerCase(),e[s]=n[B](),q.push((e[s]?"":"no-")+s));return e.input||A(),e.addTest=function(a,b){if(typeof a=="object")for(var d in a)u(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},v(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+q.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

/*fix webform placeholders in IE */

/*! http://mths.be/placeholder v2.0.7 by @mathias */
;(function(window, document, $) {

	// Opera Mini v7 doesn’t support placeholder although its DOM seems to indicate so
	var isOperaMini = Object.prototype.toString.call(window.operamini) == '[object OperaMini]';
	var isInputSupported = 'placeholder' in document.createElement('input') && !isOperaMini;
	var isTextareaSupported = 'placeholder' in document.createElement('textarea') && !isOperaMini;
	var prototype = $.fn;
	var valHooks = $.valHooks;
	var propHooks = $.propHooks;
	var hooks;
	var placeholder;

	if (isInputSupported && isTextareaSupported) {

		placeholder = prototype.placeholder = function() {
			return this;
		};

		placeholder.input = placeholder.textarea = true;

	} else {

		placeholder = prototype.placeholder = function() {
			var $this = this;
			$this
				.filter((isInputSupported ? 'textarea' : ':input') + '[placeholder]')
				.not('.placeholder')
				.bind({
					'focus.placeholder': clearPlaceholder,
					'blur.placeholder': setPlaceholder
				})
				.data('placeholder-enabled', true)
				.trigger('blur.placeholder');
			return $this;
		};

		placeholder.input = isInputSupported;
		placeholder.textarea = isTextareaSupported;

		hooks = {
			'get': function(element) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value;
				}

				return $element.data('placeholder-enabled') && $element.hasClass('placeholder') ? '' : element.value;
			},
			'set': function(element, value) {
				var $element = $(element);

				var $passwordInput = $element.data('placeholder-password');
				if ($passwordInput) {
					return $passwordInput[0].value = value;
				}

				if (!$element.data('placeholder-enabled')) {
					return element.value = value;
				}
				if (value == '') {
					element.value = value;
					// Issue #56: Setting the placeholder causes problems if the element continues to have focus.
					if (element != safeActiveElement()) {
						// We can't use `triggerHandler` here because of dummy text/password inputs :(
						setPlaceholder.call(element);
					}
				} else if ($element.hasClass('placeholder')) {
					clearPlaceholder.call(element, true, value) || (element.value = value);
				} else {
					element.value = value;
				}
				// `set` can not return `undefined`; see http://jsapi.info/jquery/1.7.1/val#L2363
				return $element;
			}
		};

		if (!isInputSupported) {
			valHooks.input = hooks;
			propHooks.value = hooks;
		}
		if (!isTextareaSupported) {
			valHooks.textarea = hooks;
			propHooks.value = hooks;
		}

		$(function() {
			// Look for forms
			$(document).delegate('form', 'submit.placeholder', function() {
				// Clear the placeholder values so they don't get submitted
				var $inputs = $('.placeholder', this).each(clearPlaceholder);
				setTimeout(function() {
					$inputs.each(setPlaceholder);
				}, 10);
			});
		});

		// Clear placeholder values upon page reload
		$(window).bind('beforeunload.placeholder', function() {
			$('.placeholder').each(function() {
				this.value = '';
			});
		});

	}

	function args(elem) {
		// Return an object of element attributes
		var newAttrs = {};
		var rinlinejQuery = /^jQuery\d+$/;
		$.each(elem.attributes, function(i, attr) {
			if (attr.specified && !rinlinejQuery.test(attr.name)) {
				newAttrs[attr.name] = attr.value;
			}
		});
		return newAttrs;
	}

	function clearPlaceholder(event, value) {
		var input = this;
		var $input = $(input);
		if (input.value == $input.attr('placeholder') && $input.hasClass('placeholder')) {
			if ($input.data('placeholder-password')) {
				$input = $input.hide().next().show().attr('id', $input.removeAttr('id').data('placeholder-id'));
				// If `clearPlaceholder` was called from `$.valHooks.input.set`
				if (event === true) {
					return $input[0].value = value;
				}
				$input.focus();
			} else {
				input.value = '';
				$input.removeClass('placeholder');
				input == safeActiveElement() && input.select();
			}
		}
	}

	function setPlaceholder() {
		var $replacement;
		var input = this;
		var $input = $(input);
		var id = this.id;
		if (input.value == '') {
			if (input.type == 'password') {
				if (!$input.data('placeholder-textinput')) {
					try {
						$replacement = $input.clone().attr({ 'type': 'text' });
					} catch(e) {
						$replacement = $('<input>').attr($.extend(args(this), { 'type': 'text' }));
					}
					$replacement
						.removeAttr('name')
						.data({
							'placeholder-password': $input,
							'placeholder-id': id
						})
						.bind('focus.placeholder', clearPlaceholder);
					$input
						.data({
							'placeholder-textinput': $replacement,
							'placeholder-id': id
						})
						.before($replacement);
				}
				$input = $input.removeAttr('id').hide().prev().attr('id', id).show();
				// Note: `$input[0] != input` now!
			}
			$input.addClass('placeholder');
			$input[0].value = $input.attr('placeholder');
		} else {
			$input.removeClass('placeholder');
		}
	}

	function safeActiveElement() {
		// Avoid IE9 `document.activeElement` of death
		// https://github.com/mathiasbynens/jquery-placeholder/pull/99
		try {
			return document.activeElement;
		} catch (err) {}
	}

}(this, document, jQuery));

$('input, textarea').placeholder();