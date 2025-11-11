
<section class="contact-section" id="contact" role="region" aria-labelledby="contact-heading">
    <div class="section-header">
        <span class="section-tag">Contattami</span>
        <h2 id="contact-heading" class="section-title">Parliamo del tuo progetto</h2>
        <p class="section-description">
            Hai un'idea innovativa? Raccontami del tuo progetto e vediamo come posso aiutarti a realizzarlo.
        </p>
    </div>
    
    <div class="contact-content">
        
        <form class="contact-form" 
              id="contactForm" 
              action="<?php echo e(route('contact.send')); ?>" 
              method="POST"
              novalidate
              aria-label="Modulo di contatto">
            <?php echo csrf_field(); ?>
            
            
            <div class="form-group">
                <label for="contact-name" class="form-label">
                    Il tuo nome <span class="required" aria-hidden="true">*</span>
                </label>
                <input type="text" 
                       id="contact-name" 
                       name="name" 
                       class="form-input" 
                       placeholder="Es. Mario Rossi"
                       required
                       aria-required="true"
                       aria-describedby="name-error"
                       autocomplete="name">
                <span class="form-error" id="name-error" role="alert"></span>
            </div>
            
            
            <div class="form-group">
                <label for="contact-email" class="form-label">
                    La tua email <span class="required" aria-hidden="true">*</span>
                </label>
                <input type="email" 
                       id="contact-email" 
                       name="email" 
                       class="form-input" 
                       placeholder="Es. mario.rossi@example.com"
                       required
                       aria-required="true"
                       aria-describedby="email-error"
                       autocomplete="email">
                <span class="form-error" id="email-error" role="alert"></span>
            </div>
            
            
            <div class="form-group">
                <label for="contact-message" class="form-label">
                    Il tuo messaggio <span class="required" aria-hidden="true">*</span>
                </label>
                <textarea id="contact-message" 
                         name="message" 
                         class="form-input form-textarea" 
                         placeholder="Descrivi brevemente il tuo progetto..."
                         rows="5"
                         required
                         aria-required="true"
                         aria-describedby="message-error"></textarea>
                <span class="form-error" id="message-error" role="alert"></span>
            </div>
            
            
            <button type="submit" 
                    class="btn-submit" 
                    id="submitBtn"
                    aria-label="Invia messaggio">
                <span class="btn-text">Invia Messaggio</span>
                <span class="btn-loading" aria-hidden="true">
                    <svg class="spinner" width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" opacity="0.25"/>
                        <path d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" fill="currentColor"/>
                    </svg>
                    Invio in corso...
                </span>
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg>
            </button>
            
            
            <div class="form-message form-success" id="successMessage" style="display: none;" role="alert">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <span>Grazie! Il tuo messaggio è stato inviato con successo.</span>
            </div>
            <div class="form-message form-error-global" id="errorMessage" style="display: none;" role="alert">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
                <span>Oops! Qualcosa è andato storto. Riprova più tardi.</span>
            </div>
        </form>

    </div>
</section><?php /**PATH C:\Users\Utente\Desktop\laravel_portfolio\resources\views/guest/partials/contact-modern.blade.php ENDPATH**/ ?>