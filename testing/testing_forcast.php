<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Sales Forecast Generator</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f7fb;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .forecast-container {
      background: #fff;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      width: 360px;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #333;
    }
    button {
      width: 100%;
      padding: 14px;
      background: #0078ff;
      color: #fff;
      font-size: 17px;
      border: none;
      border-radius: 8px;
      margin-top: 20px;
      cursor: pointer;
      transition: background 0.3s;
    }
    button:hover {
      background: #005fcc;
    }
    .message {
      margin-top: 20px;
      font-weight: 600;
      font-size: 15px;
    }
    .info {
      margin-bottom: 15px;
      font-size: 14px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="forecast-container">
    <h2>📈 Generate Sales Forecast</h2>

    <div class="info" id="currentMonthInfo"></div>

    <button id="generateBtn">Generate Forecast</button>

    <div class="message" id="message"></div>
  </div>

  <script>
    const generateBtn = document.getElementById("generateBtn");
    const messageDiv = document.getElementById("message");
    const currentMonthInfo = document.getElementById("currentMonthInfo");

    // ✅ Show current month automatically
    const now = new Date();
    const currentMonth = now.getMonth() + 1;
    const monthNames = [
      "January","February","March","April","May","June",
      "July","August","September","October","November","December"
    ];
    const monthName = monthNames[currentMonth - 1];
    const year = now.getFullYear();
    currentMonthInfo.textContent = `Forecast will be generated starting from: ${monthName} ${year}`;

    // ✅ Button click → call PHP forecast generator
    generateBtn.addEventListener("click", async () => {
      messageDiv.textContent = "⏳ Generating forecast...";
      messageDiv.style.color = "#333";

      try {
        const response = await fetch("genarate_logics.php", {
          method: "POST"
        });

        const result = await response.text();
        messageDiv.textContent = result.trim();
        messageDiv.style.color = result.includes("SUCCESS") ? "green" : "red";
      } catch (error) {
        messageDiv.textContent = "❌ Error: Could not connect to server.";
        messageDiv.style.color = "red";
      }
    });
  </script>
</body>
</html>
