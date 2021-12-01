/**
 * js scripts for Teq-v4-0
 * Initial app module
 */

app.controller('solutionController', function($scope, $location, $window) {
'use strict';

/**
  * Initial scope for entry point MODEL
  * PRODUCT SELECTION ENTRY POINT
  * CREATE VARIABLE TO HOLD CURRENT URL; INCLUDES PARAMTERS
  * CONDITIONAL STATEMENT TO CHECK AGAINST ENTRY POINT PARAMETERS
  */
  $scope.searchObject = $location.absUrl();
  $scope.solutionHeaderText = 'CREATE Your Solution'

    if($scope.searchObject.includes('pblEntryPoint')) {
      $scope.pblProjectChoices = true;
      $scope.stemProjectChoices = false;
      $scope.pdProjectChoices = false;
      $scope.solutionHeaderText = "Let's jump right into a project-based learning activity!"
      $scope.solutionSubheaderText = "Transform your classroom and your students’ learning experience with an iBlock."
      $scope.solutionBodyText = "Spark student curiosity, innovation, and inquiry-based thinking with experiential learning that is purpose-driven and meaningful. Find the perfect project for your class – search or filter by grade level and topic."
    } else if($scope.searchObject.includes('stemEntryPoint')) {
      $scope.pblProjectChoices = false;
      $scope.stemProjectChoices = true;
      $scope.pdProjectChoices = false;
      $scope.solutionHeaderText = "Let's jump right into great STEM products for your students!"
      $scope.solutionSubheaderText = "Transform your classroom and your students’ learning experience with STEM products."
      $scope.solutionBodyText = "By giving students the right tools and technology, you can spark curiosity, innovation, and inquiry-based thinking. Find the perfect products for your class – search or filter by grade level and topic."
    } else if($scope.searchObject.includes('initialEntryPoint')) {
      $scope.solutionHeaderText = 'What type of solution do you want to start with?'
      $scope.getStarted = !$scope.getStarted;
      $scope.entryPointChoiced = true;
      $scope.createProgress = '1'
    } else {
      $scope.letsGetStarted = function() {
        $scope.solutionHeaderText = 'What type of solution do you want to start with?'
        $scope.getStarted = !$scope.getStarted;
        $scope.entryPointChoiced = true;
      }
      $scope.entryPointChoiced = false;
      $scope.pblProjectChoices = false;
      $scope.stemProjectChoices = false;
      $scope.pdProjectChoices = false;
      $scope.createProgress = '1'
    }

/**
  * NEXT BUTTON FUNCTION FOR PRODUCT SOLUTION SELECTIONS
  * DECLARE VARIABLES FOR STEM,PATHWAY, AND PD INPUT ELEMENTS; CHECKED ELEMENTS ARE SEPARATED INTO THEIR OWN VARIABLE
  * SET VARIABLE TO CAPTURE URL PARAMETER 'entryPoint'
  * CONDITIONAL STATEMENT FOR THE 'entryPoint' PARAMETER && PRODUCT ITEMS SELECTED
  * SHOW ELEMENT; via ng-hide/ng-show BASED UPON CONDITIONAL RESULTS
  * LOOP THEIR 'productOptions' VARIABLE TO HIDE ENTIRE BATCH - SET TRUE VALUE WHEN OPTIONS SELECTED ARE FOUND
  */
  $scope.nextSolutions = function() {
    var stemProductInputs = document.querySelectorAll('input.stem-product:checked');
    const stemProductOptions = document.querySelectorAll('input.stem-product');
    var pathwayProductInputs = document.querySelectorAll('input.pathway-product:checked');
    const pathwayProductOptions = document.querySelectorAll('input.pathway-product');
    var pdProductInputs = document.querySelectorAll('input.pd-product:checked');
    const pdProductOptions = document.querySelectorAll('input.pd-product');

      $scope.searchObject = $location.absUrl();
      $scope.stemProductOptionsFound = false;
      $scope.pathwayProductOptionsFound = false;
      $scope.pdProductOptionsFound = false;

        if (stemProductInputs.length > 0) {
          $scope.stemProductOptionsFound = true;
        }
        if (pathwayProductInputs.length > 0) {
          $scope.pathwayProductOptionsFound = true;
        }
        if (pdProductInputs.length > 0) {
          $scope.pdProductOptionsFound = true;
        }

      console.log($scope.stemProductOptionsFound, $scope.pathwayProductOptionsFound, $scope.pdProductOptionsFound);

    if ($scope.stemProductOptionsFound && $scope.pathwayProductOptionsFound) {

      for (var z = 0; z < stemProductOptions.length; z++) {
        stemProductOptions[z].parentElement.classList.add('ng-hide');
      }
      for (var y = 0; y < pathwayProductOptions.length; y++) {
        pathwayProductOptions[y].parentElement.classList.add('ng-hide');
      }
      for (var x = 0; x < pdProductOptions.length; x++) {
        pdProductOptions[x].parentElement.classList.remove('ng-hide');
        pdProductOptions[x].parentElement.classList.add('ng-show');
      }

      $scope.pdProjectChoices = true;
      $scope.solutionHeaderText = "Professional Development to help you tie it all together."
      $scope.solutionSubheaderText = "Instructional support to help you feel comfortable and confident with your new solutions"
      $scope.solutionBodyText = "Learn educational technology skills with PD designed around your needs. We provide options for on-site, online, or a blended learning model. PD Specialists and Curriculum Specialists who facilitate our onsite, virtual, and online PD sessions are state certified educators with skills and expertise in every subject and content area – English, math, science, social studies, STEM, ENL and special education."

      $scope.readyToSubmit = true;
      showAllProductItems();

    } else if($scope.searchObject.includes('stemEntryPoint') && $scope.stemProductOptionsFound) {

      for (var d = 0; d < stemProductOptions.length; d++) {
        stemProductOptions[d].parentElement.classList.add('ng-hide');
      }
      for (var e = 0; e < pathwayProductOptions.length; e++) {
        pathwayProductOptions[e].parentElement.classList.remove('ng-hide');
        pathwayProductOptions[e].parentElement.classList.add('ng-show');
      }
      $scope.solutionHeaderText = "Now, let’s choose the technology that will allow your students to succeed!"
      $scope.solutionSubheaderText = "Bring your project-based activities to life with cutting-edge classroom tech."
      $scope.solutionBodyText = "Explore our STEM technology with your selected iBlocks in mind. You may choose to get one or more of the suggested technologies recommended in the iBlock, or you may prefer a selection of your own choosing."

      $scope.readyToSubmit = false;
        showAllProductItems();

    } else if($scope.searchObject.includes('pblEntryPoint') && $scope.pathwayProductOptionsFound) {

      for (var f = 0; f < pathwayProductOptions.length; f++) {
        pathwayProductOptions[f].parentElement.classList.add('ng-hide');
      }
      for (var g = 0; g < stemProductOptions.length; g++) {
        stemProductOptions[g].parentElement.classList.remove('ng-hide');
        stemProductOptions[g].parentElement.classList.add('ng-show');
      }
      $scope.solutionHeaderText = "Now, let’s explore projects that will make the best use of your new tech!"
      $scope.solutionSubheaderText = "Utilize cutting-edge classroom tech to bring your iBlock(s) to life."
      $scope.solutionBodyText = "Explore our iBlocks project-based learning experiences with your selected technology in mind. iBlocks are cross-curricular and skills-focused, so no matter what you choose, students will be getting a PBL experience like no other."

      $scope.readyToSubmit = false;
        showAllProductItems();
    }
  $("#productSearchNextButton").prop('disabled', true);
  $("html, body").animate({ scrollTop: 0 }, 250);
  }

  console.log('initial state is '+$scope.entryPointChoiced);
  console.log('pbl is '+$scope.pblProjectChoices);
  console.log('stem is '+$scope.stemProjectChoices);

/**
  * SCOPE BINDING ACCORDION VALUE FOR CREATE YOUR SOLUTION RESULTS
  * SET TO NULL UNTIL 'ng-click' BINDS VALUE BASED ON PRODUCT LABEL
  */
  $scope.accordionNameItem = '';

  $scope.reload = function() {
    location.reload();
  }
  $scope.backToStart = function() {
    $window.location.href = 'create-your-solution/?entryPoint=initialEntryPoint';
  }

});


