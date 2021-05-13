<?php namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontFiller {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function categories()
    {
        return Category::whereActive(1)->orderByRaw('rand()')->take(8)->get();
    }

    public function outstanding()
    {
        return Post::whereActive(1)->whereOutstanding(true)->latest()->take(4)->get();
    }

    public function latest()
    {
        return Post::whereActive(1)->latest()->take(9)->get();
    }

    public function populars()
    {
        return Post::whereActive(1)->latest()->take(1)->get();
    }

    public function results()
    {
        $posts = Post::with('categories', 'likes')
                     ->latest()->whereActive(1);

        if ($this->request->has('q')) {
            $q = $this->request->input('q');

            $posts->where(function($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%")
                      ->orWhere('body', 'like', "%{$q}%");
            });
        }


        if( $this->request->has('categories') && $this->request->input('categories')[0] != "" ) {
            $posts->whereHas('categories', function($query) {
                $query->whereIn('id', $this->request->input('categories'));
            });
        }

        $paginator = $posts->paginate(6);

        return [
            'posts' => $paginator->getCollection(),
            'pagination' => [
                'currentPage' => $paginator->currentPage(),
                'lastPage' => $paginator->lastPage(),
                'perPage' => $paginator->perPage(),
                'hasMorePages' => $paginator->hasMorePages(),
                'nextPageUrl' => $paginator->nextPageUrl(),
                'firstItem' => $paginator->firstItem(),
                'lastItem' => $paginator->lastItem(),
                'total' => $paginator->total(),
                'count' => $paginator->count(),
            ],
        ];
    }

    public static function categoryLink($categoryId)
    {
        $selectedCategories = \Request::query('categories', []);
        $q = \Request::query('q', '');

        $queryStringParams = [];

        if ($q) {
            $queryStringParams[] = 'q=' .  $q;
        }

        if ( in_array($categoryId, $selectedCategories) ) {
            foreach ($selectedCategories as $selectedCategory) {
                if ($selectedCategory != $categoryId) {
                    $queryStringParams[] = 'categories[]=' . $selectedCategory;
                }
            }
        } else {
            foreach ($selectedCategories as $selectedCategory) {
                $queryStringParams[] = 'categories[]=' . $selectedCategory;
            }

            $queryStringParams[] = 'categories[]=' . $categoryId;
        }

        return implode('&', $queryStringParams);
    }

}