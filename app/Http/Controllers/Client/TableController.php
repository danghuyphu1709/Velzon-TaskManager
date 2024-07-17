<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Repository\TableRepository;
use App\Http\Requests\TableRequest;
use App\Models\Spaces;
use App\Models\Tables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mockery\Exception;

class TableController extends Controller
{
    public $tableRepository;
    public function __construct(TableRepository $tableRepository )
    {
        $this->tableRepository = $tableRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $table = $request->validated();
        $table['code'] = $this->tableRepository->code();
        try {
            $tableCreated = $this->tableRepository->create($table);
            return redirect()->route('tables.show',$tableCreated->code);
        }catch (Exception $exception){
            session()->flash('error', 'Lỗi hệ thống, vui lòng gửi lại sau');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code)
    {
        $table = Tables::query()->where('code',$code)->first();
        return view('client.table.show',compact(['table']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