/**
  * TURN BACK TIME
  */
  function goBack() {
    window.history.back();
  };

/**
  * Close all MODAL WINDOWS WITH CLOSE FUNCTION
  */
  function closeModals() {
    var modalWindows = document.getElementsByClassName('modal');
    for (var i = 0; i < modalWindows.length; i++) {
      modalWindows[i].classList.remove("is-active");
    }
  };

/**
  * Dropdown Menu Function
  */
  function toggle_dropdown(id) {

    const activeDropdownMenus = document.querySelectorAll('div.control.dropdown.is-active');
    var e = document.getElementById(id);

      e.addEventListener('click',function(event){
        event.stopPropagation();
      });

    if(e.classList.contains('is-active')) {
      e.classList.remove('is-active');
    } else {
      for(var i = 0; i < activeDropdownMenus.length; i++){
        activeDropdownMenus[i].classList.remove('is-active');
      }
      e.classList.add('is-active');
    }
  };
/**
  * Dropdown Menu Function
  */
  function closeAllDropdownMenus() {
    const activeDropdownMenus = document.querySelectorAll('div.control.dropdown.is-active');
    for(var i = 0; i < activeDropdownMenus.length; i++){
      activeDropdownMenus[i].classList.remove('is-active');
    }
  };
  window.onclick = function(event) {
    closeAllDropdownMenus();
  }

