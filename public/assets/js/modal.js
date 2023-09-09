$(document).ready(function(){
    const reviewBtn = document.getElementById("review-btn");
    const loginModal = document.getElementById("login-modal");
    const loginBtn = document.getElementById("login-btn");
    const closeBtn = document.querySelector(".close-btn");
    
    
    // When the user clicks the review button, show the login modal
    reviewBtn.addEventListener("click", (event) => {
      // Check if user is logged in first, if not show login modal
      if (!isLoggedIn()) {
        loginModal.style.display = "block";
        // Block form submission
        event.preventDefault();
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
    
    // When the user clicks the close button, hide the login modal
    closeBtn.addEventListener("click", () => {
      loginModal.style.display = "none";
    });
    
    // When the user clicks anywhere outside the modal, hide the login modal
    window.addEventListener("click", (event) => {
      if (event.target == loginModal && loginModal.style.display === "block") {
        loginModal.style.display = "none";
      }
    });
    
    // Check if user is logged in (replace with your own logic)
    function isLoggedIn() {
      // Send an AJAX request to the server to check if user is logged in
      // Return true if user is logged in, false otherwise
      let loggedIn = false;
    
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    
      $.ajax({
        type: "POST",
        url: "/check-login",
        async: false,
        success: function (response) {
          if (response.loggedIn) {
            loggedIn = true;
          }
        },
        error: function () {
          console.log("Error occurred while checking login status.");
        },
      });
    
      return loggedIn;
    }
    });
    
    $(document).ready(function(){
        const addToCartBtn = document.querySelector(".add-to-cart");
        const loginModal2 = document.getElementById("login-modal2");
        const loginBtn2 = document.getElementById("login-btn2");
        const closeBtn2 = document.querySelector(".close-btn2");
        
        
        // When the user clicks the review button, show the login modal
        addToCartBtn.addEventListener("click", (event) => {
          
          // Check if user is logged in first, if not show login modal
          if (!isLoggedIn()) {
            loginModal2.style.display = "block";
            // Block form submission
            event.preventDefault();
          } else {
            // User is already logged in, do review logic here
            // ...
          }
        });
        
        // When the user clicks the login button, hide the login modal and redirect to login page
        loginBtn2.addEventListener("click", () => {
          loginModal2.style.display = "none";
          window.location.href = "http://127.0.0.1:8000/login";
        });
        
        // When the user clicks the close button, hide the login modal
        closeBtn2.addEventListener("click", () => {
          loginModal2.style.display = "none";
        });
        
        // When the user clicks anywhere outside the modal, hide the login modal
        window.addEventListener("click", (event) => {
          if (event.target == loginModal2 && loginModal2.style.display === "block") {
            loginModal2.style.display = "none";
          }
        });
        
        // Check if user is logged in (replace with your own logic)
        function isLoggedIn() {
          // Send an AJAX request to the server to check if user is logged in
          // Return true if user is logged in, false otherwise
          let loggedIn = false;
        
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
          $.ajax({
            type: "POST",
            url: "/check-login",
            async: false,
            success: function (response) {
              if (response.loggedIn) {
                loggedIn = true;
              }
            },
            error: function () {
              console.log("Error occurred while checking login status.");
            },
          });
        
          return loggedIn;
        }
        });



          


  


