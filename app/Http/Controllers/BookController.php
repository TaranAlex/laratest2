<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\Random;

use App\Http\Requests\BookRequest;

use Illuminate\Support\Facades\DB;

use App\Models\Book;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dump(Random::generate(1, 100));
        //dump(Random::make()->generate(1, 100));
        //dd(DB::table('cars')->get());

        /*$books = Book::all();

        foreach ($books as $book) {
            echo $book->name.'  '.$book->author."<br>";
        }

        die;*/

        //dd($books);

        /*$book = Book::findOrFail();

            echo $book->name.'  '.$book->author;*/

        /*$books = Book::find([1,2]);

        foreach ($books as $book) {
            echo $book->id.':'.$book->name.'  '.$book->author."<br>";
        }

        die;*/

        /*$books = Book::where('active', 1)
            ->orderBy('name', 'asc')
            ->get();

        foreach ($books as $book) {
            echo $book->id.':'.$book->name.'  '.$book->author."<br>";
        }

        die;*/

        //$bookModel = new Book();

        /*$books = $bookModel->where('active', 1)
            ->where('id', '>', 2)
            ->orderBy('name', 'asc')
            ->get();

        foreach ($books as $book) {
            echo $book->id.':'.$book->name.'  '.$book->author."<br>";
        }

        die;*/

        /*$books = Book::where('active', 1) //где ....
        ->where('id', '>', 0)
        ->orderBy('name', 'asc') //соортировка по имени
        ->get(); //метод get выбирает даннеы из БД
        echo 'Активные книги: ' . "<br>";
        foreach ($books as $book) {
                echo "<br>" . $book->id . ' ' . $book->name . ' ' . $book->author . ' ' . "<br>";
        }
        echo "<hr>";
        $books = Book::where('active', 0) //где ....
            ->where('id', '>', 0)
            ->orderBy('name', 'asc') //соортировка по имени
            ->get(); //метод get выбирает даннеы из БД
        echo 'Неактивные книги: ' . "<br>";
        foreach ($books as $book) {
            echo "<br>" . $book->id . ' ' . $book->name . ' ' . $book->author . ' ' . "<br>";
        }die;*/


        /*$count = $bookModel->where('active', 1)->count();
        var_dump($count);die;*/

        /*$sum = $bookModel->where('active', 1)->sum('id');
        var_dump($sum);die;*/

        /*$book = Book::find(2);

        $book->name = 'Книга2';
        $book->author = 'Автор';
        $book->active = 0;
        $result = $book->save();

        var_dump($result);die;*/

        /*$bookModel->name = 'новая книга';
        $bookModel->author = 'новый автор';
        $result = $bookModel->save();

        var_dump($result);die;*/

        /*$book = Book::find(2)->delete();*/

        /*$bookModel->destroy([3,5]);*/

        /*$bookModel->where('name', 'Имя1')->delete();*/


        /*$books = Book::active()->orderBy('id')->get();//active - метод из модели Book scopeActive
        foreach ($books as $book) {
            echo $book->id.':'.$book->name.'  '.$book->author."<br>";
        }

        die;*/

        $activeBooks = Book::active(1)->orderBy('name')->get();
       
        /*echo 'Активные книги: ' . "<br>";
        foreach ($books as $book) {
                echo "<br>" . $book->id . ' ' . $book->name . ' ' . $book->author . ' ' . "<br>";
        }
        echo "<hr>";*/
        $books = Book::active(0)->orderBy('name')->get();
        /*echo 'Неактивные книги: ' . "<br>";
        foreach ($books as $book) {
            echo "<br>" . $book->id . ' ' . $book->name . ' ' . $book->author . ' ' . "<br>";
        };*/
        return view('books.index', ['books' => $books, 'activeBooks' => $activeBooks]);



        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        //dd($request);

        /*$data = $request->only(['name', 'description']);
        // $data['user_id'] = Auth::id();

        DB::table('cars')->insert($data);*/

        $bookModel = new Book();

        $bookModel->name = $request->name;
        $bookModel->author = $request->author;
        $bookModel->active = $request->active;;
        $bookModel->save();

        
        return redirect(route('books.index'));

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$alboms = DB::table('alboms')->whereId($id)->first();*/

        $books = Book::find($id);
        return view('books.show', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        //return view('books.edit');

        /*$book = DB::table('cars')->whereId($id)->first();*/

        $book = Book::find($id);

               
        return view('books.edit', compact(['book']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        //dd(1);

        /*$data = $request->only(['name', 'description']);
        // $data['user_id'] = Auth::id();

        DB::table('cars')->whereId($id)->update($data);*/

        $book = Book::find($id);

        $book->name = $request->name;
        $book->author = $request->author;
        $book->active = $request->active;;
        $book->save();
        return redirect(route('books.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*DB::table('cars')->whereId($id)->delete();*/

        $book = Book::find($id)->delete();
        return redirect(route('books.index'));
    }
}
