<?php
class signupgroupController extends signupgroup
{
	/**
	 * Initialization
	 *
	 * @return void
	 */
	function init()
	{
	}


	function triggerSetMemberGroup(&$args)
	{
		// Get configurations (using module model object)
		$oModuleModel = getModel('module');
		$signupgroup_config = $oModuleModel->getModuleConfig('signupgroup');

		if($signupgroup_config->use == 'Y' && $signupgroup_config->membergroup !== NULL)
		{
			/*// 정회원 group_srl 값 구하기
			$group_jung = 0;
			$oMemberModel = getModel('member');
			$group_lists = $oMemberModel->getGroups();

			foreach ($group_lists as $group) {
				if($group->title !== '정회원') continue;
				$group_jung = $group->group_srl;
			}*/

			$extra_vars = unserialize($args->extra_vars);

			// 정회원 여부
			$regular_member = $extra_vars->member_group_check;

			// 주소 상세 입력란을 참조하기
			$detail_address = $extra_vars->member_address[3];


			// 생년월일
			if($args->birthday_ui)
			{
				$tz  = new DateTimeZone('Europe/Brussels');
				$age = DateTime::createFromFormat('Y-m-d', $args->birthday_ui, $tz)->diff(New DateTime('now', $tz))->y;
			}


			/*$myFile = "testFilemodule.txt";
		    $fh = fopen($myFile, 'w') or die("can't open file");
	    	$stringData = print_r($args,true).'////'.print_r($detail_address, true).'////'.print_r($group_jung, true).'////'.print_r($age, true);
		    fwrite($fh, $stringData);
	    	fclose($fh);*/

			if($regular_member == '정회원' && preg_match('/(동|산|리)\d.*/i', $detail_address) && $args >= $signupgroup_config->ages)
			{

		    	// 가입자의 멤버 그룹 지정하기
		    	// 복수로 지정해 줄 수 있음 (2|@|3|@|4)
				// $args->group_srl_list = $group_jung;
				$args->group_srl_list = $signupgroup_config->membergroup;
			}
		}

		//return new Object(0,'뭔가 이상함');
		return new Object();
	}


	function triggerSetMemberGroupView()
	{
		Context::addJsFile(dirname().'./modules/signupgroup/tpl/js/toggle_forms.js');

	}
}