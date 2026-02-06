<?php
/**
 * Button — Atom
 *
 * Renders a button or anchor element with Tailwind utility classes.
 *
 * @param string $label    Button text (required).
 * @param string $variant  primary|secondary|outline|text (default: primary).
 * @param string $size     sm|md|lg (default: md).
 * @param string $tag      button|a (default: button).
 * @param string $href     URL for anchor variant.
 * @param string $icon     Material Symbols icon name (optional).
 * @param string $icon_pos before|after (default: before).
 * @param bool   $disabled Whether the button is disabled (default: false).
 * @param string $type     Submit/button/reset for <button> (default: button).
 * @param string $class    Additional classes to append.
 * @param array  $attrs    Extra HTML attributes as key => value pairs.
 */

// Defaults.
$label    = $label    ?? '';
$variant  = $variant  ?? 'primary';
$size     = $size     ?? 'md';
$tag      = $tag      ?? 'button';
$href     = $href     ?? '#';
$icon     = $icon     ?? '';
$icon_pos = $icon_pos ?? 'before';
$disabled = $disabled ?? false;
$type     = $type     ?? 'button';
$class    = $class    ?? '';
$attrs    = $attrs    ?? [];

// Base classes shared by all button variants.
$base = 'inline-flex items-center justify-center gap-2 font-body font-medium no-underline cursor-pointer transition-all duration-base whitespace-nowrap focus-visible:outline-2 focus-visible:outline-focus focus-visible:outline-offset-2';

// Size classes (not applied to text variant).
$sizes = [
	'sm' => 'text-[13px] py-2 px-5',
	'md' => 'text-[14px] py-3 px-6',
	'lg' => 'text-[16px] py-4 px-8',
];

// Variant classes — text variant omits rounded-full and border-2 since it has no visible container.
$variants = [
	'primary'   => 'border-2 border-primary rounded-full bg-primary text-white hover:bg-primary-hover hover:border-primary-hover',
	'secondary' => 'border-2 border-secondary rounded-full bg-secondary text-dark hover:bg-secondary-hover hover:border-secondary-hover',
	'outline'   => 'border-2 border-primary rounded-full bg-transparent text-primary hover:bg-primary hover:text-white',
	'text'      => 'bg-transparent text-primary underline underline-offset-[3px] hover:text-primary-hover',
];

// Disabled classes (override variant).
$disabled_classes = 'bg-disabled text-disabled-text border-disabled cursor-not-allowed pointer-events-none';

// Text variant uses its own font size; other variants get size padding + pill shape.
$size_classes = 'text' === $variant
	? ( 'sm' === $size ? 'text-[13px]' : ( 'lg' === $size ? 'text-[16px]' : 'text-[14px]' ) )
	: ( $sizes[ $size ] ?? $sizes['md'] );

// Assemble classes.
$classes = trim( implode( ' ', [
	$base,
	$size_classes,
	$disabled ? $disabled_classes : ( $variants[ $variant ] ?? $variants['primary'] ),
	$class,
] ) );

// Build extra attributes string.
$attr_string = '';
foreach ( $attrs as $key => $value ) {
	$attr_string .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
}

// Icon markup.
$icon_html = '';
if ( $icon ) {
	$icon_html = '<span class="material-symbols-outlined text-[18px]">' . esc_html( $icon ) . '</span>';
}
?>

<?php if ( 'a' === $tag ) : ?>
	<a
		href="<?php echo esc_url( $href ); ?>"
		class="<?php echo esc_attr( $classes ); ?>"
		<?php if ( $disabled ) : ?>
			aria-disabled="true" tabindex="-1"
		<?php endif; ?>
		<?php echo $attr_string; ?>
	>
		<?php if ( $icon && 'before' === $icon_pos ) echo $icon_html; ?>
		<?php echo esc_html( $label ); ?>
		<?php if ( $icon && 'after' === $icon_pos ) echo $icon_html; ?>
	</a>
<?php else : ?>
	<button
		type="<?php echo esc_attr( $type ); ?>"
		class="<?php echo esc_attr( $classes ); ?>"
		<?php if ( $disabled ) : ?>
			disabled aria-disabled="true"
		<?php endif; ?>
		<?php echo $attr_string; ?>
	>
		<?php if ( $icon && 'before' === $icon_pos ) echo $icon_html; ?>
		<?php echo esc_html( $label ); ?>
		<?php if ( $icon && 'after' === $icon_pos ) echo $icon_html; ?>
	</button>
<?php endif; ?>
