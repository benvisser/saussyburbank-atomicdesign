<?php
/**
 * Input — Atom
 *
 * Renders a text input with label, hint, and error support.
 *
 * @param string $name        Input name attribute (required).
 * @param string $label       Label text (optional, omit for hidden label).
 * @param string $type        Input type: text|email|tel|password|url|number (default: text).
 * @param string $placeholder Placeholder text.
 * @param string $value       Current value.
 * @param string $hint        Help text shown below input.
 * @param string $error       Error message (triggers error state when non-empty).
 * @param bool   $disabled    Disabled state.
 * @param bool   $required    Whether the field is required.
 * @param string $class       Additional classes for the input element.
 * @param string $id          Custom ID (defaults to $name).
 */

$name        = $name        ?? '';
$label       = $label       ?? '';
$type        = $type        ?? 'text';
$placeholder = $placeholder ?? '';
$value       = $value       ?? '';
$hint        = $hint        ?? '';
$error       = $error       ?? '';
$disabled    = $disabled    ?? false;
$required    = $required    ?? false;
$class       = $class       ?? '';
$id          = $id          ?? $name;

$has_error = ! empty( $error );

// Input classes — matches atoms/forms.css .form-input exactly.
$input_classes = trim( implode( ' ', [
	'form-input', // @layer component base from main.css
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

	<input
		type="<?php echo esc_attr( $type ); ?>"
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		class="<?php echo esc_attr( $input_classes ); ?>"
		<?php if ( $placeholder ) : ?>
			placeholder="<?php echo esc_attr( $placeholder ); ?>"
		<?php endif; ?>
		<?php if ( $value ) : ?>
			value="<?php echo esc_attr( $value ); ?>"
		<?php endif; ?>
		<?php if ( $disabled ) : ?>
			disabled
		<?php endif; ?>
		<?php if ( $required ) : ?>
			required aria-required="true"
		<?php endif; ?>
		<?php if ( $has_error ) : ?>
			aria-invalid="true"
			aria-describedby="<?php echo esc_attr( $id ); ?>-error"
		<?php elseif ( $hint ) : ?>
			aria-describedby="<?php echo esc_attr( $id ); ?>-hint"
		<?php endif; ?>
	>

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
