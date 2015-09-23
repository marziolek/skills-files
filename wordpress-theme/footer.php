<?php global $themeum; ?>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="page-content">
            <div class="footer-nav">
                <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
            </div>
            <img src="<?php bloginfo('template_url'); ?>/images/Logo_UpWeb.png" alt="upweb logo" />
            <span class="rights-reserved">All rights reserved.</span>
            <div class="socials">
                <a href="https://www.facebook.com/upwebcompany" target="_blank" class="social"><span class="fa fa-facebook"></span></a>
                <a href="https://instagram.com/upwebcompany" target="_blank" class="social"><span class="fa fa-instagram"></span></a>
            </div>
        </div>
    </div>
</footer><!--/#footer-->
</div>
<?php if(isset($themeum['before_body']))  echo $themeum['before_body']; ?>
<?php if(isset($smof_data['google_analytics'])) echo $smof_data['google_analytics'];?>

<?php if(isset($smof_data['custom_css'])): ?>
<?php if(!empty($smof_data['custom_css'])): ?>
<style>
    <?php echo $smof_data['custom_css']; ?>
</style>
<?php endif; ?>
<?php endif; ?>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/iscroll.js"></script>

<?php wp_footer(); ?>
</body>
</html>