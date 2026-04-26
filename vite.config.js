import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/filament/monitor/theme.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
        host: "0.0.0.0",
        port: 5173, // Port standar Vite
        strictPort: false,
        hmr: {
            // host: "192.168.0.105",
            host: "192.168.100.25",
            // host: "10.194.145.250",
        },
        cors: true, // Izinkan akses lintas perangkat
    },
});
