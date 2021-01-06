$(document).ready(function() {

  // JQUERY FUNCTION TO HANDLE REST API RESPONSE
  // TRIGGER BY HTML CHECKBOX on CHANGE event EventListener
  // GATHER JSON DATA FROM REST API url
  // PARSE DATA INTO HTML content
  // APPENDED HTML
  // IF CHECKED ALREADY REMOVE ELEMENT

    $("#pathway-checkbox-list .pathway-checkbox:checkbox").change(function() {

      // STORE THE POST ID VALUE IN VARIABLE
      var postId = $(this).val();

        // IF CHECKBOX ELEMENT IS CHECKED APPEND DATA FROM AJAX JSON data
        // ELSE REMOVE THE ELEMENT
        if(this.checked) {

          // AJAX CALL TO GATHER JSON data
          // JSON DATA PARSED AS HTML
          $.ajax({
            url: '/wp-json/wp/v2/pathways/'+postId,
            error: function() {
              $('#info').html('<p>An error has occurred</p>');
            },
            dataType: 'json',
            type: 'GET',
            success: function(data) {

              // SUCCESSFUL CALL
              // ENCODE THE 'iBlock Focus Meta HTML' field as html characters
              var focusMetaEncoded =  data.iblock_focus_meta_html;
              var focusMetaDecoded = $("<div/>").html(focusMetaEncoded).text()

              // CREATE AN HTML Element WITH JSON DATA
              var html = "<article class='ui rounded product-item iblock-pathway' id='" + data.id + "'>";
                  html += "<label for='" + data.slug + "'>";
                  html += "<input type='checkbox' id='" + data.slug + "' name='" + data.title.rendered + "' value='" + data.slug + "'><span class='checkmark'></span>";
                  html += "</label>";
                  html += "<img src='" + data.img_url + "' class='product wp-post-image' />";
                  html += "<div class='inner-content'>";
                  html += "<h3 class='product-title iblock-info-button'>" + data.title.rendered + "</h3>";
                  html += "<div class='iblock-description hidden columns'>"
                  html += "<div class='column is-5'>" + data.content.rendered + "</div>";
                  html += "<div class='column is-7'>" + focusMetaDecoded + "</div>";
                  html += "</div></div></article>";

              // APPEND THE DATA TO THE 'additional pathways' HTML container
              $("#additionalPathways").append(html).text();

            },
            cache: false
          });

        } else {
          $("#"+postId).remove();
          console.log('pathway removed');
        }
    });

});
