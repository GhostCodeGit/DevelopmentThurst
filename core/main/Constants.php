<?php

use ct\rtti\RTTIObject;

global $_constants;
$_constants = new Constants();

class Constants {
	
	public function add($name, $value=null){
		if(is_array($name) && is_null($value)) {
			for($i = 0; $i < count($name) - 1; $i++) {
				define($name[$i], $i);
			}
		} else {
			define($name, $value);
		}
	}
	
	public function remove($name){
		if($this->is($name) and function_exists('runkit_constant_remove')) runkit_constant_remove($name);
	}
	
	public function is($name){
		return defined($name);
	}
	
}

$_constants->add("HInstance", 4194304);
$_constants->add("RT_RCDATA", 10);

// Cursors
$_constants->add("crDefault", 0);
$_constants->add("crNone", -1);
$_constants->add("crArrow", -2);
$_constants->add("crCross", -3);
$_constants->add("crIBeam", -4);
$_constants->add("crSize", -5);
$_constants->add("crSizeNESW", -6);
$_constants->add("crSizeNS", -7);
$_constants->add("crSizeNWSE", -8);
$_constants->add("crSizeWE", -9);
$_constants->add("crUpArrow", -10);
$_constants->add("crHourGlass", -11);
$_constants->add("crDrag", -12);
$_constants->add("crNoDrop", -13);
$_constants->add("crHSplit", -14);
$_constants->add("crVSplit", -15);
$_constants->add("crMultiDrag", -16);
$_constants->add("crSQLWait", -17);
$_constants->add("crNo", -18);
$_constants->add("crAppStart", -19);
$_constants->add("crHelp", -20);
$_constants->add("crHandPoint", -21);
$_constants->add("crSizeAll", -22);

// TCategoryButtons Button Options
$_constants->add("boAllowReorder", 0);
$_constants->add("boAllowCopyingButtons", 1);
$_constants->add("boFullSize", 2);
$_constants->add("boGradientFill", 3);
$_constants->add("boShowCaptions", 4);
$_constants->add("boVerticalCategoryCaptions", 5);
$_constants->add("boBoldCaptions", 6);
$_constants->add("boUsePlusMinus", 7);
$_constants->add("boCaptionOnlyBorder", 8);

// MessageBox Button types
$_constants->add("MB_OK", 0);
$_constants->add("MB_OKCANCEL", 1);
$_constants->add("MB_ABORTRETRYIGNORE", 2);
$_constants->add("MB_YESNOCANCEL", 3);
$_constants->add("MB_YESNO", 4);
$_constants->add("MB_RETRYCANCEL", 5);

// MessageBox Icon types
$_constants->add("MB_ICONWARNING", 48);
$_constants->add("MB_ICONINFORMATION", 64);
$_constants->add("MB_ICONASTERICS", 64);
$_constants->add("MB_ICONQUESTION", 32);
$_constants->add("MB_ICONSTOP", 16);
$_constants->add("MB_ICONERROR", 16);
$_constants->add("MB_ICONHAND", 16);

// MessageBox stay values
$_constants->add("MB_APPLMODAL", 0);
$_constants->add("MB_SYSTEMMODAL", 4096);
$_constants->add("MB_TASKMODAL", 8192);

// MessageBox other values
$_constants->add("MB_RIGHT", 524288);
$_constants->add("MB_RTLREADING", 1048576);
$_constants->add("MB_SETFOREGROUND", 65536);
$_constants->add("MB_TOPMOST", 262144);

// MessageBox result type
$_constants->add("IDOK", 1);
$_constants->add("IDCANCEL", 2);
$_constants->add("IDABORT", 3);
$_constants->add("IDRETRY", 4);
$_constants->add("IDIGNORE", 5);
$_constants->add("IDYES", 6);
$_constants->add("IDNO", 7);
$_constants->add("IDTRYAGAIN", 10);
$_constants->add("IDCONTINUE", 11);

// Form positions
$_constants->add("poDesigned", 0);
$_constants->add("poDefault", 1);
$_constants->add("poDefaultPosOnly", 2);
$_constants->add("poDefaultSizeOnly", 3);
$_constants->add("poScreenCenter", 4);
$_constants->add("poDesktopCenter", 5);
$_constants->add("poMainFormCenter", 6);
$_constants->add("poOwnerFormCenter", 7);

// Form Style
$_constants->add("fsNormal", 0);
$_constants->add("fsMDIChild", 1);
$_constants->add("fsMDIForm", 2);
$_constants->add("fsStayOnTop", 3);

// Font Style
$_constants->add("fsBold", 0);
$_constants->add("fsItalic", 1);
$_constants->add("fsUnderline", 2);
$_constants->add("fsStrikeOut", 3);

