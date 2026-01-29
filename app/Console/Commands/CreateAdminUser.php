<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat user admin baru untuk CleanGo';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Nama Admin');
        $email = $this->ask('Email Admin');
        $password = $this->secret('Password');
        $password_confirm = $this->secret('Konfirmasi Password');

        if ($password !== $password_confirm) {
            $this->error('Password tidak cocok!');
            return 1;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('Email sudah terdaftar!');
            return 1;
        }

        try {
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'admin',
            ]);

            $this->info('Admin user berhasil dibuat!');
            $this->info("Email: {$email}");
            return 0;
        } catch (\Exception $e) {
            $this->error('Gagal membuat admin user: ' . $e->getMessage());
            return 1;
        }
    }
}
