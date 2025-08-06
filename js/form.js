// Suprimir erros 404 no console
(function() {
  const originalError = console.error;
  console.error = function(...args) {
    const message = args.join(' ');
    // Não mostrar erros 404 ou de recursos não encontrados
    if (message.includes('404') || 
        message.includes('Failed to load resource') || 
        message.includes('the server responded with a status of 404')) {
      return;
    }
    originalError.apply(console, args);
  };
})();

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

