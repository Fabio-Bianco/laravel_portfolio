{{-- Professional Contact Section --}}
<section class="contact-section" id="contact">
    <div class="container">
        {{-- Header --}}
        <div class="section-header">
            <span class="section-tag">Get In Touch</span>
            <h2 class="section-title">Let's Talk About Your Project</h2>
            <p class="section-subtitle">
                Have an idea or problem to solve? Fill out the form and I'll get back to you as soon as possible.
            </p>
        </div>

        {{-- Contact Form Wrapper --}}
        <div class="contact-wrapper">
            <form class="contact-form" 
                  id="contactForm" 
                  action="{{ route('contact.send') }}" 
                  method="POST">
                @csrf
                
                {{-- Name --}}
                <div class="form-group">
                    <i class="bi bi-person-fill form-icon"></i>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control" 
                           placeholder="Your full name"
                           data-validate="name"
                           required>
                    <label for="name" class="form-label">Full Name</label>
                    <i class="bi bi-check-circle-fill validation-icon"></i>
                </div>
                
                {{-- Email --}}
                <div class="form-group">
                    <i class="bi bi-envelope-fill form-icon"></i>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="name@example.com"
                           data-validate="email"
                           required>
                    <label for="email" class="form-label">Email Address</label>
                    <i class="bi bi-check-circle-fill validation-icon"></i>
                </div>
                
                {{-- Message --}}
                <div class="form-group">
                    <i class="bi bi-chat-left-text-fill form-icon"></i>
                    <textarea id="message" 
                             name="message" 
                             class="form-control" 
                             placeholder="Describe your project or problem..."
                             rows="6"
                             data-validate="message"
                             required></textarea>
                    <label for="message" class="form-label">Message</label>
                    <i class="bi bi-check-circle-fill validation-icon"></i>
                </div>
                
                {{-- Submit Button --}}
                <button type="submit" class="btn-primary" id="submitBtn">
                    <div class="btn-loader"></div>
                    <span class="btn-text">Send Message</span>
                </button>

                {{-- Success Message --}}
                <div class="alert alert-success" id="successMessage" style="display: none;">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    <span>Message sent successfully! I'll get back to you as soon as possible.</span>
                </div>

                {{-- Error Message --}}
                <div class="alert alert-danger" id="errorMessage" style="display: none;">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg>
                    <span>An error occurred. Please try again later.</span>
                </div>
            </form>
        </div>
    </div>
</section>
