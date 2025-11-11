
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row g-4 g-xl-5">
            
            <div class="col-12 col-lg-4">
                <h5 class="text-primary"><?php echo e(config('app.owner_name')); ?></h5>
                <p class="mb-3">Full Stack Developer specializzato in soluzioni web moderne e scalabili. Appassionato di clean code, performance e accessibilità.</p>
                <div class="d-flex gap-3 social-links">
                    <a href="https://github.com/<?php echo e(config('services.github.username')); ?>" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-link"
                       aria-label="Visita il mio profilo GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="https://linkedin.com/in/<?php echo e(config('services.linkedin.username')); ?>"
                       target="_blank"
                       rel="noopener noreferrer" 
                       class="social-link"
                       aria-label="Connettiti con me su LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="mailto:<?php echo e(config('app.owner_email')); ?>"
                       class="social-link"
                       aria-label="Inviami una email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>

            
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="text-primary">Esplora</h5>
                <div class="row g-4">
                    
                    <div class="col-6">
                        <h6 class="footer-subtitle">Portfolio</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="<?php echo e(route('home')); ?>" class="footer-link" title="Visualizza tutti i progetti del portfolio">
                                    <i class="bi bi-collection"></i>
                                    <span>Progetti</span>
                                </a>
                            </li>
                            <?php
                                $featuredCount = \App\Models\Project::published()->featured()->count();
                            ?>
                            <?php if($featuredCount > 0): ?>
                            <li>
                                <a href="<?php echo e(route('projects.featured')); ?>" class="footer-link" title="Scopri i progetti in evidenza">
                                    <i class="bi bi-star"></i>
                                    <span>Progetti in Evidenza</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                    
                    <div class="col-6">
                        <h6 class="footer-subtitle">Sezioni</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="#about" onclick="event.preventDefault(); document.getElementById('about').scrollIntoView({behavior: 'smooth'});" class="footer-link" title="Scopri di più su di me">
                                    <i class="bi bi-person"></i>
                                    <span>Chi Sono</span>
                                </a>
                            </li>
                            <li>
                                <a href="#skills" onclick="event.preventDefault(); document.getElementById('skills').scrollIntoView({behavior: 'smooth'});" class="footer-link" title="Esplora le mie competenze tecniche">
                                    <i class="bi bi-tools"></i>
                                    <span>Competenze</span>
                                </a>
                            </li>
                            <li>
                                <a href="#contact" onclick="event.preventDefault(); document.getElementById('contact').scrollIntoView({behavior: 'smooth'});" class="footer-link" title="Parliamo del tuo progetto">
                                    <i class="bi bi-envelope"></i>
                                    <span>Contattami</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="text-primary">Open Source & Accessibilità</h5>
                <p class="mb-4">Questo portfolio è costruito con Laravel ed è open source, progettato seguendo le linee guida WCAG 2.1 AA.</p>
                <a href="https://github.com/<?php echo e(config('services.github.username')); ?>/laravel_portfolio" 
                   class="btn btn-outline-primary"
                   target="_blank"
                   rel="noopener noreferrer">
                    <i class="bi bi-github me-2"></i>
                    Vedi Sorgente
                </a>
            </div>
        </div>

        
        <div class="copyright-bar">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0 copyright-text">&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.owner_name')); ?>. Tutti i diritti riservati.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-muted">
                        Built with <i class="bi bi-heart-fill text-danger mx-1 heart-icon"></i> using Laravel & Vite
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/partials/footer.blade.php ENDPATH**/ ?>