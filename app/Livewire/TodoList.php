<?php

namespace App\Livewire;

use App\Models\TodoItems;
use Livewire\Component;

class TodoList extends Component
{

    public $todos;
    public string $todoText = "";

    public function mount()
    {
        $this->selectTodos();
    }


    public function render()
    {
        return view('livewire.todo-list');
    }

    public function addTodo()
    {
        $todo = new TodoItems();
        $todo->todo = $this->todoText;
        $todo->completed = false;

        $todo->save();

        $this->todoText = '';
        $this->selectTodos();
    }


    public function toggleTodo($id)
    {
        $todo = TodoItems::where('id', $id)->first();
        if (!$todo) {
            return;
        }
        $todo->completed = !$todo->completed;
        $todo->save();
        $this->selectTodos();
    }


    public function deleteTodo($id)
    {
        $todo = TodoItems::where('id', $id)->first();
        if (!$todo) {
            return;
        }
        $todo->delete();
        $this->selectTodos();
    }



    public function selectTodos()
    {
        $this->todos = TodoItems::orderBy('created_at', 'DESC')->get();
    }
}
