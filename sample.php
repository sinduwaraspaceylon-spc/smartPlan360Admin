<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Demand Planner - Template</title>
  <style>
    :root{--accent:#11213b;--muted:#f3f6f9;--card:#ffffff;--border:#e6e9ee}
    body{font-family:Inter,Segoe UI,Roboto,Arial,sans-serif;background:#f6f8fb;margin:24px;color:#1f2937}
    .container{max-width:1200px;margin:0 auto}

    /* Header area */
    .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px}
    .header-left{display:flex;gap:12px;align-items:center}
    .logo{display:flex;gap:12px;align-items:center}
    .logo img{height:46px;border-radius:6px}
    h1{font-size:22px;margin:0}

    /* Filters row */
    .filters{display:flex;gap:12px;padding:14px;background:var(--card);border-radius:10px;border:1px solid var(--border);align-items:center}
    .filters input[type=text]{flex:1;padding:10px 12px;border-radius:8px;border:1px solid var(--border)}
    .filters select{padding:10px 12px;border-radius:8px;border:1px solid var(--border);background:white}

    /* Tabs */
    .tabs{display:flex;margin-top:16px}
    .tab-btn{padding:10px 16px;border-radius:8px;border:1px solid var(--border);background:white;cursor:pointer}
    .tab-btn.active{background:linear-gradient(180deg,#fff,#f1f6ff);border:1px solid #cfe0ff;color:var(--accent)}

    /* Table card */
    .card{margin-top:12px;background:var(--card);border-radius:10px;border:1px solid var(--border);overflow:hidden}
    .card .controls{display:flex;align-items:center;gap:8px;padding:12px;border-bottom:1px solid var(--border)}
    .card .controls .btn{padding:8px 12px;border-radius:8px;border:1px solid var(--border);background:white;cursor:pointer}
    .card .controls .btn.primary{background:var(--accent);color:white;border:0}

    /* Table wrapper - horizontal scroll for months */
    .table-wrapper{overflow:auto;max-height:520px}
    table{border-collapse:collapse;width:max-content;min-width:100%;font-size:14px}
    thead th{position:sticky;top:0;background:var(--accent);color:#fff;padding:12px 14px;z-index:4;border-bottom:1px solid rgba(255,255,255,0.06)}

    /* Make first column sticky */
    th.sticky-left, td.sticky-left{position:sticky;left:0;background:#fff;z-index:3;border-right:1px solid var(--border);text-align:left}
    thead th.sticky-left{background:var(--accent);color:#fff}

    td, th{padding:12px 16px;border-bottom:1px solid var(--border);text-align:center}
    tr.row-item td{background:#fbfdff}

    /* SKU badge */
    .sku{display:inline-block;padding:4px 8px;border-radius:6px;background:#e8f0ff;color:#254e9b;font-weight:600;margin-right:10px;font-size:12px}

    /* input inside cells */
    .cell-input{width:72px;padding:6px;border-radius:6px;border:1px solid var(--border);text-align:center}

    /* checkbox column */
    .chk-col{width:56px}

    /* small screens responsiveness */
    @media (max-width:720px){.filters{flex-direction:column;align-items:stretch}.tabs{flex-wrap:wrap}}

    /* Hover and controls */
    .row-actions{color:#ef4444;cursor:pointer;padding-left:8px}

    /* Footer note */
    .note{font-size:13px;color:#6b7280;margin-top:10px}

    /* Make month headers narrower so 4 show by default on medium screens (approx) */
    .month-col{min-width:120px}
  </style>
</head>
<body>
  <div class="container">

    <div class="header">
      <div class="header-left">
        <div class="logo"><img src="/mnt/data/30d424ae-ac6c-4d8e-b901-402fe829aed3.png" alt="screenshot"/></div>
        <div>
          <h1>Add Demand</h1>
          <div style="color:#6b7280;font-size:13px">Search products, add them to the table and fill monthly percentages</div>
        </div>
      </div>

      <div>
        <button class="btn primary" onclick="saveData()">Submit</button>
      </div>
    </div>

    <div class="filters">
      <input id="searchBox" type="text" placeholder="Search product or type SKU and press Enter..." />
      <select id="brandFilter"><option value="">All Brands</option></select>
      <select id="deptFilter"><option value="">All Departments</option></select>
      <select id="rangeFilter"><option value="">All Ranges</option></select>
      <select id="catFilter"><option value="">All Categories</option></select>
    </div>

    <div class="tabs">
      <button class="tab-btn active" data-tab="products">Products</button>
      <button class="tab-btn" data-tab="departments">Departments</button>
      <button class="tab-btn" data-tab="categories">Categories</button>
    </div>

    <div class="card">
      <div class="controls">
        <button class="btn" id="addRowBtn">Add Item</button>
        <button class="btn" id="deleteSelectedBtn">Delete Selected</button>
        <div style="flex:1"></div>
        <div style="font-size:13px;color:#6b7280">Showing 12 months — horizontally scroll to view more</div>
      </div>

      <div class="table-wrapper">
        <table id="demandTable">
          <thead id="tableHead"></thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>
    </div>

    <div class="note">Tip: You can edit a cell value, use the checkbox to select rows and press "Delete Selected". The top row (month labels) stays visible while you scroll vertically.</div>

  </div>

  <script>
    /* --------- Sample data --------- */
    const sampleProducts = [
      {sku:'SKU001', name:'Product Name Example'},
      {sku:'SKU002', name:'Another Product Name'},
      {sku:'SKU003', name:'Third Product Here'},
      {sku:'SKU004', name:'Sample Product Four'},
    ];

    // Keep items in three separate lists (tabs)
    const store = {
      products:[],
      departments:[],
      categories:[]
    };

    // active tab
    let activeTab = 'products';

    // months generation - 12 months starting from current month
    const monthNames = (()=>{
      const names = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      const now = new Date();
      const start = now.getMonth();
      const out = [];
      for(let i=0;i<12;i++){ out.push(names[(start+i)%12]); }
      return out;
    })();

    /* --------- Render table head (sticky months) --------- */
    function renderHeader(){
      const thead = document.getElementById('tableHead');
      let html = '<tr>';
      html += '<th class="sticky-left chk-col"><input id="selectAll" type="checkbox"/></th>';
      html += '<th class="sticky-left">Selected '+(activeTab==='products'?'Products':(activeTab==='departments'?'Departments':'Categories'))+'</th>';
      monthNames.forEach(m=>{ html += `<th class="month-col">${m}</th>` });
      html += '</tr>';
      thead.innerHTML = html;

      document.getElementById('selectAll').addEventListener('change',function(e){
        document.querySelectorAll('.row-check').forEach(cb=>cb.checked = e.target.checked);
      });
    }

    /* --------- Render body rows --------- */
    function renderBody(){
      const tbody = document.getElementById('tableBody');
      const list = store[activeTab];
      let html = '';

      list.forEach((it, idx)=>{
        html += `<tr class="row-item" data-index="${idx}">`;
        html += `<td class="sticky-left chk-col"><input class="row-check" data-index="${idx}" type="checkbox"/></td>`;

        // left column content
        html += `<td class="sticky-left"><div>`;
        if(activeTab==='products') html += `<span class="sku">${it.sku}</span>`;
        html += `<strong>${escapeHtml(it.name)}</strong>`;
        html += ` <span class="row-actions" onclick="removeRow(${idx})">&times;</span>`;
        html += `</div></td>`;

        // month cells with inputs
        for(let m=0;m<12;m++){
          const val = (it.months && it.months[m] != null) ? it.months[m] : 0;
          html += `<td><input type="number" min="0" max="100" class="cell-input" value="${val}" onchange="updateCell(${idx},${m},this.value)"/></td>`;
        }

        html += `</tr>`;
      });

      tbody.innerHTML = html;
    }

    function escapeHtml(s){ return (s+'').replace(/[&<>"']/g, c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;','\'':'&#39;'})[c]); }

    function updateCell(row,month,value){
      const parsed = Number(value) || 0;
      store[activeTab][row].months[month] = parsed;
    }

    function removeRow(index){
      if(!confirm('Remove this item?')) return;
      store[activeTab].splice(index,1);
      renderHeader(); renderBody();
    }

    /* Add a new item (product/department/category) */
    document.getElementById('addRowBtn').addEventListener('click',()=>{
      const name = prompt('Enter '+(activeTab==='products'?'Product name':'Item name')+' (for product you can also provide SKU like SKU123 - Product name)');
      if(!name) return;

      if(activeTab==='products'){
        // Try splitting SKU and name if user provides SKU - Name
        let sku=''; let pname = name;
        const match = name.match(/^(\S+)\s*-\s*(.+)$/);
        if(match){ sku = match[1]; pname = match[2]; }
        if(!sku){ sku = 'SKU'+String(Math.floor(Math.random()*9000)+1000); }
        store.products.push({sku:sku,name:pname,months:new Array(12).fill(0)});
      } else {
        store[activeTab].push({name:name,months:new Array(12).fill(0)});
      }
      renderHeader(); renderBody();
    });

    /* Delete selected */
    document.getElementById('deleteSelectedBtn').addEventListener('click',()=>{
      const checks = Array.from(document.querySelectorAll('.row-check')).filter(c=>c.checked);
      if(checks.length===0){ alert('No rows selected'); return; }
      if(!confirm('Delete '+checks.length+' selected rows?')) return;

      // remove by indexes descending
      const indexes = checks.map(c=>Number(c.getAttribute('data-index'))).sort((a,b)=>b-a);
      indexes.forEach(i=>store[activeTab].splice(i,1));
      renderHeader(); renderBody();
    });

    /* Search box: when Enter pressed, try find product in sample list, else create new product */
    document.getElementById('searchBox').addEventListener('keydown',function(e){
      if(e.key==='Enter'){
        const t = this.value.trim(); if(!t) return;
        // try find product by name or SKU
        const found = sampleProducts.find(p=>p.sku.toLowerCase()===t.toLowerCase() || p.name.toLowerCase().includes(t.toLowerCase()));
        if(found){ addProduct(found); this.value=''; return; }
        // else create new product entry (if on products tab)
        if(activeTab==='products'){
          const skuGuess = t.split(' ')[0];
          store.products.push({sku:skuGuess,name:t,months:new Array(12).fill(0)});
          renderHeader(); renderBody(); this.value='';
        } else {
          store[activeTab].push({name:t,months:new Array(12).fill(0)}); renderHeader(); renderBody(); this.value='';
        }
      }
    });

    function addProduct(prod){
      // prevent duplicates by SKU
      if(store.products.some(p=>p.sku===prod.sku)){
        alert('Product already added'); return;
      }
      store.products.push({sku:prod.sku,name:prod.name,months:new Array(12).fill(0)});
      if(activeTab==='products'){ renderHeader(); renderBody(); }
    }

    /* Tab switching */
    document.querySelectorAll('.tab-btn').forEach(btn=>{
      btn.addEventListener('click',()=>{
        document.querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
        btn.classList.add('active');
        activeTab = btn.getAttribute('data-tab');
        renderHeader(); renderBody();
      });
    });

    /* Simple save - just log current state */
    function saveData(){
      const payload = JSON.stringify(store, null, 2);
      console.log('Saving payload', payload);
      alert('Data logged to console (see devtools).');
    }

    // initialize with three sample products
    sampleProducts.slice(0,3).forEach(p=>store.products.push({sku:p.sku,name:p.name,months:new Array(12).fill(0)}));

    // initial render
    renderHeader(); renderBody();
  </script>
</body>
</html>
