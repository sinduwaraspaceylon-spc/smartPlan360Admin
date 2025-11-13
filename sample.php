<!DOCTYPE html>
<html>
<head>
  <title>Modular Page</title>
  <script>
    function loadModule(moduleName) {
      fetch("modules/" + moduleName + ".php")
        .then(response => response.text())
        .then(html => {
          document.getElementById("content-area").innerHTML = html;
        })
        .catch(err => console.error("Error loading module:", err));
    }
  </script>
</head>
<body>
  <div class="menu">
    <button onclick="loadModule('dashboard')">Dashboard</button>
    <button onclick="loadModule('sales')">Sales</button>
    <button onclick="loadModule('inventory')">Inventory</button>
  </div>

  <div id="content-area">
    <!-- Default content -->
    <h2>Welcome</h2>
  </div>
</body>
</html>
