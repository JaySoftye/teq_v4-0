<form id="searchProductsForm" class="list-filters padding-sm-top-bottom" role="search" method="get" action="<?php echo home_url(); ?>/filter-search-page/?">
  <div class="filter-item" ng-controller="productTypeFilter">
    <select id="selectedProductType" name="selectedProductType" required>
      <option value="" selected disabled>Product Type</option>
      <option label="STEM Technology" value="STEM Technologies">STEM Technology</option>
      <option label="Educational Technology" value="Educational Technology">Educational Technology</option>
      <option label="Professional Development" value="Professional Development">Professional Development</option>
    </select>
    <span class="down-arrow"></span>
  </div>
  <div class="filter-item" ng-controller="gradeLevelFilter">
    <select id="selectedGradeLevel" name="selectedGradeLevel" ng-model="selectedGradeLevel" ng-options="item.id as item.name for item in items track by item.id">
      <option value="" selected disabled>Grade Level</option>
    </select>
  </div>
  <div class="filter-item" ng-controller="stemSubjectMatterFilter">
    <select id="selectedStemSubjectMatter" name="selectedStemSubjectMatter" ng-model="selectedStemSubjectMatter" ng-options="item.id as item.name for item in items track by item.id">
      <option value="" selected disabled>Subject Matter</option>
    </select>
  </div>
  <div class="filter-item" ng-controller="technologyProficiencyFilter">
    <select id="selectedtechnologyProficiencyLevel" name="selectedtechnologyProficiencyLevel" ng-model="selectedtechnologyProficiencyLevel" ng-options="item.id as item.name for item in items track by item.id">
      <option value="" selected disabled>Technology Proficiency</option>
    </select>
  </div>
  <div class="filter-item">
    <input id="searchProducts" name="submit" type="submit" value="View Product(s)" />
  </div>
</form>
