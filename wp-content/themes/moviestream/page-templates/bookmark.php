<?php 
/*
Template Name: Bookmark
*/
defined("ABSPATH") || die("!"); ?>

<?php get_header(); ?>
<div id="content">
<div class="singlecontent">
<h1><?php the_title(); ?></h1>
<span class="hapus" id="hapus"><?php echo GOV_lang::get('delete'); ?></span>
<p class="ntf">
    <?php echo GOV_lang::get('bookmark_head', ['max' => get_option('bookmark')]); ?>
</p>
<div class="clear"></div>
    <div class="konten listupd">
        <div class="latest">
            <div class="los" id="bookmark-pool"></div>
        </div>
    </div>
</div>
</div>
<script>
    jQuery(document).ready(function(){
        var bookmarks = BOOKMARK.getStored();   
        if (bookmarks.length < 1){
            jQuery("#bookmark-pool").html("<h4><center><?php echo GOV_lang::get('bookmark_no_item'); ?></center></h4>");
            return;
        }   
        jQuery.post(ajaxurl, {"action": "bookmark_get","ids": BOOKMARK.getStored()})
        .done(function(d){
            if (d.error) jQuery("#bookmark-pool").html("<h4><center>" + d.error + "</center></h4>");
            else jQuery("#bookmark-pool").html(d.data);
            if ("trash" in d){
                for(var i in d.trash){
                    BOOKMARK.remove(d.trash[i]);
                }
            }
        });
        jQuery("#hapus").on('click', function(){
            if (jQuery(document).find('.delmark').length <= 0) {
                jQuery(document).find('article.box').prepend('<div class="delmark"><?php echo GOV_lang::get('delete'); ?></div>');
            }else{
                jQuery(document).find('.delmark').remove();
            }
        });
        jQuery(document).on('click', '.delmark', function(){
            var parent = jQuery(this).parent();
            var id = parent.attr('data-id');
            BOOKMARK.remove(id);
            parent.remove();
        });
    });
</script>
<?php get_footer(); ?>