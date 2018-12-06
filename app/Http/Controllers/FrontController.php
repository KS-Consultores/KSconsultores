<?php namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use App\Services\FrontFiller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support;
use Response;

class FrontController extends Controller{

	/*
	|--------------------------------------------------------------------------
	| Front Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	protected $frontFiller;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(FrontFiller $frontFiller)
	{
		$this->middleware('guest');
		$this->frontFiller = $frontFiller;
	}

	/**
	 * Show the application index screen to the user.
	 *
	 * @return Response
	 */
	public function blog()
	{
        
        $categories = Category::all();
        $outstanding = $this->frontFiller->outstanding();
        $latest = $this->frontFiller->latest();
        $populars = $this->frontFiller->populars();

        $params = [
            "categories" => $categories,
            "outstanding" => $outstanding,
            "latest" => $latest,
            "populars" => $populars,
        ];
		
		return view('front.blog.index', $params);
	}

    /**
     * Show the application index screen to the user.
     *
     * @return Response
     */
    public function results(Request $request)
    {
        
        $posts = $this->frontFiller->results();

        $categories = Category::all();

        $params = [
            "categories" => $categories,
            "posts" => $posts["posts"],
            "pagination" => $posts["pagination"],
            "hasMorePages" => $posts['pagination']['hasMorePages']
        ];
        
        return view('front.blog.results', $params);
    }



    /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function resultsAjax(Request $request)
    {

        $posts = $this->frontFiller->results();

        $html = view('front.elements.post-list', ['posts'=>$posts['posts']])->render();

        $params = [
            "posts" => $html,
            "hasMorePages" => $posts['pagination']['hasMorePages']
        ];

        return Response::json($params);
    }

    /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function detail(Request $request, $post)
    {
        $result = Post::with('categories','likes')->find($post);

        $categories = Category::all();
        $categoriesPpales = $this->frontFiller->categories();
        $selectedCategories = $request->query('categories', []);
        $outstanding = $this->frontFiller->outstanding();
        $latest = $this->frontFiller->latest();
        $populars = $this->frontFiller->populars();
        $selectedCategories = $request->query('categories', []);

        $params = [
            "post" => $result,
            "categories" => $categories,
            "categoriesPpales" => $categoriesPpales,
            "selectedCategories" => $selectedCategories,
            "outstanding" => $outstanding,
            "latest" => $latest,
            "populars" => $populars
        ];

        return view('front.blog.post', $params);
    }


    // Paginas generales

    /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('front.index');
    }

     /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function aboutus()
    {
        return view('front.about-us');
    }

      /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function fiscal()
    {
        return view('front.fiscal');
    }

      /**
     * Show the application resultados screen to the user.
     *
     * @return Response
     */
    public function audit()
    {
        return view('front.audit');
    }

    /**
    * Show the application resultados screen to the user.
    *
    * @return Response
    */
    public function countable()
    {
        return view('front.countable');
    }


    /**
    * Show the application resultados screen to the user.
    *
    * @return Response
    */
    public function legal()
    {
        return view('front.legal');
    }

    /**
    * Show the application resultados screen to the user.
    *
    * @return Response
    */
    public function contact()
    {
        return view('front.contact');
    }

    public function sendContact(){

        $team = Input::get("team");

        switch ($team) {
            case '1':
                $to = 'administracion@ksconsultores.com.mx';
                $team_name = "Ks Consultores Fiscal";
                $type = 'Fiscal';
                break;
            case '2':
                $to = 'administracion@ksconsultores.com.mx';
                $team_name = "Ks Consultores Contable";
                $type = 'Contable';
                break;
            case '3':
                $to = 'administracion@ksconsultores.com.mx';
                $team_name = "Ks Consultores Auditoría";
                $type = 'Auditoría';
                break;
            case '4':
                $to = 'administracion@ksconsultores.com.mx';
                $team_name = "Ks Consultores Legal";
                $type = 'Legal';
                break;
            default:
                $to = 'contacto@ksconsultores.com.mx';
                $team_name = "Contacto Ks Consultores";
                $type = Input::get("type");
                break;
        }

        $data = array(
            'name' => Input::get("name"),
            'email' => Input::get("email"),
            'phone' =>  Input::get("phone"),
            'comments' =>  Input::get("comments"),
            'type' => $type,
            'to' => $to,
            'team_name' => $team_name
        );

        try{

            Mail::send('front.emails.contact', $data, function($message) use ($data){
                $message->from($data['email'], $data['name'] );
                $message->to($data['to'], $data['team_name']);
                $message->bcc('cuentas@intagono.com', 'Intagono Cuentas');
                $message->subject($data['team_name']);

            });

            $results = [
                "status" => 'ok',
                "message" => 'El envio se realizó con éxito'
            ];

            return json_encode($results);

        }catch(\Swift_TransportException $e){

            $results = [
                "status" => 'error',
                "message" => 'Ocurrió un error en el envío, intente de nuevo mas tarde'
            ];

            return json_encode($results);
        }

    }
}
