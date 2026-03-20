import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'node:path';

export default defineConfig({
	plugins: [tailwindcss()],
	build: {
		emptyOutDir: true,
		outDir: 'resources/dist',
		rollupOptions: {
			input: resolve(__dirname, 'resources/css/theme.css'),
			output: {
				assetFileNames: (assetInfo) => 'assets/[name]-[hash][extname]',
				entryFileNames: 'assets/[name]-[hash].js',
			},
		},
	},
});