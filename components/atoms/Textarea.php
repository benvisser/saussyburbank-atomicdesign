<?php
/**
 * Textarea — Atom
 *
 * @param string $name        Input name (required).
 * @param string $label       Label text.
 * @param string $placeholder Placeholder text.
 * @param string $value       Current value.
 * @param string $hint        Help text.
 * @param string $error       Error message.
 * @param bool   $disabled    Disabled state.
 * @param bool   $required    Required state.
 * @param string $class       Additional classes.
 * @param string $id          Custom ID.
 */

$name        = $name        ?? '';
$label       = $label       ?? '';
$placeholder = $placeholder ?? '';
$value       = $value       ?? '';
$hint        = $hint        ?? '';
$error       = $error       ?? '';
$disabled    = $disabled    ?? false;
$required    = $required    ?? false;
$class       = $class       ?? '';
$id          = $id          ?? $name;

$has_error = ! empty( $error );

$textarea_classes = trim( implode( ' ', [
	'form-textarea', // @layer component base from main.css
	$has_error ? 'border-error focus:shadow-error-ring' : '',
	$class,
] ) );
?>

<div>
	<?php if ( $label ) : ?>
		<label
			for="<?php echo esc_attr( $id ); ?>"
			class="block font-body text-body-sm font-medium text-dark mb-2"
		>
			<?php echo esc_html( $label ); ?>
			<?php if ( $required ) : ?>
				<span class="text-error" aria-hidden="true">*</span>
			<?php endif; ?>
		</label>
	<?php endif; ?>

	<textarea
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		class="<?php echo esc_attr( $textarea_classes ); ?>"
		<?php if ( $placeholder ) : ?>
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
		<?php endif; ?>
		<?php if ( $disabled ) : ?>disabled<?php endif; ?>
		<?php if ( $required ) : ?>required aria-required="true"<?php endif; ?>
		<?php if ( $has_error ) : ?>
			aria-invalid="true"
			aria-describedby="<?php echo esc_attr( $id ); ?>-error"
		<?php elseif ( $hint ) : ?>
			aria-describedby="<?php echo esc_attr( $id ); ?>-hint"
		<?php endif; ?>
	><?php echo esc_textarea( $value ); ?></textarea>

	<?php if ( $has_error ) : ?>
		<p id="<?php echo esc_attr( $id ); ?>-error" class="text-[13px] text-error mt-1" role="alert">
			<?php echo esc_html( $error ); ?>
		</p>
	<?php elseif ( $hint ) : ?>
		<p id="<?php echo esc_attr( $id ); ?>-hint" class="text-[13px] text-muted mt-1">
			<?php echo esc_html( $hint ); ?>
		</p>
	<?php endif; ?>
</div>
