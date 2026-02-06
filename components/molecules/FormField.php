<?php
/**
 * FormField — Molecule
 *
 * Convenience wrapper that renders the correct atom based on $type.
 * Delegates to Input.php, Select.php, Textarea.php, or Checkbox.php.
 *
 * @param string $type    input|select|textarea|checkbox|radio (default: input).
 * @param array  $props   Props to pass through to the child atom.
 */

$type  = $type  ?? 'input';
$props = $props ?? [];

// Map type to component file.
$components = [
	'input'    => __DIR__ . '/../atoms/Input.php',
	'select'   => __DIR__ . '/../atoms/Select.php',
	'textarea' => __DIR__ . '/../atoms/Textarea.php',
	'checkbox' => __DIR__ . '/../atoms/Checkbox.php',
	'radio'    => __DIR__ . '/../atoms/Checkbox.php',
];

$component_path = $components[ $type ] ?? $components['input'];

// For radio type, override the type prop.
if ( 'radio' === $type ) {
	$props['type'] = 'radio';
}

// Extract props into local scope and include the component.
extract( $props ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
include $component_path;
