<?
namespace App\View\Components;
use Illuminate\View\Component;


class PostForm extends Component
{



    public $post;
    public $action;
    public $method;
    public $categories;

    /**
     * Create a new component instance.
     *
     * @param mixed $post
     * @return void
     */
    public function __construct($post=null ,$action='',$method ='POST',$categories = [])
    {
    
        $this->post = $post ; 
        $this->action = $action;
        $this->method = $method;
        $this->categories = $categories;


    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
    
        return view('components.post-form');
     
    }

}
