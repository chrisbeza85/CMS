<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentCategory;
use App\Models\EquipmentSubcategory;

class EquipmentCategoryController extends Controller
{
    public function index()
    {
        $categories =EquipmentCategory::with('subcategories')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit($id)
    {
        $category = EquipmentCategory::findOrFail($id);
        
        return view('categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_code'=> 'required|string|max:2|unique:equipment_categories,category_code',
        ]);

        EquipmentCategory::create($request->only(['category_name', 'category_code']));

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = EquipmentCategory::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_code' => 'required|string|max:2|unique:equipment_categories,category_code,' . $category->id,
        ]);

        $category->update($request->only(['category_name', 'category_code']));

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = EquipmentCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    public function createSubCategory($categoryId)
    {
        $category = EquipmentCategory::findOrFail($categoryId);
        return view('categories.create_subcategory', compact('category'));
    }

    public function storeSubCategory(Request $request, $categoryId)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'subcategory_code' => 'required|string|max:2',
        ]);

        EquipmentSubCategory::create([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_code' => $request->subcategory_code,
            'category_id' => $categoryId,
        ]);

        return redirect()->route('categories.index')->with('success', 'Subcategory created successfully.');
    }

    public function destroySubCategory($id)
    {
        $subcategory = EquipmentSubcategory::findOrFail($id);

        // Delete subcategory
        $subcategory->delete();

        return redirect()->route('categories.index')->with('success', 'Subcategory deleted successfully.');
    }

}