/**
  * ACCORDION FUNCTION
  */
  var acc = document.getElementsByClassName("tags-trigger");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.display === "block") {
        panel.style.display = "none";
      } else {
        panel.style.display = "block";
      }
    });
  };

/**
  * CLOSE AND EMPTY PRODUCT DETAILS
  */
  var closeButton = document.getElementsByClassName("close-details-trigger");
  var detailsContainer = document.getElementById("#product-details-container");
  var i;

  for (i = 0; i < closeButton.length; i++) {
    closeButton[i].addEventListener("click", function() {
      console.log('closed');
    });
  };

/**
 * PRODUCT ITEM COUNT Solutions TOTALS
 * IF THE TOTAL NUMBER OF SELECTED PRODUCTS EQUALS ZERO SET THE '#pathwaySelectionTrigger' ELEMENT TO UNCHECKED.
 */
 function solutionSetCount() {

   const pathwayNextButton = document.getElementById('productSearchNextButton');
   const pathwayBackButton = document.getElementById('productSearchBackButton');
   const progressBar = document.getElementById('progressBarAmount');
   const progressStatus = document.getElementById('progressStatusAmount');
      var progressBarAmount = parseInt(progressBar.value);
      var progressStatusAmount = parseInt(progressStatus.innerHTML);

   var yourClassroomSolutionButton = document.getElementById("yourClassroomSolution");
   var optionsSelected = document.getElementById("productOptions");
   var solutionSetTotal =  optionsSelected.querySelectorAll('input[type="checkbox"]:checked').length;
   var solutionSet = document.getElementById("solutionSet");
      solutionSet.innerHTML = solutionSetTotal;

   if(solutionSetTotal < 1) {
     yourClassroomSolutionButton.disabled = true;
     pathwayNextButton.disabled = true;
     pathwayBackButton.disabled = true;
   } else {
     yourClassroomSolutionButton.disabled = false;
     pathwayNextButton.disabled = false;
     pathwayBackButton.disabled = false;
   }

   var stemTotal =  optionsSelected.querySelectorAll('input[type="checkbox"].stem-product:checked').length;
   var pathwaysTotal =  optionsSelected.querySelectorAll('input[type="checkbox"].pathway-product:checked').length;
   var pdTotal =  optionsSelected.querySelectorAll('input[type="checkbox"].pd-product:checked').length;

   if(stemTotal > 0 && progressBarAmount == 25 || pathwaysTotal > 0 && progressBarAmount == 25) {
     progressBar.value = progressBarAmount + 25;
     progressStatus.innerHTML = progressStatusAmount + 25;
   } else if(stemTotal > 0 && pathwaysTotal == 0 && progressBarAmount == 50 || stemTotal == 0 && pathwaysTotal > 0 && progressBarAmount == 50) {
      progressBar.value == 50;
      progressStatus.innerHTML == 50;
   } else if(stemTotal == 0 && progressBarAmount == 50 || pathwaysTotal == 0 && progressBarAmount == 50) {
     progressBar.value = progressBarAmount - 25;
     progressStatus.innerHTML = progressStatusAmount - 25;
   } else if(stemTotal > 0 && pathwaysTotal > 0 && progressBarAmount == 50) {
     progressBar.value = progressBarAmount + 25;
     progressStatus.innerHTML = progressStatusAmount + 25;
   } else if(stemTotal > 0 && pathwaysTotal > 0 && pdTotal == 0 && progressBarAmount == 75) {
      progressBar.value == 75;
      progressStatus.innerHTML == 75
   } else if(stemTotal == 0 && pathwaysTotal > 0 && pdTotal == 0 && progressBarAmount == 75 || stemTotal > 0 && pathwaysTotal == 0 && pdTotal == 0 && progressBarAmount == 75) {
     progressBar.value = progressBarAmount - 25;
     progressStatus.innerHTML = progressStatusAmount - 25;
   } else if(stemTotal > 0 && pathwaysTotal > 0 && pdTotal > 0 && progressBarAmount == 75) {
     progressBar.value = progressBarAmount + 25;
     progressStatus.innerHTML = progressStatusAmount + 25;
   } else if(stemTotal > 0 && pathwaysTotal > 0 && pdTotal > 0 && progressBarAmount == 100) {
      progressBar.value == 100;
      progressStatus.innerHTML == 100
   } else if(stemTotal > 0 && pathwaysTotal > 0 && pdTotal == 0 && progressBarAmount == 100) {
     progressBar.value = progressBarAmount - 25;
     progressStatus.innerHTML = progressStatusAmount - 25;

   }

    console.log(solutionSetTotal + " items selected" );
    console.log(stemTotal + " STEM selected" );
    console.log(pathwaysTotal + " Pathways selected" );
    console.log(pdTotal + " PD selected" );
    console.log(progressBar.value + "% Completed");
 };

 /**
  * PRODUCT ITEM COUNT Function
  * GET TOTAL PRODUCT AMOUNT SHOWN; GET TOTAL AMOUNT OF PRODUCTS 'filtered'
  * SUBTRACT THE DIFFERENCE TO GET THE AMOUNT OF ITEMS VISIBLE TO USER
  */
  function productCount() {

    var productItems = document.querySelectorAll('.product-item').length;
    var productItemsHidden = document.querySelectorAll('.product-item.ng-hide').length;
    var productItemsShown = productItems - productItemsHidden;

    var productItemsFiltered = document.querySelectorAll('.product-item.filtered').length;
    var productItemsFilteredShown = productItemsFiltered - document.querySelectorAll('.product-item.ng-hide.filtered').length;

      var totalProductItems = productItemsShown - productItemsFilteredShown;
      document.getElementById('totalProductsShown').innerHTML = totalProductItems;
   };

