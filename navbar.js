function showDropDown() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function hideDropDown(e) {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Function to hide the dropdown
function hideDropDown2(e) {
    // Your hideDropDown function code here
    // For example, if your function hides a dropdown with an ID "myDropdown":
    document.getElementsByClassName("dropdown-content").classList.display = "none";
  }
  
  // Function to handle screen width changes
  function handleScreenWidthChange() {
    const screenWidth = window.innerWidth;
  
    if (screenWidth > 630) {
      // Call the hideDropDown function when screen width changes
      hideDropDown2();
    }
  }
  
  // Add an event listener to detect screen width changes
  window.addEventListener("resize", handleScreenWidthChange);
  