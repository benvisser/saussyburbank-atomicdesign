<?php
/**
 * Select — Atom
 *
 * Renders a styled select dropdown with label and error support.
 *
 * @param string $name     Input name (required).
 * @param string $label    Label text.
 * @param array  $options  Associative array of value => display text.
 * @param string $selected Currently selected value.
 * @param string $hint     Help text.
 * @param string $error    Error message.
 * @param bool   $disabled Disabled state.
 * @param bool   $required Required state.
 * @param string $class    Additional classes.
 * @param string $id       Custom ID.
 */

$name     = $name     ?? '';
$label    = $label    ?? '';
$options  = $options  ?? [];
$selected = $selected ?? '';
$hint     = $hint     ?? '';
$error    = $error    ?? '';
$disabled = $disabled ?? false;
$required = $required ?? false;
$class    = $class    ?? '';
$id       = $id       ?? $name;

$has_error = ! empty( $error );

$select_classes = trim( implode( ' ', [
	'form-select', // @layer component base from main.css
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

	<select
		id="<?php echo esc_attr( $id ); ?>"
		name="<?php echo esc_attr( $name ); ?>"
		class="<?php echo esc_attr( $select_classes ); ?>"
		<?php if ( $disabled ) : ?>disabled<?php endif; ?>
		<?php if ( $required ) : ?>required aria-required="true"<?php endif; ?>
		<?php if ( $has_error ) : ?>
			aria-invalid="true"
			aria-describedby="<?php echo esc_attr( $id ); ?>-error"
		<?php endif; ?>
	>
		<?php foreach ( $options as $value => $text ) : ?>
			<option
				value="<?php echo esc_attr( $value ); ?>"
				<?php selected( $selected, $value ); ?>
			>
				<?php echo esc_html( $text ); ?>
			</option>
		<?php endforeach; ?>
	</select>

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
