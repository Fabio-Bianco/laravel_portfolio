/**
 * Dynamic Project Filters
 * Filters projects by type without page reload
 */

document.addEventListener('DOMContentLoaded', function() {
  const filterChips = document.querySelectorAll('.filter-chip');
  const projectCards = document.querySelectorAll('.project-card');
  
  if (filterChips.length === 0 || projectCards.length === 0) {
    return;
  }

  // Store counts from the filter chips
  const typeCounts = {};
  let totalCount = 0;
  
  filterChips.forEach(chip => {
    const filterType = chip.getAttribute('data-filter');
    const countEl = chip.querySelector('.count');
    if (countEl && filterType) {
      const count = parseInt(countEl.textContent) || 0;
      typeCounts[filterType] = count;
      
      // Store total count from "Tutti" button
      if (filterType === 'all') {
        totalCount = count;
      }
    }
  });
  
  console.log('Type counts loaded:', typeCounts);

  filterChips.forEach(chip => {
    chip.addEventListener('click', function(e) {
      e.preventDefault();
      
      const filterType = this.getAttribute('data-filter');
      
      // Update active state
      filterChips.forEach(c => c.classList.remove('active'));
      this.classList.add('active');
      
      // Filter projects with animation
      let visibleCount = 0;
      
      projectCards.forEach((card, index) => {
        const cardType = card.getAttribute('data-type');
        const shouldShow = filterType === 'all' || cardType === filterType;
        
        if (shouldShow) {
          // Show with staggered animation
          setTimeout(() => {
            card.style.display = 'flex';
            card.style.animation = 'none';
            // Trigger reflow
            void card.offsetWidth;
            card.style.animation = `fadeInUp 0.5s ease backwards ${visibleCount * 0.05}s`;
          }, 0);
          visibleCount++;
        } else {
          // Hide with fade out
          card.style.animation = 'fadeOut 0.3s ease forwards';
          setTimeout(() => {
            card.style.display = 'none';
          }, 300);
        }
      });
      
      // Update stats with server-side count
      updateStats(filterType, typeCounts);
      
      // Update URL without reload (optional)
      if (filterType === 'all') {
        window.history.pushState({}, '', window.location.pathname);
      } else {
        const url = new URL(window.location);
        url.searchParams.set('type', filterType);
        window.history.pushState({}, '', url);
      }
    });
  });
  
  function updateStats(filterType, counts) {
    const statsBar = document.querySelector('.stats-bar .stat-item strong');
    if (statsBar) {
      // Use the count from server data
      const count = counts[filterType];
      if (count !== undefined) {
        statsBar.textContent = count;
        console.log('Updated count for', filterType, ':', count);
      } else {
        console.warn('No count found for filter:', filterType);
      }
    }
  }
});

// Add fadeOut animation
const style = document.createElement('style');
style.textContent = `
  @keyframes fadeOut {
    from {
      opacity: 1;
      transform: translateY(0);
    }
    to {
      opacity: 0;
      transform: translateY(-20px);
    }
  }
`;
document.head.appendChild(style);
