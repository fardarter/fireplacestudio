(function($){
'use strict';

    var theme = window.casanova;

    $( function () {
        theme.onAppear();
    });

    $(document).ready( function () {
        theme.formValidation();
        theme.fixedHeader();
        theme.menu();
        theme.portfolioItem();
        theme.toggleAccordion();
        theme.quoteRotator();
        theme.progress();
        theme.section();
        theme.initTabs();
        theme.initPieChart();
        theme.imageSlider();
        theme.masonryBlog();
        theme.stats();
        theme.notificationBox();
        theme.tooltip();
        theme.lightBox();
        theme.map();
        theme.backToTop();
        theme.commentFormValidation();
        $(".player").each(function(){
            $(this).YTPlayer();
        })

        $('body').casanovaFitMedia();
    });

})(jQuery);
