/**
 * Contact Form - Real-time Validation & Enhanced UX
 * Gestisce validazione in tempo reale, stati di caricamento e feedback utente
 */

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    // Configurazione validatori
    const validators = {
        name: {
            regex: /^[a-zA-ZÀ-ÿ\s'-]{2,50}$/,
            message: 'Please enter a valid name (2-50 characters)'
        },
        email: {
            regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
            message: 'Please enter a valid email address'
        },
        message: {
            minLength: 20,
            message: 'Message must be at least 20 characters long'
        }
    };

    /**
     * Valida un singolo campo e aggiorna lo stato visivo
     */
    function validateField(input) {
        const fieldType = input.dataset.validate;
        const value = input.value.trim();
        const formGroup = input.closest('.form-group');
        const validationIcon = formGroup.querySelector('.validation-icon');
        
        let isValid = false;

        // Validazione basata sul tipo di campo
        if (fieldType === 'name') {
            isValid = validators.name.regex.test(value);
        } else if (fieldType === 'email') {
            isValid = validators.email.regex.test(value);
        } else if (fieldType === 'message') {
            isValid = value.length >= validators.message.minLength;
        }

        // Aggiorna classi CSS
        if (value.length > 0) {
            if (isValid) {
                input.classList.add('is-valid');
                input.classList.remove('is-invalid');
                validationIcon.classList.add('valid');
                validationIcon.classList.remove('invalid');
            } else {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
                validationIcon.classList.add('invalid');
                validationIcon.classList.remove('valid');
            }
        } else {
            // Reset se campo vuoto
            input.classList.remove('is-valid', 'is-invalid');
            validationIcon.classList.remove('valid', 'invalid');
        }

        return isValid;
    }

    /**
     * Valida l'intero form
     */
    function validateForm() {
        const inputs = form.querySelectorAll('[data-validate]');
        let isFormValid = true;

        inputs.forEach(input => {
            if (!validateField(input)) {
                isFormValid = false;
            }
        });

        // Abilita/disabilita pulsante submit
        submitBtn.disabled = !isFormValid;
        
        return isFormValid;
    }

    /**
     * Mostra stato di caricamento
     */
    function showLoadingState() {
        submitBtn.classList.add('is-loading');
        submitBtn.disabled = true;
    }

    /**
     * Nasconde stato di caricamento
     */
    function hideLoadingState() {
        submitBtn.classList.remove('is-loading');
        submitBtn.disabled = false;
    }

    /**
     * Mostra messaggio di successo
     */
    function showSuccess() {
        successMessage.style.display = 'flex';
        errorMessage.style.display = 'none';
        
        // Auto-hide dopo 5 secondi
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 5000);
    }

    /**
     * Mostra messaggio di errore
     */
    function showError(message = null) {
        errorMessage.style.display = 'flex';
        successMessage.style.display = 'none';
        
        if (message) {
            errorMessage.querySelector('span').textContent = message;
        }
        
        // Auto-hide dopo 5 secondi
        setTimeout(() => {
            errorMessage.style.display = 'none';
        }, 5000);
    }

    /**
     * Reset completo del form
     */
    function resetForm() {
        form.reset();
        
        // Rimuovi classi di validazione
        const inputs = form.querySelectorAll('[data-validate]');
        inputs.forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
            const validationIcon = input.closest('.form-group').querySelector('.validation-icon');
            validationIcon.classList.remove('valid', 'invalid');
        });
        
        submitBtn.disabled = true;
    }

    // Event Listeners per validazione real-time
    const inputs = form.querySelectorAll('[data-validate]');
    
    inputs.forEach(input => {
        // Validazione durante la digitazione (debounced)
        let timeout;
        input.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                validateForm();
            }, 300);
        });

        // Validazione immediata alla perdita del focus
        input.addEventListener('blur', function() {
            if (this.value.trim().length > 0) {
                validateField(this);
            }
        });
    });

    // Gestione submit del form
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Validazione finale
        if (!validateForm()) {
            showError('Please complete all fields correctly before submitting.');
            return;
        }

        showLoadingState();

        try {
            const formData = new FormData(form);
            
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                showSuccess();
                resetForm();
            } else {
                showError(data.message || 'An error occurred. Please try again later.');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            showError('Connection error. Please check your network and try again.');
        } finally {
            hideLoadingState();
        }
    });

    // Disabilita submit iniziale fino a quando il form non è valido
    submitBtn.disabled = true;
});
