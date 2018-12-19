<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Auth;
use File;

use App\About;
use App\Article;
use App\Descanso;
use App\Course;
use App\Faq;
use App\Header;
use App\Service;
use App\Testimonie;
use App\User;
use App\Metadata;

class DashboardController extends Controller
{
    public function index()
    {
        $a = Article::all();
        $c = Course::all();
        $t = Testimonie::all();
        $u = User::all();
        $articles = Article::orderBy('id', 'DESC')->limit(5)->get();
        $courses  = Course::orderBy('id', 'DESC')->where('status', true)->get();
        $tests    = Testimonie::orderBy('id', 'DESC')->limit(5)->get();
    	return view('dashboard.index.index')
                ->with('a', $a)
                ->with('c', $c)
                ->with('t', $t)
                ->with('u', $u)
                ->with('articles', $articles)
                ->with('courses', $courses)
                ->with('tests', $tests);
    }

    // Usuarios
    public function users()
    {
    	$users = User::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.users.index')
    			->with('users', $users);
    }

    public function users_edit($id)
    {
    	$user = User::find($id);
    	return view('dashboard.users.edit')
    			->with('user', $user);
    }

    // Usuario
    public function user($id)
    {
        $user = User::find($id);
        return view('dashboard.users.user')
                ->with('user', $user);
    }

