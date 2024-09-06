<?php
/*
Plugin Name: QR Code Generator
Description: This plugin generates a QR code based on the image URL provided.
Version: 1.0
Author: Mahdieh ahmadi
*/

include_once plugin_dir_path(__FILE__) . 'phpqrcode/phpqrcode.php';


add_action('admin_menu', 'grcode_add_admin_menu');

function grcode_add_admin_menu() {
    add_menu_page('QR Code Generator', 'QR Code', 'manage_options', 'qr-code-generator', 'grcode_admin_page');
}

function grcode_admin_page() {
    ?>
    <div class="wrap">
        <h2>QR Code Generator</h2>
        <form method="POST" action="">
            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" id="image_url" required>
            <input type="submit" name="submit" value="Generate QR Code">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $image_url = esc_url($_POST['image_url']);
            if (!empty($image_url)) {
                echo '<h3>QR Code:</h3>';
                echo '<img src="' . plugins_url('generate-qr-code.php?url=' . urlencode($image_url), __FILE__) . '" alt="QR Code">';
            }
        }
        ?>
    </div>
    <?php
}
