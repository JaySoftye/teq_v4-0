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
              var html = "<article class='ui rounded product-item iblock-pathway product-selected static-select hidden' id='" + data.id + "'>";
                  html += "<div class='product-checked-cover'></div>";
                  html += "<input type='checkbox' checked class='product-item-checkbox' id='" + data.slug + "' name='userPathwaySelections[]' title='" + data.title.rendered + "' value='" + data.id + "'>";
                  html += "<img src='" + data.img_url + "' class='product wp-post-image' />";
                  html += "<div class='circle-highlight'></div><button type='button' class='arrowBack-button close-expanded-selected'></button>";
                  html += "<div class='inner-content'>";
                  html += "<h3 class='product-title'>" + data.title.rendered + "</h3>";
                  html += "<svg version='1.1' viewBox='0 0 100 100'><path fill='#FFFFFF' d='M63.39,38.443L43.869,57.963l-7.986-7.986c-1.693-1.693-4.438-1.693-6.131,0c-1.693,1.693-1.693,4.438,0,6.131 l11.053,11.053c0.844,0.846,1.954,1.271,3.064,1.271s2.22-0.424,3.067-1.271l22.585-22.587c1.693-1.693,1.693-4.438,0-6.131 C67.826,36.75,65.082,36.75,63.39,38.443z'/><path fill='#FFFFFF' d='M50.032,3.061C23.98,3.061,2.86,24.18,2.86,50.232S23.98,97.404,50.032,97.404 c26.052,0,47.171-21.119,47.171-47.171S76.084,3.061,50.032,3.061z M50.032,87.659c-20.67,0-37.427-16.756-37.427-37.427 s16.756-37.427,37.427-37.427c20.67,0,37.427,16.756,37.427,37.427S70.702,87.659,50.032,87.659z' /></svg>";
                  html += "</div>";
                  html += "<button type='button' class='product-item-options'></button>";
                  html += "<div class='dropdown-menu-container' role='menu'><div class='dropdown-content'><button type='button' class='dropdown-button tab-active' data-target='#" + data.slug + "-description'>Description</button><button type='button' class='dropdown-button' data-target='#" + data.slug + "-focus'>iBlock Focus</button></div></div>";
                  html += "<div class='product-content iblock-content'>"
                  html += "<div id='" + data.slug + "-description'  class='iblock-content-tab has-tab-visible'>" + data.content.rendered + "</div>";
                  html += "<div id='" + data.slug + "-focus'  class='iblock-content-tab'>" + focusMetaDecoded + "</div>";
                  html += "<label for='" + data.slug + "' class='add-or-remove-button ui white outer dark'>Remove from solution</label>";
                  html += "<button type='button' class='back-button close-expanded-selected'>back</button>";
                  html += "</div></article>";

              // APPEND THE DATA TO THE 'additional pathways' HTML container
              $("#additionalPathways").append(html).text();

              // DECLARE VARIABLES TO SET ADDED ITEM TO Checked
              // Title and ID from json data
              // CHECKBOX TOTAL AND CHECKBOX TOTAL VALUES
              var checkboxTitle = data.title.rendered;
              var checkboxId = data.slug;
              var updatedTotalLen = $("#preliminary-product-list article.product-item input[type='checkbox'].product-item-checkbox:checked").length;
              var userPathwaySelections = $("#preliminary-product-list .products-list.iblocks").find("article.product-item.iblock-pathway input:checked");

                // UPDATE 'div.selected-items-counter'
                // CHECK THE TOTAL LENGTH OF 'article.product-item CHECKBOX' TOTALS
                if(updatedTotalLen > 0) {
                  $(".selected-items-counter a input").val(updatedTotalLen);
                  $(".selected-items-counter a input").trigger('change');
                } else {
                  $(".selected-items-counter a input").val('0');
                  $(".selected-items-counter a input").trigger('change');
                }
                // UPDATE 'ul#select-items-content' LIST WITH NEW PATHWAY ADDED
                $("ul#select-items-content").append('<li id="'+checkboxId+'-selected-product">'+checkboxTitle+'</li>');
                // UPDATE 'button@iBlocksNextButton' attribute accordingly
                if (userPathwaySelections.length != 0) {
                  $("#iBlocksNextButton").attr( "disabled", false );
                  $("#iBlocksSkipButton").attr( "disabled", true );
                } else {
                  $("#iBlocksNextButton").attr( "disabled", true );
                  $("#iBlocksSkipButton").attr( "disabled", false );
                }
              console.log(checkboxTitle + ' added');

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
