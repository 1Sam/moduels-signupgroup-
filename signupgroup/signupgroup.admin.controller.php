<?php
class signupgroupAdminController extends signupgroup {
	function init() {
	}

	function procSignupgroupAdminSetup() {
		//form이나 get으로 요청이 들어온 변수를 할당한다.
		$args = Context::getRequestVars(); 						// form or get

		// module_config에 입력
		$signupgroup_config->ages = $args->ages;
		$signupgroup_config->use = $args->use;
		$signupgroup_config->membergroup = $args->membergroup;

		$oModuleController = &getController('module');
		$output = $oModuleController->insertModuleConfig('signupgroup', $signupgroup_config);

		$this->setMessage("success_saved");
	}
}