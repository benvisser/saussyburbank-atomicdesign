/**
 * Saussy Burbank Design System — Tailwind Configuration
 *
 * SINGLE SOURCE OF TRUTH for all design tokens.
 * All colors, typography, spacing, and effects are defined here.
 * PHP components reference these via Tailwind utility classes.
 *
 * Adobe Fonts kit: https://use.typekit.net/qnw7qtb.css
 * Icons: Material Symbols Outlined (Google Fonts)
 */

module.exports = {
  content: [
    './components/**/*.php',
    './templates/**/*.php',
    './reference.html',
  ],

  theme: {
    extend: {
      /* ----------------------------------------------------------------
         COLORS
         ---------------------------------------------------------------- */
      colors: {
        // Primary brand
        primary: {
          DEFAULT: '#171796',
          hover:   '#0D0D61',
          light:   '#EFEFEF',
        },
        secondary: {
          DEFAULT: '#EFEFEF',
          hover:   '#E3E3E3',
        },

        // Neutrals
        dark:     '#35373C',
        body:     '#6B7280',
        muted:    '#9CA3AF',
        border:   '#E5E7EB',

        // Surfaces
        surface: {
          DEFAULT:     '#FFFFFF',
          alt:         '#FAFAFA',
          dark:        '#35373C',
          'dark-text': '#F9FAFB',
        },
        overlay: 'rgba(0, 0, 0, 0.5)',

        // Semantic
        success: {
          DEFAULT: '#10B981',
          light:   '#34C092',
          bg:      '#D1FAE5',
          text:    '#065F46',
        },
        warning: {
          DEFAULT: '#D97706',
          light:   '#F59E0B',
          bg:      '#FEF3C7',
          text:    '#92400E',
        },
        error: {
          DEFAULT: '#EF4444',
          light:   '#FEF2F2',
          bg:      '#FEE2E2',
          text:    '#991B1B',
        },
        info: {
          DEFAULT: '#2563EB',
          light:   '#EFF6FF',
          text:    '#1E40AF',
        },

        // Interactive
        focus:    '#171796',
        disabled: {
          DEFAULT: '#E5E7EB',
          text:    '#9CA3AF',
        },
        link: {
          DEFAULT: '#171796',
          hover:   '#0D0D61',
          visited: '#5B4A6B',
        },
      },

      /* ----------------------------------------------------------------
         TYPOGRAPHY
         ---------------------------------------------------------------- */
      fontFamily: {
        display: ['larken', 'Georgia', 'Times New Roman', 'serif'],
        body:    ['proxima-nova', 'Helvetica Neue', 'Arial', 'sans-serif'],
      },
      fontSize: {
        'h1':      ['80px', { lineHeight: '102%', fontWeight: '100' }],
        'h2':      ['64px', { lineHeight: '110%', fontWeight: '100' }],
        'h3':      ['45px', { lineHeight: '110%', fontWeight: '100' }],
        'h4':      ['14px', { lineHeight: 'normal', fontWeight: '325', letterSpacing: '0.08em' }],
        'body-lg': ['18px', { lineHeight: '168%', fontWeight: '325' }],
        'body-sm': ['14px', { lineHeight: '174%', fontWeight: '325' }],
        'caption': ['12px', { lineHeight: '160%', fontWeight: '325' }],
        // Responsive heading sizes (used with md: breakpoint prefix)
        'h1-mobile': ['48px', { lineHeight: '102%', fontWeight: '100' }],
        'h2-mobile': ['40px', { lineHeight: '110%', fontWeight: '100' }],
        'h3-mobile': ['30px', { lineHeight: '110%', fontWeight: '100' }],
      },
      fontWeight: {
        thin:   '100',
        book:   '325',
        medium: '500',
      },
      letterSpacing: {
        'wide-caps': '0.08em',
      },

      /* ----------------------------------------------------------------
         SPACING & SIZING
         ---------------------------------------------------------------- */
      spacing: {
        '1':  '4px',
        '2':  '8px',
        '3':  '12px',
        '4':  '16px',
        '5':  '20px',
        '6':  '24px',
        '8':  '32px',
        '10': '40px',
        '12': '48px',
        '16': '64px',
        '20': '80px',
        '24': '96px',
      },
      maxWidth: {
        'site':    '1280px',
        'content': '960px',
      },

      /* ----------------------------------------------------------------
         BORDERS & RADII
         ---------------------------------------------------------------- */
      borderRadius: {
        'sm':   '4px',
        'md':   '8px',
        'lg':   '12px',
        'full': '9999px',
      },

      /* ----------------------------------------------------------------
         SHADOWS & EFFECTS
         ---------------------------------------------------------------- */
      boxShadow: {
        'sm': '0 1px 2px rgba(0, 0, 0, 0.05)',
        'md': '0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05)',
        'lg': '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.04)',
        // Focus rings for form elements
        'focus-ring': '0 0 0 3px rgba(23, 23, 150, 0.15)',
        'error-ring': '0 0 0 3px rgba(239, 68, 68, 0.15)',
      },

      /* ----------------------------------------------------------------
         TRANSITIONS
         ---------------------------------------------------------------- */
      transitionDuration: {
        'fast': '150ms',
        'base': '250ms',
        'slow': '400ms',
      },
    },
  },

  plugins: [],
}
