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

    // Global show hide function for accordion tips
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

/** DISPLAY PD Team based on array **/
    var pdTeamArray ={"PD": [
      {  "headshot": "AdamHerman.png", "name": "Adam Herman",  "title": "PD Specialist", "file": "Adam-Herman" },
      {  "headshot": "BenjaminCebulash.png", "name": "Benjamin Cebulash",  "title": "PD Specialist", "file": "bencebulash" },
      {  "headshot": "BrandenAndrade.png", "name": "Branden Andrade",  "title": "Curriculum Specialist", "file": "BrandenAndrade" },
      {  "headshot": "CaylieLehrer.png", "name": "Caylie Lehrer",  "title": "Curriculum Specialist", "file": "CaylieLehrer" },
      {  "headshot": "ChristineBell.png", "name": "Christine Bell",  "title": "Curriculum Specialist ", "file": "ChristineBell" },
      {  "headshot": "DiomedesGonzalez.png", "name": "Diomedes Gonzalez Jr.",  "title": "PD Specialist", "file": "Diomedes-Gonzalez" },
      {  "headshot": "EmmaFoley.png", "name": "Emma Foley",  "title": "Curriculum Specialist", "file": "EmmaFoley" },
      {  "headshot": "GregDaSilva.png", "name": "Greg DaSilva",  "title": "PD Specialist", "file": "Greg-DaSilva" },
      {  "headshot": "JasmineRivera.png", "name": "Jasmine Rivera",  "title": "PD Specialist", "file": "Jasmine-Rivera" },
      {  "headshot": "JosephQuadrino.png", "name": "Joseph Quadrino",  "title": "Curriculum Specialist", "file": "JosephQuadrino" },
      {  "headshot": "JosephSanfilippo.png", "name": "Joseph Sanfilippo",  "title": "Director of eLearning", "file": "JosephSanfilippo" },
      {  "headshot": "LauraJakubowski.png", "name": "Laura Jakubowski",  "title": "PD Specialist", "file": "LJakubowski" },
      {  "headshot": "MatthewThaxter.png", "name": "Matt Thaxter",  "title": "PD Account Manager and Specialist", "file": "MatthewThaxter" },
      {  "headshot": "MichelleHollander.png", "name": "Michelle Hollander",  "title": "Director of Content and Curriculum", "file": "MichelleHollander" },
      {  "headshot": "NicoleRave.png", "name": "Nicole Rave",  "title": "Curriculum Specialist", "file": "NicoleRave" },
      {  "headshot": "PatriciaUmhafer.png", "name": "Patricia Umhafer",  "title": "PD Specialist", "file": "PatriciaUmhafer" },
      {  "headshot": "RobertAbraham.png", "name": "Robert Abraham",  "title": "PD Account Manager and Specialist", "file": "RobertAbraham" },
      {  "headshot": "Robert-WayneHarris.png", "name": "Robert-Wayne Harris",  "title": "Chief Learning Officer", "file": "Robert-WayneHarris" },
      {  "headshot": "SkylaLilly.png", "name": "Skyla Lilly",  "title": "PD Specialist", "file": "Skyla-Lilly" },
      {  "headshot": "TerryVanNoy.png", "name": "Terry VanNoy",  "title": "PD Specialist", "file": "TerryVanNoy" },
      ]};

    var i = 0;

    for(var i in pdTeamArray.PD) {

      $("table#pdTeam").append( "<tr><td style='width:10%;'><img src=\"http://www.teq.com/images/headshots_circles/" + pdTeamArray.PD[i].headshot + "\" /></td><td>" + pdTeamArray.PD[i].name + "</td><td>" + pdTeamArray.PD[i].title + "</td><td><a href=\"../../pd/" + pdTeamArray.PD[i].file + "\"><strong>View Details</strong></a></td></tr>" );

    }

  });