// Drawing Style
$_constants->add("dsFocus", 0);
$_constants->add("dsSelected", 1);
$_constants->add("dsNormal", 2);
$_constants->add("dsTransparent", 3);

// Color Depth
$_constants->add("cdDefault", 0);
$_constants->add("cdDeviceDependent", 1);
$_constants->add("cd4Bit", 2);
$_constants->add("cd8Bit", 3);
$_constants->add("cd16Bit", 4);
$_constants->add("cd24Bit", 5);
$_constants->add("cd32Bit", 6);

// Window style
$_constants->add("wsNormal", 0);
$_constants->add("wsMinimized", 1);
$_constants->add("wsMaximized", 2);

// Align
$_constants->add("alNone", 0);
$_constants->add("alTop", 1);
$_constants->add("alBottom", 2);
$_constants->add("alLeft", 3);
$_constants->add("alRight", 4);
$_constants->add("alClient", 5);
$_constants->add("alCustom", 6);

// BS
$_constants->add("bsSolid", 0);
$_constants->add("bsClear", 1);
$_constants->add("bsHorizontal", 2);
$_constants->add("bsVertical", 3);
$_constants->add("bsFDiagonal", 4);
$_constants->add("bsBDiagonal", 5);
$_constants->add("bsCross", 6);
$_constants->add("bsDiagCross", 7);

// Border Style
$_constants->add("bsNone", 0);
$_constants->add("bsSingle", 1);
$_constants->add("bsSizeable", 2);
$_constants->add("bsDialog", 3);
$_constants->add("bsToolWindow", 4);
$_constants->add("bsSizeToolWin", 5);

// Bevel Outer
$_constants->add("bvNone", 0);
$_constants->add("bvLowered", 1);
$_constants->add("bvRaised", 2);
$_constants->add("bvSpace", 3);

// Text align
$_constants->add("taLeftJustify", 0);
$_constants->add("taCenter", 1);
$_constants->add("taRightJustify", 2);

// Colors
$_constants->add("COLOR_SCROLLBAR", 0);
$_constants->add("COLOR_BACKGROUND", 1);
$_constants->add("COLOR_ACTIVECAPTION", 2);
$_constants->add("COLOR_INACTIVECAPTION", 3);
$_constants->add("COLOR_MENU", 4);
$_constants->add("COLOR_WINDOW", 5);
$_constants->add("COLOR_WINDOWFRAME", 6);
$_constants->add("COLOR_MENUTEXT", 7);
$_constants->add("COLOR_WINDOWTEXT", 8);
$_constants->add("COLOR_CAPTIONTEXT", 9);
$_constants->add("COLOR_ACTIVEBORDER", 10);
$_constants->add("COLOR_INACTIVEBORDER", 11);
$_constants->add("COLOR_APPWORKSPACE", 12);
$_constants->add("COLOR_HIGHLIGHT", 13);
$_constants->add("COLOR_HIGHLIGHTTEXT", 14);
$_constants->add("COLOR_BTNFACE", 15);
$_constants->add("COLOR_BTNSHADOW", 0x10);
$_constants->add("COLOR_GRAYTEXT", 17);
$_constants->add("COLOR_BTNTEXT", 18);
$_constants->add("COLOR_INACTIVECAPTIONTEXT", 19);
$_constants->add("COLOR_BTNHIGHLIGHT", 20);

$_constants->add("COLOR_3DDKSHADOW", 21);
$_constants->add("COLOR_3DLIGHT", 22);
$_constants->add("COLOR_INFOTEXT", 23);
$_constants->add("COLOR_INFOBK", 24);

$_constants->add("COLOR_HOTLIGHT", 26);
$_constants->add("COLOR_GRADIENTACTIVECAPTION", 27);
$_constants->add("COLOR_GRADIENTINACTIVECAPTION", 28);

$_constants->add("COLOR_MENUHILIGHT", 29);
$_constants->add("COLOR_MENUBAR", 30);

$_constants->add("COLOR_ENDCOLORS", COLOR_MENUBAR);

$_constants->add("COLOR_DESKTOP", COLOR_BACKGROUND);
$_constants->add("COLOR_3DFACE", COLOR_BTNFACE);
$_constants->add("COLOR_3DSHADOW", COLOR_BTNSHADOW);
$_constants->add("COLOR_3DHIGHLIGHT", COLOR_BTNHIGHLIGHT);
$_constants->add("COLOR_3DHILIGHT", COLOR_BTNHIGHLIGHT);
$_constants->add("COLOR_BTNHILIGHT", COLOR_BTNHIGHLIGHT);

