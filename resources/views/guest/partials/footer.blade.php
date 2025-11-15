{{-- Footer Component 2025 - Complete Edition --}}
<footer class="footer" role="contentinfo">
    <div class="container">
        {{-- Features / Tech Highlights Bar --}}
        <div class="footer-features">
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-lightning-charge feature-icon"></i>
                        <div class="feature-title">Veloce & Reattivo</div>
                        <div class="feature-label">Prestazioni Ottimizzate</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-palette feature-icon"></i>
                        <div class="feature-title">Design Moderno</div>
                        <div class="feature-label">UI/UX Pulita</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="feature-card">
                        <i class="bi bi-universal-access-circle feature-icon"></i>
                        <div class="feature-title">WCAG 2.1 AA</div>
                        <div class="feature-label">Design Accessibile</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <a href="https://github.com/{{ config('services.github.username') }}/laravel_portfolio" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="feature-card feature-card-link">
                        <i class="bi bi-github feature-icon"></i>
                        <div class="feature-title">Open Source</div>
                        <div class="feature-label">Vedi su GitHub</div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Footer Content --}}
        <div class="row g-4 g-xl-5 footer-main">
            {{-- Brand & Description --}}
            <div class="col-12 col-lg-4">
                <h5 class="footer-heading">{{ config('app.owner_name') }}</h5>
                <p class="footer-description">Full Stack Developer specializzato in soluzioni web moderne e scalabili. Appassionato di codice pulito, performance e accessibilità.</p>
                
                {{-- Social Links --}}
                <div class="d-flex gap-3 social-links mb-4">
                    <a href="https://github.com/{{ config('services.github.username') }}" 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="social-link"
                       aria-label="Visita il mio profilo GitHub"
                       data-tooltip="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="https://linkedin.com/in/{{ config('services.linkedin.username') }}"
                       target="_blank"
                       rel="noopener noreferrer" 
                       class="social-link"
                       aria-label="Connettiti con me su LinkedIn"
                       data-tooltip="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="mailto:{{ config('app.owner_email') }}"
                       class="social-link"
                       aria-label="Inviami un'email"
                       data-tooltip="Email">
                        <i class="bi bi-envelope"></i>
                    </a>
                </div>
            </div>

            {{-- Navigation & Links --}}
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="footer-heading">Link Rapidi</h5>
                <div class="row g-4">
                    {{-- Portfolio Section --}}
                    <div class="col-6">
                        <h6 class="footer-subtitle">Portfolio</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="{{ route('home') }}" class="footer-link" title="Vedi tutti i progetti del portfolio">
                                    <i class="bi bi-collection"></i>
                                    <span>Tutti i Progetti</span>
                                </a>
                            </li>
                            @php
                                $featuredCount = \App\Models\Project::published()->featured()->count();
                            @endphp
                            @if($featuredCount > 0)
                            <li>
                                <a href="{{ route('projects.featured') }}" class="footer-link" title="Scopri i progetti in evidenza">
                                    <i class="bi bi-star"></i>
                                    <span>In Evidenza</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="#about" class="footer-link smooth-scroll" title="Scopri di più su di me">
                                    <i class="bi bi-person"></i>
                                    <span>Chi Sono</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    {{-- Sections Links --}}
                    <div class="col-6">
                        <h6 class="footer-subtitle">Sezioni</h6>
                        <ul class="list-unstyled footer-nav">
                            <li>
                                <a href="#skills" class="footer-link smooth-scroll" title="Esplora le mie competenze tecniche">
                                    <i class="bi bi-tools"></i>
                                    <span>Competenze</span>
                                </a>
                            </li>
                            <li>
                                <a href="#contact" class="footer-link smooth-scroll" title="Parliamo del tuo progetto">
                                    <i class="bi bi-envelope"></i>
                                    <span>Contatti</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/{{ config('services.github.username') }}/laravel_portfolio" 
                                   class="footer-link"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   title="Visualizza il codice sorgente">
                                    <i class="bi bi-code-slash"></i>
                                    <span>Codice Sorgente</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Newsletter / CTA + Accessibility --}}
            <div class="col-12 col-md-6 col-lg-4">
                <h5 class="footer-heading">Resta Connesso</h5>
                <p class="footer-description mb-3">Ricevi notifiche su nuovi progetti e aggiornamenti.</p>
                
                {{-- Newsletter Form --}}
                <form class="newsletter-form" id="newsletterForm" action="#" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="email" 
                               class="form-control newsletter-input" 
                               placeholder="tua@email.com" 
                               aria-label="Indirizzo email per la newsletter"
                               required>
                        <button class="btn btn-primary newsletter-btn" type="submit" aria-label="Iscriviti alla newsletter">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                    <small class="form-text text-muted d-block mt-2">
                        <i class="bi bi-shield-check me-1"></i>
                        Niente spam, cancellati quando vuoi.
                    </small>
                </form>

                {{-- Accessibility Badge --}}
                <div class="accessibility-badge mt-4">
                    <i class="bi bi-universal-access-circle"></i>
                    <div class="badge-text">
                        <strong>WCAG 2.1 AA</strong>
                        <span>Design Accessibile</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Legal & Copyright Bar --}}
        <div class="copyright-bar">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <p class="mb-0 copyright-text">
                        &copy; {{ date('Y') }} {{ config('app.owner_name') }}. Tutti i diritti riservati.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="legal-links">
                        <a href="#" class="legal-link" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                        <span class="legal-separator">•</span>
                        <a href="#" class="legal-link" data-bs-toggle="modal" data-bs-target="#cookieModal">Cookie Policy</a>
                        <span class="legal-separator">•</span>
                        <span class="text-muted">
                            Realizzato con <i class="bi bi-heart-fill text-danger mx-1 heart-icon"></i> Laravel & Vite
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Back to Top Button (unico elemento fisso) --}}
    <button id="backToTop" 
            class="back-to-top" 
            aria-label="Torna in cima"
            title="Torna su">
        <i class="bi bi-arrow-up"></i>
    </button>
    {{-- Rimosso vecchio toggle tema sotto il pulsante torna su --}}
