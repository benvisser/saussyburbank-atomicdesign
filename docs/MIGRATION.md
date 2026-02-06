# Migration Guide: v1 (Custom CSS) to v2 (Tailwind-First)

## Why We Made This Change

The v1 design system used custom CSS component classes (`.btn-primary`, `.card`, `.alert`, etc.) with CSS custom properties for tokens. This approach had several issues for a WordPress theme:

1. **Duplicated tokens** — Design values lived in both `/tokens/*.css` AND `tailwind.config.js`, creating drift risk.
2. **Two styling systems** — Developers had to choose between custom classes and Tailwind utilities, leading to inconsistency.
3. **No component encapsulation** — CSS classes don't enforce prop contracts or accessibility patterns.
4. **Larger CSS bundle** — All component CSS ships whether used or not.

The v2 architecture solves these by making `tailwind.config.js` the single source of truth and using PHP template partials to encapsulate component logic, accessibility, and styling.

## New Architecture

```
tailwind.config.js            ← Single source of truth for ALL tokens
assets/css/main.css           ← @tailwind directives + minimal @layer components
components/
  atoms/
    Button.php                ← Accepts $variant, $size, $label, $icon, $disabled
    Badge.php                 ← Accepts $variant, $label
    Icon.php                  ← Accepts $name, $size
    Input.php                 ← Accepts $name, $label, $error, $hint, $disabled
    Select.php                ← Accepts $name, $label, $options, $error
    Textarea.php              ← Accepts $name, $label, $hint, $error
    Checkbox.php              ← Accepts $name, $label, $type (checkbox|radio)
    Link.php                  ← Accepts $label, $href, $external
  molecules/
    Alert.php                 ← Accepts $type, $message (auto-selects icon)
    Card.php                  ← Accepts $content, $href
    FormField.php             ← Convenience wrapper, delegates by $type
  organisms/                  ← Coming soon (header, hero, footer)
docs/
  MIGRATION.md                ← This file
  legacy-tokens/              ← Archived v1 CSS for reference
```

## How to Use PHP Components

### Basic Usage

Set variables, then `include` the component file:

```php
<?php
$variant = 'primary';
$size    = 'md';
$label   = 'Get Started';
$icon    = 'arrow_forward';
include get_template_directory() . '/components/atoms/Button.php';
?>
```

### Available Components

#### Button (`components/atoms/Button.php`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `$label` | string | `''` | Button text |
| `$variant` | string | `'primary'` | `primary`, `secondary`, `outline`, `text` |
| `$size` | string | `'md'` | `sm`, `md`, `lg` |
| `$tag` | string | `'button'` | `button` or `a` |
| `$href` | string | `'#'` | URL (when `$tag = 'a'`) |
| `$icon` | string | `''` | Material Symbols icon name |
| `$icon_pos` | string | `'before'` | `before` or `after` |
| `$disabled` | bool | `false` | Disabled state |
| `$type` | string | `'button'` | HTML button type |
| `$class` | string | `''` | Additional CSS classes |

#### Input (`components/atoms/Input.php`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `$name` | string | `''` | Input name attribute |
| `$label` | string | `''` | Label text |
| `$type` | string | `'text'` | Input type |
| `$placeholder` | string | `''` | Placeholder text |
| `$value` | string | `''` | Current value |
| `$hint` | string | `''` | Help text below input |
| `$error` | string | `''` | Error message (triggers error state) |
| `$disabled` | bool | `false` | Disabled state |
| `$required` | bool | `false` | Required state |

#### Alert (`components/molecules/Alert.php`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `$message` | string | `''` | Alert content (supports HTML) |
| `$type` | string | `'info'` | `success`, `warning`, `error`, `info` |
| `$icon` | string | auto | Override auto-selected icon |

#### Badge (`components/atoms/Badge.php`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `$label` | string | `''` | Badge text |
| `$variant` | string | `'primary'` | `primary`, `secondary`, `success`, `warning`, `error` |

#### Card (`components/molecules/Card.php`)

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `$content` | string | `''` | Inner HTML |
| `$href` | string | `''` | Link URL (makes card clickable) |

## When to Use @layer Components vs. Inline Utilities

### Use `@layer components` when:
- A pattern requires **SVG background images** (checkbox marks, select arrows)
- A pattern has **5+ pseudo-class states** that would make the class string unreadable
- Custom appearance resets are needed (`appearance: none` + custom styling)

These live in `assets/css/main.css`:
- `.form-input` / `.form-textarea` / `.form-select` — form field base styles
- `.form-check` — checkbox/radio custom appearance

### Use inline Tailwind utilities when:
- The component is a PHP partial that encapsulates the classes
- States are simple (1-2 hover/focus modifiers)
- The pattern is used in a single context

Examples: buttons, badges, alerts, cards, links.

### Never use @apply for:
- One-off page-level styling
- Layout utilities
- Anything that could be a Tailwind utility class

## Design Token Reference

All tokens are defined in `tailwind.config.js`. Key mappings:

| Category | Tailwind Prefix | Example |
|----------|----------------|---------|
| Colors | `text-`, `bg-`, `border-` | `bg-primary`, `text-error-text` |
| Fonts | `font-` | `font-display`, `font-body` |
| Font sizes | `text-` | `text-h1`, `text-body-sm`, `text-caption` |
| Font weights | `font-` | `font-thin` (100), `font-book` (325), `font-medium` (500) |
| Spacing | `p-`, `m-`, `gap-` | `p-6` (24px), `gap-4` (16px) |
| Radius | `rounded-` | `rounded-sm`, `rounded-md`, `rounded-lg`, `rounded-full` |
| Shadows | `shadow-` | `shadow-sm`, `shadow-md`, `shadow-lg` |
| Transitions | `duration-` | `duration-fast`, `duration-base`, `duration-slow` |

## Files Removed

| v1 File | Status | Reason |
|---------|--------|--------|
| `tokens/colors.css` | Archived to `docs/legacy-tokens/` | Tokens now in `tailwind.config.js` |
| `tokens/typography.css` | Archived | Tokens now in `tailwind.config.js` |
| `tokens/spacing.css` | Archived | Tokens now in `tailwind.config.js` |
| `atoms/*.css` | Deleted | Replaced by PHP components |
| `molecules/*.css` | Deleted | Replaced by PHP components |
| `design-system.css` | Deleted | Replaced by `assets/css/main.css` |