/**
  * FILTER FUNCTIONS FOR PRODUCT-ITEMS; onClick Function enabled for (THIS)
  * QUERY SELECT ALL '.product-item' ELEMENTS
  * STORE FILTERED VALUE FOR CHECKBOX FILTER
  * CONDITIONAL FOR CHECKBOX STATUS
  * REMOVE DISABLED FUNCTION FOR 'ALL CATEGORIES' OPTION
  * LOOP THROUGH ELEMENTS TO ADD/REMOVE 'filtered' CLASS
  */
  function filterItems(el) {
    const productItems = document.querySelectorAll('.product-item');
    var searchTagInput = document.getElementById('tagAutocomplete');
    var showAllGradeLevels = document.getElementById('showAllGrades');
    var showAllStemTopics = document.getElementById('showAllTopics');
    var filterItemValue = el.getAttribute('value');
      if(el.checked === true && showAllGradeLevels.checked === true ) {
        console.log('show all was checked');
        showAllGradeLevels.disabled = false;
        showAllGradeLevels.checked = false;
        showAllStemTopics.disabled = false;
        showAllStemTopics.checked = false;
        for(var i = 0; i < productItems.length; i++){
          if (productItems[i].classList.contains(filterItemValue)) {
            productItems[i].classList.remove('filtered')
          } else {
            productItems[i].classList.add('filtered')
          }
        }
      } else if(el.checked === true && showAllStemTopics.checked === true ) {
        console.log('show all was checked');
        showAllGradeLevels.disabled = false;
        showAllGradeLevels.checked = false;
        showAllStemTopics.disabled = false;
        showAllStemTopics.checked = false;
        for(var i = 0; i < productItems.length; i++){
          if (productItems[i].classList.contains(filterItemValue)) {
            productItems[i].classList.remove('filtered')
          } else {
            productItems[i].classList.add('filtered')
          }
        }
      } else if(el.checked === true) {
        console.log('option was checked');
        for(var i = 0; i < productItems.length; i++){
          if (productItems[i].classList.contains(filterItemValue)) {
            productItems[i].classList.remove('filtered')
          }
        }
      } else {
        console.log('option was NOT checked');
        showAllGradeLevels.disabled = false;
        showAllGradeLevels.checked = false;
        showAllStemTopics.disabled = false;
        showAllStemTopics.checked = false;
        for(var i = 0; i < productItems.length; i++){
          if (productItems[i].classList.contains(filterItemValue)) {
            productItems[i].classList.add('filtered')
          }
        }
      }
      document.getElementById("autoCompleteFilterApplied").innerHTML = "";
      searchTagInput.value = '';
/**
  * GRADE BAND AND STEM TOPIC FILTER CHECK FOR CHECK ALL categories
  * CREATE COUNTER FOR THE CHECKBOX ITEMS; if :checked status
  * EVERYTIME THE "ALL CATEGORIES" ITEM IS CLICKED RUN Function
  */
    const gradeFilters = document.querySelectorAll('.product-item-filter.grade-filter');
    var gradeCounter = 0;
      for(var i = 0; i < gradeFilters.length; i++){
        if(gradeFilters[i].checked) {
          gradeCounter++;
        }
        if(gradeCounter == gradeFilters.length) {
          showAllGradeLevels.disabled = true;
          showAllGradeLevels.checked = true;
        }
      }
    const topicsFilters = document.querySelectorAll('.product-item-filter.stem-topic');
    var topicCounter = 0;
      for(var i = 0; i < topicsFilters.length; i++){
        if(topicsFilters[i].checked) {
          topicCounter++;
        }
        if(topicCounter == topicsFilters.length) {
          showAllStemTopics.disabled = true;
          showAllStemTopics.checked = true;
        }
      }

/**
  * EVERYTIME THE 'ALL CATEGORIES' option is CLICKED
  * ADD DISABLED ATTRIBUTE
  */
    showAllGradeLevels.addEventListener("click", () => {
      for(var i = 0; i < gradeFilters.length; i++){
        gradeFilters[i].checked = false;
      }
      showAllGradeLevels.disabled = true;
      showAllGradeLevels.checked = true;
    });
    showAllTopics.addEventListener("click", () => {
      for(var i = 0; i < topicsFilters.length; i++){
        topicsFilters[i].checked = false;
      }
      showAllTopics.disabled = true;
      showAllTopics.checked = true;
    });
/** ADD PRODUCT COUNT FUNCTION TO UPDATE TOTAL PRODUCTS SHOWN
 */
    productCount();
  };

