(() => {
  const panel = document.getElementById("navPanel");
  const toggle = document.querySelector(".nav-toggle");
  const closeBtn = document.querySelector(".nav-close");
  const header = document.querySelector(".site-header");

  const setOpen = (open) => {
    if (!panel || !toggle) return;
    if (open) {
      panel.hidden = false;
      requestAnimationFrame(() => panel.classList.add("open"));
    } else {
      panel.classList.remove("open");
      panel.hidden = true;
    }
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
    toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    document.body.style.overflow = open ? "hidden" : "";
  };

  toggle?.addEventListener("click", () => setOpen(panel.hidden));
  closeBtn?.addEventListener("click", () => setOpen(false));

  panel?.addEventListener("click", (e) => {
    if (e.target === panel) setOpen(false);
  });

  panel?.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setOpen(false));
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && panel && !panel.hidden) setOpen(false);
  });

  const onScroll = () => {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 8);
  };
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  const toast = document.getElementById("toast");
  const toastMsg = document.getElementById("toast-msg");
  let toastTimer;

  const showToast = (msg) => {
    if (!toast || !toastMsg) return;
    toastMsg.textContent = msg;
    toast.classList.add("show");
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toast.classList.remove("show"), 2800);
  };

  window.showToast = showToast;

  // Wishlist hearts
  document.querySelectorAll(".wish-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      const on = btn.classList.toggle("is-on");
      const icon = btn.querySelector("i");
      if (icon) {
        icon.className = on ? "bi bi-heart-fill" : "bi bi-heart";
      }
      const name = btn.dataset.wish || "Planter";
      showToast(on ? `Saved ${name}` : `Removed ${name}`);
    });
  });

  // Customizer modal
  let active = {
    name: "",
    basePrice: 0,
    baseWeight: 0,
    dims: "",
    finishAddon: 0,
    finishName: "Raw Industrial Grey",
  };

  const modalEl = document.getElementById("customizerModal");
  const modalTitle = document.getElementById("customizerTitle");
  const modalDims = document.getElementById("customizerDims");
  const modalWeight = document.getElementById("modalWeight");
  const modalPrice = document.getElementById("modalPrice");
  const addBtn = document.getElementById("addToBagBtn");
  let bsModal = null;

  if (modalEl && window.bootstrap) {
    bsModal = new bootstrap.Modal(modalEl);
  }

  const renderPrice = () => {
    if (!modalPrice) return;
    const total = active.basePrice + active.finishAddon;
    modalPrice.textContent = `$${total.toFixed(2)}`;
  };

  document.querySelectorAll(".js-open-customizer").forEach((btn) => {
    btn.addEventListener("click", () => {
      active = {
        name: btn.dataset.name || "Planter",
        basePrice: Number(btn.dataset.price || 0),
        baseWeight: Number(btn.dataset.weight || 0),
        dims: btn.dataset.dims || "",
        finishAddon: 0,
        finishName: "Raw Industrial Grey",
      };
      if (modalTitle) modalTitle.textContent = active.name;
      if (modalDims) modalDims.textContent = active.dims;
      if (modalWeight) modalWeight.textContent = `${active.baseWeight} lbs`;
      document.querySelectorAll(".finish-btn").forEach((f, i) => {
        f.classList.toggle("active", i === 0);
      });
      renderPrice();
      bsModal?.show();
    });
  });

  document.querySelectorAll(".finish-btn").forEach((btn) => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".finish-btn").forEach((f) => f.classList.remove("active"));
      btn.classList.add("active");
      active.finishName = btn.dataset.finish || active.finishName;
      active.finishAddon = Number(btn.dataset.addon || 0);
      renderPrice();
      showToast(`Applied finish: ${active.finishName}`);
    });
  });

  addBtn?.addEventListener("click", () => {
    showToast(`Added ${active.name} (${active.finishName}) to project bag!`);
    bsModal?.hide();
  });

  // Reveal on scroll
  const reveals = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("in");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -6% 0px" }
    );
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add("in"));
  }

  requestAnimationFrame(() => {
    document
      .querySelectorAll(".hero-banner-copy.reveal, .hero-stage.reveal, .page-hero .reveal, .value-card.reveal")
      .forEach((el) => el.classList.add("in"));
  });
})();
