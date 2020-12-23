$(document).ready(function() {

  // JQUERY FUNCTION TO HANDLE REST API RESPONSE
  // TRIGGER BY HTML CHECKBOX on CHANGE event EventListener
  // GATHER JSON DATA FROM REST API url
  // PARSE DATA INTO HTML content
  // APPENDED HTML
  jQuery( function($) {
    $('#get-another-quote-button').on( 'click', function (e) {
      e.preventDefault();
      $.ajax({
        url: '/wp-json/wp/v2/pathways/29401',
        error: function() {
          $('#info').html('<p>An error has occurred</p>');
        },
        dataType: 'json',
        type: 'GET',
        success: function(data) {

          var html = "<article class='ui rounded product-item iblock-pathway'>";
              html += "<label for='" + data.slug + "'>";
              html += "<input type='checkbox' id='' name='' value=''><span class='checkmark'></span>";
              html += "</label>";
              html += "<img src='" + data.img_url + "' class='product wp-post-image' />";
              html += "<div class='inner-content'>";
              html += "<h3 class='product-title accordion_button'>" + data.title.rendered + "</h3>";
              html += "<div class='iblock-description columns'>"
              html += "<div class='column is-5'>" + data.content.rendered + "</div>";
              html += "<div class='column is-7'>" + data.iblock_focus_meta_html + "</div>";
              html += "</div></div></article>";

          $(".preliminary-product-list-container").append(html);

        },
        cache: false
      });
    });
  });


});
