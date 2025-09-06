// eslint.config.cjs — ESLint 9 flat config (CJS) + TS + Playwright + Prettier
const js = require('@eslint/js');
const tseslint = require('typescript-eslint');
const prettier = require('eslint-plugin-prettier');
const { FlatCompat } = require('@eslint/eslintrc');
const globals = require('globals');

// A régi (eslintrc) stílusú kiterjesztésekhez kompatibilitási wrapper
const compat = new FlatCompat({
  baseDirectory: __dirname,
});

module.exports = [
  // Alap JS szabályok (flat)
  js.configs.recommended,

  // TypeScript szabályok (flat)
  ...tseslint.configs.recommended,

  // Playwright recommended (régi formátum) → flat kompatibilitással
  ...compat.extends('plugin:playwright/recommended'),

  // Projekt-szintű beállítások
  {
    plugins: { prettier },
    languageOptions: {
      ecmaVersion: 'latest',
      sourceType: 'module',
      globals: {
        ...globals.browser,
        ...globals.node,
      },
    },
    rules: {
      'prettier/prettier': 'warn',
      '@typescript-eslint/no-unused-vars': ['warn', { argsIgnorePattern: '^_' }],
    },
    // .eslintignore helyett
    ignores: [
      'node_modules',
      'dist',
      'playwright-report',
      'test-results',
      '.husky',
      '.vscode',
    ],
  },

  // Teszt fájlokra finomhangolás (opcionális)
  {
    files: ['**/*.spec.ts', '**/*.test.ts'],
    rules: {
      '@typescript-eslint/no-explicit-any': 'off',
    },
  },
];
