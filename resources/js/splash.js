/**
 * Splash Page Animation
 * Handles fade-in on load and fade-out transition on click
 */

(function () {
  const wrap = document.querySelector('.splash-wrap');
  const link = document.querySelector('.logo-link');

  if (!wrap || !link) return;

  // Fade-in animation on page load
  requestAnimationFrame(() => {
    wrap.classList.add('is-visible');
  });

  // Fade-out animation on click, then navigate
  link.addEventListener('click', function (e) {
    e.preventDefault();

    // Save navigation state in sessionStorage
    try {
      sessionStorage.setItem('fromSplash', '1');
    } catch (_) {
      // Silent fail if sessionStorage is not available
    }

    // Trigger fade-out animation
    wrap.classList.add('is-leaving');

    // Navigate after animation completes (350ms)
    setTimeout(() => {
      window.location.href = this.href;
    }, 350);
  });
})();
