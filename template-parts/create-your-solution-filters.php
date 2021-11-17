<h4 class="margin-top">I am looking for...</h4>
<div class="field has-addons">
  <p class="control">
    <input id="tagAutocomplete" class="input search" type="text" name="tagSearch" placeholder="Type your search term here" onfocus="closeAllDropdownMenus()">
  </p>
  <div id="gradeBandDropdown" class="control dropdown hide-tablet-mobile">
    <div class="dropdown-trigger">
      <button type="button" class="button" onclick="toggle_dropdown('gradeBandDropdown');">
        <span>for grade levels...</span>
      </button>
    </div>
    <div class="dropdown-menu" id="gradeBrandMenu" role="menu">
      <div class="dropdown-content">
        <label class="checkbox">
          <input type="checkbox" id="showAllGrades" class="product-item-filter" checked="checked" onclick="filterItems(this)" value="product-item" disabled>
          <span class="checkmark"></span>
          <span class="title">All Grade Levels</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter grade-filter" onclick="filterItems(this)" name="grades" value="K-2">
          <span class="checkmark"></span>
          <span class="title">K-2 (early childhood)</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter grade-filter" onclick="filterItems(this)" name="grades" value="3-5">
          <span class="checkmark"></span>
          <span class="title">3-5 (elementary)</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter grade-filter" onclick="filterItems(this)" name="grades" value="6-8">
          <span class="checkmark"></span>
          <span class="title">6-8 (middle)</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter grade-filter" onclick="filterItems(this)" name="grades" value="9-12">
          <span class="checkmark"></span>
          <span class="title">9-12 (high)</span>
        </label>
      </div>
    </div>
  </div>
  <div id="stemFocusDropdown" class="control dropdown hide-tablet-mobile">
    <div class="dropdown-trigger">
      <button type="button" class="button" onclick="toggle_dropdown('stemFocusDropdown');">
        <span>focusing on the STEM topics...</span>
      </button>
    </div>
    <div class="dropdown-menu" id="stemFocusMenu" role="menu">
      <div class="dropdown-content">
        <label class="checkbox">
          <input type="checkbox" id="showAllTopics" class="product-item-filter" checked="checked" onclick="filterItems(this)" value="product-item" disabled>
          <span class="checkmark"></span>
          <span class="title">All Topics</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter stem-topic" onclick="filterItems(this)" name="topics" value="Coding">
          <span class="checkmark"></span>
          <span class="title">Coding</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter stem-topic" onclick="filterItems(this)" name="topics" value="Engineering">
          <span class="checkmark"></span>
          <span class="title">Engineering</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter stem-topic" onclick="filterItems(this)" name="topics" value="General">
          <span class="checkmark"></span>
          <span class="title">General Education</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter stem-topic" onclick="filterItems(this)" name="topics" value="Hydroponics">
          <span class="checkmark"></span>
          <span class="title">Hydroponics</span>
        </label>
        <label class="checkbox">
          <input type="checkbox" class="product-item-filter stem-topic" onclick="filterItems(this)" name="topics" value="Robotics">
          <span class="checkmark"></span>
          <span class="title">Robotics</span>
        </label>
      </div>
    </div>
  </div>
</div>
<div class="columns">
  <div id="autoCompleteFilterApplied" class="column">

    <!--
    <p class="caption"><strong>Popular Search Terms:</strong> <button type="button" class="popular-search-term" value="biology" onclick='popularSearchTerm(this)'>biology</button>, <button type="button" class="popular-search-term" value="sustainable" onclick='popularSearchTerm(this)'>sustainable</button>, </p>
    -->

  </div>
  <div class="column has-text-right">
    <p class="caption">Showing
      <span id="totalProductsShown" class="strong">
        <?php
        if (isset($_GET['entryPoint']) && $_GET['entryPoint'] == 'pblEntryPoint') {
          $count_pathways = wp_count_posts('pathways');
          $total_count = $count_pathways -> publish;
            echo $total_count;
        } else if (isset($_GET['entryPoint']) && $_GET['entryPoint'] == 'stemEntryPoint') {
          $args = array(
            'post_type' => 'product-and-service',
            'category_name' => 'teq-product',
            'taxonomy' => 'topic',
            'numberposts' => -1,
            'tax_query' => array(
              array (
                'taxonomy' => 'topics',
                'field' => 'slug',
                'terms' => 'STEM Technologies'
              )
            ),
          );
          $count_stem_products = count( get_posts( $args ) );
            echo $count_stem_products;
        }
        ?>
      </span> Products |
      <button type="button" class="popular-search-term" value="all-products" onclick='popularSearchTerm(this)'><b>Show all</b></button>
    </p>
  </div>
</div>
