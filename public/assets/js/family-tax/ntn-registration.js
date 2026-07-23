document.addEventListener('DOMContentLoaded', () => {
  const root = document.querySelector('.family-tax-frontend.ntn-registration-page');
  if (!root) return;

  const purposeCards = root.querySelectorAll('.purpose-card');
  const continueBtn = root.querySelector('#continueBtn');

  purposeCards.forEach((card) => {
    card.addEventListener('click', () => {
      purposeCards.forEach((item) => item.classList.remove('selected'));
      card.classList.add('selected');
      if (continueBtn) continueBtn.disabled = false;
    });
  });

  const categoryCards = root.querySelectorAll('.category-card');
  categoryCards.forEach((card) => {
    card.addEventListener('click', () => {
      categoryCards.forEach((item) => item.classList.remove('featured'));
      card.classList.add('featured');
    });
  });

  if (continueBtn) {
    continueBtn.addEventListener('click', () => {
      const selected = root.querySelector('.purpose-card.selected');
      if (!selected) {
        purposeCards.forEach((card) => {
          card.style.transition = 'transform .12s ease';
          card.style.transform = 'translateY(-1px)';
          setTimeout(() => { card.style.transform = ''; }, 150);
        });
        return;
      }

      root.querySelector('#categories')?.scrollIntoView({ behavior: 'smooth' });
    });
  }

  root.querySelectorAll('.accordion-item').forEach((item) => {
    const trigger = item.querySelector('.accordion-trigger');
    if (!trigger) return;

    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      root.querySelectorAll('.accordion-item').forEach((other) => {
        other.classList.remove('open');
        other.querySelector('.accordion-trigger')?.setAttribute('aria-expanded', 'false');
      });

      if (!isOpen) {
        item.classList.add('open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  root.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (event) => {
      const targetId = anchor.getAttribute('href');
      if (!targetId || targetId.length <= 1) return;
      const target = root.querySelector(targetId);
      if (!target) return;
      event.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
});
