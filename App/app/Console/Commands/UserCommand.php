<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Hash, Http};

class UserCommand extends Command
{
    protected $signature = 'user:command';

    protected $description = '3. Crea un comando que inserte todos los usuarios en una base de datos';

    public function handle(): int
    {
        $this->alert("Inicio migracion");
        $this->getAllUser();
        $this->alert("Fin Migracion");
        return 0;
    }

    private function getAllUser()
    {
        $users = Http::acceptJson()->get(config("jsonplaceholder.URL") . "/users");
        $users = json_decode($users->body(), true);
        if ($users && count($users) > 0) {
            foreach ($users as $user) {
                User::query()->firstOrCreate(
                    [
                        'id' => $user["id"],
                        'email' => $user["email"],
                    ],
                    [
                        "name" => $user["name"],
                        "username" => $user["username"],
                        "password" => Hash::make($user["username"]),
                        "phone" => $user["phone"],
                        "website" => $user["website"],
                    ]
                );
            }
            $this->info("Usuarios migrados correctamente.");
        } else {
            $this->error("No se encontro usuarios a migrar, verifique e intente nuevamente.");
        }
    }
}
