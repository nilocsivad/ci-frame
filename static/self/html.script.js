
/**
 * get the borowser width and height
 */
function getBrowserWH() { 
	var intH = document.documentElement.clientHeight > document.documentElement.scrollHeight ? document.documentElement.clientHeight : document.documentElement.scrollHeight;
	var intW = document.documentElement.clientWidth > document.documentElement.scrollWidth ? document.documentElement.clientWidth : document.documentElement.scrollWidth;
	return { width: parseInt(intW), height: parseInt(intH) }; 
} 
