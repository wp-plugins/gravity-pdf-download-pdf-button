<?php
/*
Plugin Name: Gravity PDF - Download PDF button
Description: Adds a PDF download link at end of form submission
Version: 1.0
Author: Adrian Gordon
License: GPL2
*/

add_action('admin_notices', array('ITSG_GFPDF_Download_Button', 'admin_warnings'), 20);

if (!class_exists('ITSG_GFPDF_Download_Button')) {
    class ITSG_GFPDF_Download_Button
    {
		private static $name = 'Gravity PDF - Download PDF button';
		private static $slug = 'itsg_gfpdf_download_button';
		
        /**
         * Construct the plugin object
         */
		 public function __construct()
        {
            // register actions
            if ((self::is_gravityforms_installed())) {
			// start the plugin
			add_filter('gform_confirmation', array(&$this,'itsg_gfpdf_download_button_shortcode'), 10, 4);
			}
        } // END __construct

		public function itsg_gfpdf_download_button_shortcode($confirmation, $form, $lead, $ajax){
			if (strpos(strtolower($confirmation),'[gfpdf_button]') !== false)  {

				$pdf_button = "<input type='button' value='Download PDF' class='gform_next_button gform_submit_button button gpdf_button' onclick=\"window.open('".get_site_url()."/?gf_pdf=1&fid=".$form["id"]."&lid=".$lead["id"]."&template=default-template.php')\">";
		
				return  str_replace("[gfpdf_button]",$pdf_button,$confirmation);
			}
		}
		
		/*
         * Warning message if Gravity Forms and/or Gravity PDF is not installed and enabled
         */
		public static function admin_warnings() {
			if ( !self::is_gravityforms_installed() ) {
				$gf_message = __('Requires Gravity Forms to be installed.', self::$slug);
			}
			if ( !self::is_gfpdf_installed() ) {
				$gfpdf_message = __('Requires Gravity PDF to be installed.', self::$slug);
			}
			
			if (!empty($gf_message)) {
			?>
			<div class="error">
				<p>
					<?php _e('The plugin ', self::$slug); ?><strong><?php echo self::$name; ?></strong> <?php echo $gf_message; ?><br />
					<?php _e('Please ',self::$slug); ?><a href="http://www.gravityforms.com/"><?php _e(' download the latest version',self::$slug); ?></a><?php _e(' of Gravity Forms and try again.',self::$slug) ?>
				</p>
			</div>
			<?php
			}
			
			if (!empty($gfpdf_message)) {
			?>
			<div class="error">
				<p>
					<?php _e('The plugin ', self::$slug); ?><strong><?php echo self::$name; ?></strong> <?php echo $gfpdf_message; ?><br />
					<?php _e('Please ',self::$slug); ?><a href="https://wordpress.org/plugins/gravity-forms-pdf-extended/"><?php _e(' download the latest version',self::$slug); ?></a><?php _e(' of Gravity PDF and try again.',self::$slug) ?>
				</p>
			</div>
			<?php
			} 
			
		} // END admin_warnings

		/*
         * Check if GF is installed
         */
        private static function is_gravityforms_installed()
        {
            return class_exists('GFAPI');
        } // END is_gravityforms_installed
		
		/*
         * Check if Gravity PDF is installed
         */
        private static function is_gfpdf_installed() 
        {
            return class_exists('GFPDF_Core');
        } // END is_dpr_installed

	}
    $ITSG_GFPDF_Download_Button = new ITSG_GFPDF_Download_Button();
}