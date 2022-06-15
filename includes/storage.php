<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage PETERMASON
 * @since PETERMASON 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('petermason_storage_get')) {
	function petermason_storage_get($var_name, $default='') {
		global $PETERMASON_STORAGE;
		return isset($PETERMASON_STORAGE[$var_name]) ? $PETERMASON_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('petermason_storage_set')) {
	function petermason_storage_set($var_name, $value) {
		global $PETERMASON_STORAGE;
		$PETERMASON_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('petermason_storage_empty')) {
	function petermason_storage_empty($var_name, $key='', $key2='') {
		global $PETERMASON_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($PETERMASON_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($PETERMASON_STORAGE[$var_name][$key]);
		else
			return empty($PETERMASON_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('petermason_storage_isset')) {
	function petermason_storage_isset($var_name, $key='', $key2='') {
		global $PETERMASON_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($PETERMASON_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($PETERMASON_STORAGE[$var_name][$key]);
		else
			return isset($PETERMASON_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('petermason_storage_inc')) {
	function petermason_storage_inc($var_name, $value=1) {
		global $PETERMASON_STORAGE;
		if (empty($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = 0;
		$PETERMASON_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('petermason_storage_concat')) {
	function petermason_storage_concat($var_name, $value) {
		global $PETERMASON_STORAGE;
		if (empty($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = '';
		$PETERMASON_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('petermason_storage_get_array')) {
	function petermason_storage_get_array($var_name, $key, $key2='', $default='') {
		global $PETERMASON_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($PETERMASON_STORAGE[$var_name][$key]) ? $PETERMASON_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($PETERMASON_STORAGE[$var_name][$key][$key2]) ? $PETERMASON_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('petermason_storage_set_array')) {
	function petermason_storage_set_array($var_name, $key, $value) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if ($key==='')
			$PETERMASON_STORAGE[$var_name][] = $value;
		else
			$PETERMASON_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('petermason_storage_set_array2')) {
	function petermason_storage_set_array2($var_name, $key, $key2, $value) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if (!isset($PETERMASON_STORAGE[$var_name][$key])) $PETERMASON_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$PETERMASON_STORAGE[$var_name][$key][] = $value;
		else
			$PETERMASON_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('petermason_storage_merge_array')) {
	function petermason_storage_merge_array($var_name, $key, $value) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if ($key==='')
			$PETERMASON_STORAGE[$var_name] = array_merge($PETERMASON_STORAGE[$var_name], $value);
		else
			$PETERMASON_STORAGE[$var_name][$key] = array_merge($PETERMASON_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('petermason_storage_set_array_after')) {
	function petermason_storage_set_array_after($var_name, $after, $key, $value='') {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if (is_array($key))
			petermason_array_insert_after($PETERMASON_STORAGE[$var_name], $after, $key);
		else
			petermason_array_insert_after($PETERMASON_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('petermason_storage_set_array_before')) {
	function petermason_storage_set_array_before($var_name, $before, $key, $value='') {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if (is_array($key))
			petermason_array_insert_before($PETERMASON_STORAGE[$var_name], $before, $key);
		else
			petermason_array_insert_before($PETERMASON_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('petermason_storage_push_array')) {
	function petermason_storage_push_array($var_name, $key, $value) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($PETERMASON_STORAGE[$var_name], $value);
		else {
			if (!isset($PETERMASON_STORAGE[$var_name][$key])) $PETERMASON_STORAGE[$var_name][$key] = array();
			array_push($PETERMASON_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('petermason_storage_pop_array')) {
	function petermason_storage_pop_array($var_name, $key='', $defa='') {
		global $PETERMASON_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($PETERMASON_STORAGE[$var_name]) && is_array($PETERMASON_STORAGE[$var_name]) && count($PETERMASON_STORAGE[$var_name]) > 0) 
				$rez = array_pop($PETERMASON_STORAGE[$var_name]);
		} else {
			if (isset($PETERMASON_STORAGE[$var_name][$key]) && is_array($PETERMASON_STORAGE[$var_name][$key]) && count($PETERMASON_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($PETERMASON_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('petermason_storage_inc_array')) {
	function petermason_storage_inc_array($var_name, $key, $value=1) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if (empty($PETERMASON_STORAGE[$var_name][$key])) $PETERMASON_STORAGE[$var_name][$key] = 0;
		$PETERMASON_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('petermason_storage_concat_array')) {
	function petermason_storage_concat_array($var_name, $key, $value) {
		global $PETERMASON_STORAGE;
		if (!isset($PETERMASON_STORAGE[$var_name])) $PETERMASON_STORAGE[$var_name] = array();
		if (empty($PETERMASON_STORAGE[$var_name][$key])) $PETERMASON_STORAGE[$var_name][$key] = '';
		$PETERMASON_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('petermason_storage_call_obj_method')) {
	function petermason_storage_call_obj_method($var_name, $method, $param=null) {
		global $PETERMASON_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($PETERMASON_STORAGE[$var_name]) ? $PETERMASON_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($PETERMASON_STORAGE[$var_name]) ? $PETERMASON_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('petermason_storage_get_obj_property')) {
	function petermason_storage_get_obj_property($var_name, $prop, $default='') {
		global $PETERMASON_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($PETERMASON_STORAGE[$var_name]->$prop) ? $PETERMASON_STORAGE[$var_name]->$prop : $default;
	}
}
?>