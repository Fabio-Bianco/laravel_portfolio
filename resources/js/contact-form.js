/**
 * Contact Form - Validation & Submission Handler
 * 2025 Best Practices: Accessible, WCAG 2.1 AA compliant
 */

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  
  if (!form) {
    console.log('ℹ️ Contact form not present on this page');
    return; // Exit if form doesn't exist on page
  }
  
  const submitBtn = document.getElementById('submitBtn');
  const successMessage = document.getElementById('successMessage');
  const errorMessage = document.getElementById('errorMessage');
  
  // Guard: Check if all required elements exist
  if (!submitBtn || !successMessage || !errorMessage) {
    console.warn('⚠️ Contact form: Missing required elements');
    return;
  }
  
  const btnText = submitBtn.querySelector('.btn-text');
  const btnLoading = submitBtn.querySelector('.btn-loading');
  
  // Form fields
  const nameInput = document.getElementById('contact-name');
  const emailInput = document.getElementById('contact-email');
  const subjectInput = document.getElementById('contact-subject');
  const messageInput = document.getElementById('contact-message');
  
  // Guard: Check if all form fields exist
  if (!nameInput || !emailInput || !subjectInput || !messageInput) {
    console.warn('⚠️ Contact form: Missing form fields');
    return;
  }
  
  /**
   * Validation Rules
   */
  const validators = {
    name: (value) => {
      if (!value.trim()) return 'Name is required';
      if (value.trim().length < 2) return 'Name must be at least 2 characters';
      return null;
    },
    
    email: (value) => {
      if (!value.trim()) return 'Email is required';
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) return 'Please enter a valid email address';
      return null;
    },
    
    subject: (value) => {
      if (!value.trim()) return 'Subject is required';
      if (value.trim().length < 3) return 'Subject must be at least 3 characters';
      return null;
    },
    
    message: (value) => {
      if (!value.trim()) return 'Message is required';
      if (value.trim().length < 10) return 'Message must be at least 10 characters';
      if (value.trim().length > 1000) return 'Message must not exceed 1000 characters';
      return null;
    }
  };
  
  /**
   * Show error message for a field
   */
  function showError(input, message) {
    const errorElement = document.getElementById(`${input.id.replace('contact-', '')}-error`);
    if (errorElement) {
      errorElement.textContent = message;
      input.classList.add('error');
      input.setAttribute('aria-invalid', 'true');
    }
  }
  
  /**
   * Clear error message for a field
   */
  function clearError(input) {
    const errorElement = document.getElementById(`${input.id.replace('contact-', '')}-error`);
    if (errorElement) {
      errorElement.textContent = '';
      input.classList.remove('error');
      input.removeAttribute('aria-invalid');
    }
  }
  
  /**
   * Validate single field
   */
  function validateField(input) {
    const fieldName = input.name;
    const value = input.value;
    
    const error = validators[fieldName]?.(value);
    
    if (error) {
      showError(input, error);
      return false;
    } else {
      clearError(input);
      return true;
    }
  }
  
  /**
   * Validate entire form
   */
  function validateForm() {
    const fields = [nameInput, emailInput, subjectInput, messageInput];
    let isValid = true;
    
    fields.forEach(field => {
      if (!validateField(field)) {
        isValid = false;
      }
    });
    
    return isValid;
  }
  
  /**
   * Real-time validation on blur
   */
  [nameInput, emailInput, subjectInput, messageInput].forEach(input => {
    input.addEventListener('blur', () => validateField(input));
    input.addEventListener('input', () => {
      // Clear error as user types
      if (input.classList.contains('error')) {
        clearError(input);
      }
    });
  });
  
  /**
   * Form submission handler
   */
  form.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Hide previous messages
    successMessage.style.display = 'none';
    errorMessage.style.display = 'none';
    
    // Validate form
    if (!validateForm()) {
      // Focus first error field
      const firstError = form.querySelector('.error');
      if (firstError) {
        firstError.focus();
      }
      return;
    }
    
    // Disable submit button
    submitBtn.disabled = true;
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline-flex';
    
    // Prepare form data
    const formData = new FormData(form);
    
    try {
      // Send form data to server
      const response = await fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      });
      
      const data = await response.json();
      
      if (response.ok && data.success) {
        // Success!
        successMessage.style.display = 'flex';
        form.reset();
        
        // Scroll to success message
        successMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Hide success message after 5 seconds
        setTimeout(() => {
          successMessage.style.display = 'none';
        }, 5000);
        
      } else {
        // Server returned validation errors
        if (data.errors) {
          Object.keys(data.errors).forEach(fieldName => {
            const input = document.getElementById(`contact-${fieldName}`);
            if (input) {
              showError(input, data.errors[fieldName][0]);
            }
          });
        } else {
          // Generic error
          errorMessage.style.display = 'flex';
          setTimeout(() => {
            errorMessage.style.display = 'none';
          }, 5000);
        }
      }
      
    } catch (error) {
      console.error('Form submission error:', error);
      errorMessage.style.display = 'flex';
      
      setTimeout(() => {
        errorMessage.style.display = 'none';
      }, 5000);
    } finally {
      // Re-enable submit button
      submitBtn.disabled = false;
      btnText.style.display = 'inline';
      btnLoading.style.display = 'none';
    }
  });
});