    public function user_update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'email'        => 'required|email|unique:users,email,'.$user->id,
            'name'         => 'required|min:4',
            'lastname'     => 'required|min:4'
        ];

        $messages = [            
            'email.required'    => 'Este campo es requerido',
            'email.email'       => 'No tiene formato de email',
            'email.unique'      => 'Ya existe está registrado este correo',
            
            'name.required'     => 'Este campo es requerido',
            'name.min'          => 'Mínimo 4 caracteres',
            
            'lastname.required' => 'Este campo es requerido',
            'lastname.min'      => 'Mínimo 4 caracteres'
        ];

        $request->validate($rules, $messages);

        if ($request->email != auth()->user()->email) {
            $user->email = $request->email;
        }

        if ($request->name != auth()->user()->name) {
            $user->name = $request->name;
        }

        if ($request->lastname != auth()->user()->lastname) {
            $user->lastname = $request->lastname;
        }

        if ($user->save()) {
            if ($request->email != auth()->user()->email) {
                auth()->logout();
                return redirect('/escritorio');
            } else {
                return redirect()->back();
            }
        }
    }

    // Metadatos
    public function metadata()
    {
        $meta = Metadata::find('1');
        return view('dashboard.metadata.index')
                ->with('meta', $meta);
    }

    public function metadata_update(Request $request)
    {
        $rules = [
            'title'       => 'required|min:2',
            'description' => 'required|min:1',
            'keywords'    => 'required|min:1'
        ];

        $messages = [            
            'title.required'       => 'Este campo es necesario',
            'title.min'            => 'Mínimo 2 caracteres',
            
            'description.required' => 'Este campo es necesario',
            'description.min'      => 'Mínimo 1 caracteres',
            
            'keywords.required'    => 'Este campo es necesario',
            'keywords.min'         => 'Mínimo 1 caracteres'
        ];

        $request->validate($rules, $messages);

        Metadata::find('1')->update($request->all());

        return redirect()->back();
    }

    // Inicio
    public function header()
    {
    	$header = Header::find('1');
    	return view('dashboard.home.header')->with('header', $header);
    }

    public function header_update(Request $request)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'sub' => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es requerido',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'sub.required'   => 'Este campo es requerido',
            'sub.min'        => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 2MB',
            'img.dimensions' => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $header      = Header::find('1');
        $header->h1  = $request->h1;
        $header->sub = $request->sub;

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/cabecera/' . $header->img);

            $image = $request->file('img');
            $name  = uniqid('header_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/cabecera/';
            $image->move($path, $name);

            $header->img = $name;
        }

        $header->save();

        return redirect()->back();
    }

    public function about()
    {
    	$about = About::find('1');
    	return view('dashboard.home.about')->with('about', $about);
    }

    public function about_update(Request $request)
    {
        $rules = [
            'h1'      => 'required|min:4',
            'content' => 'required|min:4',
            'img'     => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'      => 'Este campo es requerido',
            'h1.min'           => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es requerido',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'          => 'Peso máximo de 2MB',
            'img.dimensions'   => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $about          = About::find('1');
        $about->h1      = $request->h1;
        $about->content = html_entity_decode($request->content);

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/quienes-somos/' . $about->img);

            $image = $request->file('img');
            $name  = uniqid('about_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/quienes-somos/';
            $image->move($path, $name);

            $about->img = $name;
        }

        $about->save();

        return redirect()->back();
    }

    public function break()
    {
    	$break = Descanso::find('1');
    	return view('dashboard.home.break')->with('break', $break);
    }

    public function break_update(Request $request)
    {
        $rules = [
            'h1'  => 'required|min:4',
            'img' => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'    => 'Este campo es requerido',
            'h1.min'         => 'Mínimo 4 caracteres',
            
            'img.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'        => 'Peso máximo de 2MB',
            'img.dimensions' => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $break     = Descanso::find('1');
        $break->h1 = $request->h1;

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/extras/' . $break->img);

            $image = $request->file('img');
            $name  = uniqid('break_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/extras/';
            $image->move($path, $name);

            $break->img = $name;
        }

        $break->save();

        return redirect()->back();
    }

    public function faq()
    {
    	$faq = Faq::find('1');
    	return view('dashboard.home.faq')->with('faq', $faq);
    }

    public function faq_update(Request $request)
    {
        $rules = [
            'h1'      => 'required|min:2',
            'content' => 'required|min:4'
        ];

        $messages = [            
            'h1.required'      => 'Este campo es requerido',
            'h1.min'           => 'Mínimo 2 caracteres',
            
            'content.required' => 'Este campo es requerido',
            'content.min'      => 'Mínimo 4 caracteres'
        ];

        $request->validate($rules, $messages);

        Faq::find('1')->update([
            'h1'      => $request->h1,
            'content' => html_entity_decode($request->content)
        ]);

        return redirect()->back();
    }

    // Cursos
    public function courses()
    {
    	$courses = Course::orderBy('id', 'DESC')->simplePaginate(10);
    	return view('dashboard.courses.index')
    			->with('courses', $courses);
    }

    public function courses_create()
    {
    	return view('dashboard.courses.create');
    }

    public function courses_store(Request $request)
    {
    	$rules = [
            'h1'      => 'required|min:4|unique:courses',
            'slug'    => 'unique:courses,slug',
            'sub'     => 'required|min:4',
            'content' => 'required|min:4',
            'list'    => 'required|min:4',
            'img'     => 'required|mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
        ];

        $messages = [            
            'h1.required'      => 'Este campo es necesario',
            'h1.min'           => 'Mínimo 4 caracteres',
            'h1.unique'        => 'Ya existe este título, prueba otro',
            
            'slug.unique'      => 'Ya existe este título, prueba otro',
            
            'sub.required'     => 'Este campo es necesario',
            'sub.min'          => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'list.required'    => 'Este campo es necesario',
            'list.min'         => 'Mínimo 4 caracteres',
            
            'img.required'     => 'Este campo es necesario',
            'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'          => 'Peso máximo de 5MB',
            'img.dimensions'   => 'Las medidas son de 1920x1080'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('course_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/cursos/';
        $image->move($path, $name);

        Course::create([
            'h1'      => $request->h1,
            'slug'    => str_slug($request->h1),
            'sub'     => $request->sub,
            'content' => html_entity_decode($request->content),
            'list'    => html_entity_decode($request->list),
            'img'     => $name,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/cursos');
    }

    public function courses_edit($id)
    {
    	$course = Course::find($id);
    	return view('dashboard.courses.edit')
    			->with('course', $course);
    }

    public function courses_update(Request $request, $id)
    {
        $course = Course::find($id);

        $rules = [
            'h1'      => 'required|min:4',
            'slug'    => 'unique:courses,slug,'.$course->id,
            'sub'     => 'required|min:4',
            'content' => 'required|min:4',
            'list'    => 'required|min:4',
            'image'   => 'mimes:jpg,png,jpeg|max:5000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'status'  => 'required'
        ];

        $messages = [            
            'h1.required'      => 'Este campo es necesario',
            'h1.min'           => 'Mínimo 4 caracteres',

            'slug.unique'      => 'Ya existe este título, prueba otro',
            
            'sub.required'     => 'Este campo es necesario',
            'sub.min'          => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'list.required'    => 'Este campo es necesario',
            'list.min'         => 'Mínimo 4 caracteres',
            
            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 5MB',
            'image.dimensions' => 'Las medidas son de 1920x1080',
            
            'status.required'  => 'Este campo es necesario'
        ];

        $request->validate($rules, $messages);

        $course->h1   = $request->h1;
        $course->slug = str_slug($request->h1);
        $course->sub  = $request->sub;

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/cursos/' . $course->img);

            $image = $request->file('img');
            $name  = uniqid('course_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/cursos/';
            $image->move($path, $name);

            $course->image = $name;
        }

        $course->content = html_entity_decode($request->content);
        $course->list    = html_entity_decode($request->list);
        $course->status  = $request->status;
        $course->save();

        return redirect('/escritorio/cursos');
    }

    // Artículos
    public function articles()
    {
        $articles = Article::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.articles.index')
                ->with('articles', $articles);
    }

    public function articles_create()
    {
        return view('dashboard.articles.create');
    }

    public function articles_store(Request $request)
    {
        $rules = [
            'title'       => 'required|min:4',
            'slug'        => 'unique:articles,slug',
            'content'     => 'required|min:4',
            'img'         => 'required|mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'description' => 'required|min:4|max:155',
            'keywords'    => 'required|min:2'
        ];

        $messages = [
            'title.required'       => 'Este campo es necesario',
            'title.min'            => 'Mínimo 4 caracteres',
            
            'slug.unique'          => 'Ya existe esta URL, prueba otra',
            
            'content.required'     => 'Este campo es necesario',
            'content.min'          => 'Mínimo 4 caracteres',
            
            'img.required'         => 'Este campo es necesario',
            'img.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'              => 'Peso máximo de 2MB',
            'img.dimensions'       => 'Las medidas son de 1920x1080',
            
            'description.required' => 'Este campo es necesario',
            'description.min'      => 'Mínimo 4 caracteres',
            'description.max'      => 'Máximo 155 caracteres',
            
            'keywords.required'    => 'Este campo es necesario',
            'keywords.min'         => 'Mínimo 2 caracteres'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/articulos/';
        $image->move($path, $name);

        Article::create([
            'title'       => $request->title,
            'slug'        => str_slug($request->title),
            'content'     => html_entity_decode($request->content),
            'img'         => $name,
            'description' => $request->description,
            'keywords'    => $request->keywords,
            'user_id'     => auth()->user()->id
        ]);

        return redirect('/escritorio/articulos');
    }

    public function articles_edit($id)
    {
        $article = Article::find($id);
        return view('dashboard.articles.edit')
                ->with('article', $article);
    }

    public function articles_update(Request $request, $id)
    {
        $article = Article::find($id);

        $rules = [
            'title'       => 'required|min:4',
            'slug'        => 'unique:articles,slug,'.$article->id,
            'content'     => 'required|min:4',
            'img'         => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=1920,min_width=1920,min_height=1080,max_height=1080',
            'description' => 'required|min:4|max:155',
            'keywords'    => 'required|min:2'
        ];

        $messages = [
            'title.required'       => 'Este campo es necesario',
            'title.min'            => 'Mínimo 4 caracteres',
            
            'slug.unique'          => 'Ya existe esta URL, prueba otra',
            
            'content.required'     => 'Este campo es necesario',
            'content.min'          => 'Mínimo 4 caracteres',
            
            'img.mimes'            => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'              => 'Peso máximo de 2MB',
            'img.dimensions'       => 'Las medidas son de 1920x1080',
            
            'description.required' => 'Este campo es necesario',
            'description.min'      => 'Mínimo 4 caracteres',
            'description.max'      => 'Máximo 155 caracteres',
            
            'keywords.required'    => 'Este campo es necesario',
            'keywords.min'         => 'Mínimo 2 caracteres'
        ];

        $request->validate($rules, $messages);

        $article->title = $request->title;
        $article->slug  = str_slug($request->title);

        if ($request->hasFile('image')) {
            File::delete(public_path() . '/assets/images/articulos/' . $article->image);

            $image = $request->file('image');
            $name  = uniqid('article_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/articulos/';
            $image->move($path, $name);

            $article->image = $name;
        }

        $article->content     = html_entity_decode($request->content);
        $article->description = $request->description;
        $article->keywords    = $request->keywords;
        $article->status      = $request->status;
        $article->save();

        return redirect('/escritorio/articulos');
    }

    // Testimonios
    public function testimonies()
    {
        $testimonies = Testimonie::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.testimonies.index')
                ->with('testimonies', $testimonies);
    }

    public function testimonies_create()
    {
        return view('dashboard.testimonies.create');
    }

    public function testimonies_store(Request $request)
    {
        $rules = [
            'name'    => 'required|min:4',
            'content' => 'required|min:4',
            'img'     => 'required|mimes:jpg,png,jpeg|max:2000|dimensions:max_width=720,min_width=720,min_height=720,max_height=720',
        ];

        $messages = [
            'name.required'    => 'Este campo es necesario',
            'name.min'         => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'img.required'     => 'Este campo es necesario',
            'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'          => 'Peso máximo de 2MB',
            'img.dimensions'   => 'Las medidas son de 720x720',
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('testimonie_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/testimonios/';
        $image->move($path, $name);

        Testimonie::create([
            'name'    => $request->name,
            'content' => $request->content,
            'img'     => $name,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/testimonios');
    }

    public function testimonies_edit($id)
    {
        $testimonie = Testimonie::find($id);
        return view('dashboard.testimonies.edit')
                ->with('testimonie', $testimonie);
    }

    public function testimonies_update(Request $request, $id)
    {
        $rules = [
            'name'    => 'required|min:4',
            'content' => 'required|min:4',
            'img'     => 'mimes:jpg,png,jpeg|max:2000|dimensions:max_width=720,min_width=720,min_height=720,max_height=720',
        ];

        $messages = [
            'name.required'    => 'Este campo es necesario',
            'name.min'         => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'          => 'Peso máximo de 2MB',
            'img.dimensions'   => 'Las medidas son de 720x720',
        ];

        $request->validate($rules, $messages);

        $testimonie       = Testimonie::find($id);
        $testimonie->name = $request->name;

        if ($request->hasFile('image')) {
            File::delete(public_path() . '/assets/images/testimonios/' . $testimonie->image);

            $image = $request->file('image');
            $name  = uniqid('testimonie_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/testimonios/';
            $image->move($path, $name);

            $testimonie->image = $name;
        }

        $testimonie->content = $request->content;
        $testimonie->status  = $request->status;
        $testimonie->save();

        return redirect('/escritorio/testimonios');
    }

    // Servicios
    public function services()
    {
        $services = Service::orderBy('id', 'DESC')->simplePaginate(10);
        return view('dashboard.services.index')
                ->with('services', $services);
    }

    public function services_create()
    {
        return view('dashboard.services.create');
    }

    public function services_store(Request $request)
    {
        $rules = [
            'h1'      => 'required|min:4',
            'content' => 'required|min:4',
            'img'     => 'required|mimes:jpg,png,jpeg,svg|max:2000'
        ];

        $messages = [
            'h1.required'      => 'Este campo es necesario',
            'h1.min'           => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'img.required'     => 'Este campo es necesario',
            'img.mimes'        => 'Sólo imágenes JPG, JPEG y PNG',
            'img.max'          => 'Peso máximo de 2MB'
        ];

        $request->validate($rules, $messages);

        $image = $request->file('img');
        $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
        $path  = public_path() . '/assets/images/servicios/';
        $image->move($path, $name);

        Service::create([
            'h1'      => $request->h1,
            'content' => $request->content,
            'img'     => $name,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/escritorio/servicios');
    }

    public function services_edit($id)
    {
        $service = Service::find($id);
        return view('dashboard.services.edit')
                ->with('service', $service);
    }

    public function services_update(Request $request, $id)
    {
        $service = Service::find($id);

        $rules = [
            'h1'      => 'required|min:4',
            'content' => 'required|min:4',
            'image'   => 'mimes:jpg,png,jpeg|max:2000',
            'status'  => 'required'
        ];

        $messages = [            
            'h1.required'      => 'Este campo es necesario',
            'h1.min'           => 'Mínimo 4 caracteres',
            
            'content.required' => 'Este campo es necesario',
            'content.min'      => 'Mínimo 4 caracteres',
            
            'image.mimes'      => 'Sólo imágenes JPG, JPEG y PNG',
            'image.max'        => 'Peso máximo de 2MB',
            
            'status.required'  => 'Este campo es necesario'
        ];

        $request->validate($rules, $messages);

        $service->h1 = $request->h1;

        if ($request->hasFile('img')) {
            File::delete(public_path() . '/assets/images/servicios/' . $service->img);

            $image = $request->file('img');
            $name  = uniqid('service_', true) . '.' . $image->getClientOriginalExtension();
            $path  = public_path() . '/assets/images/servicios/';
            $image->move($path, $name);

            $service->img = $name;
        }

        $service->content = $request->content;
        $service->status  = $request->status;
        $service->save();

        return redirect('/escritorio/servicios');
    }
}