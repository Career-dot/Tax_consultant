document.addEventListener('DOMContentLoaded', () => {
  initServicesDropdown();
  initServiceFaqs();
  initGlobalReveal();
  initStickyHeader();
  initSalaryTaxCalculator();
});

function initServicesDropdown() {
  const dropdown = document.querySelector('.pf-services-dropdown');
  const toggle = dropdown?.querySelector('.pf-services-dropdown-toggle');
  const menu = dropdown?.querySelector('.pf-services-megamenu');

  if (!dropdown || !toggle || !menu) return;

  const close = () => {
    menu.classList.remove('menu-open');
    toggle.setAttribute('aria-expanded', 'false');
  };

  toggle.addEventListener('click', (event) => {
    event.preventDefault();
    event.stopPropagation();
    const isOpen = menu.classList.toggle('menu-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
  });

  document.addEventListener('click', (event) => {
    if (!dropdown.contains(event.target)) close();
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') close();
  });
}

function initGlobalReveal() {
  const revealItems = document.querySelectorAll([
    '.pf-service-card',
    '.pf-trust-card',
    '.pf-step-card',
    '.pf-testimonial-card',
    '.korde-price-card',
    '.korde-business-card',
    '.about-feature-card',
    '.about-process-card',
    '.contact-form-card',
    '.info-card',
    '.pf-service-page section',
    '.family-tax-frontend section',
  ].join(','));

  if (!revealItems.length) return;

  revealItems.forEach((item) => item.classList.add('pf-reveal'));

  if (!('IntersectionObserver' in window)) {
    revealItems.forEach((item) => item.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  revealItems.forEach((item) => observer.observe(item));
}

function initStickyHeader() {
  const header = document.querySelector('.pf-header');
  if (!header) return;

  const sync = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 12);
  };

  sync();
  window.addEventListener('scroll', sync, { passive: true });
}

function initServiceFaqs() {
  document.querySelectorAll('.pf-service-page .faq-list, .pf-service-page #faqAccordion').forEach((faqRoot) => {
    const items = faqRoot.querySelectorAll('.faq-item, .faq-accordion-item');

    items.forEach((item) => {
      const button = item.querySelector('.faq-question, .faq-accordion-btn');
      const panel = item.querySelector('.faq-answer, .faq-content');

      if (!button || !panel) return;

      const isOpen = item.classList.contains('active') || panel.classList.contains('panel-open');
      panel.style.maxHeight = isOpen ? `${panel.scrollHeight}px` : '0px';
      button.setAttribute('aria-expanded', String(isOpen));

      button.addEventListener('click', () => {
        const shouldOpen = button.getAttribute('aria-expanded') !== 'true';

        items.forEach((other) => {
          const otherButton = other.querySelector('.faq-question, .faq-accordion-btn');
          const otherPanel = other.querySelector('.faq-answer, .faq-content');

          other.classList.remove('active');
          otherPanel?.classList.remove('panel-open');
          if (otherButton) otherButton.setAttribute('aria-expanded', 'false');
          if (otherPanel) otherPanel.style.maxHeight = '0px';
        });

        if (shouldOpen) {
          item.classList.add('active');
          panel.classList.add('panel-open');
          button.setAttribute('aria-expanded', 'true');
          panel.style.maxHeight = `${panel.scrollHeight}px`;
        }
      });
    });
  });
}

const TAX_SLABS = [
  { upTo: 600000, baseTax: 0, rate: 0, prevLimit: 0 },
  { upTo: 1200000, baseTax: 0, rate: 0.05, prevLimit: 600000 },
  { upTo: 2200000, baseTax: 30000, rate: 0.15, prevLimit: 1200000 },
  { upTo: 3200000, baseTax: 180000, rate: 0.25, prevLimit: 2200000 },
  { upTo: 4100000, baseTax: 430000, rate: 0.3, prevLimit: 3200000 },
  { upTo: Infinity, baseTax: 700000, rate: 0.35, prevLimit: 4100000 },
];

function formatCurrencyPKR(amount) {
  return `Rs ${Math.round(amount).toLocaleString('en-PK')}`;
}

function getSlabLabel(annualIncome) {
  if (annualIncome <= 600000) return 'Up to Rs 600,000 - Tax Exempt';
  if (annualIncome <= 1200000) return 'Rs 600,001 - Rs 1,200,000 (5%)';
  if (annualIncome <= 2200000) return 'Rs 1,200,001 - Rs 2,200,000 (15%)';
  if (annualIncome <= 3200000) return 'Rs 2,200,001 - Rs 3,200,000 (25%)';
  if (annualIncome <= 4100000) return 'Rs 3,200,001 - Rs 4,100,000 (30%)';
  return 'Above Rs 4,100,000 (35%)';
}

function initSalaryTaxCalculator() {
  const calculateButton = document.getElementById('calcBtn');
  const salaryInput = document.getElementById('monthlySalary');
  const resultContainer = document.getElementById('calcResult');

  if (!calculateButton || !salaryInput || !resultContainer) return;

  calculateButton.addEventListener('click', () => {
    const monthlySalary = Number.parseFloat(salaryInput.value);

    if (!Number.isFinite(monthlySalary) || monthlySalary <= 0) {
      salaryInput.style.borderColor = '#ff5f57';
      resultContainer.classList.remove('result-open');
      return;
    }

    salaryInput.style.borderColor = '#e2e2e2';

    const annualIncome = monthlySalary * 12;
    const slab = TAX_SLABS.find((item) => annualIncome <= item.upTo);
    const annualTax = Math.max((slab.baseTax + (annualIncome - slab.prevLimit) * slab.rate), 0);
    const monthlyTax = annualTax / 12;
    const effectiveRate = annualIncome > 0 ? (annualTax / annualIncome) * 100 : 0;

    document.getElementById('resAnnual').textContent = formatCurrencyPKR(annualIncome);
    document.getElementById('resSlab').textContent = getSlabLabel(annualIncome);
    document.getElementById('resAnnualTax').textContent = formatCurrencyPKR(annualTax);
    document.getElementById('resMonthlyTax').textContent = formatCurrencyPKR(monthlyTax);
    document.getElementById('resEffRate').textContent = `${effectiveRate.toFixed(2)}%`;
    document.getElementById('resTakeHome').textContent = formatCurrencyPKR(monthlySalary - monthlyTax);
    resultContainer.classList.add('result-open');
  });
}
