class ForecastForm {
  constructor() {
    this.form = document.getElementById("forecastForm");
    this.monthSelect = document.getElementById("monthSelect");
    this.percentageInput = document.getElementById("percentageInput");
    this.submitBtn = document.getElementById("submitBtn");

    this.init();
  }

  init() {
    this.setupEventListeners();
    this.validateForm(); // Initial validation
  }

  setupEventListeners() {
    // Real-time validation
    this.monthSelect.addEventListener("change", () => {
      this.validateField(this.monthSelect);
      this.validateForm();
    });

    this.percentageInput.addEventListener("input", () => {
      this.validateField(this.percentageInput);
      this.validateForm();
    });

    this.percentageInput.addEventListener("blur", () => {
      this.validateField(this.percentageInput);
    });

    // Form submission
    this.form.addEventListener("submit", (e) => {
      e.preventDefault();
      this.handleSubmit();
    });

    // Format percentage input
    this.percentageInput.addEventListener("input", (e) => {
      this.formatPercentageInput(e.target);
    });
  }

  validateField(field) {
    const formGroup = field.closest(".form-group");
    let isValid = true;

    // Reset classes
    formGroup.classList.remove("error", "success");

    if (field === this.monthSelect) {
      isValid = field.value !== "";
    } else if (field === this.percentageInput) {
      const value = parseFloat(field.value);
      isValid =
        field.value !== "" && !isNaN(value) && value >= 0 && value <= 100;
    }

    if (field.value !== "") {
      formGroup.classList.add(isValid ? "success" : "error");
    }

    return isValid;
  }

  validateForm() {
    const monthValid = this.validateField(this.monthSelect);
    const percentageValid = this.validateField(this.percentageInput);

    const isFormValid =
      monthValid &&
      percentageValid &&
      this.monthSelect.value !== "" &&
      this.percentageInput.value !== "";

    this.submitBtn.disabled = !isFormValid;
  }

  formatPercentageInput(input) {
    let value = input.value;

    // Remove any non-numeric characters except decimal point
    value = value.replace(/[^0-9.]/g, "");

    // Ensure only one decimal point
    const parts = value.split(".");
    if (parts.length > 2) {
      value = parts[0] + "." + parts.slice(1).join("");
    }

    // Limit to 3 decimal places
    if (parts[1] && parts[1].length > 3) {
      value = parseFloat(value).toFixed(3);
    }

    // Ensure value is within range
    const numValue = parseFloat(value);
    if (!isNaN(numValue)) {
      if (numValue > 100) {
        value = "100";
      } else if (numValue < 0) {
        value = "0";
      }
    }

    input.value = value;
  }

  async handleSubmit() {
    if (this.submitBtn.disabled) return;

    // Show loading state
    this.submitBtn.classList.add("loading");
    this.submitBtn.disabled = true;

    try {
      // Simulate API call
      await this.simulateApiCall();

      // Get form data
      const formData = this.getFormData();

      // Success handling
      this.showSuccess();
      console.log("Forecast created:", formData);

      // Reset form after success
      setTimeout(() => {
        this.resetForm();
      }, 2000);
    } catch (error) {
      console.error("Error creating forecast:", error);
      this.showError();
    } finally {
      // Hide loading state
      setTimeout(() => {
        this.submitBtn.classList.remove("loading");
        this.validateForm(); // Re-enable if form is still valid
      }, 1000);
    }
  }

  getFormData() {
    return {
      month: this.monthSelect.value,
      monthName: this.monthSelect.options[this.monthSelect.selectedIndex].text,
      percentage: parseFloat(this.percentageInput.value),
      timestamp: new Date().toISOString(),
    };
  }

  async simulateApiCall() {
    // Simulate API delay
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        // 90% success rate for demo
        if (Math.random() > 0.1) {
          resolve();
        } else {
          reject(new Error("API Error"));
        }
      }, 1500);
    });
  }

  showSuccess() {
    const originalText = this.submitBtn.querySelector(".btn-text").innerHTML;
    this.submitBtn.querySelector(".btn-text").innerHTML =
      '<i class="fas fa-check"></i> Forecast Added!';
    this.submitBtn.style.background =
      "linear-gradient(135deg, #27ae60, #2ecc71)";
  }

  showError() {
    const originalText = this.submitBtn.querySelector(".btn-text").innerHTML;
    this.submitBtn.querySelector(".btn-text").innerHTML =
      '<i class="fas fa-exclamation-triangle"></i> Error! Try Again';
    this.submitBtn.style.background =
      "linear-gradient(135deg, #e74c3c, #c0392b)";

    setTimeout(() => {
      this.submitBtn.querySelector(".btn-text").innerHTML =
        '<i class="fas fa-plus"></i> Add Forecast';
      this.submitBtn.style.background = "";
    }, 3000);
  }

  resetForm() {
    this.form.reset();
    document.querySelectorAll(".form-group").forEach((group) => {
      group.classList.remove("error", "success");
    });
    this.submitBtn.querySelector(".btn-text").innerHTML =
      '<i class="fas fa-plus"></i> Add Forecast';
    this.submitBtn.style.background = "";
    this.validateForm();
  }
}

// Initialize form when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new ForecastForm();
});

//Data handling
document.getElementById("submitBtn").addEventListener("click", async () => {
  const month = document.getElementById("monthSelect").value;
  const percentage = document.getElementById("percentageInput").value;

  const response = await fetch("genarate_forcast.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `month=${month}&percentage=${percentage}`,
  });

  const data = await response.json();
  if (data.success) {
    alert("Forecast generated: " + data.forecast);
    // TODO: refresh chart
  }
});
