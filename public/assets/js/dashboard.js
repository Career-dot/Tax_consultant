document.addEventListener('DOMContentLoaded', () => {
  const root = document.querySelector('.pf-dashboard');
  if (!root) return;

  /* ------------------------------------------------------------------ *
   * Sidebar collapse (desktop) + off-canvas (mobile)
   * ------------------------------------------------------------------ */

  const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
  const mobileToggle = document.querySelector('[data-mobile-toggle]');
  const overlay = document.querySelector('[data-sidebar-overlay]');
  const COLLAPSE_KEY = 'pfd-sidebar-collapsed';

  if (localStorage.getItem(COLLAPSE_KEY) === '1') {
    root.classList.add('is-sidebar-collapsed');
  }

  sidebarToggle?.addEventListener('click', () => {
    root.classList.toggle('is-sidebar-collapsed');
    localStorage.setItem(COLLAPSE_KEY, root.classList.contains('is-sidebar-collapsed') ? '1' : '0');
  });

  mobileToggle?.addEventListener('click', () => {
    root.classList.toggle('is-mobile-open');
  });

  overlay?.addEventListener('click', () => {
    root.classList.remove('is-mobile-open');
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') root.classList.remove('is-mobile-open');
  });

  /* ------------------------------------------------------------------ *
   * Dark / light theme toggle
   * ------------------------------------------------------------------ */

  const themeToggle = document.querySelector('[data-theme-toggle]');
  const THEME_KEY = 'pfd-theme';
  const savedTheme = localStorage.getItem(THEME_KEY);

  if (savedTheme) {
    root.setAttribute('data-theme', savedTheme);
  }

  themeToggle?.addEventListener('click', () => {
    const next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem(THEME_KEY, next);
  });

  /* ------------------------------------------------------------------ *
   * Dropdown panels (notifications, profile menu)
   * ------------------------------------------------------------------ */

  const dropdowns = document.querySelectorAll('[data-dropdown]');

  dropdowns.forEach((dropdown) => {
    const trigger = dropdown.querySelector('[data-dropdown-trigger]');

    trigger?.addEventListener('click', (event) => {
      event.stopPropagation();
      const isOpen = dropdown.classList.contains('is-open');

      dropdowns.forEach((item) => item.classList.remove('is-open'));

      if (!isOpen) dropdown.classList.add('is-open');
    });
  });

  document.addEventListener('click', (event) => {
    dropdowns.forEach((dropdown) => {
      if (!dropdown.contains(event.target)) dropdown.classList.remove('is-open');
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') dropdowns.forEach((dropdown) => dropdown.classList.remove('is-open'));
  });

  /* ------------------------------------------------------------------ *
   * Tabs
   * ------------------------------------------------------------------ */

  document.querySelectorAll('[data-tabs]').forEach((tabGroup) => {
    const triggers = tabGroup.querySelectorAll('[data-tab-trigger]');
    const panelContainer = document.querySelector(tabGroup.dataset.tabs);

    triggers.forEach((trigger) => {
      trigger.addEventListener('click', () => {
        const target = trigger.dataset.tabTrigger;

        triggers.forEach((item) => item.classList.toggle('is-active', item === trigger));

        panelContainer?.querySelectorAll('[data-tab-panel]').forEach((panel) => {
          panel.classList.toggle('is-active', panel.dataset.tabPanel === target);
        });
      });
    });
  });

  /* ------------------------------------------------------------------ *
   * Reveal-on-scroll
   * ------------------------------------------------------------------ */

  const revealTargets = document.querySelectorAll('.pfd-reveal');

  if ('IntersectionObserver' in window && revealTargets.length) {
    const revealObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    revealTargets.forEach((target) => revealObserver.observe(target));
  } else {
    revealTargets.forEach((target) => target.classList.add('is-visible'));
  }

  /* ------------------------------------------------------------------ *
   * Animated counters ([data-counter="1234"])
   * ------------------------------------------------------------------ */

  function animateCounter(el) {
    const target = Number(el.dataset.counter || 0);
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    const duration = 900;
    const start = performance.now();

    function tick(now) {
      const progress = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      const value = Math.round(target * eased);
      el.textContent = prefix + value.toLocaleString('en-US') + suffix;

      if (progress < 1) requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
  }

  const counters = document.querySelectorAll('[data-counter]');

  if ('IntersectionObserver' in window && counters.length) {
    const counterObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.4 }
    );

    counters.forEach((counter) => counterObserver.observe(counter));
  } else {
    counters.forEach(animateCounter);
  }

  /* ------------------------------------------------------------------ *
   * Progress bars ([data-progress="65"]) — animate width on load
   * ------------------------------------------------------------------ */

  document.querySelectorAll('[data-progress]').forEach((bar) => {
    const value = Math.max(0, Math.min(100, Number(bar.dataset.progress || 0)));
    requestAnimationFrame(() => {
      bar.style.width = value + '%';
    });
  });

  document.querySelectorAll('[data-ring]').forEach((ring) => {
    const value = Math.max(0, Math.min(100, Number(ring.dataset.ring || 0)));
    ring.style.setProperty('--pfd-ring-value', value);
  });

  /* ------------------------------------------------------------------ *
   * Upload dropzone
   * ------------------------------------------------------------------ */

  document.querySelectorAll('[data-dropzone]').forEach((zone) => {
    const input = zone.querySelector('input[type="file"]');
    const fileLabel = zone.querySelector('[data-dropzone-filename]');

    if (!input) return;

    function showFileName() {
      if (input.files && input.files.length && fileLabel) {
        fileLabel.textContent = input.files[0].name;
        fileLabel.hidden = false;
      }
    }

    zone.addEventListener('click', () => input.click());
    input.addEventListener('change', showFileName);

    ['dragenter', 'dragover'].forEach((eventName) => {
      zone.addEventListener(eventName, (event) => {
        event.preventDefault();
        zone.classList.add('is-dragover');
      });
    });

    ['dragleave', 'drop'].forEach((eventName) => {
      zone.addEventListener(eventName, (event) => {
        event.preventDefault();
        zone.classList.remove('is-dragover');
      });
    });

    zone.addEventListener('drop', (event) => {
      if (event.dataTransfer?.files?.length) {
        input.files = event.dataTransfer.files;
        showFileName();
      }
    });
  });

  /* ------------------------------------------------------------------ *
   * Confirm before destructive actions
   * ------------------------------------------------------------------ */

  document.querySelectorAll('[data-confirm]').forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!window.confirm(form.dataset.confirm)) {
        event.preventDefault();
      }
    });
  });

  /* ------------------------------------------------------------------ *
   * Toasts
   * ------------------------------------------------------------------ */

  let toastStack = document.querySelector('.pfd-toast-stack');

  function ensureToastStack() {
    if (!toastStack) {
      toastStack = document.createElement('div');
      toastStack.className = 'pfd-toast-stack';
      document.body.appendChild(toastStack);
    }
    return toastStack;
  }

  window.pfdToast = function pfdToast(message, icon = 'fa-check-circle') {
    const stack = ensureToastStack();
    const toast = document.createElement('div');
    toast.className = 'pfd-toast';
    toast.innerHTML = `<i class="fa ${icon}" aria-hidden="true"></i><p>${message}</p>`;
    stack.appendChild(toast);

    window.setTimeout(() => {
      toast.classList.add('is-leaving');
      window.setTimeout(() => toast.remove(), 260);
    }, 4200);
  };

  const flashMessage = root.dataset.flashMessage;
  if (flashMessage) {
    window.pfdToast(flashMessage);
  }
});
