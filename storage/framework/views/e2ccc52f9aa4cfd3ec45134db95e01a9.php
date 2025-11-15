
<footer class="footer" role="contentinfo">
    <div class="container">
        
        <div class="footer-features">
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-lightning-charge feature-icon"></i>
                        <div class="feature-title">Fast & Responsive</div>
                        <div class="feature-label">Optimized Performance</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-palette feature-icon"></i>
                        <div class="feature-title">Modern Design</div>
                        <div class="feature-label">Clean UI/UX</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-universal-access-circle feature-icon"></i>
                        <div class="feature-title">WCAG 2.1 AA</div>
                        <div class="feature-label">Accessible Design</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <a href="https://github.com/<?php echo e(config('services.github.username')); ?>/laravel_portfolio" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="feature-card feature-card-link">
                        <i class="bi bi-github feature-icon"></i>
                        <div class="feature-title">Open Source</div>
                        <div class="feature-label">View on GitHub</div>
                    </a>
                </div>
            </div>
        </div>

        
        <div class="row g-4 g-xl-5 footer-main">
            
            <div class="col-12 col-lg-4">
                <h5 class="footer-heading"><?php echo e(config('app.owner_name')); ?></h5>
                <p class="footer-description">Full Stack Developer specialized in modern and scalable web solutions. Passionate about clean code, performance, and accessibility.</p>
                
                
                <div class="d-flex gap-3 social-links mb-4">
                    <a href="https://github.com/<?php echo e(config('services.github.username')); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-link"
                       aria-label="Visit my GitHub profile"
                       data-tooltip="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="https://linkedin.com/in/<?php echo e(config('services.linkedin.username')); ?>"
                       target="_blank"
                       rel="noopener noreferrer" 
                       class="social-link"
                       aria-label="Connect with me on LinkedIn"
                       data-tooltip="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="mailto:<?php echo e(config('app.owner_email')); ?>"
                       class="social-link"
                       aria-label="Send me an email"
                       data-tooltip="Email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>

            
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="footer-heading">Quick Links</h5>
                <div class="row g-4">
                    
                    <div class="col-6">
                        <h6 class="footer-subtitle">Portfolio</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="<?php echo e(route('home')); ?>" class="footer-link" title="View all portfolio projects">
                                    <i class="bi bi-collection"></i>
                                    <span>All Projects</span>
                                </a>
                            </li>
                            <?php
                                $featuredCount = \App\Models\Project::published()->featured()->count();
                            ?>
                            <?php if($featuredCount > 0): ?>
                            <li>
                                <a href="<?php echo e(route('projects.featured')); ?>" class="footer-link" title="Discover featured projects">
                                    <i class="bi bi-star"></i>
                                    <span>Featured</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <li>
                                <a href="#about" class="footer-link smooth-scroll" title="Learn more about me">
                                    <i class="bi bi-person"></i>
                                    <span>About Me</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    
                    <div class="col-6">
                        <h6 class="footer-subtitle">Sections</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="#skills" class="footer-link smooth-scroll" title="Explore my technical skills">
                                    <i class="bi bi-tools"></i>
                                    <span>Skills</span>
                                </a>
                            </li>
                            <li>
                                <a href="#contact" class="footer-link smooth-scroll" title="Let's talk about your project">
                                    <i class="bi bi-envelope"></i>
                                    <span>Contact</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/<?php echo e(config('services.github.username')); ?>/laravel_portfolio" 
                                   class="footer-link"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   title="View source code">
                                    <i class="bi bi-code-slash"></i>
                                    <span>Source Code</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="footer-heading">Stay Connected</h5>
                <p class="footer-description mb-3">Get notified about new projects and updates.</p>
                
                
                <form class="newsletter-form" id="newsletterForm" action="#" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="email" 
                               class="form-control newsletter-input" 
                               placeholder="your@email.com" 
                               aria-label="Email address for newsletter"
                               required>
                        <button class="btn btn-primary newsletter-btn" type="submit" aria-label="Subscribe to newsletter">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                    <small class="form-text text-muted d-block mt-2">
                        <i class="bi bi-shield-check me-1"></i>
                        No spam, unsubscribe anytime.
                    </small>
                </form>

                
                <div class="accessibility-badge mt-4">
                    <i class="bi bi-universal-access-circle"></i>
                    <div class="badge-text">
                        <strong>WCAG 2.1 AA</strong>
                        <span>Accessible Design</span>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="copyright-bar">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0 copyright-text">
                        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.owner_name')); ?>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="legal-links">
                        <a href="#" class="legal-link" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                        <span class="legal-separator">•</span>
                        <a href="#" class="legal-link" data-bs-toggle="modal" data-bs-target="#cookieModal">Cookie Policy</a>
                        <span class="legal-separator">•</span>
                        <span class="text-muted">
                            Built with <i class="bi bi-heart-fill text-danger mx-1 heart-icon"></i> Laravel & Vite
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <button id="backToTop" 
            class="back-to-top" 
            aria-label="Scroll back to top"
            title="Back to top">
        <i class="bi bi-arrow-up"></i>
    </button>
    
</footer>


<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">
                    <i class="bi bi-shield-lock me-2"></i>Privacy Policy
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>Information We Collect</h6>
                <p>When you contact us through the contact form, we collect your name, email address, and message content to respond to your inquiry.</p>
                
                <h6>How We Use Your Information</h6>
                <p>We use the information you provide solely to respond to your questions and project inquiries. We do not share your personal information with third parties.</p>
                
                <h6>Data Security</h6>
                <p>We implement appropriate security measures to protect your personal information from unauthorized access or disclosure.</p>
                
                <h6>Your Rights</h6>
                <p>You have the right to request access to, correction of, or deletion of your personal data at any time by contacting us at <?php echo e(config('app.owner_email')); ?>.</p>
                
                <p class="text-muted mb-0"><small>Last updated: <?php echo e(date('F Y')); ?></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cookieModalLabel">
                    <i class="bi bi-cookie me-2"></i>Cookie Policy
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>What Are Cookies</h6>
                <p>Cookies are small text files stored on your device when you visit our website. They help us provide a better user experience.</p>
                
                <h6>How We Use Cookies</h6>
                <p><strong>Essential Cookies:</strong> These cookies are necessary for the website to function properly, including theme preferences and session management.</p>
                <p><strong>Analytics Cookies:</strong> We may use analytics tools to understand how visitors interact with our website, helping us improve the user experience.</p>
                
                <h6>Managing Cookies</h6>
                <p>You can control and/or delete cookies as you wish through your browser settings. However, removing cookies may affect the functionality of the website.</p>
                
                <h6>Third-Party Cookies</h6>
                <p>This website may use third-party services (such as GitHub for repository information) that may set their own cookies.</p>
                
                <p class="text-muted mb-0"><small>Last updated: <?php echo e(date('F Y')); ?></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/partials/footer.blade.php ENDPATH**/ ?>