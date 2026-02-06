<?php
/**
 * Icon — Atom
 *
 * Renders a Material Symbols Outlined icon.
 *
 * @param string $name  Icon name from Material Symbols (required).
 * @param string $size  sm|md|lg (default: md).
 * @param string $class Additional classes (e.g. color utilities).
 */

$name  = $name  ?? '';
$size  = $size  ?? 'md';
$class = $class ?? '';

$sizes = [
	'sm' => 'text-[18px]',
	'md' => 'text-[24px]',
	'lg' => 'text-[32px]',
];

$classes = trim( implode( ' ', [
	'material-symbols-outlined align-middle',
	$sizes[ $size ] ?? $sizes['md'],
	$class,
] ) );
?>

<span class="<?php echo esc_attr( $classes ); ?>"><?php echo esc_html( $name ); ?></span>
