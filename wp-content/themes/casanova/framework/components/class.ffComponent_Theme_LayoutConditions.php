<?php

class ffComponent_Theme_LayoutConditions extends ffOptionsHolder {
	public function getOptions() {
		
		$s = $this->_getOnestructurefactory()->createOneStructure('layout-conditions');
		
		$s->startSection('conditions');
			$s->addOption(ffOneOption::TYPE_CONDITIONAL_LOGIC, 'show-where');
		$s->endSection();
		
		return $s;
	}
}