import path from 'node:path';
import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: path.resolve(process.cwd(), 'src/app.js'),
      output: {
        entryFileNames: 'assets/[name]-[hash].js',
        chunkFileNames: 'assets/[name]-[hash].js',
        assetFileNames: ({ name }) => {
          const ext = name ? path.extname(name) : '';
          const base = name ? path.basename(name, ext) : 'asset';

          return `assets/${base}-[hash]${ext}`;
        },
      },
    },
  },
  css: {
    devSourcemap: true,
  },
});
