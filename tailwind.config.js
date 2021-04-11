const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['source/**/*.blade.php', 'source/**/*.md', 'source/**/*.html'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Commissioner', ...defaultTheme.fontFamily.sans],
        mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
      },
      colors: {
        primary: colors.lightBlue,
        success: colors.emerald,
        danger: colors.rose,
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            fontWeight: theme('fontWeight.light'),
            color: theme('colors.gray.600'),
            h1: {
              fontWeight: theme('fontWeight.medium'),
              color: theme('colors.primary.700'),
            },
            h2: {
              fontWeight: theme('fontWeight.normal'),
            },
            h3: {
              fontWeight: theme('fontWeight.normal'),
            },
            a: {
              color: theme('colors.primary.500'),
              '&:hover': {
                color: theme('colors.primary.700'),
              },
            },
            blockquote: {
              color: theme('colors.gray.700'),
              fontStyle: 'normal',
            },
            'blockquote p:first-of-type::before': {
              content: 'none',
            },
            'blockquote p:first-of-type::after': {
              content: 'none',
            },
            code: {
              fontWeight: theme('fontWeight.normal'),
              backgroundColor: theme('colors.gray.100'),
              borderRadius: theme('borderRadius.sm'),
              padding: `${theme('spacing[0.5]')} theme('spacing.1')`,
            },
          },
        },
      }),
    },
  },
  corePlugins: {
    container: false,
  },
  plugins: [require('@tailwindcss/typography')],
}
