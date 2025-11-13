// js/sales_sources.js
document.addEventListener("DOMContentLoaded", () => {
  const yearSelect = document.getElementById("ss_year");
  const monthSelect = document.getElementById("ss_month");
  const addRowBtn = document.getElementById("addRowBtn");
  const presetSource = document.getElementById("presetSource");
  const presetAmount = document.getElementById("presetAmount");
  const sourcesBody = document.getElementById("sourcesBody");
  const liveTotalEl = document.getElementById("liveTotal");
  const saveBtn = document.getElementById("saveSourcesBtn");
  const saveStatus = document.getElementById("saveStatus");

  // Populate years (2020..current)
  const currentYear = new Date().getFullYear();
  for (let y = currentYear; y >= 2020; y--) {
    const opt = document.createElement("option");
    opt.value = y;
    opt.textContent = y;
    yearSelect.appendChild(opt);
  }

  // helper: create row
  function createRow(source = "", amount = "") {
    const tr = document.createElement("tr");

    const tdSource = document.createElement("td");
    const srcInput = document.createElement("input");
    srcInput.type = "text";
    srcInput.value = source;
    srcInput.placeholder = "Source name";
    srcInput.className = "src-input";
    srcInput.required = true;
    tdSource.appendChild(srcInput);

    const tdAmount = document.createElement("td");
    const amtInput = document.createElement("input");
    amtInput.type = "number";
    amtInput.min = "0";
    amtInput.value = amount !== "" ? Number(amount) : "";
    amtInput.placeholder = "0";
    amtInput.className = "amt-input";
    tdAmount.appendChild(amtInput);

    const tdAction = document.createElement("td");
    const removeBtn = document.createElement("button");
    removeBtn.type = "button";
    removeBtn.textContent = "Remove";
    removeBtn.className = "remove-btn";
    removeBtn.addEventListener("click", () => {
      tr.remove();
      recalcTotal();
    });
    tdAction.appendChild(removeBtn);

    tr.appendChild(tdSource);
    tr.appendChild(tdAmount);
    tr.appendChild(tdAction);

    // recalc when amount or source changes
    amtInput.addEventListener("input", recalcTotal);
    srcInput.addEventListener("input", recalcTotal);

    return tr;
  }

  // Add default first row
  sourcesBody.appendChild(createRow("Outlet", ""));

  // Add row button behavior
  addRowBtn.addEventListener("click", () => {
    let sourceValue = presetSource.value;
    if (sourceValue === "Custom") {
      sourceValue = ""; // empty for user to type
    }

    const amountValue = presetAmount.value || "";
    const newRow = createRow(sourceValue, amountValue);
    sourcesBody.appendChild(newRow);
    // clear preset amount
    presetAmount.value = "";
    recalcTotal();
  });

  // Recalculate total
  function recalcTotal() {
    let total = 0;
    const amtInputs = sourcesBody.querySelectorAll(".amt-input");
    amtInputs.forEach((i) => {
      const v = parseFloat(i.value);
      if (!Number.isNaN(v)) total += v;
    });
    liveTotalEl.textContent = "Rs " + total.toLocaleString();
    return total;
  }

  // Collect form data
  function collectData() {
    const year = parseInt(yearSelect.value, 10);
    const month = parseInt(monthSelect.value, 10);
    const rows = [];
    const trRows = sourcesBody.querySelectorAll("tr");
    trRows.forEach((tr) => {
      const src = tr.querySelector(".src-input").value.trim();
      const amtRaw = tr.querySelector(".amt-input").value;
      const amt = amtRaw === "" ? 0 : parseFloat(amtRaw);
      if (src === "" && (amt === 0 || Number.isNaN(amt))) return; // skip empty
      rows.push({ source: src, amount: amt });
    });
    return { year, month, rows };
  }

  // AJAX save
  saveBtn.addEventListener("click", async () => {
    saveStatus.textContent = "Saving...";
    const payload = collectData();
    if (!payload.rows.length) {
      saveStatus.textContent = "Add at least one source row with amount.";
      return;
    }

    try {
      const res = await fetch("testing/save_sales_sources.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
      });

      const data = await res.json();
      if (res.ok && data.success) {
        saveStatus.textContent = "Saved ✓ (Sales total updated)";
        // Optionally reset or leave rows — we keep them
        recalcTotal();
      } else {
        saveStatus.textContent = "Error: " + (data.message || "Unknown error");
      }
    } catch (err) {
      console.error(err);
      saveStatus.textContent = "Network or server error.";
    }

    setTimeout(() => (saveStatus.textContent = ""), 4000);
  });

  // initial total calc
  recalcTotal();
});
