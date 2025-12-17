// Global flag to prevent multiple initializations
let demandFiltersInitialized = false;

// Flip function (Create Demand / Cancel Button)
function toggleDemandForm() {
    const card = document.getElementById('flipCard');
    const btn = document.getElementById('createNewDemandBtn');
    const title = document.getElementById('report-title');

    // Check if elements exist
    if (!card || !btn || !title) {
        console.error('Required elements not found', { card, btn, title });
        return;
    }

    card.classList.toggle('flipped');

    if (card.classList.contains('flipped')) {
        // Change button to Cancel
        btn.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
            Cancel
        `;
        btn.classList.add('cancel');
        btn.style.backgroundColor = '#dc3545';
        title.textContent = 'Add Demand';

        // Initialize filters when flipped to form (only once)
        if (!demandFiltersInitialized) {
            // Call your filter initialization function here if needed
            // initDemandFilters();
            demandFiltersInitialized = true;
            console.log('Demand filters initialized');
        }
    } else {
        // Change button back to Create Demand
        btn.innerHTML = `
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Create Demand
        `;
        btn.classList.remove('cancel');
        btn.style.backgroundColor = '#04127a';
        title.textContent = 'Demand Plan';
    }
}

// Wait for DOM to be ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFlipCard);
} else {
    initFlipCard();
}

function initFlipCard() {
    // Add click event to the Create Demand button
    const createBtn = document.getElementById('createNewDemandBtn');
    if (createBtn) {
        createBtn.addEventListener('click', toggleDemandForm);
        console.log('✓ Create Demand button listener attached');
    } else {
        console.error('✗ createNewDemandBtn not found');
    }

    // Also handle the back button (✕) on the card
    const backBtn = document.getElementById('backBtn');
    if (backBtn) {
        backBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDemandForm();
        });
        console.log('✓ Back button listener attached');
    } else {
        console.error('✗ backBtn not found');
    }
}