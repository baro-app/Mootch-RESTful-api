<?php

	class layout {

		var $reg;

		var $js_files;

		var $css_files;

		function __construct($reg) {
			$this->js_files = array();
			$this->css_files = array();
			$this->reg = $reg;
		}

		function add_js($js_file) {
			$this->js_files[] = $js_file;
		}

		function add_css($css_file) {
			$this->css_files[] = $css_file;
		}

		function show($view_path, $variables = array()) {
			foreach($variables as $index=>$value) {
				global $$index;
				$$index = $value;
			}
			global $js;
			global $css;
			global $title;
			global $content;
			if(!$this->reg->layout_file) $this->reg->layout_file = DEFAULT_LAYOUT;
			if(!$this->reg->title) $this->reg->title = DEFAULT_TITLE;
			$title = $this->reg->title;
			foreach($this->js_files as $jsfile) $js.="<script src=\"{$jsfile}\"></script>\n";
			foreach($this->css_files as $cssfile) $css.="<link rel=\"stylesheet\" href=\"{$cssfile}\" type=\"text/css\" media=\"screen\" />\n";
			ob_start();
			include($view_path);
			$content = ob_get_contents();
			ob_end_clean();
			include(APP_PATH.LAYOUT_DIRECTORY.$this->reg->layout_file);
		}

	}

?>
