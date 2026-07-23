document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.family-tax-frontend.business-tax-page .faq-item').forEach((item) => {
    const question = item.querySelector('.faq-question');
    const toggle = item.querySelector('.faq-toggle');

    if (!question) return;

    question.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      document.querySelectorAll('.family-tax-frontend.business-tax-page .faq-item').forEach((other) => {
        other.classList.remove('open');
        const otherToggle = other.querySelector('.faq-toggle');
        if (otherToggle) otherToggle.textContent = '+';
      });

      if (!isOpen) {
        item.classList.add('open');
        if (toggle) toggle.textContent = '-';
      }
    });
  });
});
