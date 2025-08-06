// Suprimir TODOS os erros 404 e de recursos não encontrados
(function() {
  // Lista de métodos do console para interceptar
  const consoleMethods = ['error', 'warn', 'log', 'info', 'debug'];
  
  consoleMethods.forEach(method => {
    const original = console[method];
    console[method] = function(...args) {
      const message = args.join(' ');
      // Filtrar mensagens relacionadas a 404 ou recursos não encontrados
      if (message.includes('404') || 
          message.includes('Failed to load resource') || 
          message.includes('the server responded with a status of 404') ||
          message.includes('ERR_ABORTED 404') ||
          message.includes('Not Found') ||
          message.includes('editor-style.css') ||
          message.includes('Failed to load data') ||
          message.includes('content unavailable') ||
          message.includes('resource was not cached')) {
        return;
      }
      original.apply(console, args);
    };
  });

  // Interceptar erros globais
  const originalOnError = window.onerror;
  window.onerror = function(message, source, lineno, colno, error) {
    if (message && (message.includes('404') || 
        message.includes('Failed to load') ||
        message.includes('editor-style.css'))) {
      return true; // Previne o erro padrão
    }
    if (originalOnError) {
      return originalOnError.apply(this, arguments);
    }
    return false;
  };

  // Interceptar erros de promise rejeitadas
  window.addEventListener('unhandledrejection', function(event) {
    if (event.reason && typeof event.reason === 'string') {
      if (event.reason.includes('404') || 
          event.reason.includes('Failed to load') ||
          event.reason.includes('editor-style.css')) {
        event.preventDefault();
      }
    }
  });

  // Interceptar todos os tipos de erros
  window.addEventListener('error', function(e) {
    if (e.message && (e.message.includes('404') || 
        e.message.includes('Failed to load') ||
        e.message.includes('editor-style.css') ||
        e.message.includes('ERR_ABORTED'))) {
      e.preventDefault();
      e.stopPropagation();
      return false;
    }
  }, true);

  // Tentar interceptar erros de network diretamente
  if (typeof PerformanceObserver !== 'undefined') {
    try {
      const observer = new PerformanceObserver((list) => {
        list.getEntries().forEach((entry) => {
          if (entry.name.includes('editor-style.css') && entry.transferSize === 0) {
            // Recurso falhou ao carregar, mas não vamos fazer nada
            // para não gerar logs
          }
        });
      });
      observer.observe({entryTypes: ['resource']});
    } catch(e) {
      // Falha silenciosa se PerformanceObserver não for suportado
    }
  }
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

