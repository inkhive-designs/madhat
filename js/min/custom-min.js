jQuery(document).ready(function(){jQuery("#searchicon").click(function(){jQuery("#jumbosearch").fadeIn(),jQuery("#jumbosearch input").focus()}),jQuery("#jumbosearch .closeicon").click(function(){jQuery("#jumbosearch").fadeOut()}),jQuery("body").keydown(function(e){27==e.keyCode&&jQuery("#jumbosearch").fadeOut()}),jQuery(".flex-images").flexImages({rowHeight:200,object:"img",truncate:!0}),jQuery(".site-main").flexImages({rowHeight:200,object:"img"})}),jQuery(window).load(function(){jQuery("#nivoSlider").nivoSlider({prevText:"<i class='fa fa-chevron-circle-left'></i>",nextText:"<i class='fa fa-chevron-circle-right'></i>"})});