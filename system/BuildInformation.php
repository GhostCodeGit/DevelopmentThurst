<?php
define('DT_IS_STABLE', false);
define('DT_IS_RELEASE', false);
define('DT_VERSION', '0.0.0.7RC1');
define('DT_CT_VERSION', '0.0.1');
define('DT_FULL_VERSION', str_replace('  ', ' ', 'DevelopmentThurst '.DT_VERSION.' '.(DT_IS_RELEASE?"Release":"")." ".(DT_IS_STABLE?"Stable":"")." | PHP ".phpversion()));
?>