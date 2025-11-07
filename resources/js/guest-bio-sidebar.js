/**
 * Bio Sidebar & Contacts Widget - Guest Layout
 * Gestione apertura/chiusura sidebar bio e interazioni
 */

document.addEventListener('DOMContentLoaded', function() {
  // Elements
  const bioToggle = document.getElementById('bioToggle');
  const bioSidebar = document.getElementById('bioSidebar');
  const bioClose = document.getElementById('bioClose');
  const bioOverlay = document.getElementById('bioOverlay');
  
  /**
   * Apre la bio sidebar
   */
  function openBio() {
    if (bioSidebar) {
      bioSidebar.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  }
  
  /**
   * Chiude la bio sidebar
   */
  function closeBio() {
    if (bioSidebar) {
      bioSidebar.classList.remove('active');
      document.body.style.overflow = '';
    }
  }
  
  // Event Listeners
  bioToggle?.addEventListener('click', openBio);
  bioClose?.addEventListener('click', closeBio);
  bioOverlay?.addEventListener('click', closeBio);
  
  // Close on ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && bioSidebar?.classList.contains('active')) {
      closeBio();
    }
  });
});
