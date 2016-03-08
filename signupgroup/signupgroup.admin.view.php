<?php
class signupgroupAdminView extends signupgroup {
	function init() {
		// 모듈정보를 가져온다.
		/*$oSignupgroupModel = &getModel('signupgroup');
		$this->module_info = $oSignupgroupModel->getModulesInfo();
		Context::set('module_info',$this->module_info);*/

		// 모듈 설정값
		// Get configurations (using module model object)
		$oModuleModel = getModel('module');
		$this->config = $oModuleModel->getModuleConfig('signupgroup');
		Context::set('signupgroup_config',$this->config);

		// 템플릿정보를 가져온다.
		$this->setTemplatePath($this->module_path."/tpl/");
		$template_path = sprintf("%stpl/",$this->module_path);
		$this->setTemplatePath($template_path);
	}
	
	function dispSignupgroupAdminSetup() {
/*		// 회원그룹목록가져오기
		$oMemberModel = &getModel('member');
		$output = $oMemberModel->getGroups();
		Context::set('group_list', $output);

		// 스킨목록가져오기
		$oModuleModel = &getModel('module');
		$skin_list = $oModuleModel->getSkins($this->module_path);
		Context::set('skin_list',$skin_list);

		// 레이아웃 목록가져오기
		$oLayoutMode = &getModel('layout');
		$layout_list = $oLayoutMode->getLayoutList();
		Context::set('layout_list', $layout_list);
*/

		$oMemberModel = getModel('member');
		$group_lists = $oMemberModel->getGroups();
		Context::set('group_list', $group_lists);

		/*foreach ($group_lists as $group) {
			if($group->title !== '정회원') continue;
			$group_jung = $group->group_srl;
		}*/

		// 템플릿파일이름 정하기
		$this->setTemplateFile('setup');
	}

	function dispSignupgroupAdminGrantInfo() {
		// 공통 모듈 권한 설정 페이지 호출
		$oModuleAdminModel = &getAdminModel('module');
		$grant_content = $oModuleAdminModel->getModuleGrantHTML($this->module_info->module_srl, $this->xml_info->grant);
		Context::set('grant_content', $grant_content);

		$this->setTemplateFile('grant_list');
	}
}