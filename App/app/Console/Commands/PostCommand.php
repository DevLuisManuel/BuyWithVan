<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PostCommand extends Command
{
    protected $signature = 'post:command';

    protected $description = '4. Crea un comando que inserte todos los posts';

    public function handle()
    {
        $this->alert("Inicio migracion");
        $this->getAllPosts();
        $this->alert("Fin Migracion");
    }

    private function getAllPosts()
    {
        $posts = Http::acceptJson()->get(config("jsonplaceholder.URL") . "/posts");
        $posts = json_decode($posts->body(), true);
        if ($posts && count($posts) > 0) {
            foreach ($posts as $post) {
                Post::query()->firstOrCreate([
                    "id" => $post["id"]
                ], [
                    "title" => $post["title"],
                    "body" => $post["body"],
                    "userId" => $post["userId"],
                ]);
            }
            $this->info("Posts migrados correctamente.");
        } else {
            $this->error("No se encontro Posts a migrar, verifique e intente nuevamente.");
        }
    }

}
