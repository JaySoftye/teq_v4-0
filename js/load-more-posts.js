jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
  $('.loadmore').click(function(){
    $.ajax({
    type: 'POST',
    url: my_ajax_url,
    dataType: "html", // add data type
    data: { action : 'get_ajax_posts' },
    success: function( response ) {
      console.log( response );

          $( 'section.loadmore button.more' ).remove();
          $( '.additional-posts-area' ).html( response );
          $( 'section.loadmore a.all' ).show();
    }
});

});

});
