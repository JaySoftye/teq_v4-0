/**
 * js scripts for Teq-v4-0
 *
 * Initial app module
 */

 var app = angular.module('application', ['ngSanitize', 'ngAnimate']);

/**
  * Sticky Navbar when scolling
  */
 app.controller('navCtrl', function($scope) {
   $scope.navbarVisible = false;
   $scope.isActive = false;
   $scope.toggle = function() {
     $scope.navbarVisible = !$scope.navbarVisible;
     $scope.isActive = !$scope.isActive;
   };
 });


/**
  * FILTER TO ALLOW HTML CHARACTARS IN STRING
  */
 app.filter('trustAsHtml',['$sce', function($sce) {
    return function(text) {
      return $sce.trustAsHtml(text);
    };
  }]);

/**
  * Menu Buttons for Main Dropdown
  * Show Main menu for scope.mainMenu
  * Show STEM menu for scope.stemMenu
  * Show Product Filters menu for scope.filtersMenu
  */
 app.controller("dropdownCtrl",function($scope){
   // MAIN DROPDOWN
   $scope.mainMenu = function(){

    // IF MAIN MENU CONTAINER IS NOT ACTIVE MAKE ACTIVE
    if ($scope.menuActive === "active main")
      $scope.menuActive = "";
    else
      $scope.menuActive = "active main";

    // MAKE MENU ICON ACTIVE AND/OR NON ACTIVE
    if ($scope.mainMenuActive === "active")
      $scope.mainMenuActive = "";
    else
      $scope.mainMenuActive = "active";
      $scope.stemMenuActive = "";
      $scope.filtersMenuActive = "";
   };

   $scope.stemMenu = function(){
     if ($scope.menuActive === "active stem")
       $scope.menuActive = "";
     else
       $scope.menuActive = "active stem";

     if ($scope.stemMenuActive === "active")
       $scope.stemMenuActive = "";
     else
       $scope.stemMenuActive = "active";
       $scope.mainMenuActive = "";
       $scope.filtersMenuActive = "";
   };

   $scope.filtersMenu = function(){
     if ($scope.menuActive === "active product-filters")
       $scope.menuActive = "";
     else
       $scope.menuActive = "active product-filters";

     if ($scope.filtersmMenuActive === "active")
      $scope.filtersMenuActive = "";
     else
      $scope.filtersMenuActive = "active";
      $scope.mainMenuActive = "";
      $scope.stemMenuActive = "";
     };
 });

 /**
   * Menu Buttons for Main Dropdown
   * Show Main menu for scope.mainMenu
   * Show STEM menu for scope.stemMenu
   * Show Product Filters menu for scope.filtersMenu
   */
  app.controller("navCtrl",function($scope){
    $scope.openFiltersMenu = function(){
      if ($scope.menuActive === "active product-filters")
        $scope.menuActive = "";
      else
        $scope.menuActive = "active product-filters";

      if ($scope.filtersmMenuActive === "active")
       $scope.filtersMenuActive = "";
      else
       $scope.filtersMenuActive = "active";
       $scope.mainMenuActive = "";
       $scope.stemMenuActive = "";
      };
  });

 /**
   * DROP DOWN menu
   * GRAB ALL DROPDOWN TRIGGER elements
   * LOOP THROUGH ALL ELEMENTS AND TOGGLE class
   * 'menu-closed' is default
   */
   var dropdownItem = document.getElementsByClassName('has-dropdown-menu');

    for (i = 0; i < dropdownItem.length; i++) {
        dropdownItem[i].addEventListener('click', toggleItem, false);
    }
    function toggleItem() {
        var itemClass = this.className;
        for (i = 0; i < dropdownItem.length; i++) {
            dropdownItem[i].className = 'has-dropdown-menu menu-closed';
        }
        if (itemClass == 'has-dropdown-menu menu-closed') {
            this.className = 'has-dropdown-menu menu-open';
        }
    }

