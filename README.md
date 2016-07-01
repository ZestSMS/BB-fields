# BB-fields
A few additional fields for Beaver Builder modules. Each field has a prefix of zestsms- to avoid conflict if the BB crew adds these fields later. __Please see example-module.php__

Feel free to modify or send a pull request.

## Usage
Place the fields directory inside your plugin (recommended) or theme and include the following code before your module:
```
define('ZESTSMS_FIELDS_DIR', realpath(dirname(__FILE__)) . '/fields/');
define('ZESTSMS_FIELDS_URL', realpath(dirname(__FILE__)) . '/fields/');

$bb_plugin_fields = array(
  'datepicker/zestsms-datepicker.php'
  ,'geocomplete/zestsms-geocomplete.php'
  ,'pdf/zestsms-pdf.php'
  ,'timepicker/zestsms-timepicker.php'
  ,'timespan/zestsms-timespan.php'
  ,'wp-dropdown/zestsms-wp-dropdown.php'
);


function zestsms_load_custom_bb_files() {
  global $bb_plugin_fields;
  if(class_exists('FLBuilder') && is_array($bb_plugin_fields)) {
    foreach($bb_plugin_fields as $field) { echo ZESTSMS_FIELDS_DIR . $field . ' ';
      if(file_exists( ZESTSMS_FIELDS_DIR . $field)) {
        require_once ZESTSMS_FIELDS_DIR . $field;
      }
    }
  }
}

add_action( 'init', 'zestsms_load_custom_bb_files' );
```

## Field Descriptions
##### Datepicker
Display a [jquery-ui datepicker](https://jqueryui.com/datepicker/) field.
![Datepicker](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/datepicker.jpg "Datepicker")

##### Geocomplete
Displays a [geocomplete](http://ubilabs.github.io/geocomplete/) field and includes a hidden field which stores the lat/lang coordinates (useful for custom google map modules).
![Geocomplete](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/geocomplete.jpg "Geocomplete")

##### PDF
Creates an upload field to upload a PDF (copied from the photo module).
![PDF](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/pdf.jpg "PDF")

##### Timepicker
Allows the user to input time with [jquery-timepicker](http://jonthornton.github.io/jquery-timepicker/).
![Timepicker](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/timepicker.jpg "Timepicker")

##### Timespan
Allows the user to input 2 times to create a timespan.
![Timespan](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/timespan.jpg "Timespan")


##### WP-Dropdown
Show a dropdown of a post type (default: page) using [wp_dropdown_pages](https://codex.wordpress.org/Function_Reference/wp_dropdown_pages) which also indents child pages. You can pass any additional arguments found in the codex (see example-module.php)
![WP-Dropdown](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/wp-dropdown.jpg "WP-Dropdown")


##### Select2
Create a field with [select2](https://select2.github.io/). Pass your own options or allow the user to create options on the go which are stored for later -- useful repeater fields.
![Select2](https://raw.githubusercontent.com/ZestSMS/BB-fields/master/images/select2.jpg "Select2")
