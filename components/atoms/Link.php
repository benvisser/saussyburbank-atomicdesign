<?php
/**
 * Link — Atom
 *
 * Styled anchor element. For button-styled links, use Button.php with tag="a".
 *
 * @param string $label  Link text (required).
 * @param string $href   URL (required).
 * @param bool   $external Whether to open in new tab (default: false).
 * @param string $class  Additional classes.
 */

$label    = $label    ?? '';
$href     = $href     ?? '#';
$external = $external ?? false;
$class    = $class    ?? '';

$classes = trim( 'text-link underline underline-offset-[3px] decoration-1 transition-colors duration-fast hover:text-link-hover focus-visible:outline-2 focus-visible:outline-focus focus-visible:outline-offset-2 focus-visible:rounded-sm ' . $class );
?>

<a
	href="<?php echo esc_url( $href ); ?>"
	class="<?php echo esc_attr( $classes ); ?>"
	<?php if ( $external ) : ?>
		target="_blank" rel="noopener noreferrer"
	<?php endif; ?>
>
	<?php echo esc_html( $label ); ?>
</a>
