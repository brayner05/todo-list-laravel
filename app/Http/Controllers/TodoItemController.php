<?php

namespace App\Http\Controllers;

use App\Models\TodoItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoItemController extends Controller {
    public function index(): View {
        $items = TodoItem::all(['id', 'content']);
        return view('index', [
            'items' => $items
        ]);
    }

    public function store(Request $request): RedirectResponse {
        // Validate the user input.
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
        ]);

        // If validation fails, render the view with the errors.
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        // Store the new todo item in the database.
        TodoItem::create($request->all());

        // Reditect to /.
        return redirect('/');
    }

    public function destroy(int $id) {
        TodoItem::destroy($id);
        return redirect('/');
    }
}
