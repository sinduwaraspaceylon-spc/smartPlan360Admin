<style>
  /* css/sales_sources.css */
  .sources-card {
    max-width: 900px;
    margin: 20px auto;
    background: #fff;
    padding: 18px;
    border-radius: 8px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    font-family: system-ui, Arial, sans-serif;
  }
  .sources-card h2 {
    margin-bottom: 12px;
    color: #223;
  }
  .row {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-bottom: 12px;
  }
  .row label {
    width: 60px;
  }
  #ss_year,
  #ss_month {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ddd;
  }
  .sources-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 12px;
  }
  .sources-table th,
  .sources-table td {
    border: 1px solid #eee;
    padding: 8px;
    text-align: left;
  }
  .add-row {
    display: flex;
    gap: 8px;
    align-items: center;
    margin-bottom: 10px;
  }
  .add-row input,
  .add-row select {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ddd;
  }
  .add-row button {
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
  }
  .total-preview {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    align-items: center;
    margin-bottom: 12px;
    font-size: 16px;
  }
  .actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .btn-primary {
    background: #2f6fed;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
  }
  .save-status {
    margin-left: 10px;
    color: #666;
    font-size: 14px;
  }
  .remove-btn {
    background: #f44336;
    color: white;
    border: none;
    padding: 6px 8px;
    border-radius: 6px;
    cursor: pointer;
  }
</style>
<div class="sources-card">
  <h2>Add Sales By Source</h2>

  <div class="row">
    <label>Year</label>
    <select id="ss_year"></select>

    <label>Month</label>
    <select id="ss_month">
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
  </div>

  <div id="sources-table-wrapper">
    <table id="sourcesTable" class="sources-table">
      <thead>
        <tr>
          <th style="width: 50%">Source</th>
          <th style="width: 35%">Amount (Rs)</th>
          <th style="width: 15%">Action</th>
        </tr>
      </thead>
      <tbody id="sourcesBody">
        <!-- rows appended here -->
      </tbody>
    </table>

    <div class="add-row">
      <select id="presetSource">
  <option value="Outlet">Outlet</option>
  <option value="Online">Online</option>
  <option value="Export">Export</option>
  <option value="BIA">BIA</option>
  <option value="Hotels">Hotels</option>
  <option value="Custom">-- Custom --</option>
</select>

      <input id="presetAmount" type="number" min="0" placeholder="Amount" />
      <button id="addRowBtn">Add Row</button>
    </div>

    <div class="total-preview">
      <span>Total this month:</span>
      <strong id="liveTotal">Rs 0</strong>
    </div>

    <div class="actions">
      <button id="saveSourcesBtn" class="btn btn-primary">Save Sources</button>
      <span id="saveStatus" class="save-status"></span>
    </div>
  </div>
</div>

<script src="js/sales_sources.js"></script>