</footer>

{{-- Privacy Policy Modal --}}
<div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">
                    <i class="bi bi-shield-lock me-2"></i>Informativa sulla Privacy
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <h6>Informazioni che Raccogliamo</h6>
                <p>Quando ci contatti attraverso il modulo di contatto, raccogliamo il tuo nome, indirizzo email e il contenuto del messaggio per rispondere alla tua richiesta.</p>
                
                <h6>Come Usiamo le Tue Informazioni</h6>
                <p>Utilizziamo le informazioni fornite esclusivamente per rispondere alle tue domande e richieste di progetto. Non condividiamo le tue informazioni personali con terze parti.</p>
                
                <h6>Sicurezza dei Dati</h6>
                <p>Implementiamo misure di sicurezza appropriate per proteggere le tue informazioni personali da accessi o divulgazioni non autorizzate.</p>
                
                <h6>I Tuoi Diritti</h6>
                <p>Hai il diritto di richiedere l'accesso, la correzione o la cancellazione dei tuoi dati personali in qualsiasi momento contattandoci a {{ config('app.owner_email') }}.</p>
                
                <p class="text-muted mb-0"><small>Ultimo aggiornamento: {{ date('F Y') }}</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>

{{-- Cookie Policy Modal --}}
<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cookieModalLabel">
                    <i class="bi bi-cookie me-2"></i>Informativa sui Cookie
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <h6>Cosa Sono i Cookie</h6>
                <p>I cookie sono piccoli file di testo memorizzati sul tuo dispositivo quando visiti il nostro sito web. Ci aiutano a fornire una migliore esperienza utente.</p>
                
                <h6>Come Utilizziamo i Cookie</h6>
                <p><strong>Cookie Essenziali:</strong> Questi cookie sono necessari per il corretto funzionamento del sito web, incluse le preferenze di tema e la gestione delle sessioni.</p>
                <p><strong>Cookie Analitici:</strong> Potremmo utilizzare strumenti di analisi per capire come i visitatori interagiscono con il nostro sito web, aiutandoci a migliorare l'esperienza utente.</p>
                
                <h6>Gestione dei Cookie</h6>
                <p>Puoi controllare e/o eliminare i cookie come desideri attraverso le impostazioni del tuo browser. Tuttavia, la rimozione dei cookie potrebbe influire sulla funzionalità del sito web.</p>
                
                <h6>Cookie di Terze Parti</h6>
                <p>Questo sito web potrebbe utilizzare servizi di terze parti (come GitHub per le informazioni sui repository) che potrebbero impostare i propri cookie.</p>
                
                <p class="text-muted mb-0"><small>Ultimo aggiornamento: {{ date('F Y') }}</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            </div>
        </div>
    </div>
</div>