<?php
function floating(){ ?>
<?php $kln = get_option('floatleft');if($kln){ ?>
<div id="teaser1" class="teaser1" style="width:autopx; height:0; text-align:left; display: scroll;position:fixed; top:35px;left:0px;">
<div align="center"><a href="#" id="close-teaser" onclick="jQuery('.teaser1').hide();" style="cursor:pointer;"><img src="http://3.bp.blogspot.com/-wgV2RBU-PhQ/Uj-t8ybhmSI/AAAAAAAAFbM/GVhtnL_hY68/s1600/close.png"/></a></div>
<?php echo $kln; ?>
</div>
<?php } ?>
<?php $kln = get_option('floatright');if($kln){ ?>
<div id="teaser2" class="teaser2" style="width:autopx; height:0; text-align:right; display: scroll;position:fixed; top:35px;right:0px;">
<div align="center"><a href="#" id="close-teaser" onclick="jQuery('.teaser2').hide();" style="cursor:pointer;"><img src="http://3.bp.blogspot.com/-wgV2RBU-PhQ/Uj-t8ybhmSI/AAAAAAAAFbM/GVhtnL_hY68/s1600/close.png"/></a></div>
<?php echo $kln; ?>
</div>
<?php } ?>
<?php $kln = get_option('floatbottom');if($kln){ ?>
<div id="teaser3" class="teaser3" style="width: 100%;height:0;text-align: center;display: scroll;position:fixed;bottom: 115px;margin: 0 auto;z-index: 103;">
<div align="center"><a href="#" id="close-teaser" onclick="jQuery('.teaser3').hide();" style="cursor:pointer;"><img src="http://3.bp.blogspot.com/-wgV2RBU-PhQ/Uj-t8ybhmSI/AAAAAAAAFbM/GVhtnL_hY68/s1600/close.png"/></a></div>
<div class="blox">
<?php echo $kln; ?>
</div>
</div>
<?php } ?>
<?php }
function kln_overlay(){
$kln = get_option( 'overplay' ); if($kln) { ?>
<script>
$(document).ready(function() {
$('#closed').click(function(){
$('#btm_banner').hide(90);
});
});
</script>
<div align='center' id='btm_banner'>
<div class="centered">
<div id="closed" class="bgclose">Close</div>	
<div class="kln">
<?php echo $kln; ?>
</div>
</div>
</div><?php } }
function kln($name){
	$kln = get_option($name);
	if($kln){
		echo '<div class="kln">'.$kln.'</div>';
	}
}
add_action('admin_menu', 'kln_menu');
function kln_menu() {
    add_menu_page('Dashboard', 'Ads Management', 'administrator','ads', 'ads','dashicons-screenoptions',81 );
    add_submenu_page( 'ads', 'Dashboard', 'Dashboard', 'administrator', 'ads','ads');
    $submenu['dashboard'][0][0] = 'Dashboard';
    add_action( 'admin_init', 'register_kln_settings' );
}
function register_kln_settings() {
    register_setting( 'kln-settings', 'klntop' );
    register_setting( 'kln-settings', 'filmbaru' );
    register_setting( 'kln-settings', 'epbaru' );
    register_setting( 'kln-settings', 'overplay' );
	register_setting( 'kln-settings', 'aboveplayer' );
    register_setting( 'kln-settings', 'ss1' );
    register_setting( 'kln-settings', 'ss2' );
    register_setting( 'kln-settings', 'ss3' );
    register_setting( 'kln-settings', 'floatleft' );
    register_setting( 'kln-settings', 'floatright' );
    register_setting( 'kln-settings', 'floatbottom' );
} function ads() { ?>
<div class="wrap">
<style>.wrap {padding: 20px;background: #FFF;border: 1px solid #e5e5e5;box-shadow: 0 1px 1px rgba(0,0,0,.04);}</style>
<h2>Ads Management</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'kln-settings' ); ?>
    <?php do_settings_sections( 'kln-settings' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Bottom Menu</th>
        <td><textarea type="text/javascript" name="klntop" rows="10" cols="50" value="<?php echo esc_attr( get_option('klntop') ); ?>" class="large-text code"><?php echo esc_attr( get_option('klntop') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Top Latest Movies</th>
        <td><textarea type="text/javascript" name="filmbaru" rows="10" cols="50" value="<?php echo esc_attr( get_option('filmbaru') ); ?>" class="large-text code"><?php echo esc_attr( get_option('filmbaru') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Top Latest Episode</th>
        <td><textarea type="text/javascript" name="epbaru" rows="10" cols="50" value="<?php echo esc_attr( get_option('epbaru') ); ?>" class="large-text code"><?php echo esc_attr( get_option('epbaru') ); ?></textarea></td>
        </tr>
		<tr valign="top">
        <th scope="row">Above Player</th>
        <td><textarea type="text/javascript" name="aboveplayer" rows="10" cols="50" value="<?php echo esc_attr( get_option('aboveplayer') ); ?>" class="large-text code"><?php echo esc_attr( get_option('aboveplayer') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Overlay Player</th>
        <td><textarea type="text/javascript" name="overplay" rows="10" cols="50" value="<?php echo esc_attr( get_option('overplay') ); ?>" class="large-text code"><?php echo esc_attr( get_option('overplay') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Single 1</th>
        <td><textarea type="text/javascript" name="ss1" rows="10" cols="50" value="<?php echo esc_attr( get_option('ss1') ); ?>" class="large-text code"><?php echo esc_attr( get_option('ss1') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Single 2</th>
        <td><textarea type="text/javascript" name="ss2" rows="10" cols="50" value="<?php echo esc_attr( get_option('ss2') ); ?>" class="large-text code"><?php echo esc_attr( get_option('ss2') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Single 3</th>
        <td><textarea type="text/javascript" name="ss3" rows="10" cols="50" value="<?php echo esc_attr( get_option('ss3') ); ?>" class="large-text code"><?php echo esc_attr( get_option('ss3') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Float Left</th>
        <td><textarea type="text/javascript" name="floatleft" rows="10" cols="50" value="<?php echo esc_attr( get_option('floatleft') ); ?>" class="large-text code"><?php echo esc_attr( get_option('floatleft') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Float Right</th>
        <td><textarea type="text/javascript" name="floatright" rows="10" cols="50" value="<?php echo esc_attr( get_option('floatright') ); ?>" class="large-text code"><?php echo esc_attr( get_option('floatright') ); ?></textarea></td>
        </tr>
        <tr valign="top">
        <th scope="row">Float Bottom</th>
        <td><textarea type="text/javascript" name="floatbottom" rows="10" cols="50" value="<?php echo esc_attr( get_option('floatbottom') ); ?>" class="large-text code"><?php echo esc_attr( get_option('floatbottom') ); ?></textarea></td>
        </tr>
    </table>  
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>