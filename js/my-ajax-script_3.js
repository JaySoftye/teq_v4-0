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
              $('#additionalPathways').html('<p class="error">An error has occurred</p>');
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
                  html += "<input type='checkbox' id='" + data.slug + "' name='userPathwaySelections[]' title='" + data.title.rendered + " iBlock' value='" + data.id + "'><span class='checkmark'></span>";
                  html += "</label>";
                  html += "<img src='" + data.img_url + "' class='product wp-post-image' />";
                  html += "<div class='inner-content'>";
                  html += "<nav class='level'>"
                  html += "<div class='level-left'><h3 class='level-item product-title'>" + data.title.rendered + "</h3></div>";
                  html += "<div class='level-right'><h6 class='level-item iblock-info-button'>details</h6></div>";
                  html += "</nav>"
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

          var selectedItemId = $(this).attr("id");
          var selectedProductRemoved = selectedItemId.replace("-checkbox", "-selected-product");
            $("ul#select-items-content").find("#"+selectedProductRemoved).remove();
        }
    });

});
