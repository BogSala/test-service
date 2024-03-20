<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    private int $usersPerPage = 6;

    public function index($page=0): \Illuminate\Contracts\View\View
    {
        $users = User::query()->skip(($page) * $this->usersPerPage )->take(6)->get()->toArray();
        $basePath = URL::asset("/images") . '/';
        $defaultImage = URL::asset("/default.png");
        foreach ($users as $user){
            $user['image_path'] =  $user['image_path'] ? $basePath . $user['image_path'] : $defaultImage;
        }
        return view("user.index-page")
            ->with('users', $users)
            ->with('page', $page)
            ->with('lastPage', (int)$page === $this->getLastPage());
    }


    public function create(): \Illuminate\Contracts\View\View
    {
        return view("user.create-page");
    }

    public function store(UserRequest $request)
    {
        $imagePath = $request->file("image")->getRealPath();
        $data = $request->validated();
        $newPath = ImageService::crop($imagePath);
        \Tinify\setKey(env("TINIFY_TOKEN"));
        \Tinify\fromFile($newPath)->toFile($newPath);
        $filename = last(explode('/', $newPath));
        $user = User::query()->create([
            "name" => $data["name"],
            "password" => $data["password"],
            "email" => $data["email"],
            "image_path" => $filename
        ]);
        $lastPage = $this->getLastPage();
        return redirect("/users/page/$lastPage");
    }

    public function getLastPage(): int
    {
        $usersCount = User::all()->count();
        return (int)round($usersCount / $this->usersPerPage);
    }

}