/**
  * MOST POPULAR SEARCH AND SHOW ALL FUNCTIONS
  * CAPTURE SEARCH TERM FROM BUTTON VALUES
  * FILTER THROUGH (LOOP) RESULTS ON '.product-item' ELEMENTS
  * IF HAS 'PRODUCT-ITEM' VALUE SHOW ALL
  */
  function popularSearchTerm(objButton) {
    const productItems = document.querySelectorAll('.product-item');
    var searchField = document.getElementById('tagAutocomplete');
    var searchTerm = objButton.value;

    for(var i = 0; i < productItems.length; i++){
      if (productItems[i].classList.contains(searchTerm)) {
        productItems[i].classList.remove('filtered')
      } else {
        productItems[i].classList.add('filtered')
      }
    }
    document.getElementById("autoCompleteFilterApplied").innerHTML = "";
    searchField.value = searchTerm;
      productCount();
      closeAllDropdownMenus();
  }
  function showAllProductItems() {
    const productItems = document.querySelectorAll('.product-item');
    var searchField = document.getElementById('tagAutocomplete');

    for(var i = 0; i < productItems.length; i++){
      productItems[i].classList.remove('filtered')
    }
    document.getElementById("autoCompleteFilterApplied").innerHTML = "";
    searchField.value = "";
      productCount();
      closeAllDropdownMenus();
  }

