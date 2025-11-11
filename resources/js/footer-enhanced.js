/**
 * Footer Enhanced Features - 2025 Edition
 * Back to Top, Smooth Scroll, Newsletter, Theme Switcher
 */

document.addEventListener('DOMContentLoaded', function() {
    // ==================== Back to Top Button ====================
    const backToTopBtn = document.getElementById('backToTop');
    
    if (backToTopBtn) {
        // Show/hide button based on scroll position
        const toggleBackToTopButton = () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        };

        // Initial check
        toggleBackToTopButton();

        // Listen to scroll with throttling
        let scrollTimeout;
        window.addEventListener('scroll', () => {
            if (scrollTimeout) {
                window.cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = window.requestAnimationFrame(() => {
                toggleBackToTopButton();
            });
        });

        // Smooth scroll to top
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ==================== Smooth Scroll for Anchor Links ====================
    const smoothScrollLinks = document.querySelectorAll('.smooth-scroll');
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            
            if (targetId.startsWith('#')) {
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    const headerOffset = 80; // Offset for fixed header
                    const elementPosition = targetElement.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // ==================== Newsletter Form ====================
    const newsletterForm = document.getElementById('newsletterForm');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const submitBtn = this.querySelector('button[type="submit"]');
            const email = emailInput.value.trim();
            
            // Basic validation
            if (!email || !isValidEmail(email)) {
                showNewsletterFeedback('Please enter a valid email address.', 'error');
                return;
            }

            // Disable button and show loading
            submitBtn.disabled = true;
            const originalHTML = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i>';

            try {
                // Simulate API call (replace with actual endpoint)
                await new Promise(resolve => setTimeout(resolve, 1500));
                
                // Success
                showNewsletterFeedback('Thank you for subscribing!', 'success');
                emailInput.value = '';
                
            } catch (error) {
                showNewsletterFeedback('Something went wrong. Please try again.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            }
        });
    }

    // ==================== Theme Switcher in Footer ====================
    const themeToggleBtnFooter = document.getElementById('themeToggleBtnFooter');
    
    if (themeToggleBtnFooter) {
        // Sync with main theme toggle
        const updateFooterThemeButton = (theme) => {
            const icon = themeToggleBtnFooter.querySelector('i');
            const text = themeToggleBtnFooter.querySelector('.theme-text');
            
            if (theme === 'dark') {
                icon.className = 'bi bi-brightness-high';
                if (text) text.textContent = 'Light Mode';
            } else {
                icon.className = 'bi bi-moon-stars';
                if (text) text.textContent = 'Dark Mode';
            }
        };

        // Initial state
        const currentTheme = document.body.classList.contains('theme-dark') ? 'dark' : 'light';
        updateFooterThemeButton(currentTheme);

        // Click handler
        themeToggleBtnFooter.addEventListener('click', () => {
            // Trigger main theme toggle
            const mainThemeBtn = document.getElementById('themeToggleBtn');
            if (mainThemeBtn) {
                mainThemeBtn.click();
                
                // Update footer button after a short delay
                setTimeout(() => {
                    const newTheme = document.body.classList.contains('theme-dark') ? 'dark' : 'light';
                    updateFooterThemeButton(newTheme);
                }, 100);
            } else {
                // Fallback if main button doesn't exist
                document.body.classList.toggle('theme-dark');
                const newTheme = document.body.classList.contains('theme-dark') ? 'dark' : 'light';
                updateFooterThemeButton(newTheme);
                localStorage.setItem('theme', newTheme);
            }
        });

        // Listen for theme changes from main toggle
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const theme = document.body.classList.contains('theme-dark') ? 'dark' : 'light';
                    updateFooterThemeButton(theme);
                }
            });
        });

        observer.observe(document.body, {
            attributes: true,
            attributeFilter: ['class']
        });
    }

    // ==================== Footer Entrance Animation ====================
    const observeFooterElements = () => {
        const footerElements = document.querySelectorAll('.stat-card, .footer-nav, .newsletter-form');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.animation = `fadeInUp 0.6s ease forwards`;
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        footerElements.forEach(el => {
            el.style.opacity = '0';
            observer.observe(el);
        });
    };

    // Initialize entrance animations
    observeFooterElements();

    // ==================== Social Tooltips Enhancement ====================
    const socialLinks = document.querySelectorAll('.social-link[data-tooltip]');
    
    socialLinks.forEach(link => {
        const tooltip = document.createElement('span');
        tooltip.className = 'social-tooltip';
        tooltip.textContent = link.getAttribute('data-tooltip');
        link.appendChild(tooltip);

        link.addEventListener('mouseenter', () => {
            tooltip.style.opacity = '1';
            tooltip.style.transform = 'translateY(-10px)';
        });

        link.addEventListener('mouseleave', () => {
            tooltip.style.opacity = '0';
            tooltip.style.transform = 'translateY(0)';
        });
    });

    // ==================== Helper Functions ====================
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showNewsletterFeedback(message, type) {
        const form = document.getElementById('newsletterForm');
        if (!form) return;

        // Remove existing feedback
        const existingFeedback = form.querySelector('.newsletter-feedback');
        if (existingFeedback) {
            existingFeedback.remove();
        }

        // Create feedback element
        const feedback = document.createElement('div');
        feedback.className = `newsletter-feedback alert alert-${type === 'success' ? 'success' : 'danger'} mt-2 mb-0`;
        feedback.style.fontSize = '0.875rem';
        feedback.style.padding = '0.5rem 0.75rem';
        feedback.innerHTML = `<i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-1"></i>${message}`;

        form.appendChild(feedback);

        // Auto-remove after 5 seconds
        setTimeout(() => {
            feedback.style.opacity = '0';
            feedback.style.transition = 'opacity 0.3s ease';
            setTimeout(() => feedback.remove(), 300);
        }, 5000);
    }

    // ==================== Stat Counter Animation ====================
    const animateCounters = () => {
        const statValues = document.querySelectorAll('.stat-value');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const text = target.textContent;
                    const hasPlus = text.includes('+');
                    const number = parseInt(text.replace(/\D/g, ''));
                    
                    if (!isNaN(number) && number > 0) {
                        animateNumber(target, 0, number, 2000, hasPlus);
                    }
                    
                    observer.unobserve(target);
                }
            });
        }, { threshold: 0.5 });

        statValues.forEach(el => observer.observe(el));
    };

    function animateNumber(element, start, end, duration, hasPlus = false) {
        const range = end - start;
        const increment = range / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= end) {
                element.textContent = end + (hasPlus ? '+' : '');
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current) + (hasPlus ? '+' : '');
            }
        }, 16);
    }

    // Initialize counter animation
    animateCounters();

    // ==================== Keyboard Navigation Enhancement ====================
    document.addEventListener('keydown', (e) => {
        // Home key - scroll to top
        if (e.key === 'Home' && backToTopBtn) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    console.log('✅ Footer Enhanced Features Loaded');
});
