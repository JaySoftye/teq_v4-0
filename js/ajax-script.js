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
    $('select').on('change', function() {
      var value = '.' + $(this).val();
      $('div.filter-results .columns.is-multiline article.product-item').show().not(value).hide();

      // If no results are visible
      if($('div.filter-results .columns.is-multiline').children(':visible').length == 0) {
        $('.no-products-found').show();
      } else {
        $('.no-products-found').hide();
      }
    });

    // Product Filter Reset
    $('input#reset-filters').click(function() {
      $('div.filter-results .columns.is-multiline article.product-item').show();
      $('.no-products-found').hide();
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
      $('.show-hide-element-content').slideToggle('slow');
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

  });
