<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Invest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestController extends Controller
{
    public function index()
    {
        $invests = Invest::all();
        return view('admin.main.invest.index', compact('invests'));
    }

    public function create()
    {
        return view('admin.main.invest.create');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'sector' => 'required|string',
                'name' => 'required|string|max:255',
                'amount' => 'required',
            ]);

            $invest = new Invest();
            $invest->sector = $request->sector;
            $invest->name = $request->name;
            $invest->amount = $request->amount;
            
            $invest->save();

            return redirect()->route('invests')->with('success', 'Investment added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function edit(string $id)
    {
        $invest = Invest::find($id);
        return view('admin.main.invest.edit', compact('invest'));
    }


    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'sector' => 'required|string',
                'name' => 'required|string|max:255',
                'amount' => 'required',
            ]);

            $invest = Invest::findOrFail($id);

            $invest->sector = $request->input('sector');
            $invest->name = $request->input('name');
            $invest->amount = $request->input('amount');

            $invest->save();

            return redirect()->route('invests')->with('success', 'Investment updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $invest = Invest::find($id);
        $invest->delete();

        return redirect()->route('invests')->with('success', 'Investment deleted successfully.');
    }
}
