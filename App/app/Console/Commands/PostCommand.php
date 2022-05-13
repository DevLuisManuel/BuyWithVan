<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class PostCommand extends Command
{
    protected $signature = 'post:command {--C|comment}';

    protected $description = '4. Crea un comando que inserte todos los posts';

    public function handle()
    {
        $comment = $this->option('comment');
        if ($comment) {
            return $this->createCommentPost();
        }

        $this->alert("Inicio migracion");
        $this->getAllPosts();
        $this->alert("Fin Migracion");
        return 0;
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

    private function createCommentPost()
    {
        $this->alert("Inicio Creacion de comentario");
        $this->info("5. Programar un task que corra cada hora que seleccione un post aleatoriamente y cree un comentario");
        $post = Post::query()->inRandomOrder()->first();
        $data = [
            "name" => $post->User->getAttribute('name'),
            "email" => $post->User->getAttribute('email'),
            "body" => (Factory::create())->realText,
            "postId" => $post->getKey(),
        ];
        $this->comment("Data a enviar: " . json_encode($data));
        $response = Http::acceptJson()->contentType("application/json")->post(config("jsonplaceholder.URL") . "/comments", $data);
        Comment::query()->create($data); //Guardamos en nuestros registros el comentario enviado
        $this->info("Codigo de respuesta: " . $response->status());

        $this->alert("Fin Creacion Comentario");
    }

}