$_constants->add("clSystemColor", 0xFF000000);

$_constants->add("clScrollBar", clSystemColor | COLOR_SCROLLBAR);
$_constants->add("clBackground", clSystemColor | COLOR_BACKGROUND);
$_constants->add("clActiveCaption", clSystemColor | COLOR_ACTIVECAPTION);
$_constants->add("clInactiveCaption", clSystemColor | COLOR_INACTIVECAPTION);
$_constants->add("clMenu", clSystemColor | COLOR_MENU);
$_constants->add("clWindow", clSystemColor | COLOR_WINDOW);
$_constants->add("clWindowFrame", clSystemColor | COLOR_WINDOWFRAME);
$_constants->add("clMenuText", clSystemColor | COLOR_MENUTEXT);
$_constants->add("clWindowText", clSystemColor | COLOR_WINDOWTEXT);
$_constants->add("clCaptionText", clSystemColor | COLOR_CAPTIONTEXT);
$_constants->add("clActiveBorder", clSystemColor | COLOR_ACTIVEBORDER);
$_constants->add("clInactiveBorder", clSystemColor | COLOR_INACTIVEBORDER);
$_constants->add("clAppWorkSpace", clSystemColor | COLOR_APPWORKSPACE);
$_constants->add("clHighlight", clSystemColor | COLOR_HIGHLIGHT);
$_constants->add("clHighlightText", clSystemColor | COLOR_HIGHLIGHTTEXT);
$_constants->add("clBtnFace", clSystemColor | COLOR_BTNFACE);
$_constants->add("clBtnShadow", clSystemColor | COLOR_BTNSHADOW);
$_constants->add("clGrayText", clSystemColor | COLOR_GRAYTEXT);
$_constants->add("clBtnText", clSystemColor | COLOR_BTNTEXT);
$_constants->add("clInactiveCaptionText", clSystemColor | COLOR_INACTIVECAPTIONTEXT);
$_constants->add("clBtnHighlight", clSystemColor | COLOR_BTNHIGHLIGHT);
$_constants->add("cl3DDkShadow", clSystemColor | COLOR_3DDKSHADOW);
$_constants->add("cl3DLight", clSystemColor | COLOR_3DLIGHT);
$_constants->add("clInfoText", clSystemColor | COLOR_INFOTEXT);
$_constants->add("clInfoBk", clSystemColor | COLOR_INFOBK);
$_constants->add("clHotLight", clSystemColor | COLOR_HOTLIGHT);
$_constants->add("clGradientActiveCaption", clSystemColor | COLOR_GRADIENTACTIVECAPTION);
$_constants->add("clGradientInactiveCaption", clSystemColor | COLOR_GRADIENTINACTIVECAPTION);
$_constants->add("clMenuHighlight", clSystemColor | COLOR_MENUHILIGHT);
$_constants->add("clMenuBar", clSystemColor | COLOR_MENUBAR);

$_constants->add("clBlack", 0x000000);
$_constants->add("clMaroon", 0x000080);
$_constants->add("clGreen", 0x008000);
$_constants->add("clOlive", 0x008080);
$_constants->add("clNavy", 0x800000);
$_constants->add("clPurple", 0x800080);
$_constants->add("clTeal", 0x808000);
$_constants->add("clGray", 0x808080);
$_constants->add("clSilver", 0xC0C0C0);
$_constants->add("clRed", 0x0000FF);
$_constants->add("clLime", 0x00FF00);
$_constants->add("clYellow", 0x00FFFF);
$_constants->add("clBlue", 0xFF0000);
$_constants->add("clFuchsia", 0xFF00FF);
$_constants->add("clAqua", 0xFFFF00);
$_constants->add("clLtGray", 0xC0C0C0);
$_constants->add("clDkGray", 0x808080);
$_constants->add("clWhite", 0xFFFFFF);
$_constants->add("StandardColorsCount,", 16);

$_constants->add("clMoneyGreen", 0xC0DCC0);
$_constants->add("clSkyBlue", 0xF0CAA6);
$_constants->add("clCream", 0xF0FBFF);
$_constants->add("clMedGray", 0xA4A0A0);

$_constants->add("clNone", 0x1FFFFFFF);
$_constants->add("clDefault", 0x20000000);

