document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('pfAuthModal');

  if (!modal) return;

  const dialog = modal.querySelector('.pf-auth-modal-dialog');
  const views = Array.from(modal.querySelectorAll('[data-auth-view]'));
  const openTriggers = document.querySelectorAll('[data-auth-open]');
  const closeTriggers = modal.querySelectorAll('[data-auth-close]');
  const switchTriggers = modal.querySelectorAll('[data-auth-switch]');
  const onboardingForm = modal.querySelector('[data-onboarding-form]');
  let lastFocusedElement = null;
  let currentStep = 0;

  const focusableSelector = [
    'a[href]',
    'button:not([disabled])',
    'input:not([disabled])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
  ].join(',');

  function openModal(viewName) {
    lastFocusedElement = document.activeElement;
    modal.hidden = false;
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('pf-auth-modal-lock');
    closeMobileNavigation();
    switchView(viewName || 'sign-in');

    window.requestAnimationFrame(() => {
      modal.classList.add('is-open');
      dialog?.focus();
    });
  }

  function closeModal() {
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('pf-auth-modal-lock');

    window.setTimeout(() => {
      modal.hidden = true;
      if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
        lastFocusedElement.focus();
      }
    }, 240);
  }

  function switchView(viewName) {
    const nextView = views.find((view) => view.dataset.authView === viewName);

    if (!nextView) return;

    views.forEach((view) => {
      const isActive = view === nextView;
      view.hidden = !isActive;
      view.classList.toggle('is-active', isActive);
    });

    if (viewName === 'get-started') {
      restoreOnboardingWizard();
      renderOnboardingStep(currentStep);
    }

    const firstField = nextView.querySelector('input, select, textarea, button');
    window.setTimeout(() => firstField?.focus(), 80);
  }

  function closeMobileNavigation() {
    const navCollapse = document.querySelector('.pf-navbar-collapse.show');
    const navToggle = document.querySelector('.pf-navbar-toggler[aria-expanded="true"]');

    navCollapse?.classList.remove('show');
    navToggle?.setAttribute('aria-expanded', 'false');
  }

  function restoreOnboardingWizard() {
    const completePanel = modal.querySelector('[data-onboarding-complete]');
    const actions = modal.querySelector('[data-onboarding-actions]');

    if (completePanel && !completePanel.hidden) {
      completePanel.hidden = true;
      currentStep = 0;
    }

    if (actions) actions.hidden = false;
  }

  function trapFocus(event) {
    if (event.key !== 'Tab' || modal.hidden) return;

    const focusable = Array.from(modal.querySelectorAll(focusableSelector)).filter((element) => {
      return element.offsetParent !== null;
    });

    if (focusable.length === 0) return;

    const first = focusable[0];
    const last = focusable[focusable.length - 1];

    if (event.shiftKey && document.activeElement === first) {
      event.preventDefault();
      last.focus();
    } else if (!event.shiftKey && document.activeElement === last) {
      event.preventDefault();
      first.focus();
    }
  }

  function getCurrentStepElement() {
    return modal.querySelector(`[data-onboarding-step="${currentStep}"]`);
  }

  function stepFields(stepIndex) {
    const step = modal.querySelector(`[data-onboarding-step="${stepIndex}"]`);
    return step ? Array.from(step.querySelectorAll('input, select, textarea')) : [];
  }

  function validateStep(stepIndex) {
    const fields = stepFields(stepIndex);

    for (const field of fields) {
      if (!field.checkValidity()) {
        field.reportValidity();
        return false;
      }
    }

    return true;
  }

  function updateReview() {
    if (!onboardingForm) return;

    const formData = new FormData(onboardingForm);

    modal.querySelectorAll('[data-review]').forEach((target) => {
      const key = target.dataset.review;
      const value = (formData.get(key) || '').toString().trim();
      target.textContent = value || '-';
    });
  }

  function updateButtons() {
    const prevButton = modal.querySelector('[data-onboarding-prev]');
    const nextButton = modal.querySelector('[data-onboarding-next]');
    const submitButton = modal.querySelector('[data-onboarding-submit]');
    const selectedService = modal.querySelector('[data-selected-service]');
    const confirmInput = modal.querySelector('#onboardConfirm');

    if (prevButton) prevButton.hidden = currentStep === 0;

    if (nextButton) {
      nextButton.hidden = currentStep === 3;
      nextButton.disabled = currentStep === 0 && !selectedService?.value;
    }

    if (submitButton) {
      submitButton.hidden = currentStep !== 3;
      submitButton.disabled = currentStep === 3 && !confirmInput?.checked;
    }
  }

  function renderOnboardingStep(stepIndex) {
    currentStep = Math.max(0, Math.min(stepIndex, 3));

    modal.querySelectorAll('[data-onboarding-step]').forEach((step) => {
      const isActive = Number(step.dataset.onboardingStep) === currentStep;
      step.hidden = !isActive;
      step.classList.toggle('is-active', isActive);
    });

    modal.querySelectorAll('[data-step-indicator]').forEach((item) => {
      const itemStep = Number(item.dataset.stepIndicator);
      item.classList.toggle('is-active', itemStep === currentStep);
      item.classList.toggle('is-complete', itemStep < currentStep);
    });

    const progress = modal.querySelector('[data-onboarding-progress]');
    if (progress) progress.style.width = `${((currentStep + 1) / 4) * 100}%`;

    if (currentStep === 3) updateReview();
    updateButtons();

    const activeStep = getCurrentStepElement();
    window.setTimeout(() => {
      activeStep?.querySelector('button, input, select, textarea')?.focus();
    }, 80);
  }

  openTriggers.forEach((trigger) => {
    trigger.addEventListener('click', (event) => {
      event.preventDefault();
      openModal(trigger.dataset.authOpen);
    });
  });

  closeTriggers.forEach((trigger) => {
    trigger.addEventListener('click', closeModal);
  });

  switchTriggers.forEach((trigger) => {
    trigger.addEventListener('click', () => switchView(trigger.dataset.authSwitch));
  });

  modal.querySelectorAll('[data-modal-password-toggle]').forEach((button) => {
    const input = document.getElementById(button.getAttribute('aria-controls'));

    if (!input) return;

    button.addEventListener('click', () => {
      const shouldShow = input.type === 'password';
      input.type = shouldShow ? 'text' : 'password';
      button.textContent = shouldShow ? 'Hide' : 'Show';
      button.setAttribute('aria-label', shouldShow ? 'Hide password' : 'Show password');
    });
  });

  modal.querySelectorAll('[data-auth-form]').forEach((form) => {
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      if (!form.checkValidity()) {
        form.reportValidity();
      }
    });
  });

  modal.querySelectorAll('[data-service-card]').forEach((card) => {
    card.addEventListener('click', () => {
      const selectedInput = modal.querySelector('[data-selected-service]');

      modal.querySelectorAll('[data-service-card]').forEach((item) => {
        item.classList.toggle('is-selected', item === card);
        item.setAttribute('aria-pressed', item === card ? 'true' : 'false');
      });

      if (selectedInput) selectedInput.value = card.dataset.serviceTitle || '';
      updateButtons();
    });

    card.setAttribute('aria-pressed', 'false');
  });

  modal.querySelector('[data-onboarding-prev]')?.addEventListener('click', () => {
    renderOnboardingStep(currentStep - 1);
  });

  modal.querySelector('[data-onboarding-next]')?.addEventListener('click', () => {
    if (!validateStep(currentStep)) return;
    renderOnboardingStep(currentStep + 1);
  });

  modal.querySelector('#onboardConfirm')?.addEventListener('change', updateButtons);

  onboardingForm?.addEventListener('input', () => {
    if (currentStep === 3) updateReview();
  });

  onboardingForm?.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!validateStep(3)) return;

    const completePanel = modal.querySelector('[data-onboarding-complete]');
    const actions = modal.querySelector('[data-onboarding-actions]');

    modal.querySelectorAll('[data-onboarding-step]').forEach((step) => {
      step.hidden = true;
      step.classList.remove('is-active');
    });

    if (actions) actions.hidden = true;
    if (completePanel) {
      completePanel.hidden = false;
      completePanel.querySelector('button')?.focus();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !modal.hidden) closeModal();
    trapFocus(event);
  });

  renderOnboardingStep(0);
});
