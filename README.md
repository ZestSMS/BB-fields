# BB-fields
A few additional fields for Beaver Builder modules. Each field has a prefix of zestsms- to avoid conflict if the BB crew adds these fields later. __Please see example-module.php__

Feel free to modify or send a pull request.

## Usage
Include the fields inside your theme or plugin in of a directory called "fields" and set the constants below:

```
define('ZESTSMS_FIELDS_DIR', plugin_dir_path( __FILE__ ) . 'fields/');
define('ZESTSMS_FIELDS_URL', plugin_dir_url( __FILE__ ) . 'fields/');
```

## Field Descriptions
##### Datepicker
Display a [jquery-ui datepicker](https://jqueryui.com/datepicker/) field.

##### Geocomplete
Displays a [geocomplete](http://ubilabs.github.io/geocomplete/) field and includes a hidden field which stores the lat/lang coordinates (useful for custom google map modules).

##### PDF
Creates an upload field to upload a PDF (copied from the photo module).

##### Timespan
Allows the user to input 2 times to create a timespan.

##### WP-Dropdown
Show a dropdown of a post type or category using [wp_dropdown_pages](https://codex.wordpress.org/Function_Reference/wp_dropdown_pages) or [wp_dropdown_categories](https://codex.wordpress.org/Function_Reference/wp_dropdown_categories) (by passing the 'taxonomy' arg), which indents children. You can pass any additional arguments found in the codex (see example-module.php)


## Screenshots
![Datepicker](https://github.com/ZestSMS/BB-fields/raw/master/datepicker.jpg "Datepicker")
![Geocomplete](https://github.com/ZestSMS/BB-fields/raw/master/geocomplete.jpg "Geocomplete")
![PDF](https://github.com/ZestSMS/BB-fields/raw/master/pdf.jpg "PDF")
![Timepicker](https://github.com/ZestSMS/BB-fields/raw/master/timepicker.jpg "Timepicker")
![Timespan](https://github.com/ZestSMS/BB-fields/raw/master/timespan.jpg "Timespan")
