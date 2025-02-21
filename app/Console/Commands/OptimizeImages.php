<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class OptimizeImages extends Command
{
    protected $signature = 'images:optimize';
    protected $description = 'Tüm resimleri optimize eder ve sıkıştırır.';

    public function handle()
    {
        $this->info('Görseller optimize ediliyor...');

        // Public/uploads klasörünün tamamını tara
        $directory = public_path('uploads');
        $files = File::allFiles($directory); // Tüm alt klasörleri de tarar

        foreach ($files as $file) {
            $path = $file->getRealPath();

            // Sadece belirli formatları optimize et
            if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                OptimizerChainFactory::create()->optimize($path);
                $this->info("✅ Optimize edildi: {$file->getRelativePathname()}");
            } else {
                $this->warn("⚠️ Atlandı (desteklenmeyen format): {$file->getRelativePathname()}");
            }
        }

        $this->info('🎉 Tüm uygun görseller optimize edildi!');
    }
}
