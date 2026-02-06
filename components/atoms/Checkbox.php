<?php
/**
 * Checkbox / Radio — Atom
 *
 * @param string $name     Input name (required).
 * @param string $label    Label text (required).
 * @param string $type     checkbox|radio (default: checkbox).
 * @param string $value    Input value.
 * @param bool   $checked  Whether checked by default.
 * @param bool   $disabled Disabled state.
 * @param string $class    Additional wrapper classes.
 * @param string $id       Custom ID.
 */

$name     = $name     ?? '';
$label    = $label    ?? '';
$type     = $type     ?? 'checkbox';
$value    = $value    ?? '';
$checked  = $checked  ?? false;
$disabled = $disabled ?? false;
$class    = $class    ?? '';
$id       = $id       ?? $name . '-' . sanitize_title( $value ?: $label );
?>

<label
	for="<?php echo esc_attr( $id ); ?>"
	class="<?php echo esc_attr( trim( 'form-check ' . $class ) ); ?>"
>
	<input
		type="<?php echo esc_attr( $type ); ?>"
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		<?php if ( $value ) : ?>
			value="<?php echo esc_attr( $value ); ?>"
		<?php endif; ?>
		<?php if ( $checked ) : ?>checked<?php endif; ?>
		<?php if ( $disabled ) : ?>disabled<?php endif; ?>
	>
	<span class="text-body-sm text-dark"><?php echo esc_html( $label ); ?></span>
</label>
