# Saussy Burbank — Atomic Design System (v2 — Tailwind-First)

A Tailwind-first design system for Saussy Burbank's marketing website, built with atomic design principles for use in a WordPress custom theme.

## Architecture

Design tokens live in `tailwind.config.js` (single source of truth). Components are PHP template partials that compose Tailwind utility classes.

```
├── tailwind.config.js          # ALL design tokens (colors, fonts, spacing, etc.)
├── assets/css/main.css         # @tailwind directives + minimal @layer components
├── components/
│   ├── atoms/                  # Smallest UI building blocks
│   │   ├── Button.php          # $variant, $size, $label, $icon, $disabled
│   │   ├── Badge.php           # $variant, $label
│   │   ├── Icon.php            # $name, $size
│   │   ├── Input.php           # $name, $label, $error, $hint
│   │   ├── Select.php          # $name, $label, $options
│   │   ├── Textarea.php        # $name, $label, $hint, $error
│   │   ├── Checkbox.php        # $name, $label, $type (checkbox|radio)
│   │   └── Link.php            # $label, $href, $external
│   ├── molecules/              # Combinations of atoms
│   │   ├── Alert.php           # $type, $message (auto icon)
│   │   ├── Card.php            # $content, $href
│   │   └── FormField.php       # Delegates to atoms by $type
│   └── organisms/              # Coming soon
├── reference.html              # Visual reference with migration guide
├── docs/
│   ├── MIGRATION.md            # v1 → v2 migration guide
│   └── legacy-tokens/          # Archived v1 CSS files
└── README.md
```

## Quick Start

### 1. Install Tailwind and load the config

Copy `tailwind.config.js` into your WordPress theme, or merge its `theme.extend` values into your existing config.

### 2. Include the stylesheet

Add to your theme's `<head>`:

```html
<!-- Adobe Fonts: Larken + Proxima Nova -->
<link rel="stylesheet" href="https://use.typekit.net/qnw7qtb.css">

<!-- Material Symbols -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- Compiled Tailwind CSS -->
<link rel="stylesheet" href="assets/css/main.css">
```

### 3. Use PHP components

```php
<?php
// Primary button with icon
$variant = 'primary';
$label   = 'Schedule a Tour';
$icon    = 'calendar_today';
include get_template_directory() . '/components/atoms/Button.php';

// Success alert
$type    = 'success';
$message = '<strong>Booked!</strong> Your tour is confirmed.';
include get_template_directory() . '/components/molecules/Alert.php';

// Text input with validation
$name  = 'email';
$label = 'Email Address';
$type  = 'email';
$error = 'Please enter a valid email.';
include get_template_directory() . '/components/atoms/Input.php';
?>
```

## Fonts

- **Larken** (display/headings) — loaded via Adobe Fonts
- **Proxima Nova** (body/UI) — loaded via Adobe Fonts
- **Material Symbols Outlined** (icons) — Google Fonts, free

Fonts are loaded via the Adobe Fonts kit (`qnw7qtb`). The `@import` is included in `assets/css/main.css`.

## Accessibility

- All interactive elements include visible `:focus-visible` outlines
- Contrast ratios checked against WCAG AA (see reference.html for notes)
- Form components auto-generate `aria-invalid`, `aria-describedby`, and `aria-required` attributes
- Semantic HTML enforced by PHP component templates

## Adding Components

Follow atomic design principles:
1. **Atoms** — single HTML elements (button, input, badge)
2. **Molecules** — simple groups of atoms (alert = icon + text, card = container + content)
3. **Organisms** — complex sections (header, hero, footer) — *coming soon*
4. **Templates** — page-level layouts — *coming soon*

Use inline Tailwind utilities in PHP templates. Only use `@layer components` in `main.css` for patterns requiring SVG backgrounds or 5+ pseudo-class states.

## Migration from v1

See [docs/MIGRATION.md](docs/MIGRATION.md) for the full migration guide, including class-to-utility mappings.
