<?php
namespace App\View\Components;

use Illuminate\View\Component;
class PostForm extends Component
{
    public $post;

    /**
     * Create a new component instance.
     *
     * @param mixed $post
     * @return void
     */
    public function __construct($post = null)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.post-form', ['post' => $this->post]);
    }
}
php>