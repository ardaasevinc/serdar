<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ThreatBan extends Command
{
    protected $signature = 'threat:ban
                            {action : list|ban|unban|clear}
                            {ip?   : IP adresi (ban/unban için)}
                            {--reason=manual : Ban sebebi}
                            {--hours=24 : Ban süresi (saat)}';

    protected $description = 'IP ban yönetimi';

    public function handle(): int
    {
        return match ($this->argument('action')) {
            'list'  => $this->listBans(),
            'ban'   => $this->banIp(),
            'unban' => $this->unbanIp(),
            'clear' => $this->clearAll(),
            default => $this->error('Geçersiz işlem.') ?? 1,
        };
    }

    private function listBans(): int
    {
        // Laravel Cache facade ile öneke göre arama (file/redis driver'a göre)
        $store = Cache::getStore();

        if (method_exists($store, 'many')) {
            $this->warn('Cache driver tüm key listesini desteklemiyor. Direkt Redis/file üzerinden kontrol edin.');
            return 0;
        }

        $this->info('Aktif banlar: threat:ban:* önekli cache kayıtlarını kontrol edin.');
        return 0;
    }

    private function banIp(): int
    {
        $ip = $this->argument('ip');
        if (! $ip) {
            $this->error('IP adresi gerekli.');
            return 1;
        }

        $ttl = (int) $this->option('hours') * 3600;

        Cache::put("threat:ban:{$ip}", [
            'reason'     => $this->option('reason'),
            'banned_at'  => now()->toIso8601String(),
            'expires_at' => now()->addSeconds($ttl)->toIso8601String(),
        ], $ttl);

        $this->info("✓ {$ip} adresi {$this->option('hours')} saat için banlandı.");
        return 0;
    }

    private function unbanIp(): int
    {
        $ip = $this->argument('ip');
        if (! $ip) {
            $this->error('IP adresi gerekli.');
            return 1;
        }

        Cache::forget("threat:ban:{$ip}");
        Cache::forget("threat:scan:{$ip}");
        Cache::forget("threat:login:{$ip}");

        $this->info("✓ {$ip} banı kaldırıldı.");
        return 0;
    }

    private function clearAll(): int
    {
        if (! $this->confirm('Tüm ban ve sayaçlar sıfırlansın mı?')) {
            return 0;
        }

        Cache::flush();
        $this->info('✓ Cache temizlendi.');
        return 0;
    }
}
