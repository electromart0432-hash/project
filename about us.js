// Counting Animation Logic
document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter');
  const speed = 200; // The lower the slower

  const animateCounters = () => {
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText.replace('+', ''); // Remove + if present during update (though we append at end)

        // Lower increment for higher numbers to keep animation smooth but fast enough
        const inc = target / speed;

        if (count < target) {
          // Round up to avoid decimals
          counter.innerText = Math.ceil(count + inc);
          setTimeout(updateCount, 20); // Run every 20ms
        } else {
          counter.innerText = target + "+";
        }
      };
      updateCount();
    });
  };

  // Use Intersection Observer to trigger animation when scrolled into view
  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.5 // Trigger when 50% visible
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounters();
        observer.disconnect(); // Only run once
      }
    });
  }, observerOptions);

  // Observe the stats section or the first counter
  const statsSection = document.querySelector('.stats');
  if (statsSection) {
    observer.observe(statsSection);
  }
});