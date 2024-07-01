<?php defined("ABSPATH") || die("!");?>

<div class="bixbox ts-ep-list">
    <div class="bxtitle">
        <h2><?php echo GOV_lang::get('series_episode_list_label', ["post_title" => get_the_title(get_the_ID())]); ?></h2>
    </div>
    <?php foreach($groups as $kg => $vg){ ?>
        <span class="ts-chl-collapsible"><?php echo $group_names[$vg];?></span>
        <div class="ts-chl-collapsible-content" <?php if ($default_group != $vg) echo 'style="display:none;"'; ?>>
            <div class="epsdlist">
                <ul>
                <?php foreach($episodes[$vg] as $k => $v){ extract($v); ?>
                    <li <?php if ($first) echo "class='tseplsfrst' ";?>data-ID="<?php echo $ID;?>">
                        <a href="<?php echo $the_link; ?>">
                            <div class="l">
                                <div class="epl-num"><?php if($episode_season){ echo GOV_lang::get('series_episode_season_min_label') . $episode_season." "; } echo GOV_lang::get('series_episode_episode_min_label') . $episode_number; ?></div>
                                <?php if($episode_title){ ?><div class="epl-title"><?php echo $episode_title; ?></div><?php } ?>
                                <div class="epl-date"><?php echo $date_format; ?></div>
                            </div>
                            <div class="r">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    <?php } 
    ?>

    <?php if ( ! isset($the_link)){ ?> 
			<div class="epsdlist">
                <ul>
                    <li style="text-align:center;"><b> <?php echo GOV_lang::get('series_has_no_episode_text'); ?> </b></li>
                </ul>
            </div>
	<?php } ?>

</div>
<script>
jQuery(document).on('click', '.ts-chl-collapsible', function(){
    jQuery(this).next('.ts-chl-collapsible-content').slideToggle('normal');
    return false;
});
</script>