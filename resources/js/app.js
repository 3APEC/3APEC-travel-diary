import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function() {
    const profileButton = document.getElementById('user-menu-button');
    const profileDropdown = document.getElementById('profile-dropdown');
  
    profileButton.addEventListener('click', function(event) {
        event.stopPropagation();
        profileDropdown.classList.toggle('hidden');
        console.log('Profile button clicked.');  // Debugging log
    });
  
    // Close the dropdown if clicked outside
    window.addEventListener('click', function(e) {
        if (!profileButton.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.add('hidden');
            console.log('Clicked outside.');  // Debugging log
        }
    });
  });