
//scroll div slowly
var links = document.querySelectorAll('a[href^="#"]');
for (var i = 0; i < links.length; i++) {
  links[i].addEventListener('click', function(event) {
    event.preventDefault();
    var targetId = this.getAttribute('href').substring(1);
    scrollToDiv(targetId);
  });
}
    function scrollToDiv(targetId) {
  var div = document.getElementById(targetId);
  var start = window.pageYOffset;// current vertical scroll position of the window,
  var end = div.offsetTop;//set to the distance between the top of the div element and the top of the closest positioned ancestor element.
  var distance = end - start;
  var duration = 1000; // set the duration of the animation to 1000 milliseconds (1 second)

  var startTime = null;
  function scrollAnimation(currentTime) {
    if (startTime === null) startTime = currentTime;
    var elapsedTime = currentTime - startTime;
    var scrollPosition = easeInOut(elapsedTime, start, distance, duration);
    window.scrollTo(0, scrollPosition);
    if (elapsedTime < duration) {
      requestAnimationFrame(scrollAnimation);
    }
  }

  function easeInOut(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
  }

  requestAnimationFrame(scrollAnimation);
}
