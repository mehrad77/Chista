<?php

function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
}
 
function add_settings() {
    add_theme_page("تنظیمات چیستا", "تنظیمات قالب چیستا", 'manage_options', 'theme-panel', 'theme_settings_page');
}
 
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings' );



function theme_settings_page() { ?>
    <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
<?php }




/******************************3*/

function display_copyright_element()
{
	?>
    	<input type="text" name="copyright" id="copyright" value="<?php echo get_option('copyright'); ?>" />
    <?php
}

function display_copyright_theme_element()
{
	?>
    	<input type="text" name="copyright_theme" id="copyright_theme" value="<?php echo get_option('copyright_theme'); ?>" />
    <?php
}
/****************************************5*/

function display_theme_panel_fields()
{
	add_settings_section("section", "تنظیمات عمومی", null, "theme-options");
	

    add_settings_field("copyright", "متن کپی‌رایت", "display_copyright_element", "theme-options", "section");
    add_settings_field("copyright_theme", "متن کپی‌رایت طراح وب‌سایت", "display_copyright_theme_element", "theme-options", "section");


    register_setting("section", "copyright");
    register_setting("section", "copyright_theme");

	add_settings_section("section", "All Settings", null, "theme-options");
}

add_action("admin_init", "display_theme_panel_fields");

/************************************5*/
function logo_display()
{
	?>
        <input type="file" name="logo" /> 
        <?php echo get_option('logo'); ?>
   <?php
}

function handle_logo_upload()
{
	if(!empty($_FILES["demo-file"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return $option;
}

add_action("admin_init", "display_theme_panel_fields");