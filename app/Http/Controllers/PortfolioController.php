<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('backend.portfolio.index',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio = Portfolio::all();
        return view('backend.portfolio.create',compact('portfolio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    $portfolio = new Portfolio();
    $validatedData = $request->validate([
        'category'    => 'required',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $categoryMap = [
        'Web Development' => 'Web Development',
        'Creative Design' => 'Creative Design',
        'Graphics Design' => 'Graphics Design',
    ];

    // $enumValue = array_search($validatedData['category'], $categoryMap);

    // dd($enumValue);


    if ($request->hasFile('image')) {
        $request->validate([
            'image'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Delete the old image if it exists
        if ($portfolio->image && file_exists(public_path($portfolio->image))) {
            unlink(public_path($portfolio->image));
        }

        $image          = $request->file('image');
        $imageName      = date('YmdHis') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('portfolio/images'), $imageName);

        $portfolio->image    = 'portfolio/images/' . $imageName;
    }

    $portfolio->category = $validatedData['category'];

    $portfolio->save();

    // Optionally, you can redirect or perform additional actions

    $notification = [
        'message' => 'News updated successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('admin.portfolio.index')->with($notification);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.portfolio.create',compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $portfolio = Portfolio::findOrFail($id);
        $validatedData = $request->validate([
            'category'    => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $categoryMap = [
            'Web Development' => 'Web Development',
            'Creative Design' => 'Creative Design',
            'Graphics Design' => 'Graphics Design',
        ];

        // $enumValue = array_search($validatedData['category'], $categoryMap);

        // dd($enumValue);


        if ($request->hasFile('image')) {
            $request->validate([
                'image'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Delete the old image if it exists
            if ($portfolio->image && file_exists(public_path($portfolio->image))) {
                unlink(public_path($portfolio->image));
            }

            $image          = $request->file('image');
            $imageName      = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('portfolio/images'), $imageName);

            $portfolio->image    = 'portfolio/images/' . $imageName;
        }

        $portfolio->category = $validatedData['category'];

        $portfolio->save();

        // Optionally, you can redirect or perform additional actions

        $notification = [
            'message' => 'News updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.portfolio.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
