<?php
class signupgroup extends ModuleObject {

	/**
	 * @brief 설치시 추가 작업이 필요할시 구현
	 **/
	function moduleInstall() {

		$oModuleController = getController('module');

		//썸네일 주소 리턴
		$oModuleController->insertTrigger('member.insertMember', 'signupgroup', 'controller', 'triggerSetMemberGroup', 'before');
		$oModuleController->insertTrigger('member.dispMemberSignUpForm', 'signupgroup', 'controller', 'triggerSetMemberGroupView', 'before');
		return new Object();
	}

	/**
	 * @brief 설치가 이상이 없는지 체크하는 method
	 **/
	function checkUpdate() {

		$oModuleModel = getModel('module');

		//썸네일 주소 리턴
		if(!$oModuleModel->getTrigger('member.insertMember', 'signupgroup', 'controller', 'triggerSetMemberGroup', 'before')) return true;
		if(!$oModuleModel->getTrigger('member.dispMemberSignUpForm', 'signupgroup', 'controller', 'triggerSetMemberGroupView', 'before')) return true;

		return false;
	}

	/**
	 * @brief 업데이트 실행
	 **/
	function moduleUpdate() {
		$oModuleModel = getModel('module');
		$oModuleController = &getController('module');
		//썸네일 주소 리턴
		if(!$oModuleModel->getTrigger('member.insertMember', 'signupgroup', 'controller', 'triggerSetMemberGroup', 'before'))
		{
			$oModuleController->insertTrigger('member.insertMember', 'signupgroup', 'controller', 'triggerSetMemberGroup', 'before');
		}

		if(!$oModuleModel->getTrigger('member.dispMemberSignUpForm', 'signupgroup', 'controller', 'triggerSetMemberGroupView', 'before'))
		{
			$oModuleController->insertTrigger('member.dispMemberSignUpForm', 'signupgroup', 'controller', 'triggerSetMemberGroupView', 'before');
		}

		return new Object(0, 'success_updated');
	}

	/**
	 * @brief 캐시 파일 재생성
	 **/
	function recompileCache() {
	}

}