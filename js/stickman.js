document.addEventListener('DOMContentLoaded', function() {
    var stickman = document.getElementById('stickman');
    var frameWidth = 64; // Width of each frame in the sprite sheet
    var totalFrames = 16; // Total number of frames in the sprite sheet
    var animationSpeed = 200; // Adjust the animation speed (in milliseconds) as needed

    // Initialize variables for smooth movement
    var currentPosition = { x: parseFloat(localStorage.getItem('stickmanX')) || 0 }; // Initial position of the stickman
    var targetPosition = { x: currentPosition.x }; // Target position to interpolate towards
    var easing = 0.02; // Easing factor for smooth movement

    // Flag to track whether the stickman is moving
    var isMoving = false;

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
        requestAnimationFrame(updatePosition);
    }

    // Start updating stickman's position using interpolation
    updatePosition();

    // Add mousemove event listener to the header
    var header = document.querySelector('.site-header');
    header.addEventListener('mousemove', function(event) {
        // Calculate the stickman's target horizontal position based on mouse cursor
        targetPosition.x = event.clientX - (stickman.offsetWidth / 2);

        // Determine the direction of movement
        if (targetPosition.x < currentPosition.x) {
            // Moving left, use the second row
            stickman.style.backgroundPositionY = '-80px';
            isMoving = true;
        } else if (targetPosition.x > currentPosition.x) {
            // Moving right, use the third row
            stickman.style.backgroundPositionY = '-160px';
            isMoving = true;
        } else {
            // Stickman is still, display the first static picture
            stickman.style.backgroundPositionY = '0px';
            isMoving = false;
        }

        // Update localStorage with the stickman's current position
        localStorage.setItem('stickmanX', currentPosition.x);
    });

    // Add mouseout event listener to the header
    header.addEventListener('mouseout', function() {
        // Stickman is still, display the first static picture
        stickman.style.backgroundPositionY = '0px';
        isMoving = false;
    });

    // Animate the stickman frames if it's moving
    var currentFrame = 0;
    setInterval(function() {
        if (isMoving) {
            // Increment the frame index
            currentFrame = (currentFrame + 1) % totalFrames;
            var backgroundPositionX = -currentFrame * frameWidth;
            stickman.style.backgroundPositionX = backgroundPositionX + 'px';
        }
    }, animationSpeed);
});
