$(document).ready(function() {

  // SEARCH FORM ID FOR TARGETED AJAX CALL; DISABLE DEFAULT SUBMIT
  var searchForm = $("form#my_ajax_filter_search_form");
    searchForm.submit(function(e) {
      e.preventDefault();
        e.stopImmediatePropagation();
    });

  // FORM SUBMIT FUNCTION; START YOUR AJAX CALL
  $("button#submitPreliminaryForm, button#submitPreliminaryFormMobile").on( "click", function() {
        document.getElementById("stemFields").classList.add("hidden");
          document.getElementById("prelimProducts").classList.remove("hidden");

      console.log("search submitted");

      // CAPTURE DATA FIELDS FOR JSON; IMPORTANT!
      if(searchForm.find("#gradeLevelValue").val().length !== 0) {
        var gradeLevelValue = searchForm.find("#gradeLevelValue").val();
      }
      if(searchForm.find("#stemFocusValue").val().length !== 0) {
        var stemFocusValue = searchForm.find("#stemFocusValue").val();
      }
      if(searchForm.find("#generalEdValue").val().length !== 0) {
        var generalEdValue = searchForm.find("#generalEdValue").val();
      }

      // STORE DATA FROM JSON; submit to Admin-Ajax file
      var data = {
        action : "my_ajax_filter_search",
        gradeLevelValue : gradeLevelValue,
        stemFocusValue : stemFocusValue,
        generalEdValue : generalEdValue
      }

      // RESULTS; parse data through jQuery loop
      $.ajax({
        url : ajax_url,
        data : data,
        success : function(response) {

          console.log('Found Results for ' + gradeLevelValue + ' with focus on ' + stemFocusValue + ' ' +  generalEdValue);

          if(response) {
            // RUN LOOP TO PRINT OUT DATA
            for(var i = 0 ;  i < response.length ; i++) {
              var html = "<article class='ui rounded product-item " + response[i].proficiencies.join('') + response[i].environments.join('') + "'>";
                  html += "<label for='" + response[i].id + "'>";
                  html += "<input type='checkbox' id='" + response[i].id + "' name='SolutionSetProducts[]' value='" + response[i].id + "'><span class='checkmark'></span>";
                  html += "</label>";
                  html += "<img src='" + response[i].poster + "' class='product wp-post-image' />";
                  html += "<div class='inner-content'>";
                  html += "<h4>" + response[i].title + "</h4>";
                  html += "<div class=product-description'>" + response[i].excerpt + "</div><div class='media'>";
                  html += "<p class='media-content'><span>" + response[i].proficiency.join(', ') + "</span>Technology Proficiency Level</p>";
                  html += "<p class='media-content'><span>" + response[i].environment.join(', ') + "</span>Educational Environment</p>";
                  html += "</div></div></article>";

              $("section.preliminary-product-list-container.stem-products").append(html);
            }
          }
          // CHECKBOX COUNTER
          // COUNT THE NUMBER OF 'article.product-item input:checked'
          // TOGGLECLASS 'product-selected' FOR CHECKBOX ELEMENT THAT WAS CLICKED
          // CHANGE TEXT based on user input
          var checkboxes = $('form#preliminary-product-list article.product-item input[type="checkbox"]');

          checkboxes.change(function(){
            $(this).closest("article.product-item").toggleClass("product-selected");
            var countCheckedCheckboxes = checkboxes.filter(':checked').length;
            $('#count-checked-checkboxes').text(countCheckedCheckboxes);
          });

        },
        error: function(response){
          console.log("no results found");
            var html  = "<h4 class='column no-result'>We're sorry, but <strong>no products were found matching those criteria.</strong> Try a searching again.</h4>";
            $("section.preliminary-product-list-container.stem-products").append(html);
        }
      });
    });

});