$_constants->add("VK_LBUTTON", 1);
$_constants->add("VK_RBUTTON", 2);
$_constants->add("VK_CANCEL", 3); 
$_constants->add("VK_MBUTTON", 4);
$_constants->add("VK_BACK", 8);
$_constants->add("VK_TAB", 9); 
$_constants->add("VK_CLEAR", 12);
$_constants->add("VK_RETURN", 13);
$_constants->add("VK_SHIFT", 0x10);
$_constants->add("VK_CONTROL", 17);
$_constants->add("VK_MENU", 18);
$_constants->add("VK_ALT", 18);
$_constants->add("VK_PAUSE", 19);
$_constants->add("VK_CAPITAL", 20);
$_constants->add("VK_KANA", 21);
$_constants->add("VK_HANGUL", 21);
$_constants->add("VK_JUNJA", 23);
$_constants->add("VK_FINAL", 24);
$_constants->add("VK_HANJA", 25);
$_constants->add("VK_KANJI", 25);
$_constants->add("VK_CONVERT", 28);
$_constants->add("VK_NONCONVERT", 29);
$_constants->add("VK_ACCEPT", 30);
$_constants->add("VK_MODECHANGE", 31);
$_constants->add("VK_ESCAPE", 27);
$_constants->add("VK_SPACE", 0x20);
$_constants->add("VK_PRIOR", 33);
$_constants->add("VK_NEXT", 34);
$_constants->add("VK_END", 35);
$_constants->add("VK_HOME", 36);
$_constants->add("VK_LEFT", 37);
$_constants->add("VK_UP", 38);
$_constants->add("VK_RIGHT", 39);
$_constants->add("VK_DOWN", 40);
$_constants->add("VK_SELECT", 41);
$_constants->add("VK_PRINT", 42);
$_constants->add("VK_EXECUTE", 43);
$_constants->add("VK_SNAPSHOT", 44);
$_constants->add("VK_INSERT", 45);
$_constants->add("VK_DELETE", 46);
$_constants->add("VK_HELP", 47);
$_constants->add("VK_LWIN", 91);
$_constants->add("VK_RWIN", 92);
$_constants->add("VK_APPS", 93);
$_constants->add("VK_NUMPAD0", 96);
$_constants->add("VK_NUMPAD1", 97);
$_constants->add("VK_NUMPAD2", 98);
$_constants->add("VK_NUMPAD3", 99);
$_constants->add("VK_NUMPAD4", 100);
$_constants->add("VK_NUMPAD5", 101);
$_constants->add("VK_NUMPAD6", 102);
$_constants->add("VK_NUMPAD7", 103);
$_constants->add("VK_NUMPAD8", 104);
$_constants->add("VK_NUMPAD9", 105);
$_constants->add("VK_MULTIPLY", 106);
$_constants->add("VK_ADD", 107);
$_constants->add("VK_SEPARATOR", 108);
$_constants->add("VK_SUBTRACT", 109);
$_constants->add("VK_DECIMAL", 110);
$_constants->add("VK_DIVIDE", 111);
$_constants->add("VK_F1", 112);
$_constants->add("VK_F2", 113);
$_constants->add("VK_F3", 114);
$_constants->add("VK_F4", 115);
$_constants->add("VK_F5", 116);
$_constants->add("VK_F6", 117);
$_constants->add("VK_F7", 118);
$_constants->add("VK_F8", 119);
$_constants->add("VK_F9", 120);
$_constants->add("VK_F10", 121);
$_constants->add("VK_F11", 122);
$_constants->add("VK_F12", 123);
$_constants->add("VK_F13", 124);
$_constants->add("VK_F14", 125);
$_constants->add("VK_F15", 126);
$_constants->add("VK_F16", 127);
$_constants->add("VK_F17", 128);
$_constants->add("VK_F18", 129);
$_constants->add("VK_F19", 130);
$_constants->add("VK_F20", 131);
$_constants->add("VK_F21", 132);
$_constants->add("VK_F22", 133);
$_constants->add("VK_F23", 134);
$_constants->add("VK_F24", 135);
$_constants->add("VK_NUMLOCK", 144);
$_constants->add("VK_SCROLL", 145);
$_constants->add("VK_LSHIFT", 160);
$_constants->add("VK_RSHIFT", 161);
$_constants->add("VK_LCONTROL", 162);
$_constants->add("VK_RCONTROL", 163);
$_constants->add("VK_LMENU", 164);
$_constants->add("VK_RMENU", 165);
$_constants->add("VK_PROCESSKEY", 229);
$_constants->add("VK_ATTN", 246);
$_constants->add("VK_CRSEL", 247);
$_constants->add("VK_EXSEL", 248);
$_constants->add("VK_EREOF", 249);
$_constants->add("VK_PLAY", 250);
$_constants->add("VK_ZOOM", 251);
$_constants->add("VK_NONAME", 252);
$_constants->add("VK_PA1", 253);
$_constants->add("VK_OEM_CLEAR", 254);
?>