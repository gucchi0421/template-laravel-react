import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { TanStackRouterVite } from '@tanstack/router-plugin/vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/views/main.tsx'],
      refresh: true,
    }),
    react(),
    TanStackRouterVite({}),
  ],
  resolve: {
    alias: [{ find: '@/', replacement: `${__dirname}/resources/views/` }],
  },
});
