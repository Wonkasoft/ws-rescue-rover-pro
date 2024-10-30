(function ($) {
  "use strict";

  // Ensure the code runs after the window has fully loaded
  $(window).on("load", function () {
    // Function to copy text from input to clipboard
    function copyToClipboard(elementId) {
      var copyText = document.getElementById(elementId);
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
      document.execCommand("copy");
    }

    document.addEventListener("DOMContentLoaded", function () {
      // Attach event listeners to each copy button
      const copyButtons = [
        {
          buttonId: "copy-button-dog-shortcode1",
          inputId: "copy-dog-shortcode1",
        },
        {
          buttonId: "copy-button-dog-shortcode2",
          inputId: "copy-dog-shortcode2",
        },
        {
          buttonId: "copy-button-dog-shortcode3",
          inputId: "copy-dog-shortcode3",
        },
        {
          buttonId: "copy-button-dog-shortcode4",
          inputId: "copy-dog-shortcode4",
        },
      ];

      copyButtons.forEach(({ buttonId, inputId }) => {
        const button = document.getElementById(buttonId);
        if (button) {
          // Check if the button exists
          button.onclick = function () {
            copyToClipboard(inputId);
          };
        }
      });
    });

    // Function to copy text to clipboard
    function copyToClipboard(elementId) {
      const copyText = document.getElementById(elementId);
      if (copyText) {
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
        alert(`Copied: ${copyText.value}`); // Optional: Feedback to user
      } else {
        console.error(`Element with ID ${elementId} not found.`);
      }
    }
  });

  document.addEventListener("DOMContentLoaded", function () {
    const tableBody = document.querySelector("#dogTable tbody");
    const pagination = document.getElementById("pagination");
    const searchInput = document.getElementById("searchInput");
    const rowsPerPage = 15; // Number of rows per page
    let currentPage = 1;

    function sanitizeAndValidateData(data) {
      // Basic validation/sanitization example
      return {
        id: String(data.id || "").replace(/[^\w-]/g, ""),
        archived: data.archived === "Y" ? "Y" : "N",
        name: String(data.name || "").trim(),
        other_names: String(data.other_names || "").trim(),
        profile: String(data.profile || "").trim(),
        status: String(data.status || "").trim(),
        adoption_pending: data.adoption_pending === "Yes" ? "Yes" : "No",
        sex: String(data.sex || "").trim(),
        video: String(data.video || "").trim(),
        video_URL: String(data.video_URL || "").trim(),
        category: String(data.category || "").trim(),
        foster_needed: data.foster_needed ? "Yes" : "No",
        sponsored_by: String(data.sponsored_by || "").trim(),
        short_desc: sanitizeHTML(String(data.short_desc || "")),
        long_desc: sanitizeHTML(String(data.long_desc || "")),
        date_adopted: formatDate(data.date_adopted),
        priBreed: String(data.priBreed || "").trim(),
        secBreed: String(data.secBreed || "").trim(),
        age: Number(data.age || 0),
        okwithdogs: data.okwithdogs === "Yes" ? "Yes" : "No",
        okwithcats: data.okwithcats === "Yes" ? "Yes" : "No",
        okwithkids: data.okwithkids === "Yes" ? "Yes" : "No",
        housebroken: data.housebroken === "Yes" ? "Yes" : "No",
        specialNeeds: data.specialNeeds ? "Yes" : "No",
        size: String(data.size || "").trim(),
        shots: data.shots ? "Up-to-date" : "Not updated",
        color: String(data.color || "").trim(),
        coatLength: String(data.coatLength || "").trim(),
        microchip: sanitizeNumber(data.microchip),
        // Any other fields as needed...
      };
    }

    // Sanitize HTML to prevent XSS
    function sanitizeHTML(input) {
      const doc = new DOMParser().parseFromString(input, "text/html");
      return doc.body.textContent || "";
    }

    // Format date to ensure a standard format
    function formatDate(inputDate) {
      const date = new Date(inputDate);
      return isNaN(date.getTime()) ? null : date.toISOString().split("T")[0];
    }

    // Ensure microchip and other numerical values are safely formatted
    function sanitizeNumber(input) {
      return String(input).replace(/[^\d]/g, "");
    }

    window.handleViewDetails = function (button) {
      try {
        const encodedData = button.getAttribute("data-dog"); // Get escaped JSON string
        console.log(encodedData);
        // Assuming jsonString is the stored JSON string retrieved from the database
        const retrievedData = JSON.parse(encodedData);
        console.log(retrievedData);
        // Re-sanitize any HTML content (e.g., long_desc) before rendering in the UI
        retrievedData.long_desc = sanitizeHTML(retrievedData.long_desc);
        retrievedData.short_desc = sanitizeHTML(retrievedData.short_desc);

        // retrievedData is now safe to use in the application
        const dog = retrievedData; // Parse JSON safely
        const detailsContent = document.getElementById("dog-details-content");
        detailsContent.innerHTML = `
            <p><strong>ID:</strong> ${dog.id}</p>
            <p><strong>Name:</strong> ${dog.name}</p>
            <p><strong>Status:</strong> ${dog.status}</p>
            <p><strong>Age:</strong> ${dog.age}</p>
            <p><strong>Location:</strong> ${dog.location}</p>
            <p><strong>Microchip:</strong> ${dog.microchip}</p>
        `;
      } catch (error) {
        console.error("Failed to populate dog details:", error);
      }
    };

    // Render the table rows
    function renderTableRows(data) {
      const tableBody = document.querySelector("#dogTable tbody");
      tableBody.innerHTML = ""; // Clear the table
      data.forEach((dog) => {
        // Sanitize and validate the original data
        const sanitizedData = sanitizeAndValidateData(dog);

        // Convert to JSON string for database storage
        const sanitizedDog = JSON.stringify(sanitizedData);
        const row = document.createElement("tr");
        row.innerHTML = `
                <td>${dog.id}</td>
                <td>${dog.name}</td>
                <td>${dog.status}</td>
                <td>${dog.age}</td>
                <td>${dog.location}</td>
                <td>${dog.microchip}</td>
                <td>
                     <button 
                    class="btn btn-primary btn-sm" 
                    data-bs-toggle="tab" 
                    data-bs-target="#details" 
                    data-dog='${sanitizedDog}' 
                    onclick="handleViewDetails(this)">
                    View Details
                </button>
                </td>
            `;
        tableBody.appendChild(row);
      });
    }

    // Setup pagination
    function setupPagination(data) {
      pagination.innerHTML = ""; // Clear pagination
      const totalPages = Math.ceil(data.length / rowsPerPage);

      let startPage = Math.max(1, currentPage - 2);
      let endPage = Math.min(totalPages, currentPage + 2);

      if (currentPage <= 3) {
        endPage = Math.min(5, totalPages); // Show first 5 pages if near start
      } else if (currentPage >= totalPages - 2) {
        startPage = Math.max(totalPages - 4, 1); // Show last 5 pages if near end
      }

      // Previous button
      pagination.appendChild(
        createPageItem("Previous", currentPage - 1, currentPage <= 1, data),
      );

      // Pages with ellipsis if necessary
      if (startPage > 1) {
        pagination.appendChild(createPageItem(1, 1, false, data)); // First page
        if (startPage > 2) pagination.appendChild(createEllipsis()); // Ellipsis
      }

      for (let i = startPage; i <= endPage; i++) {
        pagination.appendChild(createPageItem(i, i, i === currentPage, data));
      }

      if (endPage < totalPages) {
        if (endPage < totalPages - 1) pagination.appendChild(createEllipsis()); // Ellipsis
        pagination.appendChild(
          createPageItem(totalPages, totalPages, false, data),
        ); // Last page
      }

      // Next button
      pagination.appendChild(
        createPageItem(
          "Next",
          currentPage + 1,
          currentPage >= totalPages,
          data,
        ),
      );
    }

    // Create a pagination item
    function createPageItem(text, page, disabled = false, data) {
      const li = document.createElement("li");
      li.className = `page-item ${disabled ? "disabled" : ""} ${page === currentPage ? "active" : ""}`;
      li.innerHTML = `<a class="page-link" href="#">${text}</a>`;
      li.addEventListener("click", function (e) {
        e.preventDefault();
        if (!disabled) {
          currentPage = page;
          paginate(data);
        }
      });
      return li;
    }

    // Create an ellipsis item
    function createEllipsis() {
      const li = document.createElement("li");
      li.className = "page-item disabled";
      li.innerHTML = `<span class="page-link">...</span>`;
      return li;
    }

    // Paginate the data and render the rows
    function paginate(data) {
      const start = (currentPage - 1) * rowsPerPage;
      const end = start + rowsPerPage;
      const paginatedData = data.slice(start, end);
      renderTableRows(paginatedData);
      setupPagination(data);
    }

    // Search functionality
    searchInput.addEventListener("input", function () {
      const filter = searchInput.value.toLowerCase();
      const filteredData = dogs.filter(
        (dog) =>
          dog.name.toLowerCase().includes(filter) ||
          dog.status.toLowerCase().includes(filter) ||
          dog.location.toLowerCase().includes(filter),
      );
      currentPage = 1; // Reset to first page
      paginate(filteredData);
    });

    // Initialize with all dogs data
    paginate(dogs);
  });
})(jQuery);
