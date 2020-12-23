/**
 * js scripts for Teq-v4-0
 * Initial app module
 */

/**
  * DROPDOWN MENU FOR FINAL SOLUTIONS LIST
  * TOGGLE CLASS 'is-active' onclick for button target
  */
  app.controller('dropDownController', function($scope) {
    $scope.toggleMenu = function toggleMenu(event) {
      const dropDownContainer = event.target.closest('section');
        dropDownContainer.classList.toggle("is-active");
    };
  });

  app.controller('solutionController', function($scope) {

  /**
    * GRADE SELECTION FUNCTIONS
    * REMOVE DISABLED from NEXT button
    * SET CHECKED VALUE for each specific radio button based on ng-checked directive
    * SET CLASS VALUE using ng-class on SVG Grade Select Element based on scope
    * SET TEXT CONTENT VALUE for each grade selection with HTML bind
    */
    $scope.gradeLevelValue = '';

    $scope.gradesk2Selected = function () {
      document.getElementById("stemFieldsNext").removeAttribute("disabled");
      document.getElementById("stemFieldsNextMobile").removeAttribute("disabled");
      if (!$scope.gradek2Select) {
        $scope.gradeLevelValue = 'grades-k-2';
        $scope.gradeLevelText = 'Grades K-2';
        $scope.gradek2Select = true;
        $scope.grade35Select = false;
        $scope.grade68Select = false;
        $scope.grade912Select = false;
      }
      $scope.gradeContent = '<strong>Grades K-2</strong><br />Early childhood students need to be engaged in STEM learning at an early age, since building a foundation in STEM skills and concepts sets students up for success. Our STEM solutions for the elementary classroom focus on instilling core concepts in students, so collaboration, critical thinking, and problem-solving, become second nature.';
		};

    $scope.grades35Selected = function () {
      document.getElementById("stemFieldsNext").removeAttribute("disabled");
      document.getElementById("stemFieldsNextMobile").removeAttribute("disabled");
      if (!$scope.grade35Select) {
        $scope.gradeLevelValue = 'grades-3-5';
        $scope.gradeLevelText = 'Grades 3-5';
        $scope.gradek2Select = false;
        $scope.grade35Select = true;
        $scope.grade68Select = false;
        $scope.grade912Select = false;
      }
      $scope.gradeContent = '<strong>Grades 3-5</strong><br />It’s essential for students to be engaged in STEM learning at an early age, since building a foundation in STEM skills and concepts sets students up for success. The following STEM solutions for the elementary classroom focus on instilling core concepts in students, so collaboration, critical thinking, and problem-solving, become second nature.';
		};

    $scope.grades68Selected = function () {
      document.getElementById("stemFieldsNext").removeAttribute("disabled");
      document.getElementById("stemFieldsNextMobile").removeAttribute("disabled");
      if (!$scope.grade68Select) {
        $scope.gradeLevelValue = 'grades-6-8';
        $scope.gradeLevelText = 'Grades 6-8';
        $scope.gradek2Select = false;
        $scope.grade35Select = false;
        $scope.grade68Select = true;
        $scope.grade912Select = false;
      }
      $scope.gradeContent = '<strong>Grades 6-8</strong><br />Middle school students have the opportunity to build on their STEM foundation and to further engage with STEM learning. The solutions here enable the hands-on, immersive, and collaborative learning experiences that jumpstart student learning and cultivate future-ready skills. ';
		};

    $scope.grades912Selected = function () {
      document.getElementById("stemFieldsNext").removeAttribute("disabled");
      document.getElementById("stemFieldsNextMobile").removeAttribute("disabled");
      if (!$scope.grade912Select) {
        $scope.gradeLevelValue = 'grades-9-12';
        $scope.gradeLevelText = 'Grades 9-12';
        $scope.gradek2Select = false;
        $scope.grade35Select = false;
        $scope.grade68Select = false;
        $scope.grade912Select = true;
      }
      $scope.gradeContent = '<strong>Grades 9-12</strong><br />While in high school, students are able to hone and develop the STEM skills and knowledge they’ve been building throughout their academic careers. Our STEM solutions for high schools feature high-impact products, devices, and tools, so students can focus on enhancing and enriching the skills and know-how that make them career-ready.';
		};

 /**
   * STEM FOCUS SELECTION FUNCTIONS
   * REMOVE DISABLED from NEXT button
   * SET CHECKED VALUE for each specific radio button based on ng-checked directive
   * SET CLASS VALUE using ng-class on SVG Grade Select Element based on scope
   * SET TEXT CONTENT VALUE for each grade selection with HTML bind
   * SHOW ADDITIONAL RADIO FIELDS for general education field
   */
   $scope.stemFocusValue = '';
   $scope.generalEdValue = 'stem-technologies';

   $scope.codingSelected = function () {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (!$scope.codingSelect) {
        $scope.stemFocusValue = 'coding';
        $scope.stemFocusText = 'Coding';
        $scope.codingSelect = true;
        $scope.engineeringSelect = false;
        $scope.generalEdSelect = false;
        $scope.hydroponicsSelect = false;
        $scope.roboticsSelect = false;
      }
      $scope.stemContent = '<p><strong>Coding</strong></p><p>Explore options in coding and programming to ensure students thrive in computer science. Coding courses are an integral part of the STEM category in the OTIS platform and associated products will be part of your profile summary.</p>';
		};

    $scope.engineeringSelected = function () {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (!$scope.engineeringSelect) {
        $scope.stemFocusValue = 'engineering';
        $scope.stemFocusText = 'Engineering';
        $scope.codingSelect = false;
        $scope.engineeringSelect = true;
        $scope.generalEdSelect = false;
        $scope.hydroponicsSelect = false;
        $scope.roboticsSelect = false;
      }
      $scope.stemContent = '<p><strong>Engineering</strong></p><p>The fundamentals of engineering are highlighted in many of the courses and programs we offer and support on the OTIS platform and in iBlocks. Whether it is mechanical, electrical, or civil engineering, we have it covered. Your profile summary will highlight these options for you.</p>';
		};

    $scope.generalEdSelected = function () {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (!$scope.generalEdSelect) {
        $scope.stemFocusValue = 'general-education';
        $scope.stemFocusText = 'General Education';
        $scope.codingSelect = false;
        $scope.engineeringSelect = false;
        $scope.generalEdSelect = true;
        $scope.hydroponicsSelect = false;
        $scope.roboticsSelect = false;
      }
      $scope.stemContent = '<p><strong>General Education</strong></p><p>STEM is the perfect place to start transforming your classroom. By giving students the right tools and technology, you can spark curiosity, learning, and inquiry-based thinking. </p><p><strong>To further hone your General Education focus, select the subject(s) that best apply.</strong></p>';
		};

    $scope.hydroponicsSelected = function () {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (!$scope.hydroponicsSelect) {
        $scope.stemFocusValue = 'Hydroponics';
        $scope.stemFocusText = 'Hydroponics';
        $scope.codingSelect = false;
        $scope.engineeringSelect = false;
        $scope.generalEdSelect = false;
        $scope.hydroponicsSelect = true;
        $scope.roboticsSelect = false;
      }
      $scope.stemContent = '<p><strong>Hydroponics</strong></p><p>When you introduce students to hydroponics, they can explore everything from the history of farming, to the nutritional values of food, and the conditions required to grow and sustain a society’s agriculture. Appropriate products and content will be suggested in your profile summary.</p>';
		};

    $scope.roboticsSelected = function () {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (!$scope.roboticsSelect) {
        $scope.stemFocusValue = 'robotics';
        $scope.stemFocusText = 'Robotics';
        $scope.codingSelect = false;
        $scope.engineeringSelect = false;
        $scope.generalEdSelect = false;
        $scope.hydroponicsSelect = false;
        $scope.roboticsSelect = true;
      }
      $scope.stemContent = '<p><strong>Robotics</strong></p><p>Engage students in robotics with a wide range of products that build knowledge through hands-on learning. Many careers are started by the introduction of technologies at an early age. Robotics products appropriate for the grade level you identified will be suggested in your profile summary.</p>';
		};

    $scope.elaSelected = function () {
      if (!$scope.elaSelect) {
        $scope.generalEdValue = 'ela';
        $scope.generalEdText = ', English Language Arts';
        $scope.elaSelect = true;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
      }
    };
    $scope.mathematicsSelected = function () {
      if (!$scope.mathematicsSelect) {
        $scope.generalEdValue = 'mathematics';
        $scope.generalEdText = ', Mathematics';
        $scope.elaSelect = false;
        $scope.mathematicsSelect = true;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
      }
    };
    $scope.scienceSelected = function () {
      if (!$scope.scienceSelect) {
        $scope.generalEdValue = 'science';
        $scope.generalEdText = ', Science';
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = true;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
      }
    };
    $scope.socialstudiesSelected = function () {
      if (!$scope.socialstudiesSelect) {
        $scope.generalEdValue = 'social-studies';
        $scope.generalEdText = ', Social Studies';
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = true;
        $scope.specialedSelect = false;
      }
    };
    $scope.specialedSelected = function () {
      if (!$scope.specialedSelect) {
        $scope.generalEdValue = 'special-education';
        $scope.generalEdText = ', Special Education';
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = true;
      }
    };

  /**
    * NEXT BUTTON FUNCTION FOR NAME AND EMAIL
    * REMOVE DISABLED from NEXT button
    * SET CHECKED VALUE for each specific radio button based on ng-checked directive
    */
    $scope.gradeSelection = function () {
    if ($scope.products_search_form.schoolName.$valid && $scope.products_search_form.schoolEmail.$valid) {
      document.getElementById("nameFields").classList.add("hidden");
      document.getElementById("gradeFields").classList.remove("hidden");
      } else if ($scope.products_search_form.schoolName.$invalid) {
        $scope.errorText = '<span class="has-text-danger strong">A valid name is required</span>';
      } else if ($scope.products_search_form.schoolEmail.$invalid) {
        $scope.errorText = '<span class="has-text-danger strong">A valid email is required</span>';
      }
    };

  /**
    * TABBED CONTENT FUNCTION for product PRELIMINARY PRODUCT SUMMARY
    * SHOW TABS BASIED ON scope value
    * TARGET <section> with ng-SHOW
    * ADD 'Active' CLASS TO NAVIGATION SELECT
    */
    $scope.tab = 1;
    $scope.setTab = function(newTab){
      $scope.tab = newTab;
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };


  /**
    * TABBED CONTENT FUNCTION for product PRELIMINARY PRODUCT SUMMARY
    * SHOW TABS BASIED ON scope value
    * TARGET <section> with ng-SHOW
    * ADD 'Active' CLASS TO NAVIGATION SELECT
    */
    var acc = document.getElementsByClassName("accordion_button");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;

        if (panel.classList.contains("expanded")) {
          panel.classList.remove("expanded");
        } else {
          panel.classList.add("expanded");
        }
      });
    }

  /**
    * SCOPE ARRAY FOR iBlock Pathways
    * USE ng-repeat TO ILLERATE OVER LOOP
    * CREATE CHECKBOX GROUP FOR ALL ARRAY VALUES
    */
    $scope.pathways = [
      { title: 'Class Pet', value: 'class-pet'},
      { title: 'Clean Water and Sanitation', value: 'clean-water-and-sanitation'},
      { title: 'Create a Model of an Eclipse', value: 'class-pet'},
      { title: 'Creating a Video Game', value: 'class-pet'},
      { title: 'Designing a Board Game', value: 'class-pet'},
      { title: 'Engineer a Telescope', value: 'class-pet'},
      { title: 'Engineering 3D Printed Instruments', value: 'class-pet'},
      { title: 'Engineering an Assistive Game Controller', value: 'class-pet'},
      { title: 'Engineering for Hazardous Weather: Taking Flood Control to New Heights', value: 'class-pet'},
      { title: 'Fashion for Function: Smart Wearables', value: 'class-pet'},
      { title: 'Geometric Self-Watering Planter', value: 'class-pet'},
      { title: 'Growing a Hydroponic Garden', value: 'class-pet'},
      { title: 'Mars Colony: Engineering Expedition', value: 'class-pet'},
      { title: 'No Poverty and Zero Hunger', value: 'class-pet'},
      { title: 'Programming a Classification System', value: 'class-pet'},
      { title: 'Reimagining Public Transportation', value: 'class-pet'},
      { title: 'River Management: Assessing Health', value: 'class-pet'},
      { title: 'Robotic Amusement Park', value: 'class-pet'},
      { title: 'Robotic Assembly Line', value: 'class-pet'},
      { title: 'Robotic Field Day', value: 'class-pet'},
      { title: 'Rube Goldberg Machines', value: 'class-pet'},
      { title: 'Space Systems: Light and Shadows', value: 'class-pet'},
      { title: 'Storytelling Through the Ages', value: 'class-pet'},
      { title: 'Tiny Houses', value: 'class-pet'}
    ];


  });



  $(document).ready(function() {

    // PRODUCT FILTER FUNCTION
    // SHOW AND HIDE 'article.product-item' elements based upon selected 'FILTER OPTION'
    // CLICK FUNCTION ENABLED FOR '.refine-filter' ELEMENTS
    // GATHER VALUE FROM title attribute
    // TOGGLE HIDE STATE if contains value of filter
    $('.refine-filter').click(function() {

      var value = $(this).attr('title');
        console.log(value);

      $(this).toggleClass('selected');
        if($(this).hasClass('selected')) {
          $(".preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {
              $(this).addClass("hidden");
            }
          });
        } else {
          $(".preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {
              $(this).removeClass("hidden");
            }
          });
        }

    });

    // MODAL FUNCTION
    // GET THE ID OF THE CLICKED Element
    // FIND THE MATCHING ELEMENT WITH ATTRIBUTE title
    // addClass TO MATCHING Element
    $(".modal-open-button").click(function() {
      var modalTitle = $(this).attr("id");
      var modalTarget = $(".modal[data-modal-title='" + modalTitle + "']");
        $(modalTarget).addClass("is-active");
    });

    // CLOSE MODAL FUNCTION
    // GLOBAL FUNCTION
    // FIND ANY ELEMENT WITH CLASS "modal" REMOVE CLASS "is-active"
    $(".close-modal").click(function() {
      $(".modal").removeClass("is-active")
    });


    // COUNTER FUNCTION FOR SELECTED ITEMS
    // GET THE TOTAL NUMBER OF CHECKBOXES SELECTED
    // DEFAULT Value is set to '0'
    $(function() {
      $('.selected-items-counter a i').text('0');
      var checkboxTotalLen = $("#preliminary-product-list article.product-item input[type='checkbox']:checked").length;

        if(checkboxTotalLen > 0) {
          $(".selected-items-counter a i").text(checkboxTotalLen);
        } else {
          $(".selected-items-counter a i").text('0');
        }
    });
    // UPDATE FUNCTION TO GET THE SELECTED ITEMS LENGTH
    // COUNT THE TOTALS EACH TIME
    function updateCounter() {
      var updatedTotalLen = $("#preliminary-product-list article.product-item input[type='checkbox']:checked").length;

      if(updatedTotalLen > 0) {
        $(".selected-items-counter a i").text(updatedTotalLen);
      } else {
        $(".selected-items-counter a i").text('0');
      }

    };
    // USE UPDATE FUNCTION TO PARSE LENGTH TO CONSOLE AND UPDATE counter element
    // UPDATE NAV ITEM .select.items-counter a i
    $("#preliminary-product-list article.product-item input:checkbox").on("change", function() {
      updateCounter();
        $(this).parents().toggleClass("product-selected");
        var checkboxTitle = $(this).attr("name");
          console.log(checkboxTitle);
    });
    // ADD OR REMOVE SELECTED ITEMS TO HTML LIST
    // USE LOOP FUNCTION TO PARSE EACH input:checkbox Element
    // IF ITEM IS :CHECKED Add to HTML LIST with MATCHING ID
    // IF ITEM IS not:CHECKED Remove Item with Corresponding ID
    $("#preliminary-product-list article.product-item input:checkbox").click(function() {
      $(this).each(function() {
        var checkboxTitle = $(this).attr("name");

        if ($(this).is(":checked")) {
          $("ul#select-items-content").append('<li id="'+checkboxTitle+'">'+checkboxTitle+'</li>')
        } else if($(this).not(':checked')) {
          $("ul#select-items-content").find("#"+checkboxTitle).remove();
        }

      });
    });





  });
