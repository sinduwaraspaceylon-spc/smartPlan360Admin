// === FLIP FUNCTION (Add / Cancel Button) ===
function toggleDemandForm() {
    const card = document.getElementById('demandCard');
    const btn = document.getElementById('addDemandBtn');
    const btnText = document.getElementById('btnText');
    const btnIcon = document.getElementById('btnIcon');
    const title = document.getElementById('add-demand-report-title');

    card.classList.toggle('flipped');

    if (card.classList.contains('flipped')) {
        btnText.textContent = 'Cancel';
        btn.classList.add('cancel');
        btn.style.backgroundColor = '#f44336';
        title.textContent = 'Add Demand';
        btnIcon.innerHTML = `
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        `;
        loadDepartments();
    } else {
        btnText.textContent = 'Add Demand';
        btn.classList.remove('cancel');
        btn.style.backgroundColor = '#04127a';
        title.textContent = 'Demand Plan';
        btnIcon.innerHTML = `
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        `;
    }
}