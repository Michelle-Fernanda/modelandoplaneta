/**
 * enviar-email.js
 * Web component <enviar-email> reutilizável.
 *
 * Uso mínimo:
 *   <enviar-email endpoint="enviar_email.php"></enviar-email>
 *
 * API pública (via JS):
 *   const el = document.querySelector('enviar-email');
 *   el.setResultados([{ tipo, quantidade, data }]); // lixo
 *   el.setDados({ titulo, resultados, arquivos });   // qualquer página
 *   el.abrir();                                      // abre o modal
 */
class EnviarEmail extends HTMLElement {

  // ── Ciclo de vida ──────────────────────────────────────────────────────────

  connectedCallback() {
    this._endpoint = this.getAttribute('endpoint') || 'enviar_email.php';
    this._titulo   = this.getAttribute('titulo')   || 'Relatório';
    this._dados    = { titulo: this._titulo, resultados: [], arquivos: [] };

    this._render();
    this._bind();
  }

  // ── API pública ────────────────────────────────────────────────────────────

  /** Define os resultados (array de objetos) a serem enviados. */
  setResultados(arr) {
    this._dados.resultados = Array.isArray(arr) ? arr : [];
  }

  /** Define título + resultados + arquivos de uma vez. */
  setDados({ titulo, resultados, arquivos } = {}) {
    if (titulo    !== undefined) this._dados.titulo     = titulo;
    if (resultados !== undefined) this._dados.resultados = resultados;
    if (arquivos  !== undefined) this._dados.arquivos   = arquivos;
  }

  /** Abre o modal de e-mail. */
  abrir() {
    this._modal.style.display = 'flex';
    this._modal.setAttribute('aria-hidden', 'false');
    this._input.value = '';
    this._errEl.classList.remove('show');
    this._input.classList.remove('invalid');
    setTimeout(() => this._input.focus(), 120);
  }

  // ── Render ─────────────────────────────────────────────────────────────────

  _render() {
    const s = document.createElement('style');
    s.textContent = `
      .em-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,.45);
        z-index: 9999;
        align-items: center;
        justify-content: center;
      }
      .em-box {
        background: #fff;
        border-radius: 14px;
        padding: 2rem;
        max-width: 440px;
        width: 90%;
        box-shadow: 0 8px 32px rgba(0,0,0,.18);
        font-family: inherit;
      }
      .em-box h2   { margin: 0 0 .5rem; font-size: 1.2rem; }
      .em-box p    { margin: 0 0 1rem; color: #555; font-size: .95rem; }
      .em-input    { width: 100%; padding: .6rem .8rem; border: 1.5px solid #ccc; border-radius: 8px; font-size: 1rem; box-sizing: border-box; }
      .em-input.invalid { border-color: #e53935; }
      .em-err      { color: #e53935; font-size: .82rem; margin-top: .3rem; display: none; }
      .em-err.show { display: block; }
      .em-btns     { display: flex; justify-content: flex-end; gap: .75rem; margin-top: 1.2rem; }
      .em-btn      { padding: .55rem 1.2rem; border: none; border-radius: 8px; font-size: .95rem; cursor: pointer; }
      .em-cancel   { background: #eee; color: #333; }
      .em-send     { background: #1976d2; color: #fff; display: flex; align-items: center; gap: .4rem; }
      .em-send:disabled { opacity: .6; cursor: not-allowed; }
      .em-spinner  {
        width: 14px; height: 14px;
        border: 2px solid rgba(255,255,255,.4);
        border-top-color: #fff;
        border-radius: 50%;
        animation: em-spin .7s linear infinite;
        display: inline-block;
      }
      @keyframes em-spin { to { transform: rotate(360deg); } }

      .em-notif {
        position: fixed;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        padding: .7rem 1.5rem;
        border-radius: 8px;
        font-size: .97rem;
        font-weight: 500;
        z-index: 10000;
        transition: top .35s ease;
        white-space: nowrap;
        pointer-events: none;
      }
      .em-notif.success { background: #2e7d32; color: #fff; }
      .em-notif.error   { background: #c62828; color: #fff; }
      .em-notif.show    { top: 20px; }
    `;
    this.appendChild(s);

    // Modal
    this._modal = document.createElement('div');
    this._modal.className = 'em-overlay';
    this._modal.setAttribute('aria-hidden', 'true');
    this._modal.setAttribute('role', 'dialog');
    this._modal.setAttribute('aria-modal', 'true');
    this._modal.innerHTML = `
      <div class="em-box">
        <h2>📧 Enviar relatório para o professor</h2>
        <p>Digite o e-mail do professor para enviar os resultados e os anexos.</p>
        <input class="em-input" type="email" placeholder="professor@escola.com" autocomplete="email">
        <div class="em-err">Digite um e-mail válido (ex: prof@escola.com).</div>
        <div class="em-btns">
          <button class="em-btn em-cancel">Cancelar</button>
          <button class="em-btn em-send">Enviar</button>
        </div>
      </div>
    `;
    this.appendChild(this._modal);

    // Notificação
    this._notif = document.createElement('div');
    this._notif.className = 'em-notif';
    this.appendChild(this._notif);

    // Refs
    this._input  = this._modal.querySelector('.em-input');
    this._errEl  = this._modal.querySelector('.em-err');
    this._btnEnv = this._modal.querySelector('.em-send');
    this._btnCan = this._modal.querySelector('.em-cancel');
  }

