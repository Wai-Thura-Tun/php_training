<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;

class TaskListController extends Controller
{
    public function index()
    {
        $data = TaskList::all();
        return view('index', ['data' => $data]);
    }
    public function insert(Request $request)
    {
        $taskList = new TaskList();
        $taskList->title = $request->title;
        $taskList->task = $request->detail;
        $taskList->save();
        return redirect('/');
    }
    public function edit($id)
    {
        $edata = TaskList::find($id);
        $data = TaskList::all();
        return view('index', ['editTask' => $edata, 'data' => $data]);
    }
    public function update(Request $request)
    {
        $uData = TaskList::find($request->uid);
        $uData->title = $request->utitle;
        $uData->task = $request->udetail;
        $uData->updated_at = now();
        $uData->save();
        return redirect('/');
    }
    public function destroy($id)
    {
        $dData = TaskList::find($id);
        $dData->delete();
        return redirect('/');
    }
}
