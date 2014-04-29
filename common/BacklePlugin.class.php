<?php
/**  Gforge Backle plugin
 *
 * Copyright 2014, Sebastian Mancke
 *
 */

class BacklePlugin extends Plugin {
  function BacklePlugin () {
    $this->Plugin() ;
    $this->name = 'backle';
    $this->text = 'Backle'; // To show in the tabs, use...
    $this->hooks[] = "groupmenu" ;	// To put into the project tabs
    $this->hooks[] = "groupisactivecheckbox" ; // The "use ..." checkbox in editgroupinfo
    $this->hooks[] = "groupisactivecheckboxpost" ; //
  }
  
  function CallHook ($hookname, &$params) {
    if (isset($params['group_id'])) {
      $group_id=$params['group_id'];
    } elseif (isset($params['group'])) {
      $group_id=$params['group'];
    } else {
      $group_id=null;
    }

    if ($hookname == "groupmenu") {
      $project = group_get_object($group_id);
      if (!$project 
	  || !is_object($project)
	  || $project->isError()
	  || !$project->isProject()) {
	return;
      }

      
      if ( $project->usesPlugin ( $this->name ) ) {
	$params['OTHER'][]=false;
	$params['TOOLTIPS'][] = _('Backle - the agile backlog');
	$params['TITLES'][]= 'Backlog';
	$params['DIRS'][]=util_make_url('/backle/'.$project->getUnixName());
	if ($params['toptab'] == $this->name) {
		$params['selected'] = count($params['TITLES']) - 1;
	}
      }
    }  
  }
}
