<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;

class TaskListController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = TaskList::all();
        return view('index', ['data' => $data]);
    }
    /**
     * Summary of insert
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function insert(Request $request)
    {
        $validData = $request->validate([
            'title' => 'required',
            'detail' => 'required'
        ]);
        $taskList = new TaskList();
        $taskList->title = $validData['title'];
        $taskList->task = $validData['detail'];
        $taskList->save();
        return back();
    }
    /**
     * Summary of edit
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $edata = TaskList::find($id);
        $data = TaskList::all();
        return view('index', ['editTask' => $edata, 'data' => $data]);
    }
    /**
     * Summary of update
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $uData = TaskList::find($request->uid);
        $uData->title = $request->utitle;
        $uData->task = $request->udetail;
        $uData->updated_at = now();
        $uData->save();
        return redirect('/');
    }
    /**
     * Summary of delete
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $dData = TaskList::find($id);
        $dData->delete();
        return redirect('/');
    }
}
