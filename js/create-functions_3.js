/**
 * js scripts for Teq-v4-0
 * Initial app module
 */

 /**
   * TOGGLE GRADE LEVEL AND STEM FOCUS SECTIONS
   * SHOW STEM FOCUS SECTION ON NEXT button
   * BACK TO SHOW GRADE LEVEL SECTION on 'click here' button
   */
   function gradeSelection() {
     document.getElementById("gradeFields").classList.remove("hidden");
     document.getElementById("stemFields").classList.add("hidden");
   }
   function stemSelection() {
     document.getElementById("gradeFields").classList.add("hidden");
     document.getElementById("stemFields").classList.remove("hidden");
   }

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
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
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
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
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
      $scope.stemContent = '<p><strong>General Education</strong></p><p>STEM is the perfect place to start transforming your classroom. By giving students the right tools and technology, you can spark curiosity, learning, and inquiry-based thinking. </p><p><strong>To further hone your General Education focus, select the subject that best applies.</strong></p>';
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
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
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
        $scope.elaSelect = false;
        $scope.mathematicsSelect = false;
        $scope.scienceSelect = false;
        $scope.socialstudiesSelect = false;
        $scope.specialedSelect = false;
      }
      $scope.stemContent = '<p><strong>Robotics</strong></p><p>Engage students in robotics with a wide range of products that build knowledge through hands-on learning. Many careers are started by the introduction of technologies at an early age. Robotics products appropriate for the grade level you identified will be suggested in your profile summary.</p>';
		};

    $scope.elaSelected = function () {
      if (!$scope.elaSelect) {
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
    * SHOW TABS BASED ON scope value
    * TARGET <section> with ng-SHOW
    * ADD 'Active' CLASS TO NAVIGATION SELECT
    * NAVBAR 'next section' BUTTON
    * CHANGE TEXT BASED UPON WHAT TAB IS SHOWN
    * IF USER SELECTION '3' SHOW SUBMIT BUTTON AND HIDE NEXT BUTTON
    */
    $scope.tab = 1;
    $scope.nextText = 'next section';
    $scope.formSubmitButton = false;

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
      if ($scope.tab === 3) {
  /**
    * IF TAB SELECTED IS '3'
    * ENABLE SUBMIT BUTTON ON NAV MENU
    * ng-hide NEXT BUTTON
    */
        $scope.resultsText = 'Get my results';
        $scope.formSubmitButton = true;
      } else {
  /**
    * ng-hide SUBMIT BUTTON
    */
        $scope.formSubmitButton = false;
      }
    };

    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };

    $scope.nextTab = function () {
      if ($scope.tab === 1) {
        $scope.tab = 2;
        $scope.formSubmitButton = false;
      } else if ($scope.tab === 2) {
        $scope.tab = 3;
        $scope.resultsText = 'Get my results';
        $scope.formSubmitButton = true;
      } else if ($scope.tab === 3) {
        $scope.tab = 3;
        $scope.resultsText = 'Get my results';
        $scope.formSubmitButton = true;

      }
    };
    $scope.prevTab = function () {
      if ($scope.tab === 1) {
        $scope.tab = 1;
      } else if ($scope.tab === 2) {
        $scope.tab = 1;
      } else if ($scope.tab === 3) {
        $scope.tab = 2;
      }
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
    * SCOPE ARRAY FOR OTIS Professional Development Categories
    * USE ng-repeat TO ILLERATE OVER LOOP
    * CREATE CHECKBOX GROUP FOR ALL ARRAY VALUES
    */
    $scope.categories = [
      { title: "Administrator", value: "Administrator"},
      { title: "Apple", value: "Apple"},
      { title: "Apple for Parents", value: "Apple-for-Parents"},
      { title: "Art & Design", value: "Art-and-Design"},
      { title: "Assessment", value: "Assessment"},
      { title: "Blended Learning", value: "Blended-Learning"},
      { title: "Canvas", value: "Canvas"},
      { title: "Canvas for Parents", value: "Canvas-for-Parents"},
      { title: "Chromebooks for Parents", value: "Chromebooks-for-Parents"},
      { title: "Civics", value: "Civics"},
      { title: "Computer Science", value: "Computer-Science"},
      { title: "Digital Accessiblity", value: "Digital-Accessiblity"},
      { title: "Digital Citizenship", value: "Digital-Citizenship"},
      { title: "Digital Storytelling", value: "Digital-Storytelling"},
      { title: "Early Childhood", value: "Early-Childhood"},
      { title: "Educational Frameworks", value: "Educational-Frameworks"},
      { title: "ELA", value: "ELA"},
      { title: "ENL/ELL", value: "ENL-ELL"},
      { title: "General Interest", value: "General-Interest"},
      { title: "Google", value: "Google"},
      { title: "Google for Parents", value: "Google-for-Parents"},
      { title: "Holiday", value: "Holiday"},
      { title: "Infinite Campus for Parents", value: "Infinite-Campus-for-Parents"},
      { title: "iPad", value: "iPad"},
      { title: "iPads for Parents", value: "iPads-for-Parents"},
      { title: "Literacy", value: "Literacy"},
      { title: "Math", value: "Math"},
      { title: "Microsoft", value: "Microsoft"},
      { title: "Microsoft for Parents", value: "Microsoft-for-Parents"},
      { title: "NAO", value: "NAO"},
      { title: "Parents", value: "Parents"},
      { title: "Project-Based Learning", value: "Project-Based-Learning"},
      { title: "Promethean", value: "Promethean"},
      { title: "Remote Learning", value: "Remote-Learning"},
      { title: "Rube Goldberg", value: "Rube-Goldberg"},
      { title: "Schoology", value: "Schoology"},
      { title: "Schoology for Parents", value: "Schoology-for-Parents"},
      { title: "Science", value: "Science"},
      { title: "SMART", value: "SMART"},
      { title: "SMART Table", value: "SMART-Table"},
      { title: "Social Emotional Learning", value: "Social-Emotional-Learning"},
      { title: "Social Studies", value: "Social-Studies"},
      { title: "Special Ed", value: "Special-Ed"},
      { title: "STEM", value: "STEM"},
      { title: "TCEA", value: "TCEA"},
      { title: "Website Makeover", value: "Website-Makeover"}
    ];
  /**
    * SCOPE ARRAY FOR Teqtivities Categories
    * USE ng-repeat TO ILLERATE OVER LOOP
    * CREATE CHECKBOX GROUP FOR ALL ARRAY VALUES
    */
    $scope.teqtivities = [
      { title: "3rd-5th Grade", value: "Third-Fifth-Grade-Teqitivities"},
      { title: "6th-8th Grade", value: "Sixth-Eighth-Grade-Teqitivities"},
      { title: "9th-12th Grade", value: "Nineth-Twelfth-Grade-Teqitivities"},
      { title: "Art, Music & Theatre", value: "Art-Music-and-Theatre-Teqitivities"},
      { title: "ELA", value: "ELA-Teqitivities"},
      { title: "ENL/ELL", value: "ENL-ELL-Teqitivities"},
      { title: "Makey Makey", value: "Makey-Makey-Teqitivities"},
      { title: "Math", value: "Math-Teqitivities"},
      { title: "Ozobot", value: "Ozobot-Teqitivities"},
      { title: "Physical Education", value: "Physical-Education-Teqitivities"},
      { title: "PrK-2nd Grade", value: "PrK-Second-Grade-Teqitivities"},
      { title: "Science", value: "Science-Teqitivities"},
      { title: "Social Emotional Learning", value: "Social-Emotional-LearningTeqitivities"},
      { title: "Social Studies", value: "Social-StudiesTeqitivities"},
      { title: "Special Education", value: "Special-EducationTeqitivities"},
      { title: "Sphero", value: "SpheroTeqitivities"},
      { title: "Sphero Bolt", value: "Sphero-BoltTeqitivities"},
      { title: "Sphero RVR", value: "Sphero-RVRTeqitivities"},
      { title: "Sphero Sprk+", value: "Sphero-Sprk-plus-Teqitivities"},
    ];


  /**
    * SET THE CACHED ITEMS; GRADE LEVEL, STEM FOCUS, GENERAL EDUCATION TOPIC
    * FIND THE INPUT ELEMENTS WITH THE NAME OF 'gradeLevelValue', 'stemFocusValue', 'gradeLevelValue'
    * LOOP THROUGH ELEMENTS TO FIND 'CHECKED' ITEM
    * STORE VALUE OF CHECKED ITEM IN VARIABLE AND SET SESSION STORAGE VALUE
    */
    $scope.cacheStorageItems = function () {
      var gradeLevelOptions = document.getElementsByName('gradeLevelValue');
      var stemFocusOptions = document.getElementsByName('stemFocusValue');
      var generalEdOptions = document.getElementsByName('generalEdValue');

      for (var i = 0, length = gradeLevelOptions.length; i < length; i++) {
        if (gradeLevelOptions[i].checked) {
          var gradeLevelSelected = gradeLevelOptions[i].value;
          break;
        }
      }
      sessionStorage.setItem('grade_level_cached_select', gradeLevelSelected);

      for (var i = 0, length = stemFocusOptions.length; i < length; i++) {
        if (stemFocusOptions[i].checked) {
          var stemFocusSelected = stemFocusOptions[i].value;
          break;
        }
      }
      sessionStorage.setItem('stem_focus_cached_select', stemFocusSelected);

      for (var i = 0, length = generalEdOptions.length; i < length; i++) {
        if (generalEdOptions[i].checked) {
          var generalEdSelected = generalEdOptions[i].value;
          break;
        }
      }
      sessionStorage.setItem('general_ed_cached_select', generalEdSelected );

    }

  /**
    * CHECK IF SESSION STORAGE ITEM IS SET FOR BOTH
    * GRADE LEVEL (grade_level_cached_select) AND STEM FOCUS (stem_focus_cached_select)
    * AND CHECK IF PAGE PATH IS '/create-your-solution/your-solution-selections/'
    * SET $scope BASED UPON SESSION STORAGE Items
    * SET SELECTED GRADE/STEM FOCUS items AND DISPLAY TEXT
    * REMOVE DISABLED ATTRIBUTES FOR NEXT BUTTONS
    */
    if (sessionStorage.getItem('grade_level_cached_select') != null && window.location.pathname == '/create-your-solution/your-solution-selections') {
      document.getElementById("stemFieldsNext").removeAttribute("disabled");
      document.getElementById("stemFieldsNextMobile").removeAttribute("disabled");
      if (sessionStorage.getItem('grade_level_cached_select') == 'grades-k-2') {
          $scope.gradeLevelValue = 'grades-k-2';
          $scope.gradeLevelText = 'Grades K-2';
          $scope.gradek2Select = true;
          $scope.grade35Select = false;
          $scope.grade68Select = false;
          $scope.grade912Select = false;
          $scope.gradeContent = '<strong>Grades K-2</strong><br />Early childhood students need to be engaged in STEM learning at an early age, since building a foundation in STEM skills and concepts sets students up for success. Our STEM solutions for the elementary classroom focus on instilling core concepts in students, so collaboration, critical thinking, and problem-solving, become second nature.';
      } else if (sessionStorage.getItem('grade_level_cached_select') == 'grades-3-5') {
          $scope.gradeLevelValue = 'grades-3-5';
          $scope.gradeLevelText = 'Grades 3-5';
          $scope.gradek2Select = false;
          $scope.grade35Select = true;
          $scope.grade68Select = false;
          $scope.grade912Select = false;
          $scope.gradeContent = '<strong>Grades 3-5</strong><br />It’s essential for students to be engaged in STEM learning at an early age, since building a foundation in STEM skills and concepts sets students up for success. The following STEM solutions for the elementary classroom focus on instilling core concepts in students, so collaboration, critical thinking, and problem-solving, become second nature.';
      } else if (sessionStorage.getItem('grade_level_cached_select') == 'grades-6-8') {
          $scope.gradeLevelValue = 'grades-6-8';
          $scope.gradeLevelText = 'Grades 6-8';
          $scope.gradek2Select = false;
          $scope.grade35Select = false;
          $scope.grade68Select = true;
          $scope.grade912Select = false;
          $scope.gradeContent = '<strong>Grades 6-8</strong><br />Middle school students have the opportunity to build on their STEM foundation and to further engage with STEM learning. The solutions here enable the hands-on, immersive, and collaborative learning experiences that jumpstart student learning and cultivate future-ready skills. ';
      } else if (sessionStorage.getItem('grade_level_cached_select') == 'grades-9-12') {
          $scope.gradeLevelValue = 'grades-9-12';
          $scope.gradeLevelText = 'Grades 9-12';
          $scope.gradek2Select = false;
          $scope.grade35Select = false;
          $scope.grade68Select = false;
          $scope.grade912Select = true;
          $scope.gradeContent = '<strong>Grades 9-12</strong><br />While in high school, students are able to hone and develop the STEM skills and knowledge they’ve been building throughout their academic careers. Our STEM solutions for high schools feature high-impact products, devices, and tools, so students can focus on enhancing and enriching the skills and know-how that make them career-ready.';
      }
    }
    if (sessionStorage.getItem('stem_focus_cached_select') != null && window.location.pathname == '/create-your-solution/your-solution-selections') {
      document.getElementById("submit_products_search_form").removeAttribute("disabled");
      document.getElementById("submit_products_search_mobile").removeAttribute("disabled");
      if (sessionStorage.getItem('stem_focus_cached_select') == 'coding') {
          $scope.stemFocusValue = 'coding';
          $scope.stemFocusText = 'Coding';
          $scope.codingSelect = true;
          $scope.engineeringSelect = false;
          $scope.generalEdSelect = false;
          $scope.hydroponicsSelect = false;
          $scope.roboticsSelect = false;
          $scope.stemContent = '<p><strong>Coding</strong></p><p>Explore options in coding and programming to ensure students thrive in computer science. Coding courses are an integral part of the STEM category in the OTIS platform and associated products will be part of your profile summary.</p>';
      } else if (sessionStorage.getItem('stem_focus_cached_select') == 'engineering') {
          $scope.stemFocusValue = 'engineering';
          $scope.stemFocusText = 'Engineering';
          $scope.codingSelect = false;
          $scope.engineeringSelect = true;
          $scope.generalEdSelect = false;
          $scope.hydroponicsSelect = false;
          $scope.roboticsSelect = false;
          $scope.stemContent = '<p><strong>Engineering</strong></p><p>The fundamentals of engineering are highlighted in many of the courses and programs we offer and support on the OTIS platform and in iBlocks. Whether it is mechanical, electrical, or civil engineering, we have it covered. Your profile summary will highlight these options for you.</p>';
      } else if (sessionStorage.getItem('stem_focus_cached_select') == 'general-education') {
          $scope.stemFocusValue = 'general-education';
          $scope.stemFocusText = 'General Education';
          $scope.codingSelect = false;
          $scope.engineeringSelect = false;
          $scope.generalEdSelect = true;
          $scope.hydroponicsSelect = false;
          $scope.roboticsSelect = false;
          $scope.stemContent = '<p><strong>General Education</strong></p><p>STEM is the perfect place to start transforming your classroom. By giving students the right tools and technology, you can spark curiosity, learning, and inquiry-based thinking. </p><p><strong>To further hone your General Education focus, select the subject that best applies.</strong></p>';
      } else if (sessionStorage.getItem('stem_focus_cached_select') == 'hydroponics') {
          $scope.stemFocusValue = 'Hydroponics';
          $scope.stemFocusText = 'Hydroponics';
          $scope.codingSelect = false;
          $scope.engineeringSelect = false;
          $scope.generalEdSelect = false;
          $scope.hydroponicsSelect = true;
          $scope.roboticsSelect = false;
          $scope.stemContent = '<p><strong>Hydroponics</strong></p><p>When you introduce students to hydroponics, they can explore everything from the history of farming, to the nutritional values of food, and the conditions required to grow and sustain a society’s agriculture. Appropriate products and content will be suggested in your profile summary.</p>';
      } else if (sessionStorage.getItem('stem_focus_cached_select') == 'robotics') {
          $scope.stemFocusValue = 'robotics';
          $scope.stemFocusText = 'Robotics';
          $scope.codingSelect = false;
          $scope.engineeringSelect = false;
          $scope.generalEdSelect = false;
          $scope.hydroponicsSelect = false;
          $scope.roboticsSelect = true;
          $scope.stemContent = '<p><strong>Robotics</strong></p><p>Engage students in robotics with a wide range of products that build knowledge through hands-on learning. Many careers are started by the introduction of technologies at an early age. Robotics products appropriate for the grade level you identified will be suggested in your profile summary.</p>';
      }
    }
    if (sessionStorage.getItem('general_ed_cached_select') != null && window.location.pathname == '/create-your-solution/your-solution-selections') {
      if (sessionStorage.getItem('general_ed_cached_select') == 'ela') {
          $scope.elaSelect = true;
          $scope.mathematicsSelect = false;
          $scope.scienceSelect = false;
          $scope.socialstudiesSelect = false;
          $scope.specialedSelect = false;
      } else if (sessionStorage.getItem('general_ed_cached_select') == 'mathematics') {
          $scope.elaSelect = false;
          $scope.mathematicsSelect = true;
          $scope.scienceSelect = false;
          $scope.socialstudiesSelect = false;
          $scope.specialedSelect = false;
      } else if (sessionStorage.getItem('general_ed_cached_select') == 'science') {
          $scope.elaSelect = false;
          $scope.mathematicsSelect = false;
          $scope.scienceSelect = true;
          $scope.socialstudiesSelect = false;
          $scope.specialedSelect = false;
      } else if (sessionStorage.getItem('general_ed_cached_select') == 'social-studies') {
          $scope.elaSelect = false;
          $scope.mathematicsSelect = false;
          $scope.scienceSelect = false;
          $scope.socialstudiesSelect = true;
          $scope.specialedSelect = false;
      } else if (sessionStorage.getItem('general_ed_cached_select') == 'special-education') {
          $scope.elaSelect = false;
          $scope.mathematicsSelect = false;
          $scope.scienceSelect = false;
          $scope.socialstudiesSelect = false;
          $scope.specialedSelect = true;
      }
    }

  });


  $(document).ready(function() {

    // UPDATE FUNCTION TO GET THE SELECTED ITEMS LENGTH
    // COUNT THE TOTAL AMOUNTS OF ELEMENT article.product-item input:checkbox THAT IS selected
    // TOTAL NUMBER OF ELEMENTS CHECKED STORED IN updateTotalLen VARIABLE
    function updateCounter() {
      var updatedTotalLen = $("#preliminary-product-list article.product-item input[type='checkbox']:checked").length;

      if(updatedTotalLen > 0) {
        $(".selected-items-counter a i").text(updatedTotalLen);
      } else {
        $(".selected-items-counter a i").text('0');
      }

    }

    // PRODUCT FILTER FUNCTION
    // SHOW AND HIDE 'article.product-item' elements based upon selected 'FILTER OPTION'
    // CLICK FUNCTION ENABLED FOR '.refine-filter' ELEMENTS
    // GATHER VALUE FROM title attribute
    // TOGGLE HIDE STATE if contains value of filter
    // LOOP THROUGH 'refine-filter' ELEMENTS TO TOGGLE 'selected' class STATE
    // ONLY ONE OPTION CAN BE SELECTED AT A TIME
    $('.refine-filter').click(function() {

      var value = $(this).attr('title');
        console.log(value);

        if($(this).hasClass('selected')) {
          $("#product-selection .preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {
              $(this).removeClass("hidden");
            }
          });
        } else {
          $("#product-selection .preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {

              var checkboxId = $(this).find("input:checkbox").attr("id");
              $("ul#select-items-content").find("#"+checkboxId+"-selected-product").remove();

              $(this).addClass("hidden");
                $(this).children("label").removeClass("product-selected")
                  $(this).find("input:checkbox").prop( "checked", false );

              updateCounter();
            } else {
              $(this).removeClass("hidden");
            }
          });
        }

        $(this).toggleClass('selected');
        $(this).siblings().removeClass('selected');

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


    // IBLOCK PATHWAY DESCRIPTION EXPAND FUNCTION ON MODAL CHECKBOXES
    // TARGET MODAL CHECKBOXES
    // TOGGLE CLASS ON clicked element and CLOSEST 'description' elements
    $('.ui-checkbox-container').on('click',"label > button",function() {
      $(this).toggleClass("active-expanded");
      $(this).parents("label").next("div.pathway-checkbox-content").toggleClass("expanded");
    });


    // IBLOCK PATHWAY DESCRIPTION EXPAND FUNCTION
    // TARGET ENTIRE INSTRUCTIONAL MATERIAL container
    // NEED A .on(click) FUNCTION TO CATCH THE APPENDED ELEMENTS FROM THE AJAX CALLS
    // TOGGLE CLASS ON clicked element PARENT AND CLOSEST 'description' elements
    $('#instructional-material-selection').on('click',".iblock-pathway .iblock-info-button",function() {
      $(this).toggleClass("active-expanded");
      $(this).parents("nav.level").next("div.iblock-description").toggleClass("hidden");
    });

    // COUNTER FUNCTION FOR SELECTED ITEMS
    // GET THE TOTAL NUMBER OF CHECKBOXES SELECTED
    // DEFAULT Value is set to '0'
    $('#preliminary-product-list').on( "click", "article.product-item input[type='checkbox']", function() {
      $('.selected-items-counter a i').text('0');
      var checkboxTotalLen = $(this).length;

        if(checkboxTotalLen > 0) {
          $(".selected-items-counter a i").text(checkboxTotalLen);
        } else {
          $(".selected-items-counter a i").text('0');
        }

        // USE UPDATE FUNCTION TO PARSE LENGTH TO CONSOLE AND UPDATE counter element
        // RUN LOOP TO PREVENT MULTIPLE ITEMS
        // EACH checkbox of PARENT ELEMENT WITH class 'product-item' UPDATE NAV ITEM .select.items-counter a i
        $(this).each(function() {
          updateCounter();
          $(this).parent().toggleClass("product-selected");
            var checkboxTitle = $(this).attr("title");
            var checkboxId = $(this).attr("id");

              if ($(this).is(":checked")) {

                $("ul#select-items-content").append('<li id="'+checkboxId+'-selected-product">'+checkboxTitle+'</li>');
                console.log(checkboxTitle + ' added');

              } else if($(this).not(':checked')) {

                $("ul#select-items-content").find("#"+checkboxId+"-selected-product").remove();
                console.log(checkboxTitle + ' removed')

              }
        });
    });


    // PATHWAY ITEMS LOADED FROM USER INPUT
    // LOOP THROUGH HIDDEN INPUT FIELD FROM PATHWAYS LOADED
    // GATHER VALUE FROM INPUT FIELDS AND FIELD MATCHING CHECKBOX OPTIONS
    // Mark 'Checked' for PATHWAY OPTIONS LOADED on MODAL PATHWAYS CHECKBOX LIST
    $("input.checked-items-loaded").each(function() {
      var checkedItem = $(this).val();
        $("#pathway-checkbox-list").find("#"+checkedItem).prop( "checked", true );
    });
    // IF CHECKBOX MARKED REMOVE CORREPSONDING PATHWAY OPTION Element
    $("#pathway-checkbox-list .pathway-checkbox:checkbox").change(function() {
      var postId = $(this).val();
        $("#"+postId).remove();
          updateCounter();
    });


    // INSTRUCTIONAL PD CATEGORY ADD TAGS TO article.product-item
    // TARGET .pd-category-item INPUT ELEMENTS
    // GATHER value AND title ATTRIBUTES
    // CONDITIONAL TO CHECK WHETER CHECKED OR NOT
    $(".pd-category-list .pd-category-item").change(function() {
      var categoryItemValue = $(this).val();
      var categoryItemTitle = $(this).attr("title");
      var categoryItemId = $(this).attr("id");

      if ($(this).is(":checked")) {

        // IF CATEGORY CLICKED IS OF CLASS 'otis' or IF OF CLASS 'teqtivity'
        // APPENDED TAG ELEMENT TO SPECIFIED TAG container
        // MARK 'CHECKED' FOR THE PARENT ELEMENT THAT THE CONTENT WAS APPENDED TO
        if ($(this).hasClass("otis")) {
          $("div.tags.OTIS.for.educators").append('<span class="tag is-rounded" id="'+categoryItemId+'-selected-category">'+categoryItemValue+'<input type="hidden" name="userPdCategoriesSelections[]" value="'+categoryItemId+'" /></span>');
            console.log(categoryItemTitle + ' added');

        // UPDATE THE COUNTER BASED ON THE STATUS OF THE OTIS input element
        // IF THE INPUT ELEMENT IS CHECKED UPDATE THE COUNTER AND APPEND LIST ITEM
        // IF LIST ITEM EXISTS ALREADY DON'T UPDATE #selected-items-content LIST ELEMENT
          var otisForEducators = $("#otis-for-educators");
          var otisTitle = $(otisForEducators).attr("title");
          var otisId = $(otisForEducators).attr("id");
            $(otisForEducators).prop( "checked", true );
            if($("ul#select-items-content li#"+otisId+"-selected-product").length > 0) {
              updateCounter();
            } else {
              $("ul#select-items-content").append('<li id="'+otisId+'-selected-product">'+otisTitle+'</li>');
              updateCounter();
            }
        } else if ($(this).hasClass("teqtivity")) {
          $("div.tags.Teq-tivities").append('<span class="tag is-rounded" id="'+categoryItemId+'-selected-category">'+categoryItemValue+'<input type="hidden" name="userTeqtivityCategoriesSelections[]" value="'+categoryItemValue+'" /></span>');
            console.log(categoryItemTitle + ' added');

        // UPDATE THE COUNTER BASED ON THE STATUS OF THE OTIS input element
        // IF THE INPUT ELEMENT IS CHECKED UPDATE THE COUNTER AND APPEND LIST ITEM
        // IF LIST ITEM EXISTS ALREADY DON'T UPDATE #selected-items-content LIST ELEMENT
          var teqTivities = $("#teq-tivities");
          var teqTivitiesTitle = $(teqTivities).attr("title");
          var teqTivitiesId = $(teqTivities).attr("id");
            $("#teq-tivities").prop( "checked", true );
            if($("ul#select-items-content li#"+teqTivitiesId+"-selected-product").length > 0) {
              updateCounter();
            } else {
              $("ul#select-items-content").append('<li id="'+teqTivitiesId+'-selected-product">'+teqTivitiesTitle+'</li>');
              updateCounter();
            }
        }

      } else if($(this).not(':checked')) {

        // IF CATEGORY ITEM IS CHECKED REMOVE THE ELEMENT BY SPECIFIED ID
        if ($(this).hasClass("otis")) {
          $("div.tags.OTIS.for.educators").find("#"+categoryItemId+"-selected-category").remove();
            console.log(categoryItemTitle + ' removed')
        } else if ($(this).hasClass("teqtivity")) {
          $("div.tags.Teq-tivities").find("#"+categoryItemId+"-selected-category").remove();
            console.log(categoryItemTitle + ' removed')
        }

      }
    });


    // FINAL RESULTS SELECTION LIST
    // LOOP THROUGH THE 'article.product-solution' ELEMENTS
    // APPEND HTML <option> ELEMENT WITH MATCHING TITLE ATTRIBUTE FOR Value
    $(".solutions-container article.product-solution").each(function() {
      var solutionTitle = $(this).attr("title");
      var solutionId = $(this).attr("id");
        $("#product-summary-options").append("<option value='"+solutionId+"'>"+solutionTitle+"</option>");
    });
    // CAPTURE THE VALUE OF <option> ELEMENT CLICKED
    // SCROLL TO CORRESPONDING ELEMENT
    $("#product-summary-options").on('change', function() {
      var optionSelectedValue = $(this).val();
      $('html, body').animate({
        scrollTop: $("#"+optionSelectedValue).offset().top -150
      });
    });

    // FINAL RESULTS QUOTE LIST
    // LOOP THROUGH THE 'article.product-solution' ELEMENTS
    // APPEND HTML <li><div><label<input> ELEMENT WITH MATCHING TITLE ATTRIBUTE FOR Value
    $(".solutions-container article.product-solution").each(function() {
      var solutionTitle = $(this).attr("title");
        $("#product-solution-quote-options").append("<label for='"+solutionTitle+"'><input type='checkbox' class='pd-category-item' name='quoted_items[]' id='"+solutionTitle+"' value='"+solutionTitle+"' title='"+solutionTitle+"' checked /><span class='checkmark'></span> "+solutionTitle+"</label>");
    });

  });
