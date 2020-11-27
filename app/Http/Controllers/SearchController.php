<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;

class SearchController extends Controller
{
    public function mostPopular()
    {
        $search_counts = [];

        $top_searches = Search::orderBy("count", "desc")->take(10)->get();

        foreach ($top_searches as $search)
        {
            $search_counts[] = [
                "name" => $search->search_query,
                "count" => $search->count
            ];
        }

        return $search_counts;
    }
}
