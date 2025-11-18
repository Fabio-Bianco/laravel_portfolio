/**
 * Admin Projects Bulk Actions
 * Gestione checkbox e azioni multiple sui progetti
 */

document.addEventListener('DOMContentLoaded', function() {
  const checkboxes = document.querySelectorAll('.project-checkbox');
  const checkAll = document.getElementById('checkAll');
  const selectAllBtn = document.getElementById('selectAll');
  const deselectAllBtn = document.getElementById('deselectAll');

  // Check/Uncheck all
  checkAll?.addEventListener('change', function() {
    checkboxes.forEach(cb => cb.checked = this.checked);
  });

  // Select all button
  selectAllBtn?.addEventListener('click', function() {
    checkboxes.forEach(cb => cb.checked = true);
    if (checkAll) checkAll.checked = true;
  });

  // Deselect all button
  deselectAllBtn?.addEventListener('click', function() {
    checkboxes.forEach(cb => cb.checked = false);
    if (checkAll) checkAll.checked = false;
  });

  // Bulk Publish
  document.getElementById('bulkPublish')?.addEventListener('click', function() {
    const selected = getSelectedIds();
    if (!selected.length) {
      alert('Seleziona almeno un progetto');
      return;
    }
    if (confirm(`Pubblicare ${selected.length} progetto/i?`)) {
      submitBulkAction('bulkPublishForm', 'publishInputs', selected);
    }
  });

  // Bulk Unpublish
  document.getElementById('bulkUnpublish')?.addEventListener('click', function() {
    const selected = getSelectedIds();
    if (!selected.length) {
      alert('Seleziona almeno un progetto');
      return;
    }
    if (confirm(`Nascondere ${selected.length} progetto/i?`)) {
      submitBulkAction('bulkUnpublishForm', 'unpublishInputs', selected);
    }
  });

  // Bulk Delete
  document.getElementById('bulkDelete')?.addEventListener('click', function() {
    const selected = getSelectedIds();
    if (!selected.length) {
      alert('Seleziona almeno un progetto');
      return;
    }
    if (confirm(`⚠️ ATTENZIONE!\n\nEliminare definitivamente ${selected.length} progetto/i?\n\nQuesta azione NON può essere annullata!`)) {
      submitBulkAction('bulkDeleteForm', 'deleteInputs', selected);
    }
  });

  /**
   * Ottiene gli ID dei progetti selezionati
   * @returns {Array}
   */
  function getSelectedIds() {
    return Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.value);
  }

  /**
   * Invia un'azione bulk
   * @param {string} formId - ID del form
   * @param {string} containerId - ID del container per gli input
   * @param {Array} ids - Array di ID progetti
   */
  function submitBulkAction(formId, containerId, ids) {
    const form = document.getElementById(formId);
    const container = document.getElementById(containerId);
    
    if (!form || !container) return;
    
    container.innerHTML = '';
    ids.forEach(id => {
      const input = document.createElement('input');
      input.type = 'hidden';
      input.name = 'ids[]';
      input.value = id;
      container.appendChild(input);
    });
    
    form.submit();
  }
});
