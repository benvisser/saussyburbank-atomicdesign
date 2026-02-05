# Saussy Burbank — Atomic Design System

A reusable design system for Saussy Burbank's marketing website, built with atomic design principles for use in a WordPress custom theme with Tailwind CSS.

## Structure

```
├── tokens/              # Design tokens (CSS custom properties)
│   ├── colors.css       # Brand, neutral, semantic, surface, interactive colors
│   ├── typography.css   # Font families, sizes, weights, line-heights
│   └── spacing.css      # Spacing scale, sizing, radii, shadows, transitions
├── atoms/               # Smallest UI building blocks
│   ├── buttons.css      # Primary, secondary, outline, text — sm/md/lg
│   ├── forms.css        # Inputs, selects, textareas, checkboxes, radios
│   ├── badges.css       # Status badges (primary, success, warning, error)
│   ├── links.css        # Link styles with hover, visited, focus states
│   ├── lists.css        # Ordered and unordered list styles
│   ├── blockquote.css   # Pull quote styling
│   ├── divider.css      # Horizontal rules
│   └── icons.css        # Material Symbols config and size classes
├── molecules/           # Combinations of atoms
│   ├── alerts.css       # Success, warning, error, info alert banners
│   ├── cards.css        # Card container with hover states
│   └── tables.css       # Data table styles
├── tailwind.config.js   # Tailwind theme extension using design tokens
├── design-system.css    # Combined import file (load this one file)
├── reference.html       # Visual reference page showing all components
└── README.md
```

## Usage

### Option A: Single import
```html
<link rel="stylesheet" href="design-system.css">
```

### Option B: Individual imports
```css
@import 'tokens/colors.css';
@import 'tokens/typography.css';
@import 'tokens/spacing.css';
@import 'atoms/buttons.css';
/* ... etc */
```

### Tailwind
Copy the values from `tailwind.config.js` into your WordPress theme's Tailwind config.

## Fonts

- **Larken** (display/headings) — commercial font, requires license
- **Gotham** (body/UI) — commercial font, requires license
- **Material Symbols Outlined** (icons) — Google Fonts, free

Update the font `@import` or `<link>` tags in your theme to load Larken and Gotham via your preferred method (Adobe Fonts, self-hosted, etc.).

## Accessibility

- All interactive elements include visible `:focus-visible` outlines
- Contrast ratios checked against WCAG AA (see reference.html for notes)
- Form elements include error states with `aria-` attribute support
- Semantic HTML used throughout

## Adding Components

Follow atomic design principles:
1. **Atoms** → single HTML elements (button, input, badge)
2. **Molecules** → simple groups of atoms (alert = icon + text, card = container + content)
3. **Organisms** → complex sections (header, hero, footer) — *coming soon*
4. **Templates** → page-level layouts — *coming soon*
