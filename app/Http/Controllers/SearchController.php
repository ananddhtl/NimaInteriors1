<?php

// app/Http/Controllers/SearchController.php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Blog;
use App\Models\User;
use App\Models\ContactUs;
use App\Models\PrivacyDeclaration;
use App\Models\TermandCondition;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $projects = Project::query()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('description', 'LIKE', "%{$keyword}%")
            ->get();

        $posts = Post::query()
            ->where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('body', 'LIKE', "%{$keyword}%")
            ->get();


        return response()->json([
            'projects' => $projects,
            'posts' => $posts,
            'users' => $users,
        ]);
    }
}

