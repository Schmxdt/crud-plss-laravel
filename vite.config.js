import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // Se você estiver usando Vue
import ViteLaravel from 'laravel-vite-plugin'; // Plugin para integração com o Laravel

export default defineConfig({
  plugins: [
    vue(),
    ViteLaravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
    }),
  ],
  build: {
    manifest: true,
    outDir: 'public/build',
  },
});
