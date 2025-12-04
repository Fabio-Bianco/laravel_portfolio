/**
 * Skills Tabs Interactive Handler
 * Manages tab switching for skills sections with smooth animations
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize skills tabs functionality
    initSkillsTabs();
    
    // Initialize progress bars animations
    initProgressBars();
    
    // Initialize learning milestones animations
    initLearningMilestones();
});

/**
 * Initialize skills tabs with click handlers and keyboard navigation
 * Now supports both main skills and learning skills sections
 */
function initSkillsTabs() {
    // Initialize main skills tabs
    initTabSection('.skills-section:not(.learning-section)');
    
    // Initialize learning skills tabs separately
    initTabSection('.learning-section');
}

/**
 * Initialize tab section with scoped selectors
 */
function initTabSection(sectionSelector) {
    const section = document.querySelector(sectionSelector);
    if (!section) return;
    
    const tabButtons = section.querySelectorAll('.skills-tab');
    const tabPanels = section.querySelectorAll('.skills-panel');
    
    if (!tabButtons.length || !tabPanels.length) return;
    
    // Add click handlers to tabs
    tabButtons.forEach((button, index) => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            switchTab(button, index, tabButtons, tabPanels);
        });
        
        // Add keyboard navigation
        button.addEventListener('keydown', (e) => {
            handleTabKeydown(e, button, index, tabButtons, tabPanels);
        });
    });
    
    // Show first tab by default if none are active in this section
    const activeTab = section.querySelector('.skills-tab.active');
    if (!activeTab && tabButtons.length > 0) {
        switchTab(tabButtons[0], 0, tabButtons, tabPanels);
    }
    
    const sectionType = section.classList.contains('learning-section') ? 'learning' : 'main';
    console.log(`Initialized ${tabButtons.length} ${sectionType} skill tabs`); // Debug log
}

/**
 * Switch to specified tab with smooth animation
 */
function switchTab(targetButton, targetIndex, allButtons, allPanels) {
    // Remove active class from all buttons and panels
    allButtons.forEach(btn => btn.classList.remove('active'));
    allPanels.forEach(panel => panel.classList.remove('active'));
    
    // Add active class to target elements
    targetButton.classList.add('active');
    if (allPanels[targetIndex]) {
        allPanels[targetIndex].classList.add('active');
        
        // Trigger animations for newly visible elements
        setTimeout(() => {
            animateSkillCards(allPanels[targetIndex]);
            animateProgressBars(allPanels[targetIndex]);
        }, 100);
    }
    
    // Update ARIA attributes for accessibility
    updateTabsAria(targetButton, targetIndex, allButtons, allPanels);
}

/**
 * Handle keyboard navigation for tabs (Arrow keys, Enter, Space)
 */
function handleTabKeydown(event, button, index, allButtons, allPanels) {
    let newIndex = index;
    
    switch (event.key) {
        case 'ArrowLeft':
            event.preventDefault();
            newIndex = index > 0 ? index - 1 : allButtons.length - 1;
            break;
        case 'ArrowRight':
            event.preventDefault();
            newIndex = index < allButtons.length - 1 ? index + 1 : 0;
            break;
        case 'Enter':
        case ' ':
            event.preventDefault();
            switchTab(button, index, allButtons, allPanels);
            return;
        default:
            return;
    }
    
    // Focus and activate new tab
    allButtons[newIndex].focus();
    switchTab(allButtons[newIndex], newIndex, allButtons, allPanels);
}

/**
 * Update ARIA attributes for accessibility
 */
function updateTabsAria(activeButton, activeIndex, allButtons, allPanels) {
    allButtons.forEach((btn, index) => {
        btn.setAttribute('aria-selected', index === activeIndex ? 'true' : 'false');
        btn.setAttribute('tabindex', index === activeIndex ? '0' : '-1');
    });
    
    allPanels.forEach((panel, index) => {
        panel.setAttribute('aria-hidden', index === activeIndex ? 'false' : 'true');
    });
}

/**
 * Initialize progress bars with intersection observer for scroll animations
 */
function initProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar-fill, .level-indicator');
    
    if (!progressBars.length) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateProgressBar(entry.target);
            }
        });
    }, {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    });
    
    progressBars.forEach(bar => observer.observe(bar));
}

/**
 * Animate individual progress bar
 */
function animateProgressBar(progressElement) {
    const progress = progressElement.getAttribute('data-progress') || 
                    progressElement.style.getPropertyValue('--progress') || 
                    progressElement.style.getPropertyValue('--level');
    
    if (progress) {
        // Reset animation
        progressElement.style.width = '0%';
        
        // Trigger animation after a brief delay
        setTimeout(() => {
            progressElement.style.width = progress;
        }, 200);
    }
}

/**
 * Animate progress bars in a specific container
 */
function animateProgressBars(container) {
    const progressBars = container.querySelectorAll('.progress-bar-fill, .level-indicator::after');
    
    progressBars.forEach((bar, index) => {
        setTimeout(() => {
            animateProgressBar(bar);
        }, index * 100); // Stagger animations
    });
}

/**
 * Animate skill cards with staggered fade-in effect
 */
function animateSkillCards(container) {
    const skillCards = container.querySelectorAll('.hero-skill-card, .compact-skill-card');
    
    skillCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
}

/**
 * Initialize learning milestones with scroll-triggered animations
 */
function initLearningMilestones() {
    const milestones = document.querySelectorAll('.learning-milestone');
    
    if (!milestones.length) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateMilestone(entry.target);
            }
        });
    }, {
        threshold: 0.3,
        rootMargin: '0px 0px -100px 0px'
    });
    
    milestones.forEach(milestone => observer.observe(milestone));
}

/**
 * Animate individual learning milestone
 */
function animateMilestone(milestone) {
    const progressBars = milestone.querySelectorAll('.progress-bar-fill');
    const techTags = milestone.querySelectorAll('.tech-tag');
    
    // Animate progress bars
    progressBars.forEach((bar, index) => {
        setTimeout(() => {
            animateProgressBar(bar);
        }, index * 200);
    });
    
    // Animate tech tags with staggered effect
    techTags.forEach((tag, index) => {
        tag.style.opacity = '0';
        tag.style.transform = 'scale(0.8)';
        
        setTimeout(() => {
            tag.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
            tag.style.opacity = '1';
            tag.style.transform = 'scale(1)';
        }, 500 + (index * 100));
    });
    
    // Add hover effects to milestone cards
    const milestoneCard = milestone.querySelector('.milestone-card');
    if (milestoneCard && !milestoneCard.hasAttribute('data-animated')) {
        milestoneCard.setAttribute('data-animated', 'true');
        
        // Add subtle pulse effect for in-progress milestones
        const statusElement = milestoneCard.querySelector('.milestone-status.in-progress');
        if (statusElement) {
            setInterval(() => {
                statusElement.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    statusElement.style.transform = 'scale(1)';
                }, 200);
            }, 2000);
        }
    }
}

/**
 * Utility function to handle smooth scrolling to elements
 */
function smoothScrollTo(element, offset = 0) {
    const targetPosition = element.offsetTop - offset;
    
    window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
    });
}

/**
 * Initialize theme-aware animations
 */
function initThemeAwareAnimations() {
    // Listen for theme changes to adjust animations
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.type === 'attributes' && mutation.attributeName === 'data-bs-theme') {
                // Refresh animations when theme changes
                refreshAnimations();
            }
        });
    });
    
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['data-bs-theme']
    });
}

/**
 * Refresh all animations (useful for theme switching)
 */
function refreshAnimations() {
    // Re-trigger progress bar animations for visible elements
    const visibleProgressBars = document.querySelectorAll('.progress-bar-fill:not([style*="width: 0"])');
    visibleProgressBars.forEach(bar => {
        const currentWidth = bar.style.width;
        bar.style.width = '0%';
        setTimeout(() => {
            bar.style.width = currentWidth;
        }, 100);
    });
}

// Export functions for potential external use
window.skillsTabs = {
    switchTab,
    animateProgressBar,
    animateSkillCards,
    smoothScrollTo,
    refreshAnimations
};