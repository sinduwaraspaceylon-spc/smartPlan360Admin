class FilterSidebar {
  constructor() {
    this.sidebar = document.getElementById("filterSidebar");
    this.overlay = document.getElementById("filterSidebarOverlay");
    this.content = document.getElementById("filterSidebarContent");
    this.title = document.getElementById("filterSidebarTitle");

    this.applyBtn = document.getElementById("filterApplyBtn");
    this.resetBtn = document.getElementById("filterResetBtn");
    this.closeBtn = document.getElementById("filterCloseBtn");

    this.currentConfig = null;

    this.bindEvents();
  }

  bindEvents() {
    this.closeBtn.onclick = () => this.close();
    this.overlay.onclick = () => this.close();
    this.applyBtn.onclick = () => this.apply();
    this.resetBtn.onclick = () => this.reset();
  }

  open(config) {
    this.currentConfig = config;
    this.title.textContent = config.title || "Filters";
    this.content.innerHTML = "";

    const tpl = document.getElementById(config.templateId);
    if (tpl) this.content.appendChild(tpl.content.cloneNode(true));

    config.onInit?.();

    this.sidebar.classList.add("show");
    this.overlay.classList.add("show");
  }

  close() {
    this.sidebar.classList.remove("show");
    this.overlay.classList.remove("show");
  }

  apply() {
    this.currentConfig?.onApply?.();
    this.close();
  }

  reset() {
    this.currentConfig?.onReset?.();
  }
}

window.filterSidebar = new FilterSidebar();
