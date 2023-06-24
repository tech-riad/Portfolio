<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PortfolioCategory::all();

        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $categories = new PortfolioCategory();
        $request->validate([
            'name'          => 'required',
        ]);

        $categories->name = $request->name;

        $categories->save();

        $notification = array(
            'message' =>' Store Successfully ',
            'alert-type' =>'success'
        );

        return redirect()->route('admin.portfoliocategory.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioCategory $portfolioCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = PortfolioCategory::findOrFail($id);


        return view('backend.category.create',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = PortfolioCategory::findOrFail($id);
        $request->validate([
            'name'          => 'required',
        ]);

        $categories->name = $request->name;

        $categories->save();

        $notification = array(
            'message'     =>' Store Successfully ',
            'alert-type'  =>'success'
        );

        return redirect()->route('admin.portfoliocategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioCategory  $portfolioCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = PortfolioCategory::findOrFail($id);

        $categories->delete();

        return redirect()->back();
    }
}
