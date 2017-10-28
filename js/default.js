(function($){//$を使えるようにする記述
    
    $(function(){
        $(window).on('scroll', function(){
            var scrollValue = $(this).scrollTop();
            //console.log(scrollValue);
            $('.fixedmenu').trigger('customScroll', {posY: scrollValue});
        });
        
        $('.fixedmenu')
        .each(function(){
            var $this = $(this);
            $this.data('initial', $this.offset().top);
        })
        .on('customScroll', function(event, object){
            //console.log('customScroll %s', object.posY);
            var $this = $(this);
            
            if($this.data('initial') <= object.posY){
                if(!$this.hasClass('fixed')){
                    $this
                    .addClass('fixed')
                    .css({top: 0});
                } 
            } else {
                $this.removeClass('fixed');
            }
        });
    });
    
})(jQuery);//$を使えるようにする記述
