<?php
/**
 * Badge — Atom
 *
 * @param string $label   Badge text (required).
 * @param string $variant primary|secondary|success|warning|error (default: primary).
 * @param string $class   Additional classes.
 */

$label   = $label   ?? '';
$variant = $variant ?? 'primary';
$class   = $class   ?? '';

$base = 'inline-flex items-center gap-1 font-body text-[12px] font-medium py-1 px-3 rounded-full';

$variants = [
	'primary'   => 'bg-primary text-white',
	'secondary' => 'bg-secondary text-dark',
	'success'   => 'bg-success-bg text-success-text',
	'warning'   => 'bg-warning-bg text-warning-text',
	'error'     => 'bg-error-bg text-error-text',
];

$classes = trim( implode( ' ', [
	$base,
	$variants[ $variant ] ?? $variants['primary'],
	$class,
] ) );
?>

<span class="<?php echo esc_attr( $classes ); ?>">
	<?php echo esc_html( $label ); ?>
</span>
