// Suprimir erros 404 e de recursos não encontrados no console
(function() {
  // Interceptar console.error
  const originalError = console.error;
  console.error = function(...args) {
    const message = args.join(' ');
    if (message.includes('404') || 
        message.includes('Failed to load resource') || 
        message.includes('the server responded with a status of 404') ||
        message.includes('ERR_ABORTED 404') ||
        message.includes('Not Found')) {
      return;
    }
    originalError.apply(console, args);
  };

  // Interceptar console.warn
  const originalWarn = console.warn;
  console.warn = function(...args) {
    const message = args.join(' ');
    if (message.includes('404') || 
        message.includes('Failed to load resource') || 
        message.includes('ERR_ABORTED 404') ||
        message.includes('Not Found')) {
      return;
    }
    originalWarn.apply(console, args);
  };

  // Interceptar console.log para casos específicos
  const originalLog = console.log;
  console.log = function(...args) {
    const message = args.join(' ');
    if (message.includes('GET') && message.includes('404') && message.includes('Not Found')) {
      return;
    }
    originalLog.apply(console, args);
  };

  // Interceptar erros de rede não capturados
  window.addEventListener('error', function(e) {
    if (e.message && (e.message.includes('404') || 
        e.message.includes('Failed to load resource') ||
        e.message.includes('ERR_ABORTED 404'))) {
      e.preventDefault();
      return false;
    }
  }, true);
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