  // ── Bind ───────────────────────────────────────────────────────────────────

  _bind() {
    this._btnCan.addEventListener('click', () => this._fechar());
    this._modal.addEventListener('click', (e) => { if (e.target === this._modal) this._fechar(); });

    this._input.addEventListener('input', () => {
      if (this._input.classList.contains('invalid') && this._validarEmail(this._input.value.trim())) {
        this._input.classList.remove('invalid');
        this._errEl.classList.remove('show');
      }
    });

    this._input.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') { e.preventDefault(); this._btnEnv.click(); }
    });

    this._btnEnv.addEventListener('click', () => this._enviar());
  }

  // ── Helpers ────────────────────────────────────────────────────────────────

  _fechar() {
    this._modal.style.display = 'none';
    this._modal.setAttribute('aria-hidden', 'true');
  }

  _validarEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v);
  }

  _notificar(msg, tipo = 'success', ms = 4200) {
    this._notif.textContent = msg;
    this._notif.className   = `em-notif ${tipo} show`;
    clearTimeout(this._notifTimer);
    this._notifTimer = setTimeout(() => this._notif.classList.remove('show'), ms);
  }

  // ── Envio ──────────────────────────────────────────────────────────────────

  async _enviar() {
    const email = this._input.value.trim();

    if (!this._validarEmail(email)) {
      this._input.classList.add('invalid');
      this._errEl.classList.add('show');
      this._input.focus();
      return;
    }

    const { resultados, arquivos, titulo } = this._dados;

    if ((!resultados || resultados.length === 0) &&
        !confirm('Nenhum resultado foi adicionado. Deseja enviar mesmo assim?')) return;

    const fd = new FormData();
    fd.append('gmail',      email);
    fd.append('resultados', JSON.stringify(resultados || []));
    fd.append('titulo',     titulo || 'Relatório');
    (arquivos || []).forEach(f => fd.append('anexo[]', f));

    // UX: spinner
    this._btnEnv.disabled = true;
    const labelOriginal   = this._btnEnv.innerHTML;
    this._btnEnv.innerHTML = '<span class="em-spinner"></span> Enviando...';

    try {
      const resp = await fetch(this._endpoint, { method: 'POST', body: fd });
      const json = await resp.json().catch(() => null);

      if (resp.ok && json?.success !== false) {
        this._notificar(json?.message || 'E-mail enviado com sucesso!', 'success');
        // Dispara evento para a página limpar seus dados
        this.dispatchEvent(new CustomEvent('enviado', { bubbles: true, detail: { email } }));
      } else {
        this._notificar(json?.message || `Erro no envio (status ${resp.status})`, 'error');
      }
    } catch {
      this._notificar('Falha ao conectar com o servidor. Tente novamente.', 'error');
    } finally {
      this._btnEnv.disabled  = false;
      this._btnEnv.innerHTML = labelOriginal;
      this._fechar();
    }
  }
}

customElements.define('enviar-email', EnviarEmail);
