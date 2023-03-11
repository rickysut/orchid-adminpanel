<?php

namespace App\Orchid\Layouts;

use App\Models\Post;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('title', 'Title')
                ->render(function (Post $post) {
                    return $post->title;
                    // return Link::make($post->title)
                    //     ->route('platform.post.edit', $post);
                }),

            TD::make('created_at', 'Created')
                ->render(function (Post $post) {
                    return $post->created_at->format('d/m/Y H:i:s');
                }),
            TD::make('updated_at', 'Last edit')
                ->render(function (Post $post) {
                    return $post->updated_at->format('d/m/Y H:i:s');
                }),
            
            TD::make('Action')
                ->alignCenter()
                ->render(function (Post $post) {
                    return Link::make('View')
                        ->icon('eye')
                        // ->method('edit', ['post' => $post->id]);
                        ->route('platform.post.edit', $post->id);
                }),
        ];
    }
}
