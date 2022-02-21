# WP Github

This plugin is designed to display the repository on any page of your website.


## How to install plugin

Download the archive, unpack it into plugins

### How to use

After installing the plugin, an additional field will appear in the admin panel, go into it, enter the username and save, then go to any page and insert the shortcode

```php
[gitrepo]
```
You can also insert this shortcode as a hook on your custom template

```php
<?php 

echo do_shortcode( '[gitrepo]' );

?>
```
