<?php
namespace fs {
	class FilesWork {
		
		public static function getAllFiles($folder, &$buffer, $subs=false, $ext='*.*'){
			$folder = str_replace('/', '\\', $folder);
			$fp = opendir($folder);
				while($cv_file = readdir($fp)) {
					if(is_file($folder."\\".$cv_file)) {
						if($ext=='*.*' or $ext==self::fileExt($cv_file)){
							$buffer[] = $folder."\\".$cv_file;
						}
					}elseif($cv_file!="." && $cv_file!=".." && is_dir($folder."\\".$cv_file)){
						if($subs) self::getAllFiles($folder."\\".$cv_file, $buffer, $subs, $ext);
					}
				}
			closedir($fp);
		}
		
		public static function fileExt($file){
			$file = basename($file);
			$k = strrpos($file,'.');
			if ($k===false) return '';
			
			return strtolower(substr($file, $k+1, strlen($file)-$k-1));
		}
		
	}
}
?>