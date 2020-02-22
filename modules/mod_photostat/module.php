<?php

function mod_photostat($module_id){

    $inCore = cmsCore::getInstance();
    $inDB   = cmsDatabase::getInstance();

    $cfg = $inCore->loadModuleConfig($module_id);

    if (!isset($cfg['show_users'])) {$cfg['show_users'] = 1;}
    if (!isset($cfg['showuс'])) {$cfg['showuc'] = 1;}
    if (!isset($cfg['show_photos'])) {$cfg['show_photos'] = 1;}
    if (!isset($cfg['show_photos_size'])) {$cfg['show_photos_size'] = 1;}
    if (!isset($cfg['show_sometext'])) {$cfg['show_sometext'] = 1;}

   $col = array();

    if ($cfg['show_users'] == 1){
        $sql = "SELECT 1 FROM cms_users u WHERE u.is_deleted = 0 AND u.is_locked = 0";
        $result = $inDB->query($sql) ;
        $col['users'] = $inDB->num_rows($result);
        if(!$col['users']) {$col['users'] = 0;}
    }
    
    if ($cfg['show_photos'] == 1){

        $sql = "SELECT 1 FROM cms_photo_files WHERE published = 1";
        $result = $inDB->query($sql) ;
        $col['photos'] = $inDB->num_rows($result);
        if(!$col['photos']) {$col['photos'] = 0;}

    }

    if ($cfg['showuс'] == 1){
        $sql = "SELECT 1 FROM cms_uc_items WHERE published = 1";
        $result = $inDB->query($sql) ;
        $col['uс_items'] = $inDB->num_rows($result);
        if(!$col['uс_items']) {$col['uс_items'] = 0;}
    }

    if ($cfg['show_photos_size'] == 1){
        $path = PATH.'/images/photos';        
        $total = getDirectorySize($path);
        $col['photos_size'] = sizeFormat($total['size']);
        if(!$col['photos_size']) {$col['photos_size'] = 0;}
    }
    
    $smarty = $inCore->initSmarty('modules', 'mod_photostat.tpl');
    $smarty->assign('cfg', $cfg);
    $smarty->assign('col', $col);
    $smarty->display('mod_photostat.tpl');

    return true;

}

function getDirectorySize($path) {
  $totalsize = 0;
  $totalcount = 0;
  $dircount = 0;
  if ($handle = opendir ($path)) {
    while (false !== ($file = readdir($handle))) {
      $nextpath = $path . '/' . $file;
      if ($file != '.' && $file != '..' && !is_link ($nextpath)) {
        if (is_dir ($nextpath)) {
          $dircount++;
          $result = getDirectorySize($nextpath);
          $totalsize += $result['size'];
          $totalcount += $result['count'];
          $dircount += $result['dircount'];
        } elseif (is_file ($nextpath)) {
          $totalsize += filesize ($nextpath);
          $totalcount++;
        }
      }
    }
  }
  closedir ($handle);
  $total['size'] = $totalsize;
  $total['count'] = $totalcount;
  $total['dircount'] = $dircount;
  return $total;
}

function sizeFormat($size) {
    
    if($size<1024) {
        return $size." bytes";
    } else if($size<(1024*1024)) {
        $size=round($size/1024,1);
        return $size." Kb";
    } else if($size<(1024*1024*1024)) {
        $size=round($size/(1024*1024),1);
        return $size." Mb";
    } else {
        $size=round($size/(1024*1024*1024),1);
        return $size." Gb";
    }

}
?>