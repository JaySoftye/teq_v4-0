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
      { id: "8", content: "<span>When you’re ready to take</span> <span>those ideas and build your own solution,</span> <span>head to our <a href='/create-your-solution'><strong><u>Create</u></strong></a> page</span> <span>where we’ll guide you through</span> <span>a unique solution</span> <span>for your school or district</span> <span>— everything from STEM solutions</span> <span>to project-based learning</span> <span>to professional development.</span>" },
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
        {id: '', name: 'All Grade Levels'},
        {id: 'grades-k-2', name: 'Grades K-2'},
        {id: 'grades-3-5', name: 'Grades 3-5'},
        {id: 'grades-6-8', name: 'Grades 6-8'},
        {id: 'grades-9-12', name: 'Grades 9-12'}
      ];
    });
    app.controller('stemSubjectMatterFilter', function($scope) {
      $scope.items = [
        {id: '', name: 'All Subject Matters'},
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
        {id: '', name: 'All Proficiencies'},
        {id: 'easy-proficiency', name: 'Easy Proficiency'},
        {id: 'intermediate-proficiency', name: 'Intermediate Proficiency'},
        {id: 'advanced-proficiency', name: 'Advanced Proficiency'}
      ];
    });
    app.controller('curriculumVersatilityFilter', function($scope) {
  	   $scope.items = [
         {id: '', name: 'Any Curriculum Level'},
         {id: 'subject-grade-specific', name: 'Subject Grade Specific'},
         {id: 'medium-curriculum-versatility', name: 'Medium Curriculum Versatility'},
         {id: 'high-curriculum-versatility', name: 'High Curriculum Versatility'}
       ];
    });
    app.controller('edTechFilter', function($scope) {
  	   $scope.items = [
         {id: '', name: 'All Products'},
         {id: 'interactive-flat-panels', name: 'Interactive Flat Panels'},
         {id: 'collaborative-software', name: 'Collaborative Software'},
         {id: 'active-learning-spaces', name: 'Active Learning Spaces'},
         {id: 'audio-enhancement', name: 'Audio Enhancement'},
         {id: 'storage-and-carts', name: 'Storage & Carts'}
       ];
    });
    app.controller('productTypeFilter', function($scope) {
  	   $scope.items = [
         {id: '', name: 'All Products'},
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

  /**
    * NEDM FUNCTIONS
    * MODELS DECLARED FOR USE IN VALIDATION ON FIRST FORM STEP
    * THESE ARE REQUIRED FIELDS ONLY
    * Default ng-values should be set to null or empty
    */
      $scope.nedmSurveyFirstName = '';
      $scope.nedmSurveyLastName = '';
      $scope.nedmSurveyTitleRole = '';
      $scope.nedmSurveySchoolName = '';
      $scope.nedmSurveyContactPhone = '';
      $scope.nedmSurveyContactEmail = '';
      $scope.nedmSurveyErrorCheck = true;
      $scope.nedmSurveySubmitField = 'FINISH AND SUBMIT';

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
        // IF VIDEO ELEMENT EXIST PAUSE ON CLOSE
        $(".modal-content video").each(function() {
          $(this).get(0).pause();
        });
      });
      $('body').on('click', ".modal-background", function() {
        // IF VIDEO ELEMENT EXIST PAUSE ON CLOSE
        $(".modal-content video").each(function() {
          $(this).get(0).pause();
        });
      });


      // MODAL FUNCTION FOR SIMILAR PRODUCTS
      // CLICK FUNCTION ENABLED FOR PRICING AND SIMILAR PRODUCT MODALS
      // MODAL ELEMENT div#product-form GIVEN ACTIVE-STATE
      // IF PRICING ELEMENT TRIGGER span.pricing-modal-ativate CLICKED SHOW PRICING FORM .model-content.pricing-form
      $('.navbar-menu.similar-products-template').on('click', ".navbar-item.product-demo-request span.pricing-modal-activate", function() {
        $('.modal.product-pricing').addClass("is-active");
          $('.modal.product-pricing .modal-content.similar-products').hide();
            $('.modal.product-pricing .modal-content.pricing-form').css('display', 'flex');
      });
      $('.site-main.section-container').on('click', ".pricing-modal-activate", function() {
        $('.modal.product-pricing').addClass("is-active");
          $('.modal.product-pricing .modal-content.similar-products').hide();
            $('.modal.product-pricing .modal-content.pricing-form').css('display', 'flex');
      });
      // IF SIMILAR PRODUCT ELEMENT TRIGGER span.similar-product-modal-ativate CLICKED SHOW PRICING FORM .model-content.similar-products
      $('.site-main.section-container').on('click', ".similar-product-modal-activate", function() {
        $('.modal.product-pricing').addClass("is-active");
          $('.modal.product-pricing .modal-content.pricing-form').hide();
            $('.modal.product-pricing .modal-content.similar-products').css('display', 'flex');
      });

    });

  // INFINITE CAROUSEL FUNCTION
  // SET OBJECT GLOBAL FUNCTION TO CONTAIN CONTENT
  // PARSE STORED DATA IN ARRAY AND ILERTERATE OVER LOOP
  var $jscomp = { scope: {} };

  $jscomp.defineProperty =
    "function" == typeof Object.defineProperties
      ? Object.defineProperty
        : function (a, b, c) {
          if (c.get || c.set)
            throw new TypeError("ES3 does not support getters and setters.");
            a != Array.prototype && a != Object.prototype && (a[b] = c.value);
        };

  $jscomp.getGlobal = function (a) {
    return "undefined" != typeof window && window === a
      ? a
        : "undefined" != typeof global && null != global
      ? global
        : a;
  };

  $jscomp.global = $jscomp.getGlobal(this);
  $jscomp.SYMBOL_PREFIX = "jscomp_symbol_";

  $jscomp.initSymbol = function () {
    $jscomp.initSymbol = function () {};
    $jscomp.global.Symbol || ($jscomp.global.Symbol = $jscomp.Symbol);
  };

  $jscomp.symbolCounter_ = 0;
  $jscomp.Symbol = function (a) {
    return $jscomp.SYMBOL_PREFIX + (a || "") + $jscomp.symbolCounter_++;
  };

  $jscomp.initSymbolIterator = function () {
    $jscomp.initSymbol();
    var a = $jscomp.global.Symbol.iterator;
    a || (a = $jscomp.global.Symbol.iterator = $jscomp.global.Symbol("iterator"));
      "function" != typeof Array.prototype[a] &&

      $jscomp.defineProperty(Array.prototype, a, {
        configurable: !0,
        writable: !0,
        value: function () {
          return $jscomp.arrayIterator(this);
        }
      });

    $jscomp.initSymbolIterator = function () {};
  };

  $jscomp.arrayIterator = function (a) {
    var b = 0;
    return $jscomp.iteratorPrototype(function () {
      return b < a.length ? { done: !1, value: a[b++] } : { done: !0 };
    });
  };

  $jscomp.iteratorPrototype = function (a) {
    $jscomp.initSymbolIterator();
    a = { next: a };
      a[$jscomp.global.Symbol.iterator] = function () {
        return this;
      };
    return a;
  };

  $jscomp.polyfill = function (a, b, c, d) {
    if (b) {
      c = $jscomp.global;
      a = a.split(".");
        for (d = 0; d < a.length - 1; d++) {
          var f = a[d];
          f in c || (c[f] = {});
          c = c[f];
        }
      a = a[a.length - 1];
      d = c[a];
      b = b(d);
      b != d &&
        null != b &&

      $jscomp.defineProperty(c, a, {
        configurable: !0,
        writable: !0,
        value: b
      });
    }
  };

  $jscomp.polyfill(
    "Array.from",
    function (a) {
      return a
        ? a
        : function (a, c, d) {
          $jscomp.initSymbolIterator();
          c =
            null != c
              ? c
              : function (a) {
                  return a;
              };

          var b = [],
            e = a[Symbol.iterator];
          if ("function" == typeof e)
            for (a = e.call(a); !(e = a.next()).done; )
              b.push(c.call(d, e.value));
          else
            for (var e = a.length, g = 0; g < e; g++) b.push(c.call(d, a[g]));
          return b;
        };
      },
      "es6-impl",
      "es3"
    );