/**
  * AUTOCOMPLETE SEARCH; initial code from w3
  * IDENTIFY SEARCH ARGUMENTS; USER INPUT AND ARRAY VALUES
  * EVENT LISTENER WHEN INPUT FIELD IS ACTIVE
  */
  function autocomplete(inp, arr) {

    var currentFocus;
    inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      closeAllLists();
      if (!val) { return false;}

        currentFocus = -1;
/* CREATE HTML CONTAINER TO HOLD SEARCH VALUES */
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
/*
 * APPEND SEARCH TERMS TO PARENT CONTAINER
 * LOOP THROUGH ALL POSSIBLE VALUES
 */
        this.parentNode.appendChild(a);

        for (i = 0; i < arr.length; i++) {
/*
 * APPEND SEARCH TERMS TO PARENT CONTAINER
 * LOOP THROUGH ALL POSSIBLE VALUES
 */
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
/*
 * CREATE HTML ELEMENT TO HOLD VALUES FOUND
 * MATCH CASE THE MAKE BOLD APPEND DATA TO VALUES FOUND
 * ADD TEXT 'innerHTML' and HIDDEN INPUT FIELD FOR USER SELECTION
 * EXECUTE FUNCTION TO APPEND TEXT DATA TO ORIGINAL INPUT FIELD AND CLOSE FOUND VALUES MENU
 */
          b = document.createElement("DIV");
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          b.addEventListener("click", function(e) {
            inp.value = this.getElementsByTagName("input")[0].value;
            closeAllLists();

/*
 * SET VARIABLE FOR PRODUCT ITEMS ON THE PAGE '.product-item'
 * CAPTURE SEARCH TERM VALUES
 * LOOP THROUGH PRODUCT ITEMS AND FILTER OUT NON-SEARCH TERMS BY POST tag
 * EXECUTE/UPDATE PRODUCT COUNT FUNCTION
 */
            const productItems = document.querySelectorAll('.product-item');
            var filterItemValue = inp.value;

              c = document.createElement("div");
                c.className = "control";
                c.onclick = function() {
                  const productItems = document.querySelectorAll('.product-item');
                  for(var i = 0; i < productItems.length; i++){
                    productItems[i].classList.remove('filtered')
                  }
                    document.getElementById("autoCompleteFilterApplied").innerHTML = "";
                    document.getElementById("tagAutocomplete").value = "";
                      productCount();
                      closeAllDropdownMenus();
                }
                c.innerHTML = "<div class='tags has-addons'><a class='tag is-info is-light'>" + filterItemValue + "</a><a class='tag is-delete'></a></div>";
                  document.getElementById("autoCompleteFilterApplied").innerHTML = "";
                  document.getElementById("autoCompleteFilterApplied").appendChild(c);

            for(var i = 0; i < productItems.length; i++){
              if (productItems[i].classList.contains(filterItemValue)) {
                productItems[i].classList.remove('filtered')
              } else {
                productItems[i].classList.add('filtered')
              }
            }
            productCount();
          });
          a.appendChild(b);
        }
      }
  });
