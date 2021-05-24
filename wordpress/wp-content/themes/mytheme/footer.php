<footer >
    <section id="footer" >
        <div class="container">
            <div class="footer-text">
                <p>
                    <?php
                    $copyright = sprintf(esc_html__('&copy; %1$s All Rights Reserved by %2$s. Theme Developed by %3$s. Powered by %4$s', 'tr-affreview-lite'), '<span>' . date('Y') . '</span>', '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>', '<a href="' . esc_url('#') . '" target="blank" >Kieu Oanh</a>', '<a href="' . esc_url('https://wordpress.org/') . '" target="blank" >WordPress</a>.');
                    echo $copyright;
                    ?>
                </p>
            </div>
        </div>
    </section>
    <?php wp_footer(); ?>
    </footer>
</body>

</html>