var MOUSE_EVENTS = ["click", "touchstart"],
  Carousel = function (a) {
    this.element = a;
    this.init();
  };
Carousel.prototype.init = function () {
  var a = this;
  this.items = Array.from(this.element.querySelectorAll(".carousel-item"));
  MOUSE_EVENTS.forEach(function (b) {
    var c = a.element.querySelector(".carousel-nav-left"),
      d = a.element.querySelector(".carousel-nav-right");
    c &&
      c.addEventListener(
        b,
        function (b) {
          b.preventDefault();
          a.move("previous");
          a.autoplayInterval &&
            (clearInterval(a.autoplayInterval),
            a.autoPlay(a.element.dataset.delay || 5e3));
        },
        !1
      );
    d &&
      d.addEventListener(
        b,
        function (b) {
          b.preventDefault();
          a.move("next");
          a.autoplayInterval &&
            (clearInterval(a.autoplayInterval),
            a.autoPlay(a.element.dataset.delay || 5e3));
        },
        !1
      );
    });
    this.initOrder();
    this.element.dataset.autoplay &&
      "true" == this.element.dataset.autoplay &&
      this.autoPlay(this.element.dataset.delay || 5e3);
    };
    Carousel.prototype.initOrder = function () {
      var a = this.element.querySelector(".carousel-item.is-active");
        (a = this.items.indexOf(a))
        ? this.items.push(this.items.splice(0, a))
          : this.items.unshift(this.items.pop());
        this.setOrder();
    };
    Carousel.prototype.setOrder = function () {
      this.items.forEach(function (a, b) {
        a.style["z-index"] = 1 !== b ? "0" : "1";
        a.style.order = b;
      });
    };
    Carousel.prototype.move = function (a) {
      a = void 0 === a ? "next" : a;
      var b = this;
        this.items.length &&
        (this.element
          .querySelector(".carousel-item.is-active")
          .classList.remove("is-active"),
        "previous" === a
        ? (this.items.unshift(this.items.pop()),
          this.element.classList.add("is-reversing"))
        : (this.items.push(this.items.shift()),
          this.element.classList.remove("is-reversing")),
        (1 <= this.items.length ? this.items[1] : this.items[0]).classList.add("is-active"),
    this.setOrder(),
    this.element.classList.toggle("carousel-animated"),

      setTimeout(function () {
        b.element.classList.toggle("carousel-animated");
      }, 50));
    };
    Carousel.prototype.autoPlay = function (a) {
      var b = this;
      this.autoplayInterval = setInterval(
        function () {
          b.move("next");
        },
        void 0 === a ? 5e3 : a
      );
    };
    document.addEventListener("DOMContentLoaded", function () {
      var a = document.querySelectorAll(".carousel, .hero-carousel");
      [].forEach.call(a, function (a) {
        new Carousel(a);
      });
    });
