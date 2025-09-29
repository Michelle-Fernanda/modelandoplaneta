class MenuModal extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: "open" });

    this.shadowRoot.innerHTML = `
      <style>
        :host {
          position: relative;
          display: block;
        }

        .modal {
          display: none;
          position: fixed;
          top: 80px;
          left: 80px;
          min-width: 300px;
          background: #ffffff;
          border-radius: 16px;
          box-shadow: 0 8px 25px rgba(0,0,0,0.2);
          z-index: 3;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          overflow: hidden;
          animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
          from { opacity: 0; transform: scale(0.95); }
          to   { opacity: 1; transform: scale(1); }
        }

        .header {
          background: linear-gradient(135deg, #007bff, #0056b3);
          color: white;
          padding: 12px 16px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          cursor: grab;
          font-size: 15px;
          font-weight: 600;
          user-select: none;
        }

        .header:active {
          cursor: grabbing;
        }

        .close-btn {
          cursor: pointer;
          font-weight: bold;
          padding: 2px 8px;
          border-radius: 50%;
          background: rgba(255,255,255,0.2);
          transition: background 0.3s;
        }

        .close-btn:hover {
          background: rgba(255,255,255,0.4);
        }

        .content {
          padding: 16px;
          background: #fafafa;
        }
      </style>

      <div class="modal">
        <div class="header">
          <span class="title"></span>
          <span class="close-btn">✖</span>
        </div>
        <div class="content">
          <slot></slot>
        </div>
      </div>
    `;
  }

  connectedCallback() {
    const modal = this.shadowRoot.querySelector(".modal");
    const header = this.shadowRoot.querySelector(".header");
    const closeBtn = this.shadowRoot.querySelector(".close-btn");

    modal.style.display = "none";

    // Título
    this.shadowRoot.querySelector(".title").textContent =
      this.getAttribute("title") || "Modal";

    // Fechar
    closeBtn.addEventListener("click", () => this.close());

    // Prioridade (z-index ao clicar)
    modal.addEventListener("mousedown", () => {
      document.querySelectorAll("menu-modal").forEach(el => {
        el.shadowRoot.querySelector(".modal").style.zIndex = 3;
      });
      modal.style.zIndex = 9999;
    });

    // ---- Drag robusto ----
    const rect = modal.getBoundingClientRect();
    modal.style.left = rect.left + "px";
    modal.style.top = rect.top + "px";
    modal.style.position = "fixed";

    let dragging = false, offsetX = 0, offsetY = 0;
    const clamp = (v, a, b) => Math.max(a, Math.min(b, v));

    const getClient = (e) => {
      if (e.touches && e.touches[0]) return { x: e.touches[0].clientX, y: e.touches[0].clientY };
      return { x: e.clientX, y: e.clientY };
    };

    const onMove = (e) => {
      if (!dragging) return;
      if (e.cancelable) e.preventDefault();

      const { x, y } = getClient(e);
      const modalRect = modal.getBoundingClientRect();
      const vw = document.documentElement.clientWidth;
      const vh = document.documentElement.clientHeight;

      let newLeft = x - offsetX;
      let newTop = y - offsetY;

      newLeft = clamp(newLeft, 0, Math.max(0, vw - modalRect.width));
      newTop = clamp(newTop, 0, Math.max(0, vh - modalRect.height));

      modal.style.left = newLeft + "px";
      modal.style.top = newTop + "px";
    };

    const endDrag = () => {
      dragging = false;
      document.removeEventListener("mousemove", onMove);
      document.removeEventListener("mouseup", endDrag);
      document.removeEventListener("touchmove", onMove);
      document.removeEventListener("touchend", endDrag);
    };

    header.addEventListener("mousedown", (e) => {
      e.preventDefault();
      const r = modal.getBoundingClientRect();
      offsetX = e.clientX - r.left;
      offsetY = e.clientY - r.top;
      dragging = true;
      document.addEventListener("mousemove", onMove, { passive: false });
      document.addEventListener("mouseup", endDrag);
    });

    header.addEventListener("touchstart", (e) => {
      e.preventDefault();
      const t = e.touches[0];
      const r = modal.getBoundingClientRect();
      offsetX = t.clientX - r.left;
      offsetY = t.clientY - r.top;
      dragging = true;
      document.addEventListener("touchmove", onMove, { passive: false });
      document.addEventListener("touchend", endDrag);
    }, { passive: false });

    // ---- Métodos públicos para abrir/fechar ----
    this.open = () => { modal.style.display = "block"; };
    this.close = () => { modal.style.display = "none"; };
  }
}

customElements.define("menu-modal", MenuModal);
