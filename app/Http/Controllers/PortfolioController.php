<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
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

        // dd($portfolio->toArray());
        return view('backend.portfolio.index',compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $portfolio = Portfolio::all();
        $categories = PortfolioCategory::all();

        return view('backend.portfolio.create',compact('categories'));
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

    $request->validate([
        'category_id'    => 'required',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
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

    $portfolio->category_id = $request->category_id;

    $portfolio->save();

    // Optionally, you can redirect or perform additional actions

    $notification = [
        'message' => 'Portfolio Created Successfully',
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
        $categories  = PortfolioCategory::all();
        $portfolio = Portfolio::findOrFail($id);
        return view('backend.portfolio.create',compact('portfolio','categories'));
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
            'category_id'    => 'required',
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

        $portfolio->category_id = $validatedData['category_id'];

        $portfolio->save();

        // Optionally, you can redirect or perform additional actions

        $notification = [
            'message' => 'portfolio updated successfully',
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
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

    // Delete the image if it exists
    if ($portfolio->image && file_exists(public_path($portfolio->image))) {
        unlink(public_path($portfolio->image));
    }

    $portfolio->delete();

    $notification = [
        'message'    => 'Deleted successfully',
        'alert-type' => 'success',
    ];

    return redirect()->route('admin.portfolio.index')->with($notification);

    }
}
