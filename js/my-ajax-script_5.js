$(document).ready(function() {

  // JQUERY FUNCTION TO HANDLE REST API RESPONSE
  // TRIGGER BY HTML CHECKBOX on CHANGE event EventListener
  // GATHER JSON DATA FROM REST API url
  // PARSE DATA INTO HTML content
  // APPENDED HTML
  // IF CHECKED ALREADY REMOVE ELEMENT

    $("#productOptions .product-item").on( "click", function() {

      // IF product-item is already CHECKED REMOVE ::CHECKED STATUS
      if($(this).hasClass("is-checked")) {
        var detailsButton = $(this).find('.card > button.details-btn');
        var productCheckbox = $(this).find('input');
          $(this).removeClass("is-checked");
          $(productCheckbox).prop( "checked", false );
          $(detailsButton).toggleClass("remove");
          $(detailsButton).html("View Details");
            solutionSetCount();
      } else {

       $("#productOptions #loader").show();
       $("#product-details-container").empty();
       $('.control.dropdown').each(function(i, obj) {
         $(this).removeClass("is-active");
       });

      // STORE THE POST ID VALUE IN VARIABLE
      var postId = $(this).attr('id');
      var postType = $(this).attr('data-type');
      var detailsButton = $(this).find('.card > button.details-btn');

        // AJAX CALL TO GATHER JSON data
        // JSON DATA PARSED AS HTML
        $.ajax({
          url: '/wp-json/wp/v2/'+postType+'/'+postId,
          error: function() {
            $('#product-details-container').html('<p class="error">An error has occurred</p>');
          },
          dataType: 'json',
          type: 'GET',
          success: function(data) {

            const tags = data.tags_names;
            var tagnames = '';

            $.each(tags, function(index, value) {
              tagnames += "<span class='tag'>" + value + "</span>";
            });

            $("#productOptions #loader").hide();

              // CREATE AN HTML Element WITH JSON DATA
              var html = "<div class='product-details'" + data.id + "'><div class='columns is-vcentered'>";
                  html += "<div class='column'><h2>" + data.title.rendered + "</h2></div>";
                  html += "<div class='column has-text-right'><div class='button-group'><button type='button' class='add-to-solution' onclick='addProduct(this)' value='" + data.slug + "'>Add to your solution</button><button type='button' class='close-details close-details-trigger'>Close Details</button></div></div>";
                  html += "</div><div class='columns'>";
                  html += "<div class='column is-half'>";
                  html += "<img src='" + data.img_url + "' />";
                  html += "</div>";
                  html += "<div id='" + data.slug + "-description'  class='column is-half'>" + data.content.rendered + "</div>";
                  html += "</div></div>";

              // APPEND THE DATA TO THE 'additional pathways' HTML container
              $("#product-details-container").append(html).text();
              $('html,body').animate({
                scrollTop: $("#product-details-container").offset().top - 60
              });

              // ACCORDION FUNCTION FOR SPAN TAGS containerar
              $("button.tags-trigger").on( "click", function() {
                $(this).next("div.tags").toggleClass("active");
              });

              // EMPTY CLOSE PRODUCT DETAILS
              $("button.close-details-trigger").on( "click", function() {
                $("#product-details-container").empty();
              });

            },
            complete:function(data){
              $("#loader").hide();
            },
            cache: false
          });
        }
    });


    // JQUERY FUNCTION TO HANDLE REST API RESPONSE TO APPEND SOLUTION SET MODAL
      $("#yourClassroomSolution").on( "click", function() {

        // TARGET MODAL ELEMENT AND CLEAR CONTENTS
        // ADD 'is-active' STATE TO Element
        $("#solutionSetRows").empty();
        $('.control.dropdown').each(function(i, obj) {
          $(this).removeClass("is-active");
        });
        $("div#solutionSetModal").addClass("is-active");


        $("#productOptions .product-item > input:checked").each(function() {

          // STORE THE POST ID VALUE IN VARIABLE
          var postId = $(this).val();
          var postType = $(this).attr('data-type');

          // AJAX CALL TO GATHER JSON data
          // JSON DATA PARSED AS HTML
          $.ajax({
            url: '/wp-json/wp/v2/'+postType+'/'+postId,
            error: function() {
              $('#product-details-container').html('<p class="error">An error has occurred</p>');
            },
            dataType: 'json',
            type: 'GET',
            beforeSend: function(){
              $("#loader").show();
            },
            success: function(data) {

                $("#loader").hide();
                // CREATE AN HTML Element WITH JSON DATA
                var html = "<tr>";
                    html += "<td><button type='button' data-target='" + data.id + "' class='remove-solution-row'>✕</button></td>";
                if (postType == 'pathways') {
                    html += "<td><img src='/wp-content/themes/teq_v4-0/inc/ui/" + data.iblock_focus_stats_html + ".svg' /></td>";
                } else if (postType == 'product-and-service') {
                    html += "<td><img src='/wp-content/themes/teq_v4-0/inc/ui/" + data.custom_image_meta_content + ".svg' /></td>";
                }
                    html += "<td>" + data.title.rendered + "</td>";
                    html += "<td>" + data.grade_levels + "</td>";
                    html += "<td>" + data.categories_names + "</td>";
                    html += "</tr>";

                // APPEND THE DATA TO THE 'additional pathways' HTML container
                $("#solutionSetRows").append(html).text();
                // DELETE FUNCTION TO REMOVE SELECT OPTION FROM LIST AND UNCHECK IN OPTIONS SELECTIONS
                $("button.remove-solution-row").on('click', function() {

                  var targetProductUnselected = $(this).attr("data-target");
                  var targetProductElement = $("#productOptions").find("article#" + targetProductUnselected);
                  var targetProductCheckbox = $(targetProductElement).find('input');
                  var targetProductDetailsButton = $(targetProductElement).find("button#" + data.slug + "-details");
                    $(this).closest('tr').remove();
                    $(targetProductElement).removeClass("is-checked");
                    $(targetProductCheckbox).prop( "checked", false );
                    $(targetProductDetailsButton).html("View Details").removeClass("remove");

                  var solutionSetTotal = $("#productOptions").find('input:checked').length;
                    $("#solutionSet").html(solutionSetTotal);

                  solutionSetCount();
                });

            },
            cache: false
          });
        });
      });


  function hideAllElements() {
    // HIDE ALL ELEMENTS IN SVG CONTAINER
    $(".solution-svg-container #loader").show();
    $("#deviceOne").addClass("hidden");
    $("#deviceTwo").addClass("hidden");
    $("#deviceThree").addClass("hidden");
    $("#deviceFour").addClass("hidden");
    $("#farmshelf").addClass("hidden");
    $("#stem-pd-instructor").addClass("hidden");
    $("#online-pd-educator").addClass("hidden");
    $("#iblock-onsite-pd-instructor").addClass("hidden");
    $("#Virtual-PD-SMART-Board").addClass("hidden");
    $("#smart-board-add-on").addClass("hidden");
  }
  // JQUERY FUNCTION TO HANDLE REST API RESPONSE
  // END SOLUTION RESULT
  // CAPTURE THE IMAGE ICONS AND APPEND TO THE #solution-svg-container ELEMENT
  $("#main-solution-container .solution-item .solution-title").on( "click", function() {
    var postType = $(this).attr('data-type');
    var postId = $(this).attr('data-target');
    var postCategory = $(this).attr('data-Category');
    var stemTitle = $(this).attr('title');

      hideAllElements()

    // AJAX CALL TO GATHER JSON data
    // JSON DATA PARSED AS HTML
    $.ajax({
      url: '/wp-json/wp/v2/'+postType+'/'+postId,
      error: function() {
        $('#main-solution-container').html('<p class="error">An error has occurred</p>');
      },
      dataType: 'json',
      type: 'GET',
      success: function(data) {

        function pdStudentDevices() {
        // APPEND ELEMENT TO CONTAINERS IN SVG ELEMENT
          $("#deviceOne").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device1.svg').fadeIn(1000);
          $("#deviceTwo").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device2.svg').fadeIn(1000);
          $("#deviceThree").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device3.svg').fadeIn(1000);
          $("#deviceFour").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device4.svg').fadeIn(1000);
        }

        function showFarmshelf() {
        // APPEND ELEMENT TO CONTAINERS IN SVG ELEMENT
          $("#farmshelf").removeClass("hidden");
          $("#deviceOne").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/farmshelf-reverse-work1.svg').fadeIn(1000);
          $("#deviceTwo").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/farmshelf-reverse-work2.svg').fadeIn(1000);
          $("#deviceThree").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/farmshelf-reverse-work2.svg').fadeIn(1000);
          $("#deviceFour").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/farmshelf-reverse-work1.svg').fadeIn(1000);
        }

        // DECLARE CONDITIONAL TO IDENTIFY WHAT TYPE OF SOLUTION IS CLICKED
        // CONDITIONAL CHECKS AGAINST THE 'data-category' ATTRIBUTE
        // CREATE AN HTML IMAGE ELEMENT WITH JSON DATA
        if (postCategory == 'stem' && stemTitle == 'farmshelf') {
          // APPEND THE DATA TO THE HTML image containers
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#stem-pd-instructor").removeClass("hidden");
            showFarmshelf();
        } else if (postCategory == 'stem') {
          var img = "/wp-content/themes/teq_v4-0/inc/ui/" + data.custom_image_meta_content + ".svg";
          var imgReverse = "/wp-content/themes/teq_v4-0/inc/ui/" + data.custom_image_meta_content + "-reverse.svg";
          // APPEND THE DATA TO THE HTML image containers
          $("#deviceOne").attr("href", img).fadeIn(1000);
          $("#deviceTwo").attr("href", imgReverse).fadeIn(1000);
          $("#deviceThree").attr("href", img).fadeIn(1000);
          $("#deviceFour").attr("href", imgReverse).fadeIn(1000);
          $("#farmshelf").addClass("hidden");
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#stem-pd-instructor").removeClass("hidden");

        } else if (postCategory == 'pathway') {
          var img = "/wp-content/themes/teq_v4-0/inc/ui/" + data.iblock_focus_stats_html + ".svg";
          var imgReverse = "/wp-content/themes/teq_v4-0/inc/ui/" + data.iblock_focus_stats_html + "-reverse.svg";
          // APPEND THE DATA TO THE HTML image containers
          $("#deviceOne").attr("href", imgReverse).fadeIn(1000);
          $("#deviceTwo").attr("href", img).fadeIn(1000);
          $("#deviceThree").attr("href", imgReverse).fadeIn(1000);
          $("#deviceFour").attr("href", img).fadeIn(1000);
          $("#farmshelf").addClass("hidden");
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#iblock-onsite-pd-instructor").removeClass("hidden");

        } else if (postCategory == 'onsite-professional-development') {
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#farmshelf").addClass("hidden");
          $("#stem-pd-instructor").removeClass("hidden");
          $("#iblock-onsite-pd-instructor").removeClass("hidden");
            pdStudentDevices()

        } else if (postCategory == 'otis-for-educators') {
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#farmshelf").addClass("hidden");
          $("#online-pd-educator").removeClass("hidden");
          $("#Virtual-PD-SMART-Board").removeClass("hidden");
            pdStudentDevices()

        } else if (postCategory == 'virtual-professional-development') {
          $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
          $("#farmshelf").addClass("hidden");
          $("#iblock-onsite-pd-instructor").removeClass("hidden");
          $("#Virtual-PD-SMART-Board").removeClass("hidden");
            pdStudentDevices()
        }
      },
      complete:function(data){
        $(".solution-svg-container #loader").hide();
      },
      cache: false
    });
  });

  // SMART BOARD OPTION CHECKBOX
  // HIDE ALL IMAGE ELEMENTS IN SVG CONTAINER
  // UPDATE STUDENT DEVICE IMAGES AND APPEND NEW IMAGE PATH BASED IN 'data-type' ATTRIBUTE
  // SHOW STUDENT DEVICE, TEACHER, SMART BOARD ID ELEMENTS
  // ADD CHECK STATUS TO ITEM THAT WAS CLICKED OF THE 'input' ELEMENT
  // LOOP THROUGH SIMILAR SIBLING ELEMENTS AND MARK UNCHECKED
  // WHEN CHECKBOX ELEMENT IS CHECKED ADD 'selected' CLASS TO PARENT ELEMENT
  $("#main-solution-container .solution-item.smart-board-option .smart-board-title .solution-details label.checkbox").on( "click", function() {
    var dataType = $(this).attr('data-type');
      hideAllElements()
      $(".solution-svg-container #loader").hide();

      $("#deviceOne").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device1.svg').fadeIn(1000);
      $("#deviceTwo").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device2.svg').fadeIn(1000);
      $("#deviceThree").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device3.svg').fadeIn(1000);
      $("#deviceFour").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/pd-product-student-device4.svg').fadeIn(1000);

        if (dataType == '7000r') {
          $("#smart-board-add-on").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-7000r.svg').fadeIn(1000);
        } else if (dataType == '6000s') {
          $("#smart-board-add-on").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-6000s.svg').fadeIn(1000);
        } else if (dataType == 'mx') {
          $("#smart-board-add-on").attr("href", '/wp-content/themes/teq_v4-0/inc/ui/smart-board-add-on-solution-mx.svg').fadeIn(1000);
        }

        $(".solution-svg-container svg .classroom-element.student").removeClass("hidden");
        $("#smart-board-add-on").removeClass("hidden");
        $("#stem-pd-instructor").removeClass("hidden");

      $(".smart-board-option .smart-board-title .solution-details       label.checkbox input").each(function() {
        $(this).prop('checked',false);
      });
      $(this).children('input').prop('checked',true);
      $(this).closest('.smart-board-title').addClass('is-selected');

    $('html, body').animate({
        scrollTop: $("#productSelections").offset().top
    }, 480);
  });
  // UNCHECK ALL SMART BOARD OPTIONS
  $("#main-solution-container button.removeSmartOptions").on( "click", function() {
    $(".smart-board-option .smart-board-title .solution-details label.checkbox input").each(function() {
      $(this).prop('checked',false);
      $(this).closest('.smart-board-title').removeClass('is-selected');
    });
    $("#smart-board-add-on").addClass("hidden");
  });

  // PRINT YOUR SOLUTION button
  // ENABLE PRINT FUNCTION WITH THE PRINT STYLE GUIDE
  $("#printYourSolution").click(function(){
    $(".solution-details").each(function() {
      $(this).removeClass("ng-hide").addClass("is-active");
    });
      window.print();
      location.reload();
        return false;
  });

});


function checkedItems() {
  var array = []
  var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
  for (var i = 0; i < checkboxes.length; i++) {
    array.push(checkboxes[i].value)
  }
  console.log(array);
}
