document.addEventListener('DOMContentLoaded', function() {
    // Get the stickman element
    var stickman = document.getElementById('stickman');

    // Add mousemove event listener to the document
    document.addEventListener('mousemove', function(event) {
        // Calculate the stickman's new horizontal position based on mouse cursor
        var newX = event.clientX - (stickman.offsetWidth / 2);

        // Set the stickman's new horizontal position
        stickman.style.left = newX + 'px';
    });
});
