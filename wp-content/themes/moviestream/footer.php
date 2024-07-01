<div id="footer">
	<div class="centerfooter">
		<div class="ftr_wgt">
			<?php $wgd = get_option('footerwidget'); ?>
			<div class="anm_wdt last<?php if($wgd==='0'){ echo ' cenlogo'; } ?>">
				<div class="logofot">
					<?php $logo = get_option('logo'); ?>
					<img src="<?php echo $logo; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" />
					<p class="descfoot"><?php echo GOV_lang::get('footer_desc_text', ["blog_desc" => esc_attr( get_bloginfo( 'description', 'display' )), "blog_name" => esc_attr( get_bloginfo( 'name', 'display' ) )]); ?></p>
					<p class="desclaimer"><?php echo GOV_lang::get('footer_disclaimer'); ?></p>
				</div>
			</div>
			<?php if($wgd==='1'){ ?>
			<div class="anm_wdt">
			<?php
			if(is_active_sidebar('ft1')){
				dynamic_sidebar('ft1');
			}
			?>
			</div>
			<div class="anm_wdt">
			<?php
			if(is_active_sidebar('ft2')){
				dynamic_sidebar('ft2');
			}
			?>
			</div>
			<div class="anm_wdt">
			<?php
			if(is_active_sidebar('ft3')){
				dynamic_sidebar('ft3');
			}
			?>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="bgc">
		<?php echo GOV_lang::get('footer_copyright_text', ["blogname" => esc_attr( get_bloginfo( 'name', 'display' ) )]); ?>
	</div>
</div>
<?php if(is_home()){ ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
	 centeredSlides: true,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
	  loop: true,
      pagination: {
        el: '.swiper-pagination',
		clickable: true,
      },
    });
</script>
<?php } ?>
<?php floating(); wp_footer(); ?>
</body>
</html>