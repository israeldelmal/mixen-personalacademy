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

class WebController extends Controller
{
    public function index()
    {
    	// Home
        $header = Header::find('1');
        $about  = About::find('1');
        $break  = Descanso::find('1');
        $faq    = Faq::find('1');
        $meta   = Metadata::find('1');
		// Artículos
		$articles    = Article::orderBy('id', 'DESC')->where('status', true)->limit(3)->get();
		// Cursos
		$courses     = Course::orderBy('id', 'DESC')->where('status', true)->get();
		// Servicios
		$services    = Service::orderBy('id', 'ASC')->where('status', true)->get();
		// Testimonios
		$testimonies = Testimonie::inRandomOrder()->get();
    	return view('web.index.index')
    			->with('header', $header)
    			->with('about', $about)
    			->with('break', $break)
                ->with('faq', $faq)
    			->with('meta', $meta)
    			->with('articles', $articles)
    			->with('courses', $courses)
    			->with('services', $services)
    			->with('testimonies', $testimonies);
    }

    public function course($slug)
    {
        $course = Course::where('slug', $slug)->first();
        return view('web.courses.show')
                ->with('course', $course);
    }

    public function articles() {}

    public function articles_show($slug) {
        $article  = Article::where('slug', $slug)->first();
        $articles = Article::orderBy('id', 'DESC')
                    ->where('status', true)
                    ->where('id', '!=', $article->id)
                    ->limit(3)
                    ->get();
        return view('web.articles.show')
                ->with('article', $article)
                ->with('articles', $articles);
    }
}