<?php

namespace App\Http\Controllers;

use App\Models\Newbook;
use Illuminate\Http\Request;

class NewbookController extends Controller
{
    public function new_book(){
        return view('new_book');
    }

    public function register_book(Request $request){
        $newbook_validate=$request->validate([
            'title'=>'required',
            'author'=>'required',
            'price'=>'required',
            'image'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('product_images'), $imageName);
            $newbook_validate['image'] = $imageName;
        }

        Newbook::create($newbook_validate);

        return redirect()->back()->with('success', 'NewBook Created Successfully!');
    }

    public function all_books(){
        $newbook = Newbook::all();
        return view('all_books', ['newbook'=>$newbook]);
    }

    public function view_details($id){
        $book = Newbook::findOrFail($id);
        return view('view_details', compact('book'));
    }

    public function delete_book($id){
        $book = Newbook::where('id', $id)->first();
        $book->delete();
        return redirect()->route('all_books')->with('success', 'Book deleted successfully!');
    }

    public function edit($id)
    {
        $newbooks = Newbook::findOrFail($id); // Get the book record
        return view('edit', compact('newbooks')); // Pass to view
    }

    // Handle the update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'required',
            'image' => 'nullable',
        ]);

        $book = Newbook::findOrFail($id);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;

        if($request->hasFile('image')){
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('product_images'), $imageName);
            $book['image'] = $imageName;
        }

        $book->save();

        return redirect()->back()->with('success', 'Book updated successfully!');
    }

}