/*
 * KEYDOWN EVENT LISTEN FOR USER KEYBOARD SELECTION
 * UP/DOWN ARROW KEY TO SELECT VALUES AND ADD :FOCUS STATE
 * APPEND DATA TO SEARCH INPUT FIELD IF CLICKED
 */
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        currentFocus++;
        addActive(x);
      } else if (e.keyCode == 38) {
        currentFocus--;
        addActive(x);
      } else if (e.keyCode == 13) {
        e.preventDefault();
        if (currentFocus > -1) {
          if (x) x[currentFocus].click();
        }
      }
  });
/*
 * ACTIVE STATE FOR SELECTIIONS AND :FOCUS ITEMS
 * ADD '.autocomplete-active' CLASS TO ALL ITEMS selected
 * REMOVE CLASS IF NOT :HOVER OR :ACTIVE
 * CLOSE .autocomplete-list ITEMS IF CLICKED
 */
  function addActive(x) {
    if (!x) return false;
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
/**
  * CHECK IF 'entryPoint' PARAMETER EXISTS IN URL
  * IF TRUE TURN 'tagAutocomplete' FUNCTION
  */
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
    if (urlParams.has('entryPoint')) {
      autocomplete(document.getElementById("tagAutocomplete"), postTags);
    }


/**
  * CLICK FUNCTION FOR ADD TO YOUR SOLUTION BUTTONS
  * CAPTURE THE VALUES FOR POST ID, CHECKBOX, DETAILS BUTTON
  * CHECK THE ASSOCIATED PRODUCT BY ID
  * CLEAR '#productSelections' DETAILS CONTAINER
  */
  function addProduct(solutionButton) {
    var productId = solutionButton.value;
    var productCheckbox = document.getElementById(productId);
    var productDetailsButton = document.getElementById(productId + "-details");
    var productDetailsContainer = document.getElementById("product-details-container");

      productCheckbox.parentElement.classList.toggle("is-checked");
      productDetailsContainer.innerHTML = "";

      productCheckbox.checked = true;
      productDetailsButton.innerHTML = "Unselect Option";
      productDetailsButton.classList.add("remove");

      solutionSetCount();
  }

  /**
    * CREATE YOUR SOLUTION
    * RESULTS PAGE SVG ELEMENT
    * CONDITIONAL TO ADD CLASS 'fixed' WHEN THE ELEMENT REACHES THE TOP OF THE PAGE

    var stickySidebar = $('#solutionSVG').offset().top;
    $(window).scroll(function() {
      if ($(window).scrollTop() > stickySidebar) {
        $('#solutionSVG').addClass('fixed');
      }
      else {
        $('#solutionSVG').removeClass('fixed');
      }
    });
*/

  /**
    * CLOSE AND EMPTY PRODUCT DETAILS
    */
    var contactModalButtons = document.getElementsByClassName("contactFormButton");
    var contactModal = document.getElementById("talkToaRepContactForm");
    var i;

    for (i = 0; i < contactModalButtons.length; i++) {
      contactModalButtons[i].addEventListener("click", function() {
        if (contactModal.classList.contains('is-active')) {
          contactModal.classList.remove('is-active')
        } else {
          contactModal.classList.add('is-active')
        }
      });
    };
