<link rel="stylesheet" href="assets/css/modal.css">
<link rel="stylesheet" href="assets/css/style.css">


<button id="review-btn" class="btn">Review</button>

<!-- Login modal -->
<div id="login-modal" class="modal">
  <div class="modal-content">
    <h2>Login to Continue</h2>
    <p>You must be logged in to write a review.</p>
    <button class="btn"id="login-btn">Login</button>
  </div>
</div>


<script>
 // Get the review button and login modal
const reviewBtn = document.getElementById("review-btn");
const loginModal = document.getElementById("login-modal");
const loginBtn = document.getElementById("login-btn");

// When the user clicks the review button, show the login modal
reviewBtn.addEventListener("click", () => {
  // Check if user is logged in first, if not show login modal
  if (!isLoggedIn()) {
    loginModal.style.display = "block";
  } else {
    // User is already logged in, do review logic here
    // ...
  }
});

// When the user clicks the login button, hide the login modal and redirect to login page
loginBtn.addEventListener("click", () => {
  loginModal.style.display = "none";
  window.location.href = "{{ route('login') }}";
});

// When the user clicks anywhere outside the modal, hide the login modal
window.addEventListener("click", (event) => {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  }
});

// Check if user is logged in (replace with your own logic)
function isLoggedIn() {
  // return true if user is logged in, false otherwise
  // ...
}
</script>