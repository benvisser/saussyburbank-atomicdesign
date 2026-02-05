# CLAUDE.md — Saussy Burbank Atomic Design System

## Project Overview

A pure CSS design system for Saussy Burbank's marketing website, built on **atomic design principles** for integration into a WordPress custom theme with Tailwind CSS. No JavaScript, no build process — just modular CSS files with CSS Custom Properties.

## Repository Structure

```
├── tokens/              # Design tokens (CSS custom properties on :root)
│   ├── colors.css       # Brand, neutral, semantic, surface, interactive colors
│   ├── typography.css   # Font families, sizes, weights, line-heights
│   └── spacing.css      # Spacing scale, sizing, radii, shadows, transitions
├── atoms/               # Smallest UI building blocks (single HTML elements)
│   ├── buttons.css      # .btn + variants: primary, secondary, outline, text × sm/md/lg
│   ├── forms.css        # Inputs, selects, textareas, checkboxes, radios
│   ├── badges.css       # Status badges (primary, success, warning, error)
│   ├── links.css        # Link styles with hover, visited, focus states
│   ├── lists.css        # Ordered and unordered list styles
│   ├── blockquote.css   # Pull quote styling
│   ├── divider.css      # Horizontal rules
│   └── icons.css        # Material Symbols config and size classes
├── molecules/           # Combinations of atoms
│   ├── alerts.css       # Alert banners (success, warning, error, info)
│   ├── cards.css        # Card container with hover states
│   └── tables.css       # Data table styles
├── design-system.css    # Single-file entry point (@import of all modules)
├── tailwind.config.js   # Tailwind theme extension mapping tokens
├── reference.html       # Visual reference page showing all components
└── README.md            # Project documentation
```

**Planned (not yet implemented):** Organisms (header, hero, footer) and Templates (page layouts).

## No Build System

This project has **no package.json, no build scripts, no bundler, no dev server**. It is a static CSS design system consumed via direct `@import` or `<link>` tags. The `tailwind.config.js` is a reference config to copy into a WordPress theme — it is not used by this repo directly.

## No Tests or Linting

There are no automated tests, linters, or formatters configured. Visual verification is done via `reference.html`.

## CSS Architecture & Conventions

### Token System (tokens/)

All design values are defined as CSS Custom Properties on `:root`. Components reference tokens — never hardcoded values.

- **Colors:** `--color-{name}` (e.g., `--color-primary`, `--color-error-light`)
- **Spacing:** `--space-{n}` where n = 1–24 mapping to 4px–96px
- **Typography:** `--font-display`, `--font-body`, `--text-{size}`
- **Radii:** `--radius-sm`, `--radius-md`, `--radius-lg`, `--radius-full`
- **Shadows:** `--shadow-sm`, `--shadow-md`, `--shadow-lg`
- **Transitions:** `--transition-fast` (150ms), `--transition-base` (250ms), `--transition-slow` (400ms)
- **Layout:** `--max-width-site` (1280px), `--max-width-content` (960px)

### Naming Conventions

- **Base class:** `.btn`, `.form-input`, `.card`, `.alert`, `.badge`
- **Variant modifier:** `.btn-primary`, `.btn-outline`, `.alert-success`
- **Size modifier:** `.btn-sm`, `.btn-md`, `.btn-lg`
- **State class:** `.is-error` (for form validation)
- **CSS pseudo-states:** `:hover`, `:focus-visible`, `:disabled`
- **ARIA support:** `[aria-disabled="true"]` selectors alongside `:disabled`

### File Header Convention

Every CSS file starts with a block comment describing the component:
```css
/* ================================================================
   COMPONENT NAME — Level (Atom/Molecule)
   Brief description of variants and states
   ================================================================ */
```

### Key Design Decisions

- **Fonts:** Larken (display, weight 100) and Proxima Nova (body, weight 325) via Adobe Fonts; Material Symbols Outlined via Google Fonts
- **Primary brand color:** `#171796` (deep blue/indigo)
- **Border radius:** Buttons use `--radius-full` (pill shape); cards/inputs use `--radius-md`
- **Focus states:** All interactive elements use `outline: 2px solid var(--color-focus-ring)` with `outline-offset: 2px`
- **Responsive:** Headings (h1–h3) scale down at `<768px` breakpoint
- **No JavaScript:** All interactivity is CSS-only (`:hover`, `:focus-visible`, `:disabled`)

## Adding New Components

1. **Determine the atomic level:**
   - **Atom** = single HTML element (button, input, badge)
   - **Molecule** = simple group of atoms (alert = icon + text, card = container + content)
   - **Organism** = complex section (header, hero, footer) — not yet started

2. **Create a new `.css` file** in the appropriate directory (`atoms/` or `molecules/`).

3. **Use design tokens** — reference `var(--color-*)`, `var(--space-*)`, etc. Never hardcode values.

4. **Follow the naming pattern:** `.component-name` base class, `.component-name-variant` for variants, `.component-name-size` for sizes.

5. **Include states:** `:hover`, `:focus-visible`, `:disabled`, and `[aria-disabled="true"]`.

6. **Add the file header comment** following the existing convention.

7. **Register the import** in `design-system.css` under the appropriate section (Atoms or Molecules).

8. **Add examples** to `reference.html` to visually demonstrate the component.

9. **Keep Tailwind config in sync** — if new tokens are added, update `tailwind.config.js`.

## Brand Colors Quick Reference

| Token | Hex | Usage |
|-------|-----|-------|
| `--color-primary` | `#171796` | Primary actions, links, focus rings |
| `--color-primary-hover` | `#0D0D61` | Hover state for primary |
| `--color-secondary` | `#EFEFEF` | Secondary buttons, backgrounds |
| `--color-dark` | `#35373C` | Headings, dark text |
| `--color-body` | `#6B7280` | Body text |
| `--color-success` | `#10B981` | Success states |
| `--color-warning` | `#D97706` | Warning states |
| `--color-error` | `#EF4444` | Error states |
| `--color-info` | `#2563EB` | Informational states |

## Git History

The project has a short commit history. Commits use the `feat:` prefix convention. There is no CI/CD pipeline configured.
