document.addEventListener('DOMContentLoaded', function() {
    // Get the stickman element
    var stickman = document.getElementById('stickman');
  
    // Initialize variables for debounce functionality
    var timer = null;
    var delay = 100; // Adjust the delay (in milliseconds) as needed

    // Initialize variables for interpolation functionality
    var currentPosition = { x: 0 }; // Initial position of the stickman
    var targetPosition = { x: 0 };   // Target position to interpolate towards
    var easing = 0.1;  // Easing factor for smooth movement

    // Add mousemove event listener to the document
    document.addEventListener('mousemove', function(event) {
        // Clear the previous timer (if any)
        clearTimeout(timer);

        // Calculate the stickman's target horizontal position based on mouse cursor
        targetPosition.x = event.clientX - (stickman.offsetWidth / 2);

        // Start a new timer to update stickman's position after a delay
        timer = setTimeout(function() {
            // Update the stickman's position using interpolation
            updatePosition();
        }, delay);
    });

    // Function to update stickman's position using interpolation
    function updatePosition() {
        // Calculate the difference between the target and current positions
        var dx = targetPosition.x - currentPosition.x;

        // Apply easing to smooth out the movement
        var vx = dx * easing;

        // Update the current position based on the velocity
        currentPosition.x += vx;

        // Set the stickman's new horizontal position
        stickman.style.left = currentPosition.x + 'px';

        // Continue updating the position until the stickman reaches the target position
        if (Math.abs(dx) > 0.1) {
            requestAnimationFrame(updatePosition);
        }
    }
});
