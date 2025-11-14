// Global flag to prevent multiple initializations
let demandFiltersInitialized = false;

// Flip function (Add / Cancel Button)
function toggleDemandForm() {
    const card = document.getElementById('flipCard');
    const btn = document.getElementById('createNewDemandBtn');
    const title = document.getElementById('report-title');

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

// Add click event to the button
document.getElementById('createNewDemandBtn').addEventListener('click', toggleDemandForm);

// Also handle the back button (✕) on the card
const backBtn = document.querySelector('.back-btn');
if (backBtn) {
    backBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        toggleDemandForm();
    });
}