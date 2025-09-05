import { defineConfig } from 'vite';

export default defineConfig({
  root: './',
  build: {
    outDir: './wp/wp-content/themes/lifespan-psychiatry-2024/assets',
    emptyOutDir: false,
    rollupOptions: {
      input: {
        main: './assets/js/main.js',
        style: './assets/css/main.css',
      },
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: (info) => {
          if (info.name.endsWith('.css')) {
            return 'css/[name][extname]';
          }
          return 'assets/[name][extname]';
        },
      },
    },
  },
  css: {
    postcss: {
      plugins: [
        require('tailwindcss')('./wp/wp-content/themes/lifespan-psychiatry-2024/tailwind.config.js'),
        require('autoprefixer'),
      ],
    },
  },
});
