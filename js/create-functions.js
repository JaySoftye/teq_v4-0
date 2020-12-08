/**
 * js scripts for Teq-v4-0
 * Initial app module
 */

  /**
    * TABBED CONTENT FOR CREATE YOUR SOLUTION DIALS
    */
    app.controller('formTabController', ['$scope', function($scope) {
      $scope.tab = 0;
      $scope.setTab = function(newTab){
        $scope.tab = newTab;
      };

      $scope.isSet = function(tabNum){
        return $scope.tab === tabNum;
      };

      $scope.back = function() {
        if ($scope.tab > 0) {
          $scope.tab--;
        }
      };
      $scope.next = function() {
        if ($scope.tab < 4) {
          $scope.tab++;
        }
      }
    }]);


    app.controller("createSolution", function($scope) {
    /**
      * Hamburger Helper Function
      */
      $scope.log = function() {
        console.log("Success");
      };

    /**
      * START CREATING YOUR SOLUTION
      */
      $scope.startCreatingSolution = function() {
        $scope.startCreating = true;
      };

    /**
      * SUBMIT YOUR SOLUTION SET TO RESULTS PAGE
      */
      $scope.actionURL = "/create-your-solution/your-solution/";
      $scope.submitSolutionSet =  function() {
        location.href = $scope.actionURL;
      };


    /**
      * TEXT SHOW/HIDE FUNCTIONS FOR DESCRIPTIONS
      */
      $scope.resetSolutionSet = function() {
        $scope.show = 0;
        $scope.professionalDevelopmentSolutions = false;
        $scope.pdSelected = false;
        $scope.lessonContentSolutions = false;
        $scope.lessonContentSelected = false;
        $scope.stemSolutions = false;
        $scope.stemSelected = false;
        $scope.classroomTransformationSolutions = false;
        $scope.classroomSelected = false;
        $scope.gradeBand = false;
        $scope.gradeSelected = false;
        $scope.subjectMatter = false;
        $scope.subjectSelected = false;
        $scope.technologyProficiency = false;
        $scope.proficiencySelected = false;
        $scope.subjectMatterEla = false;
        $scope.subjectMatterEngineering = false;
        $scope.subjectMatterEnglish = false;
        $scope.subjectMatterMath = false;
        $scope.subjectMatterScience = false;
        $scope.subjectMatterSocialStudies = false;
        $scope.subjectMatterStem = false;
        $scope.subjectMatterSpecialEducation = false;
        $scope.subjectTitle = '';
        $scope.subjectLabel = '';
      };

      $scope.pdSelected = false;
      $scope.mentoringPdSelected = function() {
        $scope.professionalDevelopmentSolutions = 'Mentoring PD';
          $scope.show = 1;
          $scope.pdSelected = true;
        };
      $scope.coachingPdSelected = function() {
        $scope.professionalDevelopmentSolutions = 'Coaching PD';
          $scope.show = 2;
          $scope.pdSelected = true;
        };
      $scope.onlinePdSelected = function() {
        $scope.professionalDevelopmentSolutions = 'Online (OTIS) PD';
          $scope.show = 3;
          $scope.pdSelected = true;
        };
      $scope.pdSelectedReset = function() {
        $scope.pdSelected = false;
          $scope.professionalDevelopmentSolutions = '';
          $scope.show = 0;
      }

      $scope.lessonContentSelected = false;
      $scope.projectBasedLearningSelected = function() {
        $scope.lessonContentSolutions = 'Project-Based Learning';
          $scope.show = 4;
          $scope.lessonContentSelected = true;
        };
      $scope.customizedContentCreationSelected = function() {
        $scope.lessonContentSolutions = 'Customized Content Creation';
          $scope.show = 5;
          $scope.lessonContentSelected = true;
        };
      $scope.educationalResourcesSelected = function() {
        $scope.lessonContentSolutions = 'Educational Resources';
          $scope.show = 6;
          $scope.lessonContentSelected = true;
        };
      $scope.lessonContentSelectedReset = function() {
        $scope.lessonContentSelected  = false;
          $scope.lessonContentSolutions = '';
          $scope.show = 0;
        };

      $scope.stemSelected = false;
      $scope.generalStemSelected = function() {
        $scope.stemSolutions = 'General STEM';
          $scope.show = 7;
          $scope.stemSelected = true;
        };
      $scope.stemCodingSelected = function() {
        $scope.stemSolutions = 'Coding';
          $scope.show = 8;
          $scope.stemSelected = true;
        };
      $scope.stemRoboticsSelected = function() {
        $scope.stemSolutions = 'Robotics';
          $scope.show = 9;
          $scope.stemSelected = true;
        };
      $scope.hydroponicsSelected = function() {
        $scope.stemSolutions = 'Hydroponics';
          $scope.show = 10;
          $scope.stemSelected = true;
        };
      $scope.stemSelectedReset = function() {
        $scope.stemSelected  = false;
          $scope.stemSolutions = '';
          $scope.show = 0;
        };

      $scope.classroomSelected = false;
      $scope.smartSelected = function() {
        $scope.classroomTransformationSolutions = 'SMART Board/SMART Learning Suite';
          $scope.show = 11;
          $scope.classroomSelected = true;
        };
      $scope.activeLearningSpacesSelected = function() {
        $scope.classroomTransformationSolutions = 'Active Learning Spaces';
          $scope.show = 12;
          $scope.classroomSelected = true;
        };
      $scope.evospacesSelected = function() {
        $scope.classroomTransformationSolutions = 'Evospaces (furniture)';
          $scope.show = 13;
          $scope.classroomSelected = true;
        };
      $scope.classroomSelectedReset = function() {
        $scope.classroomSelected  = false;
          $scope.classroomTransformationSolutions = '';
          $scope.show = 0;
        };

      $scope.gradeSelected = false;
      $scope.gradesk2Selected = function() {
        $scope.gradeBand = 'Grades K-2';
          $scope.show = 14;
          $scope.gradeSelected = true;
        };
      $scope.grades35Selected = function() {
        $scope.gradeBand = 'Grades 3-5';
          $scope.show = 15;
          $scope.gradeSelected = true;
        };
      $scope.grades68Selected = function() {
        $scope.gradeBand = 'Grades 6-8';
          $scope.show = 16;
          $scope.gradeSelected = true;
        };
      $scope.grades912Selected = function() {
        $scope.gradeBand = 'Grades 9-12';
          $scope.show = 17;
          $scope.gradeSelected = true;
        };
      $scope.gradeSelectedReset = function() {
        $scope.gradeSelected  = false;
          $scope.gradeBand = '';
          $scope.show = 0;
        };

      $scope.elaSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 18;
          $scope.subjectMatterEla = true;
          $scope.subjectTitle = 'I want to explore <strong>ELA</strong> solutions.';
          $scope.subjectLabel = 'ELA';
        };
      $scope.engineeringSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 19;
          $scope.subjectMatterEngineering = true;
          $scope.subjectTitle = '<strong>Engineering</strong> is my middle name — what solutions do you have for me?';
          $scope.subjectLabel = 'Engineering';
        };
      $scope.englishSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 20;
          $scope.subjectMatterEnglish = true;
          $scope.subjectTitle = 'I want to explore what you have for <strong>English</strong>.';
          $scope.subjectLabel = 'English';
        };
      $scope.mathSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 21;
          $scope.subjectMatterMath = true;
          $scope.subjectTitle = '<strong>Math solutions</strong>, here I come!';
          $scope.subjectLabel = 'Math';
        };
      $scope.scienceSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 22;
          $scope.subjectMatterScience = true;
          $scope.subjectTitle = 'What do you have for <strong>Science-related</strong> solutions?';
          $scope.subjectLabel = 'Science';
        };
      $scope.socialStudiesSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 23;
          $scope.subjectMatterSocialStudies = true;
          $scope.subjectTitle = 'Show me your solutions for <strong>Social Studies</strong>.';
          $scope.subjectLabel = 'Social Studies';
        };
      $scope.specialEducationSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 24;
          $scope.subjectMatterSpecialEducation = true;
          $scope.subjectTitle = 'I am specifically interested in <strong>Special Education</strong>.';
          $scope.subjectLabel = 'Spacial Education';
        };
      $scope.stemSubjectSelected = function() {
        $scope.subjectSelected = true;
          $scope.show = 25;
          $scope.subjectMatterStem = true;
          $scope.subjectTitle = 'I want to take a deep dive into <strong>STEM solutions</strong>.';
          $scope.subjectLabel = 'STEM';
        };
      $scope.subjectSelectedReset = function() {
        $scope.subjectSelected = false;
        $scope.subjectMatterEla = false;
        $scope.subjectMatterEngineering = false;
        $scope.subjectMatterEnglish = false;
        $scope.subjectMatterMath = false;
        $scope.subjectMatterScience = false;
        $scope.subjectMatterSocialStudies = false;
        $scope.subjectMatterStem = false;
        $scope.subjectMatterSpecialEducation = false;
          $scope.subjectTitle = '';
          $scope.subjectLabel = '';
          $scope.show = 0;
        };

      $scope.proficiencySelected = false;
      $scope.easyProficiencySelected = function() {
        $scope.technologyProficiency = 'Easy Proficiency';
          $scope.show = 26;
          $scope.proficiencySelected = true;
        };
      $scope.intermediateProficiencySelected = function() {
        $scope.technologyProficiency = 'Intermediate Proficiency';
          $scope.show = 27;
          $scope.proficiencySelected = true;
        };
      $scope.advancedProficiencySelected = function() {
        $scope.technologyProficiency = 'Advanced Proficiency';
          $scope.show = 28;
          $scope.proficiencySelected = true;
        };
      $scope.proficiencySelectedReset = function() {
        $scope.proficiencySelected  = false;
          $scope.technologyProficiency = '';
          $scope.show = 0;
        };

    });

    app.controller("solutionResults", function($scope) {
    /**
      * TABBED CONTENT for SOLUTION SET RESULTS
      */

      $scope.expandAllTabs = function() {
        $scope.pdOnlineOtisCourse = true;
        $scope.iblockPathwayTopic = true;
        $scope.stemProductOptions = true;
        $scope.classroomTransformationInfo = true;
      };

      $scope.tab = 0;
        $scope.setTab = function(newTab){
          $scope.tab = newTab;
        };
        $scope.isSet = function(tabNum){
          return $scope.tab === tabNum;
        };
      $scope.closeTabs = function() {
          $scope.tab = 0;
        };
    });
