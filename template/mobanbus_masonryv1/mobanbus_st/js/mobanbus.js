/*! CopyRight Mobanbus.cn */
 jQuery(function(){ 
  jQuery(window).scroll(function(){
   boxY = jQuery('#box').offset().top;
   yy = jQuery(this).scrollTop();
   xx = jQuery(this).width();
   //alert(xx);
   boxXX = xx / 2 - 400;
   if (jQuery(this).scrollTop() > 150) {
    jQuery('#box').css({"position":"fixed",top:"0px",left:"0px"});
    jQuery('#box').addClass('bus_fucked');
   // jQuery('#box').animate({top:yy+"px"},28);
   } else {
    jQuery('#box').css({"position":"absolute",top:"0px",left:"0px"});
    jQuery('#box').removeClass('bus_fucked');
   }
  })
 })
 /*! CopyRight Mobanbus.cn */
 jQuery(function (){        
  setInterval(function () {
    jQuery('#bus_textroll dl:last').hide().insertBefore(jQuery("#bus_textroll dl:first")).slideDown(1000);
    }, 6000);
});

/*! CopyRight Mobanbus.cn */
jQuery(function(){
	setTimeout(function(){
	  jQuery(".mobanbus_bottom").slideDown("slow");
	},2000);

	jQuery(".close").click(function(){
		jQuery(".mobanbus_bottom").hide();	
	})
});

/*! CopyRight Mobanbus.cn */
function item_masonry(){ 
	jQuery('.item img').load(function(){ 
		jQuery('.mobanbus_scroll').masonry({ 
			itemSelector: '.masonry_brick',
			columnWidth:250,
			gutterWidth:15								
		});		
	});
		
	jQuery('.mobanbus_scroll').masonry({ 
		itemSelector: '.masonry_brick',
		columnWidth:250,
		gutterWidth:15								
	});	
}

jQuery(function(){

	function item_callback(){ 
		
		item_masonry();	

	}

	item_callback();  

	jQuery('.item').fadeIn();

	var sp = 1
	
	jQuery(".mobanbus_scroll").infinitescroll({
		navSelector  	: "#more",
		nextSelector 	: "#more a",
		itemSelector 	: ".item",
		
		loading:{
			img: "template/mobanbus_masonryv1/mobanbus_st/img/loading_1.gif",
			msgText: ' ',
			finishedMsg: 'No More!',
			finished: function(){
				sp++;
				if(sp>=10){ //到第10页结束事件
					jQuery("#more").remove();
					jQuery("#infscr-loading").hide();
					jQuery("#page").show();
					jQuery(window).unbind('.infscr');
				}
			}	
		},errorCallback:function(){ 
			jQuery("#page").show();
		}
		
	},function(newElements){
		var $newElems = jQuery(newElements);
		jQuery('.mobanbus_scroll').masonry('appended', $newElems, false);
		$newElems.fadeIn();
		item_callback();
		return;
	});

});
