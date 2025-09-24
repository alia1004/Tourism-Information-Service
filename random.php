<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <style>
    /* Basic page styling */
    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    /* Button styling */
    #openFormBtn {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
    }

    /* Modal styling */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    /* Form container styling */
    .modal-content {
      background-color: white;
      padding: 20px;
      border-radius: 5px;
      width: 400px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Close button styling */
    .closeBtn {
      color: #aaa;
      float: right;
      font-size: 24px;
      font-weight: bold;
      cursor: pointer;
    }

    /* Input and button styling inside the form */
    .modal-content input {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    .modal-content button {
      width: 100%;
      padding: 10px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
  </style>
</head>
<body>

<!-- Button to open the form -->
<button id="openFormBtn">Sign Up</button>

<!-- The Modal -->
<div id="signUpModal" class="modal">
  <div class="modal-content">
    <span class="closeBtn">&times;</span>
    <h2>Sign Up</h2>
    <form>
      <input type="text" placeholder="Username" required>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <button type="submit">Sign Up</button>
    </form>
  </div>
</div>

<script>
  // Get elements
  const modal = document.getElementById("signUpModal");
  const openFormBtn = document.getElementById("openFormBtn");
  const closeBtn = document.querySelector(".closeBtn");

  // Open modal on button click
  openFormBtn.onclick = () => {
    modal.style.display = "flex";
  };

  // Close modal when 'x' is clicked
  closeBtn.onclick = () => {
    modal.style.display = "none";
  };

  // Close modal when clicking outside of modal content
  window.onclick = (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
</script>

</body>
</html>
