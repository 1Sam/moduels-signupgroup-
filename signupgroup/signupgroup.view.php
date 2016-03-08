<?php
class signupgroupView extends signupgroup {
	
	function init() {
		$template_path = sprintf("%sskins/%s/",$this->module_path, "default");
		$this->setTemplatePath($template_path);
	}
	
	function dispSignupgroupIndex() {
		$this->setTemplateFile('signupgroup');
	}
}