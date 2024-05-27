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


  document.getElementById('clickableSection').addEventListener('click', function(event) {
    event.preventDefault();
    const entriesSection = document.getElementById('entriesSection');
    entriesSection.classList.toggle('hidden');
    if (!entriesSection.classList.contains('hidden')) {
        displayRatings();
    }
});

const ratings = [5, 4, 3, 5, 4.5];  // Example ratings
const starIcons = {
    full: '<i class="fas fa-star text-yellow-500"></i>',
    half: '<i class="fas fa-star-half-alt text-yellow-500"></i>',
    empty: '<i class="far fa-star text-yellow-500"></i>'
};

function displayRatings() {
    const ratingsList = document.getElementById('ratingsList');
    ratingsList.innerHTML = '';
    let totalRating = 0;
    ratings.forEach(rating => {
        totalRating += rating;
        const ratingElement = document.createElement('div');
        ratingElement.className = 'flex items-center mb-2';
        ratingElement.innerHTML = generateStars(rating) + `<span class="ml-2 text-gray-600">(${rating})</span>`;
        ratingsList.appendChild(ratingElement);
    });
    const averageRating = (totalRating / ratings.length).toFixed(1);
    document.getElementById('averageRating').innerText = averageRating;
}

function generateStars(rating) {
    const fullStars = Math.floor(rating);
    const halfStar = rating % 1 !== 0;
    const emptyStars = 5 - fullStars - (halfStar ? 1 : 0);
    return starIcons.full.repeat(fullStars) +
           (halfStar ? starIcons.half : '') +
           starIcons.empty.repeat(emptyStars);
}