/**
  * Home page create, browse, evolve options
  */
  app.directive("scroll", function ($window) {
    return function(scope, element, attrs) {
      angular.element($window).bind("scroll", function() {
        var option = angular.element( document.querySelectorAll( '.column.reveal-mask' ) );
         if (this.pageYOffset >= 100) {
           option.removeClass('not-inVisible').addClass('inView');
         } else if (this.pageYOffset <= 100) {
           option.removeClass('inView').addClass('not-inVisible');
         } else {
           option.addClass('inView');
         }
         scope.$apply();
      });
    };
  });

/**
  * Browse Product Pages animated Background
  * full-section full width
  */
  app.directive("scroll", function ($window) {
    return function(scope, element, attrs) {
      angular.element($window).bind("scroll", function() {
        var option = angular.element( document.querySelectorAll( '.full-section.target-element' ) );
         if (this.pageYOffset >= 100) {
           option.removeClass('action').addClass('active');
         } else if (this.pageYOffset <= 100) {
           option.removeClass('active').addClass('action');
         } else {
           option.addClass('active');
         }
         scope.$apply();
      });
    };
  });

/**
  * Global Class
  * Target element with class and active class when in viewpoint
  */
  (function() {
    var elements;
    var windowHeight;
    // Query your targeted element
    function init() {
      elements = document.querySelectorAll('.targetScrollContent');
      windowHeight = window.innerHeight;
    }
    // Check is window position in relation to your target
    function checkPosition() {
      for (var i = 0; i < elements.length; i++) {
        var element = elements[i];
        var positionFromTop = elements[i].getBoundingClientRect().top;

        // If element is less than the height of the window its in view
        if (positionFromTop - windowHeight <= 0) {
          element.classList.add('is-visible');
          element.classList.remove('not-visible');
        } else {
          element.classList.remove('is-visible');
          element.classList.add('not-visible');
        }
      }
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);

      init();
        checkPosition();
  }) ();


  /**
  * THE COMPLETE THOUGHT ACCORDION
  * SET ARRAY FOR ACCORDION items
  * UTILIZE THE ng-show Directive TO FILTER THROUGH SHOW AND HIDE
  * nextItem and prevItem FUNCTION SETS THE SHOWN ITEM BASED UPON ID VALUE FROM ARRAY
  * ANIMATION SEQUENCES ARE BROUGHT FROM CSS LAYOUT STYLESHEET
  */
  app.controller('theCompleteThought', function($scope) {
    $scope.show = 1;
    $scope.items = [
      { id: "1", content: "<span>Yes, part of what we do is sell classroom technologies</span> <span>like SMART boards,</span> <span>STEM solutions,</span> <span>and a broad range of professional development services.</span>" },
      { id: "2", content: "<span>But</span> <span>we do so much more than that.</span>" },
      { id: "3", content: "<span>We want to help you think big.</span> <span>We want to help you</span> <span>bring together all the dynamic,</span> <span>moving parts of education</span> <span>so that no matter what your goal is,</span> <span>you have tools to help you reach it.</span> <span>We want to partner with schools and districts</span> <span>to further the immersive, engaging learning</span> <span> that ignites student learning.</span>" },
      { id: "4", content: "<span>Here’s why we’re qualified</span> <span>to help you.</span>" },
      { id: "5", content: "<span>For 50 years,</span> <span>we’ve been in the trenches of K12 education,</span> <span>watching it evolve,</span> <span>and seeing first-hand how technology</span> <span>has impacted learning.</span>" },
      { id: "6", content: "<span>It occurred to us</span> <span>that if we add up our history,</span> <span>staff,</span> <span>resources,</span> <span>and expertise,</span> <span>we could start our own school.</span> <span>So,</span> <span>to show you just how equipped we are,</span> <span>we’ve created a case study to lay out how we would do it.</span>" },
      { id: "7", content: "<span>Take a look at our</span> <span>hypothetical</span> <span><a class='strong modal-open-button' id='caseStudyDownload'><u>case study here,</u></a></span> <span>or head straight to our <a href='/evolve'><strong><u>Evolve</u></strong></a> page,</span> <span>where you’ll get the big-picture</span> <span>ideas and ideology</span> <span>that guide the evolution of education.</span>" },
      { id: "8", content: "<span>When you’re ready to take</span> <span>those ideas and build own solution,</span> <span>head to our <a href='/create-your-solution'><strong><u>Create</u></strong></a> page</span> <span>where we’ll guide you through</span> <span>a unique solution</span> <span>for your school or district</span> <span>— everything from STEM solutions</span> <span>to project-based learning</span> <span>to professional development.</span>" },
      { id: "9", content: "<span>Together,</span> <span>we can help you</span> <span>create</span> <span>your own Complete Thought.</span>" }
    ];

    $scope.nextItem = function() {
      $scope.show = $scope.show + 1;
        console.log($scope.show);
    }
    $scope.prevItem = function() {
      $scope.show = $scope.show - 1;
        console.log($scope.show);
    }
  });


  /**
    * CREATE DROPDOWN FILTERS
    * Target Control and display
    */
    app.controller('gradeLevelFilter', function($scope) {
  	  $scope.items = [
        {id: 'product-item', name: 'All Grade Levels'},
        {id: 'grades-k-2', name: 'Grades K-2'},
        {id: 'grades-3-5', name: 'Grades 3-5'},
        {id: 'grades-6-8', name: 'Grades 6-8'},
        {id: 'grades-9-12', name: 'Grades 9-12'}
      ];
    });
    app.controller('stemSubjectMatterFilter', function($scope) {
      $scope.items = [
        {id: 'product-item', name: 'All Subject Matters'},
        {id: 'coding', name: 'Coding'},
        {id: 'robotics', name: 'Robotics'},
        {id: 'hydroponics', name: 'Hydroponics'},
        {id: 'augmented-virtual-reality', name: 'Augmented/Virtual Reality'},
        {id: '3d-printing', name: '3D Printing'},
        {id: 'gaming', name: 'Gaming'},
        {id: 'instructional-software', name: 'Instructional Software'},
        {id: 'circuitry', name: 'Circuitry'}
      ];
    });
    app.controller('technologyProficiencyFilter', function($scope) {
      $scope.items = [
        {id: 'product-item', name: 'All Proficiencies'},
        {id: 'easy-proficiency', name: 'Easy Proficiency'},
        {id: 'intermediate-proficiency', name: 'Intermediate Proficiency'},
        {id: 'advanced-proficiency', name: 'Advanced Proficiency'}
      ];
    });
    app.controller('curriculumVersatilityFilter', function($scope) {
  	   $scope.items = [
         {id: 'product-item', name: 'Any Curriculum Level'},
         {id: 'subject-grade-specific', name: 'Subject Grade Specific'},
         {id: 'medium-curriculum-versatility', name: 'Medium Curriculum Versatility'},
         {id: 'high-curriculum-versatility', name: 'High Curriculum Versatility'}
       ];
    });
    app.controller('edTechFilter', function($scope) {
  	   $scope.items = [
         {id: 'product-item', name: 'All Products'},
         {id: 'interactive-flat-panels', name: 'Interactive Flat Panels'},
         {id: 'collaborative-software', name: 'Collaborative Software'},
         {id: 'active-learning-spaces', name: 'Active Learning Spaces'},
         {id: 'audio-enhancement', name: 'Audio Enhancement'},
         {id: 'storage-and-carts', name: 'Storage & Carts'}
       ];
    });
    app.controller('productTypeFilter', function($scope) {
  	   $scope.items = [
         {id: 'product-item', name: 'All Products'},
         {id: 'STEM Technologies', name: 'STEM Technology'},
         {id: 'Educational Technology', name: 'Educational Technology'},
         {id: 'Professional Development', name: 'Professional Development'},
       ];
    });

  /**
    * TABBED CONTENT for Product Pages
    * Target Control in Module and Show Matching Element
    * Scroll to top once tap is set
    */
    app.controller('TabController', ['$scope', function($scope) {
      $scope.tab = 1;

      $scope.setTab = function(newTab){
        $scope.tab = newTab;
          $('html, body').animate({
            scrollTop: 0
          }, 'fast'); // 'fast' is for fast animation
      };

      $scope.isSet = function(tabNum){
        return $scope.tab === tabNum;
      };
    }]);

    /**
      * EVENT REGISTRATION CONFIRMATION
      * GRAB URL PARAMETERS From the Hubspot Form Submission via $location method
      * Set values as HTML elements
      */
    app.controller("eventRegistrationConfirmation", function($scope) {

      const urlParams = new URLSearchParams(window.location.search);
        const eventName = urlParams.get('event');
          const firstName = urlParams.get('firstname');

      $scope.eventName = eventName;
      $scope.firstName = firstName;

    });


    /**
      * PRODUCT PAGE SVG CIRCLE HIGHLIGHT
      * GET DOC HEIGHT USING OffsetScroll and Body Height
      * USE MATH FUNCTION TO COMPARE BROWSER HEIGHT TO THE SCROLL location
      * SET DocHeight to variable
      */
    function getDocHeight() {
      var D = document;
        return Math.max (
          D.body.scrollHeight, D.documentElement.scrollHeight,
            D.body.offsetHeight, D.documentElement.offsetHeight,
              D.body.clientHeight, D.documentElement.clientHeight
        )
    }
    var docHeight = getDocHeight();

    /**
      * DETERMINE THE AMOUNT USER HAS SCROLLED DOWN THE PAGE
      * Compare the DocHeight to the current page position as well as the page offset
      * Initial scroll event listener
      */
    function amountScrolled() {
        var winHeight= window.innerHeight || (document.documentElement || document.body).clientHeight
          var docHeight = getDocHeight()
            var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop
              var trackLength = docHeight - winHeight

        // Multiple to amount * 100 to get pertage of page scrolled
        // gets percentage scrolled (ie: 80 or NaN if tracklength == 0)
        var pctScrolled = Math.floor(scrollTop/trackLength * 100)

        /**
          * GET THE FEATURED IMAGE SVG CIRCLE; ADDED conditional that this element must exist
          * Set Radius amount to 45 and subsctract the percentage of the page scrolled.
          * Set the 'r' attribute on the SVG circle element to animate the sequence
          * Once the Radius Attribute reaches 0 stop the sequence
          */
          var featuredHighlight = document.getElementById('featureHighlight');
            var featuredRadius = "45" - pctScrolled * 7.5;
              if (featuredRadius > 0 && featuredHighlight) {
                featuredHighlight.setAttribute('r', featuredRadius + "%");
              }

        /**
          * GET THE FEATURED IMAGE SVG CIRCLE; ADDED conditional that this element must exist
          * Set Radius amount to 45 and subsctract the percentage of the page scrolled.
          * Set the 'r' attribute on the SVG circle element to animate the sequence
          */
          var logoHighlight = document.getElementById('logoHighlight');
            var logoRadius = "0" + pctScrolled * 1.5;
              if (logoRadius <= 40 && logoHighlight) {
                logoHighlight.setAttribute('r', logoRadius + "%");
              }

        // console.log(pctScrolled + "% has been scrolled")
        // console.log(logoRadius)
    }
    window.addEventListener("scroll", function(){
        amountScrolled()
    }, false);


    $(document).ready(function() {
      // MODAL FUNCTION
      // GET THE ID OF THE CLICKED Element
      // FIND THE MATCHING ELEMENT WITH ATTRIBUTE title
      // addClass TO MATCHING Element
      $('body').on('click', ".modal-open-button", function() {
        var modalTitle = $(this).attr("id");
        var modalTarget = $(".modal[data-modal-title='" + modalTitle + "']");
          $(modalTarget).addClass("is-active");
      });

      // CLOSE MODAL FUNCTION
      // GLOBAL FUNCTION
      // FIND ANY ELEMENT WITH CLASS "modal" REMOVE CLASS "is-active"
      $('body').on('click', ".close-modal", function() {
        $(".modal").removeClass("is-active")
      });
    });
