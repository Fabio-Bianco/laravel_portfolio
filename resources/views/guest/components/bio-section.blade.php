{{-- Bio Section Component --}}
<section id="bio" class="bio-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        {{-- Section Header --}}
        <div class="text-center mb-5">
          <span class="section-tag">Chi Sono</span>
          <h2 class="display-5 fw-bold mb-3">La Mia Storia</h2>
          <p class="lead text-muted">
            Scopri di più su di me, il mio percorso e la mia passione per la tecnologia
          </p>
        </div>
        
        {{-- Bio Content --}}
        <div class="bio-content">
          @if($bioParagraphs && count($bioParagraphs) > 0)
            @foreach($bioParagraphs as $paragraph)
              <p class="bio-paragraph">{{ trim($paragraph) }}</p>
            @endforeach
          @else
            <p class="bio-paragraph">
              Sono uno sviluppatore full-stack appassionato di tecnologie moderne e soluzioni innovative. 
              Mi piace creare applicazioni web che combinano funzionalità robuste con un'esperienza utente eccellente.
            </p>
            <p class="bio-paragraph">
              La mia esperienza spazia dal frontend con JavaScript e framework moderni, 
              al backend con PHP/Laravel e architetture scalabili. Sono sempre alla ricerca di nuove sfide 
              che mi permettano di crescere professionalmente e contribuire a progetti significativi.
            </p>
          @endif
        </div>
        
        {{-- CV Download Section --}}
        <div class="cv-download-section mt-5">
          <div class="cv-card">
            <div class="cv-card-body">
              <div class="row align-items-center">
                <div class="col-md-8">
                  <h5 class="cv-title">Scarica il mio Curriculum</h5>
                  <p class="cv-description mb-0">
                    Versione completa del mio CV con esperienze, competenze e progetti
                  </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                  <a href="{{ asset('files/cv-fabio-bianco.pdf') }}" 
                     class="btn btn-cv-download" 
                     download="CV-Fabio-Bianco.pdf"
                     title="Scarica CV in formato PDF">
                    @include('guest.partials.tech-icons', ['icon' => 'sidebar-download', 'size' => 20])
                    Scarica CV
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>