/**
 * js scripts for Product Template
 */

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
       * ADD CLASS 'is-active' TO CONVERSATION BUBBLE ELEMENT
       * CSS RULES WILL TRIGGER ELELMENT INTO VIEW
       */
       window.onscroll = function() {videoClip()};

       function videoClip() {
         var subNav = document.querySelector(".product-site-header")
         var pdWordBubble = document.querySelector(".conversation-bubble.pd");
         var iBlockWordBubble = document.querySelector(".conversation-bubble.iblocks");
         var logoHighlight = document.getElementById('logoHighlight');

         if (subNav.classList.contains('content-container-active')) {
           var logoRadius = "0" + pctScrolled * 1.2;
            if (logoRadius <= 45 && logoHighlight) {
             logoHighlight.setAttribute('r', logoRadius + "%");
            }
            if (logoRadius >= 36 && logoHighlight) {
              pdWordBubble.classList.add('is-active');
            } else {
              pdWordBubble.classList.remove('is-active');
            }
         }
         if (subNav.classList.contains('iblock-container-active')) {
           pdWordBubble.classList.remove('is-active');
           iBlockWordBubble.classList.add('is-active');
         } else {
           iBlockWordBubble.classList.remove('is-active');
         }
       }

     // console.log(pctScrolled + "% has been scrolled")
     // console.log(logoRadius)
 }
 window.addEventListener("scroll", function(){
     amountScrolled()
 }, false);

 /**
   * ELEMENT nav.product-site-header SCROLL FUNCTIONS
   * DECLARING HTML ELEMENTS nav.product-site-header, div.content-container, div.iblock-pathway-container
   * CREATE IntersectionObserver OBJECTS
   */
   const elementSubNav = document.querySelector(".product-site-header")
   const elementContainerContainer = document.querySelector('.content-container')
   const elementPathwayContainer = document.querySelector('.iblock-pathway-container')

 /**
   * TARGET SUBNAV ELEMENT
   * DECLARE POSITION CSS RULE FOR Element 'top: -1px;'
   * IF threshold POSITION is Less than 1 TOGGLE CLASS 'is-sticky'
   */
   const observSubNavObj = new IntersectionObserver(
     ([e]) => e.target.classList.toggle("is-sticky", e.intersectionRatio < 1),
       { threshold: [1] }
   );
   observSubNavObj.observe(elementSubNav);

 /**
   * TARGET SUBNAV ELEMENT WITH Element '.content-container' POSITION
   * IF '.content-container' ENTERS THE VIEWPORT TOGGLE CLASS 'content-container-active'
   * ELSE REMOVE CLASS 'content-container-'
   */
   const contentContainerObserver = new window.IntersectionObserver(([entry]) => {
     if (entry.isIntersecting) {
       elementSubNav.classList.toggle("content-container-active");
     } else {
       elementSubNav.classList.remove("content-container-active");
     }
   }, { root: null, threshold: 0, });
   contentContainerObserver.observe(elementContainerContainer);

 /**
   * TARGET SUBNAV ELEMENT WITH Element '.content-container' POSITION
   * IF '.content-container' ENTERS THE VIEWPORT TOGGLE CLASS 'content-container-active'
   * ELSE REMOVE CLASS 'content-container-'
   */
   const iBlockContainerObserver = new window.IntersectionObserver(([entry]) => {
     if (entry.isIntersecting) {
       elementSubNav.classList.toggle("iblock-container-active");
     } else {
       elementSubNav.classList.remove("iblock-container-active");
     }
   }, { root: null, threshold: 0, });
   iBlockContainerObserver.observe(elementPathwayContainer);
