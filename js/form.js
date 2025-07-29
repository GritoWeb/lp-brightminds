// Modal functionality with safety checks
document.addEventListener('DOMContentLoaded', () => {
  const openButtons = document.querySelectorAll('.open-modal');
  const closeBtn = document.getElementById('closeModalBtn');
  const modalOverlay = document.getElementById('modalOverlay');

  // Check if modal elements exist
  if (openButtons.length > 0 && closeBtn && modalOverlay) {
    openButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        modalOverlay.classList.remove('hidden');
        document.body.classList.add('overflow-clip'); 
      });
    });

    closeBtn.addEventListener('click', () => {
      modalOverlay.classList.add('hidden');
      document.body.classList.remove('overflow-clip'); 
    });

    modalOverlay.addEventListener('click', (e) => {
      if (e.target === modalOverlay) {
        modalOverlay.classList.add('hidden');
        document.body.classList.remove('overflow-clip'); 
      }
    });
  }

  // Form WPP with safety checks
  const openButton = document.getElementById('openWhatsappForm');
  const closeButton = document.getElementById('closeWhatsappForm');
  const form = document.getElementById('whatsappForm');
  const consentCheckbox = document.getElementById('consent');
  const submitBtn = document.getElementById('submitBtn');

  // Check if WhatsApp form elements exist
  if (openButton && closeButton && form && consentCheckbox && submitBtn) {
    openButton.addEventListener('click', () => {
      form.classList.remove('hidden');
    });

    closeButton.addEventListener('click', () => {
      form.classList.add('hidden');
    });

    consentCheckbox.addEventListener('change', () => {
      if (consentCheckbox.checked) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
        submitBtn.classList.add('bg-green-600', 'hover:bg-green-700', 'cursor-pointer');
      } else {
        submitBtn.disabled = true;
        submitBtn.classList.remove('bg-green-600', 'hover:bg-green-700', 'cursor-pointer');
        submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
      }
    });
  } else {
    console.log('WhatsApp form elements not found on this page');
  }
});

