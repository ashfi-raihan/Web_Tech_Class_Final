document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
  
    // Create or select the container for the order summary / confirmation
    let confirmationContainer = document.getElementById("order-summary");
    if (!confirmationContainer) {
      confirmationContainer = document.createElement("div");
      confirmationContainer.id = "order-summary";
      confirmationContainer.style.marginTop = "20px";
      form.parentNode.insertBefore(confirmationContainer, form.nextSibling);
    }
  
    // Ensure submit button exists inside the form
    let submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
    if (!submitBtn) {
      submitBtn = document.createElement("input");
      submitBtn.type = "submit";
      submitBtn.value = "Place Order";
      form.appendChild(submitBtn);
    } else {
      submitBtn.value = "Place Order";
    }
  
    form.addEventListener("submit", (event) => {
      event.preventDefault(); // Prevent default page refresh
      clearErrors();
      confirmationContainer.innerHTML = ""; // Clear previous summary
  
      let isValid = true;
  
      // 1. Name Validation
      const fnameInput = document.getElementById("fname");
      if (!fnameInput.value.trim()) {
        showError(fnameInput, "Name cannot be empty.");
        isValid = false;
      }
  
      // 2. Email Validation
      const emailInput = document.getElementById("email");
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailInput.value.trim()) {
        showError(emailInput, "Email cannot be empty.");
        isValid = false;
      } else if (!emailPattern.test(emailInput.value.trim())) {
        showError(emailInput, "Please enter a valid email format.");
        isValid = false;
      }
  
      // 3. Phone Validation
      const phoneInput = document.getElementById("phone");
      if (!phoneInput.value.trim()) {
        showError(phoneInput, "Phone number cannot be empty.");
        isValid = false;
      }
  
      // 4. Student ID Validation
      const sidInput = document.getElementById("sid");
      if (!sidInput.value.trim()) {
        showError(sidInput, "Student ID cannot be empty.");
        isValid = false;
      }
  
      // 5. Gender Validation
      const genderRadios = document.querySelectorAll('input[name="gender"]');
      let genderSelected = false;
      let selectedGenderValue = "";
      genderRadios.forEach((radio) => {
        if (radio.checked) {
          genderSelected = true;
          selectedGenderValue = radio.value;
        }
      });
      if (!genderSelected) {
        showError(genderRadios[genderRadios.length - 1], "Gender must be selected.");
        isValid = false;
      }
  
      // 6. Department Validation
      const deptSelect = document.getElementById("department");
      if (!deptSelect.value) {
        showError(deptSelect, "Department must be selected.");
        isValid = false;
      }
  
      // 7 & 8. Food Selection and Quantity Validation
      const foodCheckboxes = document.querySelectorAll('input[name="food"]:checked');
      const table = document.querySelector("table");
  
      if (foodCheckboxes.length === 0) {
        showError(table, "At least one food item must be selected.");
        isValid = false;
      } else {
        // Validate quantities for all checked items
        foodCheckboxes.forEach((checkbox) => {
          const row = checkbox.closest("tr");
          const qtyInput = row.querySelector('input[type="number"]');
          const qtyValue = parseInt(qtyInput.value, 10);
  
          if (isNaN(qtyValue) || qtyValue <= 0) {
            showError(qtyInput, "Quantity must be greater than 0.");
            isValid = false;
          }
        });
      }
  
      // Stop execution if form is invalid
      if (!isValid) return;
  
      // --- Bill Calculation & Order Summary ---
      let totalBill = 0;
      let selectedItemsHTML = "";
  
      foodCheckboxes.forEach((checkbox) => {
        const row = checkbox.closest("tr");
        const itemName = checkbox.value;
        
        // Extract price integer from cell text (e.g., "$5" -> 5)
        const priceText = row.children[2].textContent.replace("$", "").trim();
        const itemPrice = parseFloat(priceText);
        
        const qtyInput = row.querySelector('input[type="number"]');
        const itemQuantity = parseInt(qtyInput.value, 10);
  
        const itemTotal = itemPrice * itemQuantity;
        totalBill += itemTotal;
  
        selectedItemsHTML += `<li>${itemName} - $${itemPrice} (Qty: ${itemQuantity}) = $${itemTotal}</li>`;
      });
  
      const customerName = fnameInput.value.trim();
      const studentID = sidInput.value.trim();
      const department = deptSelect.options[deptSelect.selectedIndex].text;
  
      // Display Confirmation via DOM Manipulation
      confirmationContainer.innerHTML = `
        <div style="background-color: #e6fffa; border: 1px solid #38b2ac; padding: 20px; border-radius: 8px; color: #234e52;">
          <h3 style="color: #2b6cb0; margin-top: 0;">Order placed successfully!</h3>
          <p><strong>Customer Name:</strong> ${customerName}</p>
          <p><strong>Student ID:</strong> ${studentID}</p>
          <p><strong>Department:</strong> ${department}</p>
          <p><strong>Selected Items:</strong></p>
          <ul>${selectedItemsHTML}</ul>
          <p style="font-size: 1.1rem;"><strong>Total Bill:</strong> $${totalBill}</p>
        </div>
      `;
    });
  
    // Helper function to display validation error text below fields
    function showError(element, message) {
      const errorSpan = document.createElement("span");
      errorSpan.className = "error-text";
      errorSpan.textContent = message;
  
      if (element.tagName === "TABLE" || element.type === "radio") {
        element.parentNode.appendChild(errorSpan);
      } else {
        element.insertAdjacentElement("afterend", errorSpan);
      }
    }
  
    // Helper function to clear previous error messages
    function clearErrors() {
      const errorTexts = document.querySelectorAll(".error-text");
      errorTexts.forEach((el) => el.remove());
    }
  });