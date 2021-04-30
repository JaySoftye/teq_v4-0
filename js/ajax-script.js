/**
 * jQuery show hide scripts for Teq-v4-0
 *
 * Initial jquery
 */
 /** DISPLAY ONLY SELECTED:OPTION ON THE RESULTS OF SEARCH TERM **/
  $(document).ready(function(){

    // Product modal popup activate
    $('.product-modal-link').click(function() {
      $('.modal.product-popup').addClass('is-active');
    });

    // Global function to close any modal
    $('.modal-close, .modal-background').click(function() {
      $('.modal').removeClass('is-active');
	    $('#youtube-video').attr("src", $("#youtube-video").attr("src"));
    });

    // Product Filter Function to hide unselected items
    // article.product-item ELEMENT LOOPED AND HIDDEN BASED ON SELECTION
    $('select.product-filter').on('change', function() {
      var value = '.' + $(this).val();
        $(this).attr("disabled", true);

      $("article.product-item").each(function() {
        if($(this).is(":hidden")) {
            $(this).hide(360).addClass('product-filtered');
        } else if($(this).is(value)) {
            $(this).show(360).removeClass('product-filtered');
        } else if($(this).not(value)) {
            $(this).hide(360).addClass('product-filtered');
        }
      });

      // If no results are visible
      if($('div.filter-results .columns.is-multiline').children(':visible').length == 0) {
        $('.no-products-found').show();
      } else {
        $('.no-products-found').hide();
      }
    });

    // Product Filter Reset
    $('.reset-filters').click(function() {
      $('div.filter-results .columns.is-multiline article.product-item').show();
        $('select.product-filter').attr("disabled", false).prop('selectedIndex',0);;
          $('.no-products-found').hide();
    });

    // BASIC FORM VALIDATION FOR PRODUCT SEARCH FILTERS
    // Product Type is REQUIRED
    // ADD CLASS TO REQUIRED html Select Element
    $("input#searchProducts").click(function () {
      if( !$('#selectedProductType').val() ) {
        $('select#selectedProductType').addClass('empty-required-item');
      }
    });

    // Product Sub Menu dropdown menu for mobile views at 1230px wide
    $('.mobile-dropdown-trigger').click(function() {
      $('.mobile-dropdown').toggleClass('dropdown-active');
    });
    $('.navbar-end.mobile-dropdown a.navbar-item').click(function() {
      $('.mobile-dropdown').toggleClass('dropdown-active');
    });
    $('main.site-main section').click(function() {
      if ($('.navbar-end.mobile-dropdown').hasClass('dropdown-active')) {
        $('.navbar-end.mobile-dropdown').removeClass('dropdown-active');
      }
    });

    // Global show hide function for ACCORDION TABS ON PRODUCT PAGES
    $('.showHideElement .show-hide-element-trigger').click(function() {
      $('.show-hide-element-content').slideToggle();
      $([document.documentElement, document.body]).animate({
        scrollTop: $('.show-hide-element-content').offset().top
      });
    });

    // Nav menu icon for product card toggles
    $('a.navbar-burger').click(function() {
      var parentContainer = $(this).parent();
      var productContent = $(parentContainer).find('.toggle-content')
        $(this).toggleClass('is-active');
        $(productContent).toggle();
    });

    // CLICK FUNCTION TO SCROLL TO ELEMENT OF ID nextTarget
    $("#scrollNext").on("click", function () {
      event.preventDefault();
        $('html, body').animate({
          scrollTop: $("#nextTarget").offset().top
        }, 1000);
    });

    // CLICK FUNCTION FOR FAQ CARDS
    $('#nedm-survey .faq-accordion.card').each( function(index) {
      $(this).click( function() {
        $('p',this).toggleClass('selected');
      });
    });

    // SCROLL TO FUNCTION
    // Set DATA ATTR SCROLL Atrribute to ID of element
    $(".scrollto").click(function(event) {
      event.preventDefault();
      var defaultAnchorOffset = 0;
        var anchor = $(this).attr('data-attr-scroll');
          var anchorOffset = $('#'+anchor).attr('data-scroll-offset');

      if (!anchorOffset)
        anchorOffset = defaultAnchorOffset;
      $('html,body').animate({
        scrollTop: $('#'+anchor).offset().top - anchorOffset
      }, 500);
    });

  });
