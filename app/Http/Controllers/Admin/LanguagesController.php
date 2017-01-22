<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LanguageRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Datatables;

class LanguagesController extends AdminController
{

    public function __construct()
    {
        //view()->share('type', 'language');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$languages = DB::table('languages')->paginate(5);
       // $keywords = Input::get('keywords');
        $keywords = $request->get('keywords');
        if(empty($keywords))
            $languages = Language::orderBy('id', 'desc')->paginate(5);
        else
            $languages = Language::where('name', 'LIKE', '%'. $keywords .'%')->orderBy('id', 'desc')->paginate(5);

        return view('admin.language.index', ['languages' => $languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/language/create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $language = new Language($request->all());
        $language -> user_id = Auth::id();
        if($language -> save()){
            return redirect()->route('languages.index');
        }
        //Session::flash('message', 'Successfully created nerd!');
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
         return view('admin/language/create_edit',compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language -> user_id_edited = Auth::id();
        if($language -> update($request->all()))
            return redirect()->route('languages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        if($language->delete())
            return redirect()->route('languages.index');
    }

}
