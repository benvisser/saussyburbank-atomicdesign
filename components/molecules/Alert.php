<?php
/**
 * Alert — Molecule
 *
 * Feedback banner with icon, styled by type.
 *
 * @param string $message Alert message text (required). Supports inline HTML.
 * @param string $type    success|warning|error|info (default: info).
 * @param string $icon    Override icon name (auto-selected per type if omitted).
 * @param string $class   Additional wrapper classes.
 */

$message = $message ?? '';
$type    = $type    ?? 'info';
$icon    = $icon    ?? '';
$class   = $class   ?? '';

// Auto-select icon based on type.
$icons = [
	'success' => 'check_circle',
	'warning' => 'warning',
	'error'   => 'error',
	'info'    => 'info',
];

$icon = $icon ?: ( $icons[ $type ] ?? 'info' );

$base = 'flex items-start gap-3 py-4 px-5 rounded-md text-body-sm leading-normal border-l-[3px]';

$types = [
	'success' => 'bg-success-light text-success-text border-success',
	'warning' => 'bg-warning-light text-warning-text border-warning',
	'error'   => 'bg-error-light text-error-text border-error',
	'info'    => 'bg-info-light text-info-text border-info',
];

$classes = trim( implode( ' ', [
	$base,
	$types[ $type ] ?? $types['info'],
	$class,
] ) );
?>

<div class="<?php echo esc_attr( $classes ); ?>" role="alert">
	<span class="material-symbols-outlined text-[20px] mt-px shrink-0"><?php echo esc_html( $icon ); ?></span>
	<span><?php echo wp_kses_post( $message ); ?></span>
</div>
