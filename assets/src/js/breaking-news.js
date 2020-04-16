//innerfade
(function($){var default_options={animationType:"fade",animate:true,first_slide:0,easing:"linear",speed:"normal",type:"sequence",timeout:2e3,startDelay:0,loop:true,containerHeight:"auto",runningClass:"innerFade",children:null,cancelLink:null,pauseLink:null,prevLink:null,nextLink:null,indexContainer:null,currentItemContainer:null,totalItemsContainer:null,callback_index_update:null};$(function(){window.isActive=true;$(window).focus(function(){this.isActive=true});$(window).blur(function(){this.isActive=false})});$.fn.innerFade=function(options){return this.each(function(){$fade_object=new Object;$fade_object.container=this;$fade_object.settings=$.extend({},default_options,options);$fade_object.elements=$fade_object.settings.children===null?$($fade_object.container).children():$($fade_object.container).children($fade_object.settings.children);$fade_object.count=0;$($fade_object.container).data("object",$fade_object);if($fade_object.elements.length>1){if($fade_object.settings.nextLink||$fade_object.settings.prevLink){$.bindControls($fade_object)}if($fade_object.settings.cancelLink){$.bindCancel($fade_object)}$($fade_object.container).css({position:"relative"}).addClass($fade_object.settings.runningClass);if($fade_object.settings.containerHeight=="auto"){height=$($fade_object.elements).filter(":first").height();$($fade_object.container).css({height:height+"px"})}else{$($fade_object.container).css({height:$fade_object.settings.containerHeight})}if($fade_object.settings.indexContainer){$.innerFadeIndex($fade_object)}for(var i=0;i<$fade_object.elements.length;i++){$($fade_object.elements[i]).hide(0).css("z-index",String($fade_object.elements.length-i)).css("position","absolute")}var toShow="";var toHide="";if($fade_object.settings.type=="random"){toShow=Math.floor(Math.random()*$fade_object.elements.length);do{toHide=Math.floor(Math.random()*$fade_object.elements.length)}while(toHide==toShow)}else if($fade_object.settings.type=="random_start"){$fade_object.settings.type="sequence";toHide=Math.floor(Math.random()*$fade_object.elements.length);toShow=(toHide+1)%$fade_object.elements.length}else{toShow=$fade_object.settings.first_slide;toHide=$fade_object.settings.first_slide==0?$fade_object.elements.length-1:$fade_object.settings.first_slide-1}if($fade_object.settings.animate){$.fadeTimeout($fade_object,toShow,toHide,true)}else{$($fade_object.elements[toShow]).show();$($fade_object.elements[toHide]).hide();$.updateIndexes($fade_object,toShow)}$.updateIndexes($fade_object,toShow);$($fade_object.elements[toShow]).show();if($fade_object.settings.currentItemContainer){$.currentItem($fade_object,toShow)}if($fade_object.settings.totalItemsContainer){$.totalItems($fade_object)}if($fade_object.settings.pauseLink){$.bind_pause($fade_object)}}})};$.fn.innerFadeTo=function(slide_number){return this.each(function(index){var $fade_object=$(this).data("object");var $currentVisibleItem=$($fade_object.elements).filter(":visible");var currentItemIndex=$($fade_object.elements).index($currentVisibleItem);$.stopSlideshow($fade_object);if(slide_number!=currentItemIndex){$.fadeToItem($fade_object,slide_number,currentItemIndex)}})};$.fadeToItem=function($fade_object,toShow,toHide){var speed=$fade_object.settings.speed;switch($fade_object.settings.animationType){case"slide":$($fade_object.elements[toHide]).slideUp(speed);$($fade_object.elements[toShow]).slideDown(speed);break;case"slideOver":var itemWidth=$($fade_object.elements[0]).width(),to_hide_css={},to_show_css={},to_hide_animation={},to_show_animation={};$($fade_object.container).css({overflow:"hidden"});to_hide_css={position:"absolute",top:"0px"};to_show_css=$.extend({},to_hide_css);if(toShow>toHide){to_hide_css.left="0px";to_hide_css.right="auto";to_show_css.left="auto";to_show_css.right="-"+itemWidth+"px";to_hide_animation.left="-"+itemWidth+"px";to_show_animation.right="0px";console.log(to_hide_css)}else{to_hide_css.left="auto";to_hide_css.right="0px";to_show_css.left="-"+itemWidth+"px";to_show_css.right="auto";to_hide_animation.right="-"+itemWidth+"px";to_show_animation.left="0px"};$($fade_object.elements[toHide]).css(to_hide_css);$($fade_object.elements[toShow]).css(to_show_css).show();$($fade_object.elements[toHide]).animate(to_hide_animation,speed,$fade_object.settings.easing,function(){$(this).hide()});$($fade_object.elements[toShow]).animate(to_show_animation,speed,$fade_object.settings.easing);break;case"fadeEmpty":$($fade_object.elements[toHide]).fadeOut(speed,function(){$($fade_object.elements[toShow]).fadeIn(speed)});break;case"slideEmpty":$($fade_object.elements[toHide]).slideUp(speed,function(){$($fade_object.elements[toShow]).slideDown(speed)});break;default:$($fade_object.elements[toHide]).fadeOut(speed);$($fade_object.elements[toShow]).fadeIn(speed);break}if($fade_object.settings.currentItemContainer){$.currentItem($fade_object,toShow)}if($fade_object.settings.indexContainer||$fade_object.settings.callback_index_update){$.updateIndexes($fade_object,toShow)}};$.fadeTimeout=function($fade_object,toShow,toHide,firstRun){if(window.isActive){if(firstRun!=true){$.fadeToItem($fade_object,toShow,toHide)}$fade_object.count++;if($fade_object.settings.loop==false&&$fade_object.count>=$fade_object.elements.length){$.stopSlideshow($fade_object);return}if($fade_object.settings.type=="random"){toHide=toShow;while(toShow==toHide){toShow=Math.floor(Math.random()*$fade_object.elements.length)}}else{toHide=toHide>toShow?0:toShow;toShow=toShow+1>=$fade_object.elements.length?0:toShow+1}}var timeout=firstRun&&$fade_object.settings.startDelay?$fade_object.settings.startDelay:$fade_object.settings.timeout;$($fade_object.container).data("current_timeout",setTimeout(function(){$.fadeTimeout($fade_object,toShow,toHide,false)},timeout))};$.fn.innerFadeUnbind=function(){return this.each(function(index){var $fade_object=$(this).data("object");$.stopSlideshow($fade_object)})};$.stopSlideshow=function($fade_object){clearTimeout($($fade_object.container).data("current_timeout"));$($fade_object.container).data("current_timeout",null)};$.bindControls=function($fade_object){$($fade_object.settings.nextLink).on("click",function(event){event.preventDefault();$.stopSlideshow($fade_object);var $currentElement=$($fade_object.elements).filter(":visible");var currentElementIndex=$($fade_object.elements).index($currentElement);var $nextElement=$currentElement.next().length>0?$currentElement.next():$($fade_object.elements).filter(":first");var nextElementIndex=$($fade_object.elements).index($nextElement);$.fadeToItem($fade_object,nextElementIndex,currentElementIndex)});$($fade_object.settings.prevLink).on("click",function(event){event.preventDefault();$.stopSlideshow($fade_object);var $currentElement=$($fade_object.elements).filter(":visible");var currentElementIndex=$($fade_object.elements).index($currentElement);var $previousElement=$currentElement.prev().length>0?$currentElement.prev():$($fade_object.elements).filter(":last");var previousElementIndex=$($fade_object.elements).index($previousElement);$.fadeToItem($fade_object,previousElementIndex,currentElementIndex)})};$.bind_pause=function($fade_object){$($fade_object.settings.pauseLink).unbind().click(function(event){event.preventDefault();if($($fade_object.container).data("current_timeout")!=null){$.stopSlideshow($fade_object)}else{var tag=$($fade_object.container).children(":first").prop("tagName").toLowerCase();var nextItem="";var previousItem="";if($fade_object.settings.type=="random"){previousItem=Math.floor(Math.random()*$fade_object.elements.length);do{nextItem=Math.floor(Math.random()*$fade_object.elements.length)}while(previousItem==nextItem)}else if($fade_object.settings.type=="random_start"){previousItem=Math.floor(Math.random()*$fade_object.elements.length);nextItem=(previousItem+1)%$fade_object.elements.length}else{previousItem=$(tag,$($fade_object.container)).index($(tag+":visible",$($fade_object.container)));nextItem=previousItem+1==$fade_object.elements.length?0:previousItem+1}$.fadeTimeout($fade_object,nextItem,previousItem,false)}})};$.bindCancel=function($fade_object){$($fade_object.settings.cancelLink).unbind().click(function(event){event.preventDefault();$.stopSlideshow($fade_object)})};$.updateIndexes=function($fade_object,toShow){$($fade_object.settings.indexContainer).children().removeClass("active");$("> :eq("+toShow+")",$($fade_object.settings.indexContainer)).addClass("active");if(typeof $fade_object.settings.callback_index_update=="function"){$fade_object.settings.callback_index_update.call(this,toShow)}};$.createIndexHandler=function($fade_object,count,link){$(link).click(function(event){event.preventDefault();var $currentVisibleItem=$($fade_object.elements).filter(":visible");var currentItemIndex=$($fade_object.elements).index($currentVisibleItem);$.stopSlideshow($fade_object);if($currentVisibleItem.size()<=1&&count!=currentItemIndex){$.fadeToItem($fade_object,count,currentItemIndex)}})};$.createIndexes=function($fade_object){var $indexContainer=$($fade_object.settings.indexContainer);for(var i=0;i<$fade_object.elements.length;i++){var $link=$('<li><a href="#">'+(i+1)+"</a></li>");$.createIndexHandler($fade_object,i,$link);$indexContainer.append($link)}};$.linkIndexes=function($fade_object){var $indexContainer=$($fade_object.settings.indexContainer);var $indexContainerChildren=$("> :visible",$indexContainer);if($indexContainerChildren.size()==$fade_object.elements.length){var count=$fade_object.elements.length;for(var i=0;i<count;i++){$("a",$indexContainer).click(function(event){event.preventDefault()});$.createIndexHandler($fade_object,i,$indexContainerChildren[i])}}else{alert("There is a different number of items in the menu and slides. There needs to be the same number in both.\nThere are "+$indexContainerChildren.size()+" in the indexContainer.\nThere are "+$fade_object.elements.length+" in the slides container.")}};$.innerFadeIndex=function($fade_object){var $indexContainer=$($fade_object.settings.indexContainer);if($(":visible",$indexContainer).size()<=0){$.createIndexes($fade_object)}else{$.linkIndexes($fade_object)}};$.currentItem=function($fade_object,current){var $container=$($fade_object.settings.currentItemContainer);$container.text(current+1)};$.totalItems=function($fade_object){var $container=$($fade_object.settings.totalItemsContainer);$container.text($fade_object.elements.length)}})(jQuery);


