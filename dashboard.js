function toggleActiveNavLink(element) {
    // Get all nav links
    var navLinks = document.querySelectorAll(".nav-link");
  
    // // Remove the active class from all nav links
    navLinks.forEach(function(navLink) {
      navLink.classList.remove("active");
    });
  
    // // Add the active class to the clicked nav link
    element.classList.add("active");
  }

function logout(){
  confirm("Are you sure you want to log out?")
}