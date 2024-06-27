<?php get_template_part('moviewppanel/header'); ?>

<div class="moviewppanel-column">
	<?php if (isset($_POST["update_options"])) { ?>
		<?php
			foreach ($_POST as $key => $value) {
                if ($key != 'update_options') {
					update_option($key, esc_html($value));
				}
            }
		?>
		<div class="moviewppanel-box moviewppanel-updated"><?php echo __('Settings saved', 'moviewp'); ?></div>		
	<?php } ?>
	<div class="moviewppanel-box">
		<h2><?php echo __('Slider', 'moviewp'); ?></h2>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<p>
			<label><?php echo __('Show Slider', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Make slider appear on the front page or all pages', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_show_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_show') == 1) { ?> checked="checked" <?php } ?> value="1" id="moviewppanel_slider_show_disable" name="moviewppanel_slider_show"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_show_frontpage"><input type="radio" <?php if (get_option('moviewppanel_slider_show') == 2) { ?> checked="checked" <?php } ?> value="2" id="moviewppanel_slider_show_frontpage" name="moviewppanel_slider_show"><span class="mark"><?php echo __('Front Page', 'moviewp'); ?></span></label>
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
	<div class="moviewppanel-box">
		<form action="" method="post" enctype="multipart/form-data">
		<h3><?php echo __('Slider Options', 'moviewp'); ?></h3>
		<hr>
		<p>
			<label><?php echo __('Arrows', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Arrows are used to navigate back and forth between the slides', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_arrows_enable"><input type="radio" <?php if (get_option('moviewppanel_slider_arrows') == 'true') { ?> checked="checked" <?php } ?> value="true" id="moviewppanel_slider_arrows_enable" name="moviewppanel_slider_arrows"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_arrows_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_arrows') == 'false') { ?> checked="checked" <?php } ?> value="false" id="moviewppanel_slider_arrows_disable" name="moviewppanel_slider_arrows"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label><?php echo __('Arrows Constraint', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('When you get to the end of the slides pressing the next arrow will navigate you to the beginning again should you have a false constraint. The same applies to the previous arrow', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_arrows_constraint_enable"><input type="radio" <?php if (get_option('moviewppanel_slider_arrows_constraint') == 'true') { ?> checked="checked" <?php } ?> value="true" id="moviewppanel_slider_arrows_constraint_enable" name="moviewppanel_slider_arrows_constraint"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_arrows_constraint_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_arrows_constraint') == 'false') { ?> checked="checked" <?php } ?> value="false" id="moviewppanel_slider_arrows_constraint_disable" name="moviewppanel_slider_arrows_constraint"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<hr>
		<p>
			<label><?php echo __('Autoplay', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Sets the slider to run automatically. A manual slider resets pause interval', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_slideshow_enable"><input type="radio" <?php if (get_option('moviewppanel_slider_slideshow') == 'true') { ?> checked="checked" <?php } ?> value="true" id="moviewppanel_slider_slideshow_enable" name="moviewppanel_slider_slideshow"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_slideshow_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_slideshow') == 'false') { ?> checked="checked" <?php } ?> value="false" id="moviewppanel_slider_slideshow_disable" name="moviewppanel_slider_slideshow"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_slider_slideshow_delay"><?php echo __('Pause Interval', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('The time interval between image changes in seconds', 'moviewp'); ?></span>
			<input type="text" name="moviewppanel_slider_slideshow_delay" id="moviewppanel_slider_slideshow_delay" value="<?php echo stripslashes_deep(get_option('moviewppanel_slider_slideshow_delay')); ?>">
		</p>
		<hr>
		<p>
			<label><?php echo __('Block Text', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Will show a black transparent color behind slide title and text for easy reading', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_blocktext_enable"><input type="radio" <?php if (get_option('moviewppanel_slider_blocktext') == 'true') { ?> checked="checked" <?php } ?> value="true" id="moviewppanel_slider_blocktext_enable" name="moviewppanel_slider_blocktext"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_blocktext_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_blocktext') == 'false') { ?> checked="checked" <?php } ?> value="false" id="moviewppanel_slider_blocktext_disable" name="moviewppanel_slider_blocktext"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<hr>
		<p>
			<label><?php echo __('Dot Navigation', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Dot navigation is used to indicate and navigate between the slides', 'moviewp'); ?></span>
			<label class="radio" for="moviewppanel_slider_dotnav_enable"><input type="radio" <?php if (get_option('moviewppanel_slider_dotnav') == 'true') { ?> checked="checked" <?php } ?> value="true" id="moviewppanel_slider_dotnav_enable" name="moviewppanel_slider_dotnav"><span class="mark"><?php echo __('Enable', 'moviewp'); ?></span></label>
			<label class="radio" for="moviewppanel_slider_dotnav_disable"><input type="radio" <?php if (get_option('moviewppanel_slider_dotnav') == 'false') { ?> checked="checked" <?php } ?> value="false" id="moviewppanel_slider_dotnav_disable" name="moviewppanel_slider_dotnav"><span class="mark"><?php echo __('Disable', 'moviewp'); ?></span></label>
		</p>
		<p>
			<label for="moviewppanel_slider_dotnav_alignment"><?php echo __('Dot Alignment', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Set the horizontal alignment of the dots to either left, center or right', 'moviewp'); ?></span>
			<select name="moviewppanel_slider_dotnav_alignment" id="moviewppanel_slider_dotnav_alignment" >
				<option value="left" <?php if (get_option('moviewppanel_slider_dotnav_alignment') == 'left') { ?> selected="selected" <?php } ?>><?php echo __('Left', 'moviewp'); ?></option>
				<option value="center" <?php if (get_option('moviewppanel_slider_dotnav_alignment') == 'center') { ?> selected="selected" <?php } ?>><?php echo __('Center', 'moviewp'); ?></option>
				<option value="right" <?php if (get_option('moviewppanel_slider_dotnav_alignment') == 'right') { ?> selected="selected" <?php } ?>><?php echo __('Right', 'moviewp'); ?></option>
			</select>
		</p>
		<hr>
		<p>
			<label for="moviewppanel_slider_slide_position"><?php echo __('Slide Position', 'moviewp'); ?></label>
			<span class="helptext"><?php echo __('Set the starting slide', 'moviewp'); ?></span>
			<input type="text" name="moviewppanel_slider_slide_position" id="moviewppanel_slider_slide_position" value="<?php echo stripslashes_deep(get_option('moviewppanel_slider_slide_position')); ?>">
		</p>
		<p><input type="submit" name="update_options" value="<?php echo __('Save settings', 'moviewp'); ?>" class="moviewppanel-button moviewppanel-button-color-1"></p>
		</form>
	</div>
</div>

<?php get_template_part('moviewppanel/footer'); ?>