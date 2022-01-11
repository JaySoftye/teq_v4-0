/**
 * js scripts for Teq-v4-0
 */

/**
  * FILTER FUNCTIONS FOR 'article.post-card' ELEMENT; onCHANGE Function enabled for (THIS) on SELECT MENU ELEMENT
  * QUERY SELECT ALL '.product-item' ELEMENTS
  * STORE FILTERED VALUE FOR SELECT MEMUES; select#gradeBandFilter and select#subjectMatterFilter
  * RUN FOR LOOP AGAINST VALUES FROM SELECT MENUS
  * CONDITIONAL TO ADD CLASS 'filtered' TO ALL ELEMENTS NOT WITH VALUES IN THEIR CLASSES
  * JQUERY LENGTH COUNT TO GET THE TOTAL NUMBER OR PRODUCTS AND TOTAL NUMBER OF PRODUCTS WITH CLASS 'filtered'
  * IF ALL PRODUCTS ELEMENTS HAVE CLASS 'filtered' SHOW 'no products found' MESSAGE ELEMENT
  */
  window.filterItems = function(el) {
    const productItems = document.querySelectorAll('article.post-card');
    const gradeBandFilter = document.getElementById('gradeBandFilter');
    const subjectMatterFilter = document.getElementById('subjectMatterFilter');

      var gradeBandValue = gradeBandFilter.value;
      var subjectMatterValue = subjectMatterFilter.value;

      $("div#noProductsFound").empty();

      for(var i = 0; i < productItems.length; i++){
        if (productItems[i].classList.contains(gradeBandValue) && productItems[i].classList.contains(subjectMatterValue)) {
          productItems[i].classList.remove('filtered')
        } else {
          productItems[i].classList.add('filtered')
        }
      }

      var totalProductItems = $("article.post-card").length;
      var totalFilteredProductItems = $("article.post-card.filtered").length;
        if (totalFilteredProductItems >= totalProductItems) {
          $("div#noProductsFound").html('<h6 class="headline-title">We apologize, but it seems no products were found with the filters you have selected. <br /><strong>Please try a different set of search criteria using the menu above.</strong></h6>');
        }
  };

  /**
    * CLEAR ALL FILTERS ON 'article.post-card' ELEMENTS
    * FOR LOOP TO REMOVE ALL 'filtered' CLASSES
    */
    function clearFilters() {
      const productItems = document.querySelectorAll('article.post-card');
      $("div#noProductsFound").empty();
        for(var i = 0; i < productItems.length; i++){
          productItems[i].classList.remove('filtered')
        }
    };
