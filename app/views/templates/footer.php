<script>
  document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector("nav button[aria-controls='mobile-menu']");
    const mobileMenu = document.getElementById("mobile-menu");
    const icons = menuButton.querySelectorAll("svg");

    menuButton.addEventListener("click", function() {
      const isExpanded = menuButton.getAttribute("aria-expanded") === "true";
      menuButton.setAttribute("aria-expanded", String(!isExpanded));

      // Toggle menu visibility
      mobileMenu.classList.toggle("hidden");

      // Toggle icons
      icons.forEach(icon => icon.classList.toggle("hidden"));
    });

    // Hide menu by default
    mobileMenu.classList.add("hidden");
  });

  const menuLogout = document.getElementById('menu-logout');
  const buttonProfile = document.getElementById('button-profile')
  buttonProfile.addEventListener('click', (e) => {
    menuLogout.classList.toggle('hidden');
    buttonProfile.classList.toggle('ring-2');
    buttonProfile.classList.toggle('ring-white');
    buttonProfile.classList.toggle('ring-offset-gray-800');
    buttonProfile.classList.toggle('ring-offset-2');
  })
</script>


</body>

</html>