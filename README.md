# CodeIgniter layout library

## Overview
Easy to use library for handling layouts in CodeIgniter with support for adding "per page" css and javascript files.

## Setup
Just copy the `layout.php` file to your own `application/library` directory, load it, and you're ready to go.

You can load the library by adding it to your autoload config file

```
$autoload['libraries'] = array('layout');
```
or you can load it directly from your controller

```
$this->load->library('layout');
```

I like to keep things clean so I create two directories in my `application/views`:

___layouts/___ - where I store all my layout files

___partials/___ - for things like the header, sidebar and footer

Also, you have to copy the three foreach loops from the `header.php` and `footer.php` if you want support for dynamically loading css and javascript files.

## Methods
__view($name, $data = array(), $layout = 'default')__

Use this method instead of CodeIgniter's `$this->load->view()`

e.g.

```
$data = array();
$data['todo'] = array('Buy milk', 'Clean house', 'Call mom');

$this->layout->view('pages/index', $data);
```

__set_title($title)__

Sets the title of the page.
You can also use the `$title_separator` variable.

e.g.

```
$this->layout->set_title('Recent posts' . $this->layout->title_separator . 'Blog');
```

__add_includes($type, $file, $options = NULL, $prepend_base_url = TRUE)__

You can use this method to dynamically include css and javascript files in your layout.

___type___ - the file type (css, js)

___file___ - the file you want to include

___options___ - a more tricky one: if it's a css file then it's for the media, if it's a js file you can use this to specify where the `<script>` tag should be placed (`header` for the <head> tag and `footer` for echoing it before the closing body tag).

e.g.

```
$this->layout->add_includes('css', 'assets/css/screen.css');
// outputs: <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/screen.css">
		
$this->layout->add_includes('css', 'assets/css/print.css', 'print');
// outputs: <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/print.css" media="print">
		
$this->layout->add_includes('css', 'http://twitter.github.com/bootstrap/assets/css/bootstrap.css', NULL, FALSE);
// outputs: <link rel="stylesheet" type="text/css" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
		
$this->layout->add_includes('js', 'assets/js/custom.js');
// outputs: <script type="text/javascript" src="http://localhost/assets/js/custom.js"></script> in the footer
		
$this->layout->add_includes('js', 'assets/js/jquery.js', 'header');
// outputs: <script type="text/javascript" src="http://localhost/assets/js/jquery.js"></script> in the header
		
$this->layout->add_includes('js', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js', NULL, FALSE);
// outputs: <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> in the footer
```

## License
None (public domain)