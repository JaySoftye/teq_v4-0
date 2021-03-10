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
    * TABBED CONTENT FUNCTION for product PRELIMINARY PRODUCT SUMMARY
    * SHOW TABS BASED ON scope value
    * TARGET <section> with ng-SHOW
    * CHANGE TEXT BASED UPON WHAT TAB IS SHOWN
    * SHOW TEXT BASED UPON NEW tabNum
    */
    $scope.tab = 1;
    $scope.solutionProducts = 'No';
    $scope.headerDescription = 'Based on your grade level and subject matter, you will find your recommended products below. Please select all the options that interest you, and we will continue to build your solution.';

    $scope.setTab = function(newTab){
      $scope.tab = newTab;
      if ($scope.tab === 1) {
        $scope.headerDescription = 'Based on your grade level and subject matter, you will find your recommended products below. Please select all the options that interest you, and we will continue to build your solution.';
      } else if ($scope.tab === 2) {
        $scope.headerDescription = 'Now that you have selected your products, the recommended instructional materials below are perfect for implementing them in the classroom. Select all the options that interest you, and we will continue to build your solution.';
      } else if ($scope.tab === 3) {
        $scope.headerDescription = 'The next step is to package in some instructional support to help you feel comfortable and confident with your new solutions. Select all the options that interest you, and we will summarize your selections in a complete and customized plan.';
      }
    };
    $scope.isSet = function(tabNum){
      return $scope.tab === tabNum;
    };

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
    $scope.gradeLevelText = '-';
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

    // EXPANDED PRODUCT ITEM
    // GET CLICKED ITEM; TOGGLE CLASS 'expanded-selected'
    // LOOP THROUGH ALL 'article.product-item' ELEMENTS REMOVE 'expanded-selected' Class
    // GET OFFSET FROM ELEMENT CLICKED; ANIMATE BODY TO SCROLL INTO VIEW
    $(".preliminary-product-list-container").on('click',"article.product-item.static-select",function() {
      $(".preliminary-product-list-container article.product-item").each(function() {
        if($(this).hasClass("expanded-selected")) {
          $(this).removeClass("expanded-selected");
          $(this).addClass("static-select");
        }
      });
      $(this).addClass("expanded-selected");
      $(this).removeClass("static-select");
        var offset = $(this).offset();
        offset.top -= 90;
      $('html, body').animate({
        scrollTop: offset.top,
      });
      console.log("Product Item Expanded");
    });
    // CLOSE EXPANDED 'article.product-item' ELEMENT
    // CLICK FUNCTION TO REMOVE 'expanded-selected' CLASS FROM ELEMENT
    $(".prelim-product-container").on('click',".close-expanded-selected",function() {
      $(".preliminary-product-list-container article.product-item").each(function() {
        $(this).removeClass("expanded-selected");
        $(this).addClass("static-select");
        $(this).children(".dropdown-menu-container").removeClass("is-active");
      });
      console.log("Expanded Product Item Closed");
    });

    // UPDATE FUNCTION TO GET THE SELECTED ITEMS ELEMENT LENGTH
    // COUNT THE TOTAL AMOUNTS OF ELEMENT article.product-item input:checkbox THAT IS selected
    // TOTAL NUMBER OF ELEMENTS CHECKED STORED IN updateTotalLen VARIABLE
    function updateCounter() {
      var updatedTotalLen = $("#preliminary-product-list article.product-item input[type='checkbox'].product-item-checkbox:checked").length;

      if(updatedTotalLen > 0) {
        $(".selected-items-counter a input").val(updatedTotalLen);
          $(".selected-items-counter a input").trigger('change');
      } else {
        $(".selected-items-counter a input").val('0');
          $(".selected-items-counter a input").trigger('change');
      }

    }

    // PRODUCT FILTER FUNCTION DROPDOWN MENU
    // SHOW AND HIDE 'article.product-item' elements based upon selected 'FILTER OPTION'
    // TOGGLE MENU DROPMENU AND DISPLAY HTML TEXT
    $("#productRefineFilters").click(function() {
      $(this).toggleClass("has-menu-active");
        if ($(this).hasClass('has-menu-active')) {
          $(this).html('Close Filter Menu');
        } else {
          $(this).html('Product Filter Menu');
        }
      $(this).next(".dropdown-menu-container").toggleClass("is-active");
      $(this).prev("p").toggleClass("hidden");
    });

    // PRODUCT FILTER
    // CLICK FUNCTION ENABLED FOR '.refine-filter' ELEMENTS
    // GATHER VALUE FROM title attribute
    // TOGGLE HIDE STATE if contains value of filter
    // LOOP THROUGH 'refine-filter' ELEMENTS TO TOGGLE 'selected' class STATE
    // ONLY ONE OPTION CAN BE SELECTED AT A TIME
    // ADD CSS CLASS TO HIDE ELEMENT FROM USER
    $('.refine-filter').click(function() {

      var value = $(this).attr('title');
        console.log(value);

      var offset = $(".prelim-product-container").offset();
        offset.top -= 90;
      $('html, body').animate({
        scrollTop: offset.top,
      });

        if($(this).hasClass('selected')) {
          $("#product-selection .preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {
              $(this).removeClass("hide-item");
            }
          });
        } else {
          $("#product-selection .preliminary-product-list-container article.product-item").each(function() {
            if(!$(this).hasClass(value)) {

              var checkboxId = $(this).find("input:checkbox").attr("id");
              $("ul#select-items-content").find("#"+checkboxId+"-selected-product").remove();

              $(this).addClass("hide-item");
                $(this).removeClass("product-selected")
                  $(this).find("input:checkbox").prop( "checked", false );

              updateCounter();
            } else {
              $(this).removeClass("hide-item");
            }
          });
        }
        $(this).toggleClass('selected');
        $(this).siblings().removeClass('selected');

    });


    // iBlock PRODUCT OPTIONS BUTTON
    // TRIGGER DROPDOWN MENU; ADD 'is-active' CLASS TO DROPDOWN <BUTTON>
    // DISPLAY DROPDOWN CONTAINER
    $(".preliminary-product-list-container").on('click',"article.product-item > button.product-item-options",function() {
      $(this).next(".dropdown-menu-container").toggleClass("is-active");
    });
    // CLOSE MENU BUTTON
    $(".preliminary-product-list-container").on('click',"article.product-item > .dropdown-menu-container > button.close-item-options",function() {
      $(this).parents(".dropdown-menu-container").toggleClass("is-active");
    });

    // TARGET MENU OPTIONS FOR display:BLOCK
    // GET DATA-TARGET ATTRIBUTE TO MATCH CONTENT ID
    $(".preliminary-product-list-container").on('click',"article.product-item > .dropdown-menu-container.is-active > .dropdown-content > button.dropdown-button",function() {
      var targetTabId = $(this).attr('data-target');
      var targetTabContainer = $(this).closest("article.product-item")
      var targetTabElement = $(targetTabContainer).find(".product-content.iblock-content div" + targetTabId);

        // LOOP THROUGH EACH MENU OPTION TO REMOVE ACTIVE CLASSES
        // ADD 'tab-active' CLASS TO ELEMENT THAT WAS CLICKED
        $(this).siblings(".dropdown-button").each(function() {
          $(this).removeClass("tab-active");
        });
          $(this).addClass("tab-active");
        // LOOP THROUGH ALL VISIBLED IBLOCK CONTENT tabs; REMOVE VISIBLE CLASS
        // ADD 'has-tab-visible' TO ELEMENT WITH MATCHING ID TO data-target
        $(this).closest("article.product-item").find(".product-content.iblock-content div").each(function() {
          $(this).removeClass("has-tab-visible");
        });
          $(targetTabElement).addClass("has-tab-visible");
        // HIDE DROPDOWN MENU WHEN ITEM IS CLICKED
        $(this).closest("div.dropdown-menu-container").removeClass("is-active");
    });


    // ADD IBLOCK OPTIONS BUTTON TOGGLE
    // TRIGGER DROPDOWN MENU WITH #addiBlockOptions BUTTON
    // LOOP THROUGH '.preliminary-product-list' CONTAINER ELEMENT AND HIDE option
    // LOOP THROUGH ANY ADDED iblock items AND TOGGLE HIDE OPTION
    // SHOW '.dropdown-menu-container' WITH CLASS 'is-active'
    $(".preliminary-product-list-container").on('click',"button#addiBlockOptions",function() {
      $(this).siblings("article.product-item").each(function() {
        $(this).toggleClass("hidden");
        $(this).removeClass("expanded-selected");
        $(this).addClass("static-select");
          $(this).children(".dropdown-menu-container").removeClass("is-active");
      });
      $(this).siblings("#additionalPathways").children("article.product-item").each(function() {
        $(this).toggleClass("hidden");
        $(this).removeClass("expanded-selected");
        $(this).addClass("static-select");
          $(this).children(".dropdown-menu-container").removeClass("is-active");
      });
      var offset = $(".prelim-product-container").offset();
        offset.top -= 90;
      $('html, body').animate({
        scrollTop: offset.top,
      });
      $(this).toggleClass("has-menu-active");
        if ($(this).hasClass('has-menu-active')) {
          $(this).html('Close Pathway Menu');
        } else {
          $(this).html('Add More iBlock Pathway Options');
        }
      $(this).next(".dropdown-menu-container").toggleClass("is-active");
    });

    // IBLOCK PATHWAY DESCRIPTION EXPAND FUNCTION ON CHECKBOXES
    // TARGET CHECKBOXES
    // TOGGLE CLASS ON clicked element and CLOSEST 'description' elements
    $('.ui-checkbox-container').on('click',"label > button",function() {
      $(this).toggleClass("active-expanded");
      $(this).parents("label").next("div.pathway-checkbox-content").toggleClass("expanded");
    });

    // IF NO IBLOCKS IS SELECTED
    // FUNCTION TO SELECT IBLOCK PATHWAY INPUT elements
    // FIND ALL ::CHECKED 'input name="userPathwaySelections[]" SIBLINGS elements
    // IF TOTAL INPUT ELEMENTS IS ZERO ADD DISABLED ATTRIBUTE TO NEXT BUTTON
    $('#preliminary-product-list .products-list.iblocks').on( "click", "article.product-item input[name='userPathwaySelections[]']",function() {
      var userPathwaySelections = $(this).parents("div.column").find("article.product-item.iblock-pathway input:checked");
        if (userPathwaySelections.length != 0) {
          $("#iBlocksNextButton").attr( "disabled", false );
        } else {
          $("#iBlocksNextButton").attr( "disabled", true );
        }
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
    $('#preliminary-product-list').on( "click", "article.product-item input[type='checkbox'].product-item-checkbox", function() {
      $('.selected-items-counter a input').val('0');
        $(".selected-items-counter a input").trigger('change');
          updateCounter();

        // USE UPDATE FUNCTION TO PARSE LENGTH TO CONSOLE AND UPDATE counter element
        // RUN LOOP TO PREVENT MULTIPLE ITEMS
        // EACH checkbox of PARENT ELEMENT WITH class 'product-item' UPDATE NAV ITEM .select.items-counter a i
        // UPDATED HTML TEXT FOR add-or-remove LABEL Element
        $(this).each(function() {
          updateCounter();
          $(this).parent().toggleClass("product-selected");
            var checkboxTitle = $(this).attr("title");
            var checkboxId = $(this).attr("id");

              if ($(this).is(":checked")) {

                $("ul#select-items-content").append('<li id="'+checkboxId+'-selected-product">'+checkboxTitle+'</li>');
                $(this).parent().find("label.add-or-remove-button").html("remove from solution");
                console.log(checkboxTitle + ' added');

              } else if($(this).not(':checked')) {

                $("ul#select-items-content").find("#"+checkboxId+"-selected-product").remove();
                $(this).parent().find("label.add-or-remove-button").html("add to your solution")
                console.log(checkboxTitle + ' removed')

              }
        });
    });

    // PATHWAY ITEMS LOADED FROM USER INPUT
    // CLEAR ALL ::CHECKED ATTRIBUTES FROM PATHWAY OPTIONS IN 'div#pathway-checkbox-list' Element
    // LOOP THROUGH HIDDEN INPUT FIELD FROM PATHWAYS LOADED
    // GATHER VALUE FROM INPUT FIELDS AND FIELD MATCHING CHECKBOX OPTIONS
    // Mark 'Checked' for PATHWAY OPTIONS LOADED on MODAL PATHWAYS CHECKBOX LIST
    $("#pathway-checkbox-list .ui-checkbox-container input.pathway-checkbox").each(function() {
      $(this).prop( "checked", false );
    });
    $("input.checked-items-loaded").each(function() {
      var checkedItem = $(this).attr('id');
        $("#pathway-checkbox-list").find("#"+checkedItem+"-checkbox").prop( "checked", true );
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
      // DECLARE VARIABLES FOR CHECKBOX ELEMENT, CHECKBOX VALUE AND TARGET TAG CONTAINERS
      var categoryItemValue = $(this).val();
      var categoryItemTitle = $(this).attr("title");
      var categoryItemId = $(this).attr("id");

      var otisForEducators = $("#otis-for-educators");
      var otisForEducatorsTitle = $(this).attr("title");
      var otisForEducatorsId = $(this).attr("id");
      var otisForEducatorsParent = $(otisForEducators).parents("article.product-item");
      var otisForEducatorsTagContainer = $(otisForEducatorsParent).find("div.inner-content > h3.product-title > div#tag-container.OTIS.for.educators");

      var teqTivities = $("#teq-tivities");
      var teqTivitiesTitle = $(this).attr("title");
      var teqTivitiesId = $(this).attr("id");
      var teqTivitiesParent = $(teqTivities).parents("article.product-item");
      var teqTivitiesTagContainer = $(teqTivitiesParent).find("div.inner-content > h3.product-title > div#tag-container.Teq-tivities");

      if ($(this).is(":checked")) {
        // IF THE CHECKBOX FROM THE LIST IS BEING Checked
        // CONDITIONAL TO CHECK IF CHECKBOX IS EITHER OTIS OR TEQTIVITY CATEGORY

        if ($(this).hasClass("otis")) {
          // CHECK CHECKBOX AND PARENT 'article.product-item' Element
          // DISPLAY PRODUCT-ITEM HAS CHECKED AND CHANGE ADD BUTTON
          // APPEND TAG TO associated TAG CONTAINER
          // UPDATE 'ul#select-items-content' IF ITEM ADDED DOES NOT EXIST

          $(otisForEducators).prop( "checked", true );
          $(otisForEducatorsParent).addClass("product-selected");
          $(otisForEducatorsParent).find(".product-content > label.add-or-remove-button").html("remove from solution");
          $(otisForEducatorsTagContainer).append('<span class="tag is-rounded" id="'+categoryItemId+'-selected-category">'+categoryItemValue+'<input type="hidden" name="userPdCategoriesSelections[]" value="'+categoryItemId+'" /></span>');

            if($("ul#select-items-content li#otis-for-educators-selected-product").length == 0) {
              $("ul#select-items-content").append('<li id="otis-for-educators-selected-product">OTIS for Educators</li>');
            }
            updateCounter();
            console.log(categoryItemTitle + ' added');

        } else if ($(this).hasClass("teqtivity")) {
          // CHECK CHECKBOX AND PARENT 'article.product-item' Element
          // DISPLAY PRODUCT-ITEM HAS CHECKED AND CHANGE ADD BUTTON
          // APPEND TAG TO associated TAG CONTAINER
          // UPDATE 'ul#select-items-content' IF ITEM ADDED DOES NOT EXIST

          $(teqTivities).prop( "checked", true );
          $(teqTivitiesParent).addClass("product-selected");
          $(teqTivitiesParent).find(".product-content > label.add-or-remove-button").html("remove from solution");
          $(teqTivitiesTagContainer).append('<span class="tag is-rounded" id="'+categoryItemId+'-selected-category">'+categoryItemValue+'<input type="hidden" name="userPdCategoriesSelections[]" value="'+categoryItemId+'" /></span>');

            if($("ul#select-items-content li#teq-tivities-selected-product").length == 0) {
              $("ul#select-items-content").append('<li id="teq-tivities-selected-product">Teq-tivities</li>');
            }
            updateCounter();
            console.log(categoryItemTitle + ' added');
        }

      } else if($(this).not(':checked')) {

        // IF CATEGORY ITEM IS CHECKED REMOVE THE ELEMENT BY SPECIFIED ID
        // UNCHECK PARENT 'article.product-item' Element
        if ($(this).hasClass("otis")) {

          $(otisForEducatorsTagContainer).find("#"+categoryItemId+"-selected-category").remove();
            updateCounter();
            console.log(categoryItemTitle + ' removed')

        } else if ($(this).hasClass("teqtivity")) {

          $(teqTivitiesTagContainer).find("#"+categoryItemId+"-selected-category").remove();
            updateCounter();
            console.log(categoryItemTitle + ' removed')

        }

      }

      var userPdOptions = $("#preliminary-product-list .products-list.professional-development div.column").find("article.product-item.pd-option input.instructional-support:checked");
        if (userPdOptions.length != 0) {
          $("#pdFinishedButton").attr( "disabled", false );
        } else {
          $("#pdFinishedButton").attr( "disabled", true );
        }
    });

    // IF PD OPTIONS ARE SELECTED
    // FUNCTION TO COUNT ALL PD SELECTION 'input.instructional-support' elements
    // FIND ALL ::CHECKED 'input' SIBLINGS elements
    // IF TOTAL INPUT ELEMENTS IS ZERO ADD DISABLED ATTRIBUTE TO NEXT BUTTON
    $('#preliminary-product-list .products-list.professional-development').on( "click", "article.product-item input.instructional-support",function() {
      var userPdOptions = $(this).parents("div.column").find("article.product-item.pd-option input.instructional-support:checked");
        if (userPdOptions.length != 0) {
          $("#pdFinishedButton").attr( "disabled", false );
        } else {
          $("#pdFinishedButton").attr( "disabled", true );
        }
    });

    // SCROLL BACK TO TOP FUNCTION
    // OFFSET BROWSER WINDOW TO ELEMENT 'form#prelimproducts'
    $(".top-content-scroll").click(function(){
      var offset = $("#prelimProducts").offset();
        offset.top -= 90;
      $('html, body').animate({
        scrollTop: offset.top,
      });
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
