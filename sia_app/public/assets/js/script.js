/**
 * BIT BY BIT - Main JavaScript
 * Common functionality for the platform
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all tooltips
    initTooltips();
    
    // Add active class to current navigation item
    highlightCurrentNavItem();
    
    // Initialize image lazy loading
    lazyLoadImages();
    
    // Enable dark mode toggle (if exists)
    setupDarkModeToggle();
    
    // Add scroll to top button functionality
    setupScrollToTop();
    
    // Add animation to elements when they come into view
    setupScrollAnimations();
});

/**
 * Initialize Bootstrap tooltips
 */
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

/**
 * Add active class to current navigation menu item based on URL
 */
function highlightCurrentNavItem() {
    const currentLocation = window.location.pathname;
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href === currentLocation || (href !== '/' && currentLocation.startsWith(href))) {
            link.classList.add('active');
        }
    });
}

/**
 * Lazy load images for better performance
 */
function lazyLoadImages() {
    const lazyImages = document.querySelectorAll('img[data-src]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const image = entry.target;
                    image.src = image.dataset.src;
                    image.removeAttribute('data-src');
                    imageObserver.unobserve(image);
                }
            });
        });
        
        lazyImages.forEach(image => {
            imageObserver.observe(image);
        });
    } else {
        // Fallback for browsers that don't support IntersectionObserver
        lazyImages.forEach(image => {
            image.src = image.dataset.src;
            image.removeAttribute('data-src');
        });
    }
}

/**
 * Setup dark mode toggle functionality
 */
function setupDarkModeToggle() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    
    if (darkModeToggle) {
        // Check for saved preference or system preference
        if (localStorage.getItem('darkMode') === 'enabled' || 
            (localStorage.getItem('darkMode') === null && 
             window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.body.classList.add('dark-mode');
            darkModeToggle.checked = true;
        }
        
        // Toggle dark mode when switch is clicked
        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                document.body.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    }
}

/**
 * Add a scroll to top button that appears when scrolling down
 */
function setupScrollToTop() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                scrollToTopBtn.style.display = 'block';
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Add animation to elements when they come into view
 */
function setupScrollAnimations() {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animatedElements.length > 0 && 'IntersectionObserver' in window) {
        const animationObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        animatedElements.forEach(element => {
            animationObserver.observe(element);
        });
    }
}

/**
 * Confirm action with a custom confirm dialog
 * @param {string} message - The confirmation message
 * @param {function} callback - Function to call if confirmed
 */
function confirmAction(message, callback) {
    const confirmed = window.confirm(message);
    if (confirmed) {
        callback();
    }
}

/**
 * Format date to a readable string
 * @param {string} dateString - ISO date string
 * @returns {string} Formatted date string
 */
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString(undefined, options);
}

/**
 * Truncate text to specified length with ellipsis
 * @param {string} text - The text to truncate
 * @param {number} length - Maximum length
 * @returns {string} Truncated text with ellipsis if needed
 */
function truncateText(text, length) {
    if (text.length <= length) return text;
    return text.substring(0, length) + '...';
}

/**
 * Handle form validation and display custom error messages
 * @param {HTMLFormElement} form - The form element to validate
 * @returns {boolean} Whether the form is valid
 */
function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            
            // Create or update error message
            let errorMessage = field.nextElementSibling;
            if (!errorMessage || !errorMessage.classList.contains('invalid-feedback')) {
                errorMessage = document.createElement('div');
                errorMessage.className = 'invalid-feedback';
                field.parentNode.insertBefore(errorMessage, field.nextSibling);
            }
            
            errorMessage.textContent = 'This field is required';
            errorMessage.style.display = 'block';
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
            const errorMessage = field.nextElementSibling;
            if (errorMessage && errorMessage.classList.contains('invalid-feedback')) {
                errorMessage.style.display = 'none';
            }
        }
    });
    
    return isValid;
} 