var animationType =  polash_brk.animationType;
var speed =  polash_brk.speed;
var timeout = polash_brk.timeout;


	jQuery(document).ready(function(){
        if(animationType == 'ticker'){
            createTicker(); 
        }else{
            jQuery('#breaking-news ul').innerFade({animationType, speed, timeout});
        }
	});

                                            
    //------- Breaking News --------//
    function createTicker(){
        var tickerLIs   = jQuery("#breaking-news ul").children();
        tickerItems     = new Array();
        tickerLIs.each(function(el) {
            tickerItems.push( jQuery(this).html() );
        });
        i = 0  ;
        rotateTicker();
    }
    var isInTag = false;
    function typetext() {
        var $breaking_news = jQuery('#breaking-news ul');
        if( $breaking_news.length > 0 ){
            var thisChar = tickerText.substr(c, 1);
            if( thisChar == '<' ){ isInTag = true; }
            if( thisChar == '>' ){ isInTag = false; }
            $breaking_news.html(tickerText.substr(0, c++));
            if(c < tickerText.length+1)
                if( isInTag ){
                    typetext();
                }else{
                    setTimeout("typetext()", 35);
                }
            else {
                c = 1;
                tickerText = "";
            }
        }
    }

    function rotateTicker(){                                   
        if( i == tickerItems.length ){ i = 0; }                                                         
        tickerText = tickerItems[i];                              
        c = 0;                                                    
        typetext();                                               
        setTimeout( "rotateTicker()", timeout );                     
        i++;                                                      
    }  