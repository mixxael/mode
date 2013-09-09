$(document).ready(function(){	
	 var current_img=1;
            var scrollable;
            var virtual_click=0;
            var current_img_id=0;
            var last_img_id=$(".items img").eq(0).attr("id").replace('thumbs/thumbs_', "");
            var count_img=$(".items img").length;        
            $(function() {
            	$(".scrollable").scrollable();
                scrollable=$(".scrollable").data('scrollable');
                $(".items img").click(function() {                
                    if ($(this).hasClass("active")) { return; }
                	var url = $(this).attr("src").replace("thumbs/thumbs_", "");
                    var description='';
                    if ($(this).attr("alt")!='')
                        description=$(this).attr("alt");
                	var wrap = $("#image_wrap");
                    wrap.find(".img_big").hide();
                    wrap.find(".img_loading").show();
                	var img = new Image();
                    current_img_id=$(this).attr("id").replace('thumbs/thumbs_', "");
                	img.onload = function() {
                	    wrap.css("opacity", 0);
                        wrap.find(".img_big").show();
                        wrap.find(".img_big").attr("src", url);
                        wrap.find(".img_loading").hide();
                        if (current_img_id>last_img_id){
                            wrap.find(".img_big").css("padding-left", 708);
                            wrap.find(".img_big").animate( { "padding-left":"0" } ,{"duration": "easing"});
                            last_img_id=current_img_id;
                        }
                        else if (current_img_id<last_img_id){
                            wrap.find(".img_big").css("margin-left", -708);
                            wrap.find(".img_big").animate( { "margin-left":"0" } ,{"duration": "easing"});
                            last_img_id=current_img_id;
                        }
                        wrap.animate( { "opacity":"1" } , 800 );
                        if (virtual_click!=1){
                            $(".items img").each(function(){
                                $(this).stop();
                                if (!$(this).hasClass('active'))
                                    $(this).css({opacity:0.3});
                            });
                        }
                        $(".photo_number").html(current_img_id+" /<br/>"+count_img);
                        if (description!=''){
                            $("#photo_description_a").show();
                            $("#photo_description").html(description);
                        }
                        else{
                            $("#photo_description_a").hide();
                            $("#photo_description").hide();
                        }
             	   };
                	img.src = url;
                	$(".items img").removeClass("active").css({opacity:0.3});
                    $(this).css({opacity:1});
                	$(this).addClass("active");
                }).filter(":first").click();
                $(".items img").mouseover(function(){
                    $(this).stop();
                    $(this).animate({opacity:1},200);
                })
                $(".items img").mouseout(function(){
                    $(this).stop();
                    if (!$(this).hasClass('active'))
                        $(this).animate({opacity:0.3},200);
                })  
            });
            $("#left_gallery").click(function(){
                var prev_img=$(".items img.active").parent().prev().find('img');
                $('.items img').removeClass("active");
                if (prev_img.length==0)
                {
                    if (scrollable.getIndex()<=0)
                        scrollable.end();
                    else
                        scrollable.seekTo(scrollable.getIndex()-1);
                    var image_holder=$(".items .image_holder").eq(scrollable.getIndex());
                    virtual_click=1;
                    image_holder.find('.image_holder_in:last img').trigger('click');
                    image_holder.find('.image_holder_in:last img').css({opacity:1});
                    virtual_click=0;
                }
                else{
                    virtual_click=1;
                    prev_img.trigger('click');
                    prev_img.css({opacity:1});
                    virtual_click=0;
                }
                
            })
            $("#right_gallery").click(function(){
                var next_img=$(".items img.active").parent().next().find('img');
                $('.items img').removeClass("active");
                if (next_img.length==0)
                {
                    if (scrollable.getIndex()>=scrollable.getSize()-1)
                        scrollable.begin();
                    else
                        scrollable.seekTo(scrollable.getIndex()+1);
                    var image_holder=$(".items .image_holder").eq(scrollable.getIndex());
                    virtual_click=1;
                    image_holder.find('.image_holder_in:first img').trigger('click');
                    image_holder.find('.image_holder_in:first img').css({opacity:1});
                    virtual_click=0;
                }
                else{
                    virtual_click=1;
                    next_img.trigger('click');
                    next_img.css({opacity:1});
                    virtual_click=0;
                }
            });
	
	
	
	});