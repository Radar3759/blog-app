<?php

namespace App\View\Components;


use Illuminate\View\Component;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Category;

class AppLayout extends Component
{

    public Collection $categories;
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
    {
        $this->categories = Category::query()
                    ->join('category_post', 'categories.id', '=', 'category_post.category_id')
                    ->select('categories.title', 'categories.slug', DB::raw('count(*) as total'))
                    ->groupBy('categories.id')
                    ->orderByDesc('total')
                    ->limit(5)
                    ->get();
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
