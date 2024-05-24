<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solstralens-forskola
 */
?>

<footer id="colophon" class="site-footer">
    <div class="footer-content">
        <div class="logo">
            <img src="http://localhost:10017/wp-content/uploads/2024/05/logo-2.png" alt="Logo 1" class="logo-footer">
        </div>
        <div class="text-content">
            <p>Kontaktuppgifter</p>
            <p>Solstrålens Förskola</p>
            <p>Ekebergavägen 77</p>
            <p>253 51 PÅARP</p>
        </div>
        <div class="text-content">
            <p>Tel. 042- 22 95 40</p>
            <p>Mail: info@solbarn.se</p>
            <p>Karta</p>
        </div>
        <div class="text-content">
            <p>Frågor om föräldrakooperativet,</p>
            <p>kontakta styrelsen via</p>
            <p>solbarn.styrelse@gmail.com</p>
        </div>
        <div class="text-content">
            <a href="https://www.instagram.com/solstralensforskolapaarp/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/600px-Instagram_icon.png" alt="Instagram">
            </a>
            <p>Instagram</p>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var hour = new Date().getHours();
        var footer = document.querySelector('.site-footer');

        if (hour >= 6 && hour < 12) {
            // Morning: 6 AM to 12 PM
            footer.style.background = 'linear-gradient(to top right, #FFDAB9, #87CEEB)';
        } else if (hour >= 12 && hour < 18) {
            // Afternoon: 12 PM to 6 PM
            footer.style.background = 'linear-gradient(to bottom, #FFFF99, #87CEEB)';
        } else if (hour >= 18 && hour < 24) {
            // Evening: 6 PM to 12 AM
            footer.style.background = 'linear-gradient(to bottom right, #191970, #FFA07A)';
        } else {
            // Night: 12 AM to 6 AM
            footer.style.background = 'linear-gradient(to top right, #000000, #191970)';
        }
    });
</script>
</body>

</html>