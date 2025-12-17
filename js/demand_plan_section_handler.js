function initDemandPlanSection() {
    console.log("[initDemandPlanSection] initializing...");

    const sectionTitle = document.getElementById("section-title");

    //GLOBAL RESET
    function resetAllUI() {
        console.log("[resetAllUI] Resetting ALL sections...");
        
        const addSection = document.getElementById("demand-flip-section");
        const addBtn = document.getElementById("add-demand-btn");
        const backBtn = document.getElementById("back-to-demands-btn");
        const demandFilters = document.getElementById("demand-filters");
        const pickBtn = document.getElementById("pick-demand-btn");

        // hide sections
        if (addSection) {
            addSection.classList.add("hidden");
            addSection.classList.remove("flipped"); // reset inner flip
        }
        if (backBtn) {
            backBtn.innerHTML = `<i class="fa-solid fa-arrow-left"></i> Back to Existing Demands`;
            backBtn.classList.add("hidden");
        }
        if (demandFilters) demandFilters.classList.add("hidden");

        if (pickBtn) {
            pickBtn.classList.add("hidden");
            pickBtn.disabled = false; // re-enable pick
        }

        // reset ADD button
        if (addBtn) {
            addBtn.innerHTML = `<i class="fa-solid fa-plus"></i> Add`;
            addBtn.classList.remove("submit-mode");
        }

        // RESET TITLE
        if (sectionTitle) sectionTitle.textContent = "Existing Demands";
    }

    // MAIN FLIP-CARD (Create Demand / Cancel)
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

        flipCard.classList.contains("flipped") ? setCancelMode() : setCreateMode();

        btn.addEventListener("click", () => {
            const isFlipped = flipCard.classList.contains("flipped");

            if (isFlipped) {
                flipCard.classList.remove("flipped");
                setCreateMode();
                resetAllUI(); // FULL RESET

            } else {
                flipCard.classList.add("flipped");
                setCancelMode();
            }
        });
    }

     // ADD-DEMAND (Add → Submit + Back + Pick Flip)
    function initAddDemandSection() {

        const addBtn = document.getElementById("add-demand-btn");
        const addSection = document.getElementById("demand-flip-section");
        const demandFilters = document.getElementById("demand-filters");
        const backBtn = document.getElementById("back-to-demands-btn");
        const pickBtn = document.getElementById("pick-demand-btn");

        if (!addBtn || !addSection || !demandFilters || !backBtn || !pickBtn) return;

        // remove previous listeners
        addBtn.replaceWith(addBtn.cloneNode(true));
        backBtn.replaceWith(backBtn.cloneNode(true));
        pickBtn.replaceWith(pickBtn.cloneNode(true));

        const btn = document.getElementById("add-demand-btn");
        const back = document.getElementById("back-to-demands-btn");
        const pick = document.getElementById("pick-demand-btn");

        // ADD button acts as "Submit mode" 
        btn.addEventListener("click", () => {
            demandFilters.classList.remove("hidden");
            addSection.classList.remove("hidden");
            back.classList.remove("hidden");
            pick.classList.remove("hidden");

            btn.innerHTML = `<i class="fa-solid fa-check"></i> Submit`;
            btn.classList.add("submit-mode");

            // **UPDATE TITLE**
            if (sectionTitle) sectionTitle.textContent = "Add Demand";
        });

        // PICK → Flip the inner card
        pick.addEventListener("click", () => {
            addSection.classList.add("flipped");
            pick.disabled = true;       
            back.innerHTML = `<i class="fa-solid fa-eye"></i> View`;
        });

        // BACK/VIEW → Reset inner flip
        back.addEventListener("click", () => {

            if (addSection.classList.contains("flipped")) {
                addSection.classList.remove("flipped");
                back.innerHTML = `<i class="fa-solid fa-arrow-left"></i> Back to Existing Demands`;
                pick.disabled = false;

            } else {
                resetAllUI();
            }
        });
    }

    // Initialize all modules
    initFlipCard();
    initAddDemandSection();

    console.log("[initDemandPlanSection] All features initialized.");
}
