function initDemandPlanSection() {
    console.log("[initDemandPlanSection] initializing...");

    // global reset fuction
    function resetAllUI() {
        console.log("[resetAllUI] Resetting ALL sections...");

        const addSection = document.getElementById("add-demand-section");
        const addBtn = document.getElementById("add-demand-btn");
        const backBtn = document.getElementById("back-to-demands-btn");
        const demandFilters = document.getElementById("demand-filters");

        if (addSection) addSection.classList.add("hidden");
        if (backBtn) backBtn.classList.add("hidden");
        if (demandFilters) demandFilters.classList.add("hidden");

        if (addBtn) {
            addBtn.innerHTML = `<i class="fa-solid fa-plus"></i> Add`;
            addBtn.classList.remove("submit-mode");
        }

        resetTabs(); // reset tab section as well
    }

    // flip card (Create Demand + Cancel)
    function initFlipCard() {
        const flipCard = document.getElementById("flipCard");
        const toggleBtn = document.getElementById("createNewDemandBtn");

        if (!flipCard || !toggleBtn) return;

        toggleBtn.replaceWith(toggleBtn.cloneNode(true));
        const btn = document.getElementById("createNewDemandBtn");

        function setCreateMode() {
            btn.classList.remove("cancel-mode");
            btn.innerHTML = `
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg> Create Demand
            `;
        }

        function setCancelMode() {
            btn.classList.add("cancel-mode");
            btn.innerHTML = `
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="5" x2="19" y2="19"></line>
                    <line x1="19" y1="5" x2="5" y2="19"></line>
                </svg> Cancel
            `;
        }

        // Set initial state based on DOM
        flipCard.classList.contains("flipped") ? setCancelMode() : setCreateMode();

        btn.addEventListener("click", () => {
            const isFlipped = flipCard.classList.contains("flipped");

            if (isFlipped) {
                // user is canceling → flip back → RESET ALL
                flipCard.classList.remove("flipped");
                setCreateMode();

                resetAllUI(); // <-- FULL SYSTEM RESET

            } else {
                // user is opening add-demand view
                flipCard.classList.add("flipped");
                setCancelMode();
            }
        });
    }

    // ADD-DEMAND SECTION (Add → Submit + Back)
    function initAddDemandSection() {
        const addBtn = document.getElementById("add-demand-btn");
        const addSection = document.getElementById("add-demand-section");
        const demandFilters = document.getElementById("demand-filters");
        const backBtn = document.getElementById("back-to-demands-btn");

        if (!addBtn || !addSection || !demandFilters || !backBtn) return;

        addBtn.replaceWith(addBtn.cloneNode(true));
        backBtn.replaceWith(backBtn.cloneNode(true));

        const btn = document.getElementById("add-demand-btn");
        const back = document.getElementById("back-to-demands-btn");

        btn.addEventListener("click", () => {
            demandFilters.classList.remove("hidden");
            addSection.classList.remove("hidden");
            back.classList.remove("hidden");

            btn.innerHTML = `<i class="fa-solid fa-check"></i> Submit`;
            btn.classList.add("submit-mode");
        });

        back.addEventListener("click", () => {
            resetAllUI(); // full reset from back button
        });
    }

    /* --------------------------------------------------
       3. TABS HANDLING
    -------------------------------------------------- */
    function initDemandTabs() {
    const tabButtons = document.querySelectorAll(".tabs .tab");
    const panels = document.querySelectorAll(".demand-content > div");

    if (tabButtons.length === 0 || panels.length === 0) {
        console.warn("[initDemandTabs] No tabs or panels found.");
        return;
    }

    // Remove old listeners by cloning tabs
    tabButtons.forEach(tab => {
        tab.replaceWith(tab.cloneNode(true));
    });

    const cleanTabs = document.querySelectorAll(".tabs .tab");

    function activateTab(tabName) {
        // Remove active from all tabs
        cleanTabs.forEach(t => t.classList.remove("active"));

        // Set active tab
        const clicked = document.querySelector(`.tab[data-tab="${tabName}"]`);
        if (clicked) clicked.classList.add("active");

        // Hide all panels
        panels.forEach(panel => panel.classList.add("hidden"));

        // Show only selected panel
        const activePanel = document.getElementById(tabName);
        if (activePanel) activePanel.classList.remove("hidden");
    }

    // Bind click listeners
    cleanTabs.forEach(tab => {
        tab.addEventListener("click", () => {
            const tabName = tab.dataset.tab;
            activateTab(tabName);
        });
    });

    // Ensure default state (first tab = active)
    const firstTab = cleanTabs[0];
    if (firstTab) activateTab(firstTab.dataset.tab);

    console.log("[initDemandTabs] Tabs ready.");
}

    // Reset tabs to default state
    function resetTabs() {
        const tabButtons = document.querySelectorAll(".tabs .tab");

        const panels = {
            products: document.getElementById("products"),
            departments: document.getElementById("departments"),
            categories: document.getElementById("categories")
        };

        if (!tabButtons.length) return;

        tabButtons.forEach(t => t.classList.remove("active"));
        tabButtons[0].classList.add("active");

        panels.products.classList.remove("hidden");
        panels.departments.classList.add("hidden");
        panels.categories.classList.add("hidden");

        console.log("[resetTabs] Default tab restored.");
    }

    // initialize all features    
    initFlipCard();
    initAddDemandSection();
    initDemandTabs();

    console.log("[initDemandPlanSection] All features initialized.");
}
