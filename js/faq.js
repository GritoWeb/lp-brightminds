
document.addEventListener('DOMContentLoaded', () => {
  console.log('FAQ script loaded');
  
  // Select all FAQ items
  const faqItems = document.querySelectorAll('.faq-item');

  if (faqItems.length > 0) {
    faqItems.forEach(item => {
      const question = item.querySelector('.faq-question');
      const answer = item.querySelector('.faq-answer');

      if (question && answer) {
        question.addEventListener('click', () => {
          const isOpen = item.classList.contains('open');

          // Close all items
          faqItems.forEach(i => {
            i.classList.remove('open');
            const itemAnswer = i.querySelector('.faq-answer');
            if (itemAnswer) {
              itemAnswer.style.maxHeight = null;
            }
          });

          // If clicked item was closed, open it
          if (!isOpen) {
            item.classList.add('open');
            answer.style.maxHeight = answer.scrollHeight + 'px';
          }
        });
      }
    });
  } else {
    console.log('FAQ items not found on this page');
  }
});


