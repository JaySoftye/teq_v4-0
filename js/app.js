/**
 * js scripts for Teq-v4-0
 *
 * Initial app module
 */

 var app = angular.module('application', ['ngSanitize']);

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
  *
  */
  app.controller('theCompleteThought', function($scope) {
    $scope.show = 1;
    $scope.items = [
      { id: "1", content: "Yes, part of what we do is sell classroom technologies like SMART boards, STEM solutions, and a broad range of professional development services." },
      { id: "2", content: "But we do so much more than that." },
      { id: "3", content: "We want to help you think big. We want to help you bring together all the dynamic, moving parts of education so that no matter what your goal is, you have tools to help you reach it. We want to partner with schools and districts to further the immersive, engaging learning that ignites student learning." },
      { id: "4", content: "Here’s why we’re qualified to help you." },
      { id: "5", content: "For 50 years, we’ve been in the trenches of K12 education, watching it evolve, and seeing first-hand how technology has impacted learning." },
      { id: "6", content: "It occurred to us that if we add up our history, staff, resources, and expertise, we could start our own school. So, to show you just how equipped we are, we’ve created a case study to lay out how we would do it." },
      { id: "7", content: "Take a look at our hypothetical case study here, or head straight to our Evolve page, where you’ll get the big-picture ideas and ideology that guide the evolution of education." },
      { id: "8", content: "When you’re ready to take those ideas and build own solution, head to our Create page where we’ll guide you through a unique solution for your school or district — everything from STEM solutions to project-based learning to professional development." },
      { id: "9", content: "Together, we can help you create your own Complete Thought." }
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
