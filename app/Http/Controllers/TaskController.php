<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Tasks\TaskInterface;
use App\Models\Task;
use PDF;
use Excel;
use Mail;
use App\Mail\TestMail;
use Carbon;


class TaskController extends Controller
{

    private $task;
    public function __construct(TaskInterface $task){
        $this->task=$task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=$this->task->getall();
        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request ,array(
            'title'=>'required',
            'body'=>'required'
         ));
        //$task = new Task();
        $attributes['title']=$request->title;
        $attributes['description']=$request->body;
        //dd($request->title);
        $this->task->create($attributes);
        return redirect()->route('task.index')->with('message','task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->task->getById($id);
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->task->getById($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request ,array(
            'title'=>'required',
            'body'=>'required'
         ));
        //dd($request->all());
        $attributes['title']=$request->title;
        $attributes['description']=$request->body;
        //dd($attributes);
        $this->task->update($id,$attributes);
       return redirect()->route('task.show',$id)->with('message','successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->task->delete($id);
        return redirect()->route('task.index')->with('warning','deleted');
    }

    public function downloadPDF($id){
      $task= $this->task->getById($id);

      /*$pdf = PDF::loadHTML('<!DOCTYPE html>
      <html>
      <head>
          <title>Test</title>
      </head>
      <body>
         <h1>Test</h1>
      </body>
      </html>');*/
      $pdf=PDF::loadView('task.pdf',['task'=>$task]);//->with('task',$task);

      return $pdf->stream($task->title.".pdf");
      //return $pdf->download($task->title.".pdf");
      //return $pdf->save(public_path()."/".$task->title.".pdf");
    }
    public function importExport(){
       return view('task.import');
    }

    public function downloadExcel($type)
    {
        $task = $this->task->getall()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($task) {
            $excel->sheet('mySheet', function($sheet) use ($task)
            {
                $sheet->fromArray($task);
            });
        })->download($type);
    }

    
    public function sendmail(Request $request){
        $when = Carbon\Carbon::now()->addMinutes(3);
        $receiver = $request->mail;
        Mail::to($receiver)->later($when, new TestMail());
        return redirect()->route('task.index')->with('message','email sent successfully');
    }


    public function importExcel(Request $request)
    {

        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            $data = Excel::load($path, function($reader) {})->get();

            if(!empty($data) && $data->count()){

                foreach ($data->toArray() as $key => $value) {
                    if(!empty($value)){
                        foreach ($value as $v) {        
                            $insert[] = ['title' => $v['title'], 'description' => $v['description']];
                        }
                    }
                }

                
                if(!empty($insert)){
                    Task::insert($insert);
                    return back()->with('success','Insert Record successfully.');
                }

            }

        }

        return back()->with('error','Please Check your file, Something is wrong there.');
    }


}
