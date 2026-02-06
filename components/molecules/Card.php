<?php
/**
 * Card — Molecule
 *
 * Container with border, rounded corners, and hover shadow.
 * Content is passed via $content or as a slot between open/close tags.
 *
 * @param string $content Inner HTML content.
 * @param string $href    Optional link URL (wraps card in an anchor).
 * @param string $class   Additional wrapper classes.
 */

$content = $content ?? '';
$href    = $href    ?? '';
$class   = $class   ?? '';

$card_classes = trim( implode( ' ', [
	'bg-surface border border-border rounded-lg overflow-hidden transition-shadow duration-base hover:shadow-lg',
	$class,
] ) );
?>

<?php if ( $href ) : ?>
	<a href="<?php echo esc_url( $href ); ?>" class="<?php echo esc_attr( $card_classes ); ?> block no-underline">
		<div class="p-6">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</a>
<?php else : ?>
	<div class="<?php echo esc_attr( $card_classes ); ?>">
		<div class="p-6">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</div>
<?php endif; ?>
