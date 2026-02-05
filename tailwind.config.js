// Saussy Burbank Design System — Tailwind Configuration
// Map these tokens into your WordPress theme's tailwind.config.js

module.exports = {
  theme: {
    extend: {
      colors: {
        primary:   { DEFAULT: '#171796', hover: '#0D0D61', light: '#EFEFEF' },
        secondary: { DEFAULT: '#EFEFEF', hover: '#E3E3E3' },
        dark:      '#35373C',
        body:      '#6B7280',
        muted:     '#9CA3AF',
        border:    '#E5E7EB',
        surface:   { DEFAULT: '#FFFFFF', alt: '#FAFAFA', dark: '#35373C' },
        success:   { DEFAULT: '#10B981', light: '#34C092' },
        warning:   { DEFAULT: '#D97706', light: '#F59E0B' },
        error:     { DEFAULT: '#EF4444', light: '#FEF2F2' },
        info:      { DEFAULT: '#2563EB', light: '#EFF6FF' },
        focus:     '#171796',
        disabled:  { DEFAULT: '#E5E7EB', text: '#9CA3AF' },
        link:      { DEFAULT: '#171796', hover: '#0D0D61', visited: '#5B4A6B' },
      },
      fontFamily: {
        display: ['larken', 'Georgia', 'Times New Roman', 'serif'],
        body:    ['proxima-nova', 'Helvetica Neue', 'Arial', 'sans-serif'],
      },
      fontSize: {
        'h1': ['80px', { lineHeight: '102%', fontWeight: '100' }],
        'h2': ['64px', { lineHeight: '110%', fontWeight: '100' }],
        'h3': ['45px', { lineHeight: '110%', fontWeight: '100' }],
        'h4': ['14px', { lineHeight: 'normal', fontWeight: '325', letterSpacing: '0.08em' }],
        'body-lg': ['18px', { lineHeight: '168%', fontWeight: '325' }],
        'body-sm': ['14px', { lineHeight: '174%', fontWeight: '325' }],
        'caption': ['12px', { lineHeight: '160%', fontWeight: '325' }],
      },
      borderRadius: {
        'full': '9999px',
      },
      maxWidth: {
        'site':    '1280px',
        'content': '960px',
      },
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
      boxShadow: {
        'sm': '0 1px 2px rgba(0, 0, 0, 0.05)',
        'md': '0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -2px rgba(0, 0, 0, 0.05)',
        'lg': '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -4px rgba(0, 0, 0, 0.04)',
      },
      transitionDuration: {
        'fast': '150ms',
        'base': '250ms',
        'slow': '400ms',
      },
    },
  },
  plugins: [],
}
