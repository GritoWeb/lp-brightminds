// Aguardar o DOM carregar
document.addEventListener('DOMContentLoaded', function() {
  // Verificar se os elementos existem antes de adicionar listeners
  const openButtons = document.querySelectorAll('.open-modal');
  const closeBtn = document.getElementById('closeModalBtn');
  const modalOverlay = document.getElementById('modalOverlay');

  // Só executar se os elementos necessários existirem
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
});

