/**
 * javascript functions for Teq-v4-0
 * EVOLVE Horizontal Scroll Section
 * Initial app module
 */


 /*
  * CAPTURE MOUSE POSITION
  * FROM ELEMENTS OF CLASS .info-container
  */
  const containers = document.querySelectorAll('.info-container');
  const config = {
    rootMargin: '50px 20px 75px 30px',
    threshold: [0, 0.25, 0.75, 1]
  };

  observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.intersectionRatio > 0) {
        entry.target.classList.remove('hideContent');
        entry.target.classList.add('showContent');
      } else {
        entry.target.classList.remove('showContent');
        entry.target.classList.add('hideContent');
      }
    });
  }, config);

  containers.forEach(container => {
    observer.observe(container);
  });


  /*
   * CAPTURE MOUSE POSITION
   * FROM ELEMENTS OF CLASS .displacementElements
   */
   const images = document.querySelectorAll('.displacementImageElement');
   const conf = {
     rootMargin: '50px 50px 50px 50px',
     threshold: [0.25, 0.25, 0.25, 0.25]
   };

   observer = new IntersectionObserver(entries => {
     entries.forEach(entry => {
       if (entry.intersectionRatio > 0) {
         entry.target.classList.remove('stopAnimation');
         entry.target.classList.add('startAnimation');
       } else {
         entry.target.classList.remove('startAnimation');
         entry.target.classList.add('stopAnimation');
       }
       document.querySelectorAll("animate").forEach(element => {
        element.beginElement();
      });
     });
   }, conf);

   images.forEach(image => {
     observer.observe(image);
   });
